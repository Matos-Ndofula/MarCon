 <?php

$data_actual = date("Y-m-d");
 
    // Buscar dados da tabela de origem
    $result_pesq = "SELECT * FROM consultas_agendadas WHERE data_horario < '".$data_actual."' ";

    $resultado_pesquisa = mysqli_query($mysqli, $result_pesq);

    if ($resultado_pesquisa->num_rows > 0) {
      
       while($rows_pesquisar = mysqli_fetch_array($resultado_pesquisa)){

          $id_utente = mysqli_real_escape_string($mysqli, $rows_pesquisar['id']);
          $nome_utente = mysqli_real_escape_string($mysqli, $rows_pesquisar['nome_utente']);
          $especialidade = mysqli_real_escape_string($mysqli, $rows_pesquisar['especialidade']);
          $nome_medico = mysqli_real_escape_string($mysqli, $rows_pesquisar['nome_medico']);
          $color = mysqli_real_escape_string($mysqli, $rows_pesquisar['color']);
          $data_horario = mysqli_real_escape_string($mysqli, $rows_pesquisar['data_horario']);
          $estado = mysqli_real_escape_string($mysqli, $rows_pesquisar['estado']);
          $obs = mysqli_real_escape_string($mysqli, $rows_pesquisar['obs']);
          $horario = mysqli_real_escape_string($mysqli, $rows_pesquisar['horario']);



            // Inserir na tabela de destino
           
   $insert = $mysqli->query("INSERT INTO `consultas_canceladas`(`id_utente`,`nome_utente`,`especialidade`, `nome_medico`, `color`, `data_horario`, `estado`, `obs`, `horario`) VALUES ('$id_utente','$nome_utente', '$especialidade', '$nome_medico', '$color', '$data_horario','$estado', '$obs', '$horario')");
        }

       if($insert){
   

   $query = "DELETE FROM consultas_agendadas WHERE data_horario < '".$data_actual."' ";
    if(mysqli_query($mysqli, $query)){
  
} 
            }else{
    echo '<script>alert("Consulta não foram removidas");</script>';
            }

}else{
       
    }
  ?>