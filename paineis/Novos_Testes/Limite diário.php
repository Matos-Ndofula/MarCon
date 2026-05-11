<?php

// Verificar quantos cadastros já foram feitos hoje
$dataHoje = date('Y-m-d');

$sql = "SELECT COUNT(*) AS total FROM tabela_eventos_calendario WHERE data_cadastro = '$dataHoje'";

$result = mysqli_query($mysqli3, $sql);

 $row = $result->fetch_assoc();
$totalHoje = $row['total'];
$nome_utente_tabela = $row['nome_utente'];
$especialidade = $row['especialidade'];

if ($totalHoje > 3 && $nome_utente_tabela == $nome_utente && $especialidade = 'Oftalmologia' && $especialidade = 'Cardiologia' && $especialidade = 'Dermatologia') {
    echo "Limite diário de cadastros atingido. Tente novamente amanhã.";
} else {
    // Fazer o cadastro
    $nome = "Nome Teste"; // Podes substituir com $_POST['nome'] se for via formulário
    $sqlInserir = "INSERT INTO cadastros (nome, data_cadastro) VALUES ('$nome', '$dataHoje')";

    if ($conn->query($sqlInserir) === TRUE) {
        echo "Cadastro realizado com sucesso!";
    } else {
        echo "Erro ao cadastrar: " . $conn->error;
    }
}

$conn->close();
?>