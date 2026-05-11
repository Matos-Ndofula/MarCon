<?php
$id_Especialidade = $_GET['id_Especialidade'];

require("../configs/conexao.php");

 $result_pesq = "SELECT * FROM medico WHERE especialidade = $id_Especialidade";
    $resultado_pesquisa4 = mysqli_query($mysqli, $result_pesq);

while($rows_pesquisar4 = mysqli_fetch_array($resultado_pesquisa4)) {
    echo "<option value=" . $rows_pesquisar4["nome"] . "> ". $rows_pesquisar4["nome"] . "</option> ";
}
die;

?>