<?php

require("../configs/conexao.php");

$val = $_GET["value"];

//$val_M = mysql_real_escape_string($mysqli, $val);

$result_pesq = "SELECT horario FROM  consultas_agendadas  WHERE especialidade = '$val' ";
    $resultado_pesquisa = mysqli_query($mysqli, $result_pesq);

    if (mysqli_num_rows($resultado_pesquisa)>0) {
      echo "<select class='form-select' name='horario' required>";
// Horários disponíveis (exemplo: das 08:00 às 18:00)
        $inicio = strtotime("08:00");
        $fim = strtotime("15:00");

        // Intervalo de 30 minutos
        $intervalo = 30 * 60;

      while ($rows_pesquisar = mysqli_fetch_array($resultado_pesquisa)) {
            
        // Gerar radio buttons para cada intervalo de 30 minutos
        for ($horario = $inicio; $horario <= $fim; $horario += $intervalo) {

            $hora_formatada = date("H:i", $horario);

            if ($hora_formatada != $rows_pesquisar['horario']) {
            echo $mostra_especialidade;
        echo "<option value=".$hora_formatada.">". $hora_formatada ."</option>";
            
       }else if ($hora_formatada == $rows_pesquisar['horario']) {
        echo "<option value=".$hora_formatada." disabled>". $hora_formatada ."</option>";
         
       }
          }

      }
      echo "</select>";

    }
    
?>

<?php
/*

      while ($rows_pesquisar = mysqli_fetch_array($resultado_pesquisa)) {
            
      
           // if ($hora_formatada != $rows_pesquisar['horario']) {

        echo "<option value=".$rows_pesquisar['data_horario'].">". $rows_pesquisar['data_horario'] ."</option>";
            
       //}else{}
       }

      echo "</select>";

    }


require("../configs/conexao.php");

$val = $_GET["value"];

//$val_M = mysql_real_escape_string($mysqli, $val);

$result_pesq = "SELECT id, data_horario FROM  consultas_agendadas  WHERE data_horario = '$val'";
    $resultado_pesquisa = mysqli_query($mysqli, $result_pesq);

    if (mysqli_num_rows($resultado_pesquisa)>0) {
      echo "<select class='form-select' name='horario' required>";
      
      while ($rows_pesquisar = mysqli_fetch_array($resultado_pesquisa)) {
  // Horários disponíveis (exemplo: das 08:00 às 18:00)
        $inicio = strtotime("08:00");
        $fim = strtotime("17:00");

        // Intervalo de 30 minutos
        $intervalo = 30 * 60;

        // Gerar radio buttons para cada intervalo de 30 minutos
        for ($horario = $inicio; $horario <= $fim; $horario += $intervalo) {

            $hora_formatada = date("H:i", $horario);

            if ($hora_formatada == $rows_pesquisar4['horario']) {
            echo $mostra_especialidade;
        echo "<option value=".$rows_pesquisar["horario"].">".$hora_formatada."</option>";
            
       }else{
             
             }
          }
}
}   
 

*/
?>