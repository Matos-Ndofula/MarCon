<?php
require("../configs/conexao.php");
require("config_encript_decrypt_url.php");
  
  $id = $_GET["id"];
  $id = encryptor('decrypt', $id);  
      
 // Buscar dados da tabela de origem
    $result_pesq = "SELECT * FROM consultas_agendadas WHERE id='".$id."'";

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
           
   $insert = $mysqli->query("INSERT INTO `consultas_demarcadas`(`id_utente`,`nome_utente`,`especialidade`, `nome_medico`, `color`, `data_horario`, `estado`, `obs`, `horario`) VALUES ('$id_utente','$nome_utente', '$especialidade', '$nome_medico', '$color', '$data_horario','$estado', '$obs', '$horario')");
        }

       if($insert){
   echo '<script>alert("Consulta removida");</script>
';
  
  echo "<script>window.location='painel_medico_consulta.php'</script>";

   $query = "DELETE FROM consultas_agendadas WHERE id='".$id."'";
    if(mysqli_query($mysqli, $query)){
  
} 
            }else{
    echo '<script>alert("Consulta não foi removida");</script>';
            }

}else{
         echo "Erro de Linha";
    }
?>
