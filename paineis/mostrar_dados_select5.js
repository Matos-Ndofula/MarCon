<?php
require("../configs/conexao.php");

$val = $_GET["value"];

//$val_M = mysql_real_escape_string($mysqli, $val);

$result_pesq = "SELECT id,nome, especialidade FROM medico WHERE especialidade = '$val'";
    $resultado_pesquisa = mysqli_query($mysqli, $result_pesq);

    if (mysqli_num_rows($resultado_pesquisa)>0) {
    	echo "<select class='form-select' name='nome_medico' required>";

    	while ($rows_pesquisar = mysqli_fetch_array($resultado_pesquisa)) {
    		echo "<option value=".$rows_pesquisar["nome"].">".$rows_pesquisar["nome"]."</option>";

    	}
    	echo "</select>";

    	echo "<div class='botoes_submits'>";
    	echo "<a class='btn btn-warning w-25' style='border-radius: 0px;'>Responder questões</a>";
		echo "</div>";

    }

    if (mysqli_num_rows($resultado_pesquisa)>0) {
    
    	echo "<div class='botoes_submits'>";
    	echo "<a class='btn btn-warning w-25' style='border-radius: 0px;'>Responder questões</a>";
		echo "</div>";

    }
    


?>