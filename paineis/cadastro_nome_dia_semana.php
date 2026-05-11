<?php
require("../configs/conexao.php");

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém a data enviada pelo formulário
    $data = $_POST["nomeDiaSemana"];

    // Converte a data em um objeto DateTime
    $dataObj = new DateTime($data);

    // Obtém o dia da semana (0 para Domingo, 1 para Segunda-feira, etc.)
    $indiceDiaSemana = $dataObj->format("w");

    // Array para armazenar os nomes dos dias da semana
    $diasSemana = ["Domingo", "Segunda-feira", "Terça-feira", "Quarta-feira", "Quinta-feira", "Sexta-feira", "Sábado"];

    // Obtém o nome do dia da semana usando o índice obtido
    $nomeDiaSemana = $diasSemana[$indiceDiaSemana];

    // Exibe o nome do dia da semana
    echo "O dia selecionado é " . $nomeDiaSemana;

       // $nomeDiaSemana = $_POST["nomeDiaSemana"];

    // Insere os dados do usuário no banco de dados
    $sql = "INSERT INTO nomeDiaSemana (nomeDiaSemana) VALUES ('$nomeDiaSemana')";

    if ($mysqli->query($sql) === TRUE) {
        // Se o cadastro for bem-sucedido, redirecione de volta para a página de origem com uma mensagem de sucesso
        //header("Location: index.html?status=success");
        echo "<script>alert('Nome Cadastrado com sucesso');</script>";
    } else {
        // Se o cadastro falhar, redirecione de volta para a página de origem com uma mensagem de erro
        echo "<script>alert('Erro ao Cadastrar Nome');</script>";
        //header("Location: index.html?status=error");
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Obter Dia da Semana</title>
    <script type="text/javascript" src="jquery-3.5.1.js"></script>
    <script type="text/javascript" src="dias_da_semana.js"></script>
</head>
<body>
    <form method="post">
        <label for="dataInput">Selecione uma data:</label>
        <input type="date" id="dataInput" name="nomeDiaSemana" onclick="obterDiaSemana();">
        <h3 id="mostra_nome_dia" style="color: #fff"></h3>
        <button type="submit">Obter Dia da Semana</button>
    </form>
</body>
</html>
