<?php
require("../configs/conexao.php");
include ("Mensagens sweetAlerts/links_mensagens_sweetAlerts.php");
require("config_encript_decrypt_url.php");
  
 
      $id_agendado = $_GET["id"];
      $id_agendado = $id_agendado;

        ?>
       <?php /*<script>
            $(".dialog").dialog();
            alert(" ")</script>

        <div class="dialog" style="display: none;">
            <?php echo "$id_agendado";?>
        </div>*/
        
    // Buscar dados da tabela de origem
    $result_pesq = "SELECT * FROM consultas_agendadas WHERE id='".$id_agendado."'";

    $resultado_pesquisa = mysqli_query($mysqli, $result_pesq);

    if ($resultado_pesquisa->num_rows > 0) {
      
       while($rows_pesquisar = mysqli_fetch_array($resultado_pesquisa)){

          $id = mysqli_real_escape_string($mysqli, $rows_pesquisar['id']);
         
                      
        }
       // Actualizar na tabela 
        if ($id_agendado == $id) {
          

 		$pesq = "UPDATE consultas_agendadas set id='".$id."', estado='Desmarcada', color='gray', horario='Livre' WHERE id='".$id."'";
        
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
           
   $insert = $mysqli->query("INSERT INTO `consultas_demarcadas`(`id_utente`,`nome_utente`,`especialidade`, `nome_medico`, `color`, `data_horario`, `estado`, `eliminada`, `horario`) VALUES ('$id_utente','$nome_utente', '$especialidade', '$nome_medico', '$color', '$data_horario','$estado', 'Sim', '$horario')");
        }

       if($insert){
   echo '<script>alert("Consulta removida");</script>
';
  
  echo "<script>window.location='novo_painel_utente_desmarcar_consulta.php'</script>";

  // $query = "DELETE FROM consultas_agendadas WHERE id='".$id."'";
  //  if(mysqli_query($mysqli, $query)){
  
//} 
            }else{
    echo '<script>alert("Consulta não foi removida");</script>';
            }

}else{
         echo "Erro de Linha";
    }
  
  if(mysqli_query($mysqli, $pesq)){
  		echo "<script>
  		alert('Consulta Desmarcada!');
</script>";
        echo '<script src="Mensagens sweetAlerts/msg_sweetAlert_sucesso_exito.js"></script>';


		echo '<script>window.location="painel_utente_desmarcar_consulta.php"</script>';

}else{
			echo "<script>
  alert('Erro ao desmarcar consulta!');
</script>";
		}

    }else{
          echo "Não Desmarcada";  
        }

 }else{
         echo "Erro de Linha";
    }

?>
 <?php
/*    

if(isset($_GET['button']) || isset($_FILES['foto'])){
        $nome_utente = mysqli_real_escape_string($mysqli, $_GET['nome_utente']);
        $especialidade = mysqli_real_escape_string($mysqli, $_GET['especialidade']);
        $data_horario = mysqli_real_escape_string($mysqli, $_GET['data_horario']);
        $horario = mysqli_real_escape_string($mysqli, $_GET['horario']);
        
        /*
        $extensao = strtolower(substr($_FILES['foto']['name'], -4));
        $novo_nome = md5(time()) . $extensao;
        $diretorio = "uploads/.jpg";
        move_uploaded_file($_FILES['foto']['tmp_name'], $diretorio.$novo_nome);


        if($nome_utente == "" || $especialidade == "" || $data_horario == "" || $horario == "" ){
           
        echo "<script>alert('Preencha todos os campos!');</script>";
        echo "<script>window.location='painel_cadastro_medico.php'</script>";

        }
        $select = $mysqli->query("SELECT * FROM consultas_demarcadas WHERE data_horario='$data_horario'");
        if($select){
        $row = $select->num_rows;
        if($row > 0){
            
        echo "<script>alert('Ja existe esta data cadastrada');</script>";
        echo "<script>window.location='painel_cadastro_medico.php'</script>";

        }else{

            $insert = $mysqli->query("INSERT INTO `consultas_demarcadas`(`nome_utente`, `especialidade`, `data_horario`, `horario`) VALUES ('$nome_utente', '$especialidade', '$data_horario', '$horario')");

            if($insert){
       echo "<script>
        alert('Consulta Desmarcada!');
</script>";

        echo '<script>window.location="painel_utente_desmarcar_consulta.php"</script>';

            }else{
                echo "Erro aqui 1";
            }
        }
    }else{
         echo "Erro aqui 2";
    }
}
*/
?>

