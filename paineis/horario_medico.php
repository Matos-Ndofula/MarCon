<?php
require("../configs/conexao.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Horario Médico</title>
	  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
   <script type="text/javascript" src="jquery-3.5.1.js"></script>
    
     <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>
<body style="align-items: center; justify-content: center;">

	<section style="margin: 20px auto">
	<form action="" method="POST" >
		<div  class="col-md-3 form-group mt-3 mt-md-0" ><label>Horario Médico</label>
              <br>
              <br>

              <input type="time" class="form-control" name="horario" id="horario" placeholder="Selecione o Horario" value="#dc1616" >
              <div class="validate"></div>
              <div class="invalid-feedback">Por favor selecione o Horario!</div>
            </div>


      <input  type="submit" id="button" class="btn btn-success w-25" style="border-radius: 0px; margin-top: 10px" value="Marcar Consulta" name="button"/>

	</form>
</section>
</body>
 <?php
    if(isset($_POST['button']) || isset($_FILES['foto'])){
        $horario = mysqli_real_escape_string($mysqli, $_POST['horario']);
        
        /*
        $extensao = strtolower(substr($_FILES['foto']['name'], -4));
        $novo_nome = md5(time()) . $extensao;
        $diretorio = "uploads/.jpg";
        move_uploaded_file($_FILES['foto']['tmp_name'], $diretorio.$novo_nome);*/


        if($horario == ""){
           
        echo "<script>alert('Preencha todos os campos!');</script>";

        }

        $select = $mysqli->query("SELECT * FROM horario_medico WHERE horario='$horario'");
        if($select){
        $row = $select->num_rows;
        if($row > 0){
            
        echo "<script>alert('Ja existe esse horario cadastrado!');</script>";

        }else{

            $insert = $mysqli->query("INSERT INTO `horario_medico`(`horario`) VALUES ('$horario')");

            if($insert){
       
        echo "<script>alert('Horario Cadastrado com sucesso!');</script>";

            
                        
            
            }else{
                echo "Erro aqui 1";
            }
        }
    }else{
         echo "Erro aqui 2";
    }
}

?>

</html>