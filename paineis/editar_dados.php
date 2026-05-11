<?php
require("../configs/conexao.php");

	if (count($_POST) > 0) {
		
		$id = $_POST["id"];

		$nome_utente = $_POST["nome_utente"];
		$email = $_POST["email"];
		$BI = $_POST["BI"];
		$telefone = $_POST["telefone"];
		$endereco = $_POST["endereco"];


		 $select = $mysqli->query("SELECT * FROM utente WHERE nome_utente='$nome_utente' AND email='$email' AND BI='$BI' AND telefone='$telefone' AND endereco='$endereco'");
        if($select){
        $row = $select->num_rows;
        if($row > 0){
            echo "<script>
 					 alert('Não Alteraste Nada!');
				  </script>";
				echo '<script>window.location="novo_painel_utente_boas_vindas.php"</script>';
        }else{

        	$pesq = "UPDATE utente set id='".$id."', nome_utente='".$nome_utente."', email='".$email."', BI='".$BI."', telefone='".$telefone."', endereco='".$endereco."' WHERE id='".$id."'";

        	if (mysqli_query($mysqli, $pesq)) {
				echo "<script>
 			 	   		alert('Editado com sucesso');
					 </script>";

				echo '<script>window.location="novo_painel_utente_boas_vindas.php"</script>';
		}else{
				echo "<script>
  						alert('Erro ao Editar!');
					  </script>";
		}
		}


	}
}



?>
