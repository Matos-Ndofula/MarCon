<?php
/*
// fetch_data.php

// Dados fictícios para demonstração
$dados = [
    'BI1234567' => [
        'nome' => 'João da Silva',
        'data_nascimento' => '01/01/1980',
        'endereco' => 'Rua Exemplo, 123',
        'telefone' => '1234-5678'
    ],
    'BI12345678' => [
        'nome' => 'Maria Oliveira',
        'data_nascimento' => '15/05/1990',
        'endereco' => 'Avenida Teste, 456',
        'telefone' => '8765-4321'
    ]
];

// Recebe o número do Bilhete de Identidade via GET
$bilhete = $_GET['bilhete'] ?? '';

// Verifica se o número do Bilhete está nos dados fictícios
if (array_key_exists($bilhete, $dados)) {
    $resultado = $dados[$bilhete];
    echo json_encode([
        'success' => true,
        'data' => $resultado
    ]);
} else {
    echo json_encode([
        'success' => false,
        'message' => 'Nenhum dado encontrado para o número do Bilhete de Identidade informado.'
    ]);
}

*/
?>

<?php
// fetch_data.php

// Função para chamar a API da AGT
function fetchFromAgtApi($bilhete) {
    // URL fictícia da API da AGT
    $url = 'https://portaldocontribuinte.minfin.gov.ao/consultar-nif-do-contribuinte?bilhete=' . urlencode($bilhete);

    // Inicializa a sessão cURL
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPGET, true);

    // Executa a chamada
    $response = curl_exec($ch);

    // Verifica se houve erro na chamada
    if (curl_errno($ch)) {
        curl_close($ch);
        return ['success' => false, 'message' => 'Erro na chamada da API.'];
    }

    // Fecha a sessão cURL
    curl_close($ch);

    // Decodifica a resposta JSON
    return json_decode($response, true);
}

// Recebe o número do Bilhete de Identidade via GET
$bilhete = $_GET['bilhete'] ?? '';

// Verifica se o número do Bilhete foi fornecido
if ($bilhete) {
    // Obtém dados da API
    $data = fetchFromAgtApi($bilhete);

    // Verifica se a resposta contém dados
    if (isset($data['nome'])) {
        echo json_encode([
            'success' => true,
            'data' => [
                'nome' => $data['nome'],
                'data_nascimento' => $data['data_nascimento'],
                'endereco' => $data['endereco'],
                'telefone' => $data['telefone']
            ]
        ]);
    } else {
        echo json_encode([
            'success' => false,
            'message' => 'Nenhum dado encontrado para o número do Bilhete de Identidade informado.'
        ]);
    }
} else {
    echo json_encode([
        'success' => false,
        'message' => 'Número do Bilhete de Identidade não fornecido.'
    ]);
}
?>
