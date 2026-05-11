<?php
// chatbot_api.php - Chatbot com duas funcionalidades: Agendamento e Realização de Consulta

header('Content-Type: application/json; charset=utf-8');

require("configs/conexao.php");

// Inicia sessão se ainda não estiver iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$input = file_get_contents('php://input');
$data = json_decode($input, true);
$message = trim($data['message'] ?? '');

// Pega o estado atual da sessão
if (!isset($_SESSION['chatbot_state'])) {
    $_SESSION['chatbot_state'] = 'menu_inicial';
    $_SESSION['agendamento_data'] = [];
    $_SESSION['consulta_data'] = [];
}

$current_state = $_SESSION['chatbot_state'];
$response = '';
$next_state = $current_state;

// Menu inicial - Apresenta as duas opções
if ($current_state === 'menu_inicial') {
    $response = "Olá! 👋 Bem-vindo ao SisCons.\n\nEscolha uma opção:\n\n1️⃣ Agendar uma consulta médica\n2️⃣ Realizar uma consulta (Online)";
    $next_state = 'menu_inicial';
    
    if (strtoupper($message) === '1' || strtoupper($message) === 'AGENDAR') {
        $_SESSION['agendamento_data'] = [];
        $response = 'Ótimo! Vou ajudá-lo a agendar uma consulta. Qual é o seu nome completo?';
        $next_state = 'agendamento_asking_name';
    } elseif (strtoupper($message) === '2' || strtoupper($message) === 'CONSULTA') {
        $_SESSION['consulta_data'] = [];
        $response = 'Vou conectá-lo a uma consulta online. Qual é o seu nome?';
        $next_state = 'consulta_asking_name';
    }
}

// ==================== FLUXO DE AGENDAMENTO ====================
elseif ($current_state === 'agendamento_asking_name') {
    if (!empty($message) && strlen($message) >= 3) {
        $_SESSION['agendamento_data']['nome'] = htmlspecialchars($message);
        $response = 'Qual especialidade deseja? (Cardiologia, Dermatologia, Oftalmologia)';
        $next_state = 'agendamento_asking_specialty';
    } else {
        $response = 'Por favor, digite um nome válido com pelo menos 3 caracteres.';
    }
}

elseif ($current_state === 'agendamento_asking_specialty') {
    $message_upper = strtoupper($message);
    $specialties = ['CARDIOLOGIA', 'DERMATOLOGIA', 'OFTALMOLOGIA'];
    
    if (in_array($message_upper, $specialties)) {
        $_SESSION['agendamento_data']['especialidade'] = ucfirst(strtolower(str_replace('Ã', 'a', $message_upper)));
        $response = 'Que data você prefere? (formato: DD/MM/YYYY)';
        $next_state = 'agendamento_asking_date';
    } else {
        $response = 'Especialidade inválida. Escolha: Cardiologia, Dermatologia ou Oftalmologia.';
    }
}

elseif ($current_state === 'agendamento_asking_date') {
    if (validarData($message)) {
        $_SESSION['agendamento_data']['data'] = $message;
        $response = 'Qual hora? (formato: HH:MM, por exemplo: 09:00)';
        $next_state = 'agendamento_asking_time';
    } else {
        $response = 'Data inválida. Use o formato DD/MM/YYYY.';
    }
}

elseif ($current_state === 'agendamento_asking_time') {
    if (validarHora($message)) {
        $_SESSION['agendamento_data']['hora'] = $message;
        
        $agendamento = $_SESSION['agendamento_data'];
        $confirm_text = "📋 Resumo do agendamento:\n\n";
        $confirm_text .= "👤 Nome: {$agendamento['nome']}\n";
        $confirm_text .= "🏥 Especialidade: {$agendamento['especialidade']}\n";
        $confirm_text .= "📅 Data: {$agendamento['data']}\n";
        $confirm_text .= "⏰ Hora: {$agendamento['hora']}\n\n";
        $confirm_text .= "Deseja confirmar? (Sim/Não)";
        
        $response = $confirm_text;
        $next_state = 'agendamento_confirm';
    } else {
        $response = 'Hora inválida. Use o formato HH:MM (por exemplo: 09:00).';
    }
}

elseif ($current_state === 'agendamento_confirm') {
    if (strtoupper($message) === 'SIM' || strtoupper($message) === 'S') {
        $resultado = salvarAgendamento($_SESSION['agendamento_data'], $mysqli);
        if ($resultado) {
            $response = "✅ Agendamento confirmado!\n\nID do agendamento: #" . $resultado . "\n\nEm breve receberá uma confirmação no seu email.";
            unset($_SESSION['agendamento_data']);
            $next_state = 'menu_inicial';
        } else {
            $response = 'Erro ao salvar o agendamento. Por favor, tente novamente.';
        }
    } elseif (strtoupper($message) === 'NÃO' || strtoupper($message) === 'NAO' || strtoupper($message) === 'N') {
        $response = "Agendamento cancelado.\n\nO que deseja fazer?\n\n1️⃣ Agendar uma consulta médica\n2️⃣ Realizar uma consulta (Online)";
        unset($_SESSION['agendamento_data']);
        $next_state = 'menu_inicial';
    } else {
        $response = 'Por favor, responda com "Sim" ou "Não".';
    }
}

// ==================== FLUXO DE REALIZAÇÃO DE CONSULTA ====================
elseif ($current_state === 'consulta_asking_name') {
    if (!empty($message) && strlen($message) >= 3) {
        $_SESSION['consulta_data']['nome'] = htmlspecialchars($message);
        
        // Busca consultas agendadas para este paciente
        $nome = $_SESSION['consulta_data']['nome'];
        $query = "SELECT id, especialidade, nome_medico, data_horario, horario FROM consultas_agendadas 
                  WHERE nome_utente LIKE '%$nome%' AND estado = 'Agendado' LIMIT 5";
        $result = $mysqli->query($query);
        
        if ($result && $result->num_rows > 0) {
            $response = "Encontrei as seguintes consultas agendadas:\n\n";
            $i = 1;
            $_SESSION['consulta_data']['consultas'] = [];
            
            while ($row = $result->fetch_assoc()) {
                $response .= "{$i}️⃣ {$row['especialidade']} - Dr(a). {$row['nome_medico']}\n";
                $response .= "   Data: {$row['data_horario']} às {$row['horario']}\n\n";
                $_SESSION['consulta_data']['consultas'][] = $row['id'];
                $i++;
            }
            
            $response .= "Digite o número da consulta que deseja realizar:";
            $next_state = 'consulta_choosing';
        } else {
            $response = "Não encontrei consultas agendadas para este nome.\n\nO que deseja fazer?\n\n1️⃣ Agendar uma consulta médica\n2️⃣ Tentar novamente\n3️⃣ Voltar ao menu";
            $next_state = 'consulta_not_found';
        }
    } else {
        $response = 'Por favor, digite um nome válido.';
    }
}

elseif ($current_state === 'consulta_choosing') {
    if (!empty(trim($message)) && is_numeric($message)) {
        $choice = (int)$message - 1;
        $consultas = $_SESSION['consulta_data']['consultas'] ?? [];
        
        if (isset($consultas[$choice])) {
            $_SESSION['consulta_data']['id_consulta'] = $consultas[$choice];
            $response = "Qual é o motivo da consulta?";
            $next_state = 'consulta_asking_reason';
        } else {
            $response = 'Opção inválida. Digite o número correto da consulta.';
        }
    } else {
        $response = 'Por favor, digite um número válido.';
    }
}

elseif ($current_state === 'consulta_asking_reason') {
    if (!empty($message) && strlen($message) >= 5) {
        $_SESSION['consulta_data']['motivo'] = htmlspecialchars($message);
        
        $motivo = $_SESSION['consulta_data']['motivo'];
        $id_consulta = $_SESSION['consulta_data']['id_consulta'];
        
        $response = "📋 Resumo da consulta:\n\n";
        $response .= "👤 Nome: {$_SESSION['consulta_data']['nome']}\n";
        $response .= "📝 Motivo: {$motivo}\n\n";
        $response .= "Deseja prosseguir com a consulta? (Sim/Não)";
        
        $next_state = 'consulta_confirm';
    } else {
        $response = 'Por favor, descreva o motivo com pelo menos 5 caracteres.';
    }
}

elseif ($current_state === 'consulta_confirm') {
    if (strtoupper($message) === 'SIM' || strtoupper($message) === 'S') {
        $resultado = realizarConsulta($_SESSION['consulta_data'], $mysqli);
        if ($resultado) {
            $response = "✅ Consulta iniciada!\n\n" .
                       "Você será conectado em breve com o médico.\n" .
                       "ID da consulta: #" . $resultado . "\n\n" .
                       "Aguarde na sala virtual...";
            unset($_SESSION['consulta_data']);
            $next_state = 'menu_inicial';
        } else {
            $response = 'Erro ao processar a consulta. Por favor, tente novamente.';
        }
    } elseif (strtoupper($message) === 'NÃO' || strtoupper($message) === 'NAO' || strtoupper($message) === 'N') {
        $response = "Consulta cancelada.\n\nO que deseja fazer?\n\n1️⃣ Agendar uma consulta médica\n2️⃣ Realizar uma consulta (Online)";
        unset($_SESSION['consulta_data']);
        $next_state = 'menu_inicial';
    } else {
        $response = 'Por favor, responda com "Sim" ou "Não".';
    }
}

elseif ($current_state === 'consulta_not_found') {
    if (strtoupper($message) === '1' || strtoupper($message) === 'AGENDAR') {
        $_SESSION['agendamento_data'] = [];
        $response = 'Qual é o seu nome completo?';
        $next_state = 'agendamento_asking_name';
    } elseif (strtoupper($message) === '2' || strtoupper($message) === 'TENTAR') {
        $response = 'Qual é o seu nome?';
        $next_state = 'consulta_asking_name';
    } elseif (strtoupper($message) === '3' || strtoupper($message) === 'MENU') {
        $response = "Olá! 👋 Bem-vindo ao SisCons.\n\nEscolha uma opção:\n\n1️⃣ Agendar uma consulta médica\n2️⃣ Realizar uma consulta (Online)";
        $next_state = 'menu_inicial';
    } else {
        $response = 'Opção inválida. Digite 1, 2 ou 3.';
    }
}

// Atualiza o estado
$_SESSION['chatbot_state'] = $next_state;

echo json_encode([
    'reply' => $response,
    'state' => $next_state
]);

// ==================== FUNÇÕES AUXILIARES ====================

function validarData($data) {
    $formato = '/^\d{2}\/\d{2}\/\d{4}$/';
    if (!preg_match($formato, $data)) {
        return false;
    }
    
    list($dia, $mes, $ano) = explode('/', $data);
    return checkdate($mes, $dia, $ano);
}

function validarHora($hora) {
    $formato = '/^\d{2}:\d{2}$/';
    if (!preg_match($formato, $hora)) {
        return false;
    }
    
    list($h, $m) = explode(':', $hora);
    return ($h >= 0 && $h <= 23) && ($m >= 0 && $m <= 59);
}

function salvarAgendamento($agendamento, $mysqli) {
    $nome = $mysqli->real_escape_string($agendamento['nome']);
    $especialidade = $mysqli->real_escape_string($agendamento['especialidade']);
    
    // Converte data DD/MM/YYYY para YYYY-MM-DD
    list($dia, $mes, $ano) = explode('/', $agendamento['data']);
    $data_sql = "$ano-$mes-$dia";
    
    $hora = $mysqli->real_escape_string($agendamento['hora']);
    
    // Procura um médico disponível para a especialidade
    $query = "SELECT nome_medico FROM agendamento_medico WHERE especialidade = '$especialidade' LIMIT 1";
    $result = $mysqli->query($query);
    $medico = $result && $result->num_rows > 0 ? $result->fetch_assoc()['nome_medico'] : 'Não definido';
    
    // Insere na tabela consultas_agendadas
    $insert_query = "INSERT INTO consultas_agendadas (nome_utente, especialidade, nome_medico, data_horario, estado, horario, color)
                     VALUES ('$nome', '$especialidade', '$medico', '$data_sql', 'Agendado', '$hora', '#ffe000')";
    
    if ($mysqli->query($insert_query)) {
        return $mysqli->insert_id;
    }
    
    return false;
}

function realizarConsulta($consulta_data, $mysqli) {
    $id_consulta = $mysqli->real_escape_string($consulta_data['id_consulta']);
    $motivo = $mysqli->real_escape_string($consulta_data['motivo']);
    $nome = $mysqli->real_escape_string($consulta_data['nome']);
    
    // Atualiza o status da consulta para "Confirmada" ou similar
    $update_query = "UPDATE consultas_agendadas 
                     SET estado = 'Confirmada', obs = '$motivo' 
                     WHERE id = '$id_consulta'";
    
    if ($mysqli->query($update_query)) {
        return $id_consulta;
    }
    
    return false;
}
?>

