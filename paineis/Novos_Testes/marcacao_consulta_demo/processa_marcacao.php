<?php
require("../configs/conexao.php");

$nome_utente    = mysqli_real_escape_string($conn, $_POST['nome_utente']);
$especialidade  = mysqli_real_escape_string($conn, $_POST['especialidade']);
$data_marcacao  = mysqli_real_escape_string($conn, $_POST['data_marcacao']);

$sqlTotal = "SELECT COUNT(*) as total FROM consultas WHERE data_marcacao = '$data_marcacao'";
$resTotal = mysqli_query($conn, $sqlTotal);
$rowTotal = mysqli_fetch_assoc($resTotal);
$total_geral = $rowTotal['total'];

$sqlEsp = "SELECT COUNT(*) as total FROM consultas WHERE data_marcacao = '$data_marcacao' AND especialidade = '$especialidade'";
$resEsp = mysqli_query($conn, $sqlEsp);
$rowEsp = mysqli_fetch_assoc($resEsp);
$total_especialidade = $rowEsp['total'];

if ($total_geral >= 3) {
    echo "❌ Já existem 3 marcações neste dia.";
} elseif ($total_especialidade >= 1) {
    echo "❌ A especialidade '$especialidade' já foi marcada neste dia.";
} else {
    $sqlInsert = "INSERT INTO consultas (nome_utente, especialidade, data_marcacao) VALUES ('$nome_utente', '$especialidade', '$data_marcacao')";
    if (mysqli_query($conn, $sqlInsert)) {
        echo "✅ Consulta marcada com sucesso!";
    } else {
        echo "Erro ao marcar consulta: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
<br><br><a href='index.php'>Voltar</a>