<?php
require("../configs/conexao.php");

$val = $_GET["value"];

//$val_M = mysql_real_escape_string($mysqli, $val);

$result_pesq = "SELECT id,nome, especialidade FROM medico WHERE especialidade = '$val'";
    $resultado_pesquisa = mysqli_query($mysqli, $result_pesq);

      if (mysqli_num_rows($resultado_pesquisa)>0) {
    
        echo "<div class='botoes_submits'>";
        echo "<a class='btn btn-warning w-25' style='border-radius: 0px;'>Responder questões</a>

    ";
        echo "</div>";

    }
    


?>