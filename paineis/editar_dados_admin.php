<?php
require("../configs/conexao.php");

	if (count($_POST) > 0) {
		
		$id = $_POST["id"];

		$email = $_POST["email"];
		$BI = $_POST["BI"];
		$telefone = $_POST["telefone"];
		$endereco = $_POST["endereco"];
		$nome_sistema = $_POST["nome_sistema"];


		 $select = $mysqli->query("SELECT * FROM Admin WHERE email='$email' AND BI='$BI' AND telefone='$telefone' AND endereco='$endereco' AND nome_sistema='$nome_sistema'");
        if($select){
        $row = $select->num_rows;
        if($row > 0){
            echo "<script>
 					 alert('Não Alteraste Nada!');
				  </script>";
				echo '<script>window.location="novo_painel_admin.php"</script>';
        }else{

		
		$pesq = "UPDATE Admin set id='".$id."', email='".$email."', BI='".$BI."', telefone='".$telefone."', endereco='".$endereco."', nome_sistema='".$nome_sistema."' WHERE id='".$id."'";

		if (mysqli_query($mysqli, $pesq)) {
		echo "<script>
	  		alert('Editado com sucesso');
		</script>";

		echo '<script>window.location="novo_painel_admin.php"</script>';
		
		}else{
			echo "<script>
  alert('Erro ao Editar!');
</script>";
		}
}


	}

	}


?>