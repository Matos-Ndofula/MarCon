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

    }
    

  
    /*$nome_Dias_Semanas = $_GET["dia_semana"];

$result_dia_semana = "SELECT id,nome_medico, dias_da_semana, especialidade FROM agendamento_medico WHERE especialidade = '$val' AND  dias_da_semana = '$nome_Dias_Semanas'";

    $resultado_pesquisa_dia_semana = mysqli_query($mysqli, $result_dia_semana);

    if (mysqli_num_rows($resultado_pesquisa_dia_semana)>0) {
       

        while ($rows_pesquisar_dia_semana = mysqli_fetch_array($resultado_pesquisa_dia_semana)) {
            if ($rows_pesquisar_dia_semana["dias_da_semana"]) {
               
            
             echo "<input type='text' value=".$rows_pesquisar_dia_semana["dias_da_semana"]." name='data_horario1' required>";
        }
    }
      
    }*/
?>