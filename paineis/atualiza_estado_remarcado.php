<?php

//Oculta todos os erros na tela
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(1);

require("../configs/conexao.php");
include ("Mensagens sweetAlerts/links_mensagens_sweetAlerts.php");
require("config_encript_decrypt_url.php");
  
if (count($_POST) > 0) {
    
    $id = $_POST["id"];
    
    $data_horario_nova = $_POST["data_horario"];
    $horario_novo = $_POST["horario"];
    $dia = mysqli_real_escape_string($mysqli, $_POST['dia']);
    $dia_final= date("Y-m-d", strtotime("+6 days", strtotime(date("$dia")))); 
      

// 1. Buscar dados originais da consulta
$sql_dados = "SELECT especialidade, data_horario FROM consultas_agendadas WHERE id = '$id'";
$result_dados = mysqli_query($mysqli, $sql_dados);   
       $dados = mysqli_fetch_assoc($result_dados);
   $especialidade_tabela_alheia = $dados['especialidade'];
    
$sqlSemana = $mysqli->query("SELECT data_horario, horario FROM consultas_agendadas WHERE especialidade = '$especialidade_tabela_alheia' AND horario <> 'Livre' AND data_horario BETWEEN '$dia' AND '$dia_final'");
           

if($horario_novo == "" || $data_horario_nova == "" ){
            echo '<script>alert("Horario ou data estão vazios");</script>';
           echo "<script>window.location='novo_painel_utente_boas_vindas.php'</script>";
    exit;            

}          

if($sqlSemana){
        $roww = $sqlSemana->num_rows;
        if($roww > 0){
           echo '<script>alert("Já tem essa consulta marcada nesta Semana. Tente novamente na outra semana.");</script>';
           echo "<script>window.location='novo_painel_utente_boas_vindas.php'</script>";
        
      } else {


/*if (mysqli_num_rows($result_dados) > 0) {
    $dados = mysqli_fetch_assoc($result_dados);
    $especialidade_original = $dados['especialidade'];
    $data_horario = $dados['data_horario'];   
   */
     /* 2. Verifica se está tentando remarcar para o mesmo dia
    if ($data_horario_nova === $data_horario) {
        echo '<script>alert(" Tente novamente no outro dia.");</script>
';
  
  echo "<script>window.location='painel_cadastro_utente_boas_vindas.php'</script>";
        exit;
    }*/
   
   /* // 3. Verifica conflito com mesma especialidade no novo dia e horário
    $sql_verifica_conflito = "SELECT especialidade FROM consultas_agendadas WHERE data_horario = '$data_horario_nova' AND especialidade = '$especialidade_original' AND id != '$id'";

    $resultado_conflito = mysqli_query($mysqli, $sql_verifica_conflito);

    if (mysqli_num_rows($resultado_conflito) > 0) {
        
        echo '<script>alert("Erro: Já existe uma consulta da mesma especialidade neste dia.");</script>';
   
       echo "<script>window.location='novo_painel_utente_boas_vindas.php'</script>";
       exit;
    }else{*/
    
   

   // 4. Atualiza a consulta
    $sql_update = "UPDATE consultas_agendadas 
                   SET data_horario = '$data_horario_nova', horario = '$horario_novo' 
                   WHERE id = '$id'";
    
    if (mysqli_query($mysqli, $sql_update)) {
    echo "<script>
  alert('Consulta Remarcada');
</script>";

echo '<script>window.location="novo_painel_utente_boas_vindas.php"</script>';
    }else{
      echo "<script>
  alert('Erro ao Remarcar!');
</script>";
    }


       
 /* }
  
  } else {
    echo "Consulta não encontrada.";
}*/

 
      }
}


mysqli_close($mysqli); 
}
  ?>