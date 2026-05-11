  <!-- ======= FIM JUNTE SE A NOS CADASTRO PARA O LOGIN ======= -->
                   
<?php
include ("Mensagens sweetAlerts/links_mensagens_sweetAlerts.php");
 
             if(isset($_POST['button']) || isset($_FILES['foto'])){
        $nome_utente = mysqli_real_escape_string($mysqli, $_POST['nome_utente']);
        $especialidade = mysqli_real_escape_string($mysqli, $_POST['especialidade']);
        $nome_medico = mysqli_real_escape_string($mysqli, $_POST['nome_medico']);
        $color = mysqli_real_escape_string($mysqli, $_POST['color']);
        $data_horario = mysqli_real_escape_string($mysqli, $_POST['data_horario']);
        $estado = mysqli_real_escape_string($mysqli, $_POST['estado']);
        $dia = mysqli_real_escape_string($mysqli, $_POST['dia']);
        $obs = mysqli_real_escape_string($mysqli, $_POST['obs']);
        $horario = mysqli_real_escape_string($mysqli, $_POST['horario']);
         $dia_final= date("Y-m-d", strtotime("+6 days", strtotime(date("$dia"))));    
        /*
        $extensao = 
        -strtolower(substr($_FILES['foto']['name'], -4));
        $novo_nome = md5(time()) . $extensao;
        $diretorio = "uploads/";
        move_uploaded_file($_FILES['foto']['tmp_name'], $diretorio.$novo_nome);*/


        if($nome_utente == "" || $especialidade == "" ||  $nome_medico == "" || $color == "" || $data_horario == "" || $horario == ""){
            //echo '<script src="Mensagens sweetAlerts/msg_sweetAlert_sucesso_exito.js"></script>';
        }

        $select = $mysqli->query("SELECT horario FROM consultas_agendadas WHERE especialidade ='$especialidade' AND nome_medico ='$nome_medico' AND  horario='$horario' AND data_horario ='$data_horario'");
        if($select){
        $row = $select->num_rows;
        if($row > 0){
            
    echo '<script src="Mensagens sweetAlerts/msg_sweetAlert_erro_cad_consulta.js"></script>
      ';
        }

     /*    $sqlTotal = "SELECT COUNT(*) as total, estado FROM consultas_agendadas WHERE data_horario = '$data_horario' ";
        $resTotal = mysqli_query($mysqli3, $sqlTotal);
         $rowTotal = $resTotal->fetch_assoc();
        $total_geral = $rowTotal['total'];
        $estado_geral = $rowTotal['estado'];

        $sqlEsp = "SELECT COUNT(*) as total,  estado FROM consultas_agendadas WHERE data_horario = '$data_horario' AND especialidade = '$especialidade'";

        $resEsp = mysqli_query($mysqli3, $sqlEsp);
         $rowEsp = $resEsp->fetch_assoc();
        $total_especialidade = $rowEsp['total'];
        $total_horario = $rowEsp['horario'];
        
    AND horario = '$horario'  
      if ($total_geral >= 3 && $horario_geral != "Livre") { 

      elseif($total_geral >= 3  && $estado_geral == "Desmarcada") {
   
echo '<script>alert("Já existem 3 marcações neste dia.Excedeu o limite de consultas. Tente novamente no outro dia.");</script>
';
  
  echo "<script>window.location='novo_painel_utente_marcar_consulta.php'</script>";

   /*  
      } elseif ($total_especialidade>= 1) {
} elseif ($total_especialidade>= 1) {
   
         
echo '<script>alert("Essa especialidade já foi marcada neste dia.");</script>';
   
  echo "<script>window.location='novo_painel_utente_marcar_consulta.php'</script>";


} 


      */

$sqlSemana = $mysqli->query("SELECT data_horario, horario FROM consultas_agendadas WHERE especialidade = '$especialidade' AND horario <> 'Livre' AND data_horario BETWEEN '$dia' AND '$dia_final'");
        
        if($sqlSemana){
        $roww = $sqlSemana->num_rows;
        if($roww > 0){
           echo '<script>alert("Já tem essa consulta marcada nesta Semana. Tente novamente na outra semana.");</script>';
           echo "<script>window.location='novo_painel_utente_marcar_consulta.php'</script>";
        
      } else {

        $res_horario = $mysqli->query("SELECT horario FROM consultas_agendadas WHERE data_horario = '$data_horario' AND especialidade <>'$especialidade' AND horario = '$horario'");
        
        if($res_horario){
        $roww_horario = $res_horario->num_rows;
        if($roww_horario > 0){
          echo '<script>alert("Já tens uma consulta marcada nesse horario!");</script>';
          }else{

             $insert = $mysqli->query("INSERT INTO `consultas_agendadas`(`nome_utente`,`especialidade`, `nome_medico`, `color`, `data_horario`, `estado`, `obs`, `horario`) VALUES ('$nome_utente', '$especialidade', '$nome_medico', '$color', '$data_horario','$estado', '$obs', '$horario')");

            if($insert){
           echo '<script src="Mensagens sweetAlerts/msg_sweetAlert_sucesso_cad_consulta.js"></script>
           
       ';
       }else{
                echo "Erro ao Agendar";
    }
            
          }
       }



       
      
            }
}
       
  }
    }else{
         
    }
  
mysqli_close($mysqli3);

/* $data = "SELECT * FROM consultas_agendadas WHERE nome_utente = '$nome_utente' AND especialidade ='$especialidade' ";
         $res_data = mysqli_query($mysqli3, $data);
         $data_semana = date("Y-m-d", strtotime("+6 days", strtotime(date($dia))));
         $dia = date("Y-m-d", strtotime("+1 day", strtotime(date($dia))));
         
           while ($row_data = mysqli_fetch_array($res_data)){
            $total_geral_data = $row_data['data_horario'];

            while ($dia < $data_semana) {
            
              if ($dia == $row_data['data_horario']) {
                   
          echo '<script>alert("Esta consulta já foi marcada esta semana!");</script>';

                break;
              }else{
          echo '<script>alert("Passou!");</script>';

              }
            }

          }*/
?>
