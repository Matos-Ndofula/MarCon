<?php
require("../configs/conexao.php");



if (isset($_POST['button_editar'])) {
		
		$id = $_POST["id"];
		$nome = $_POST["nome"];
		$email = $_POST["email"];
		$telefone = $_POST["telefone"];
		$localidade = $_POST["localidade"];

		 $select = $mysqli->query("SELECT * FROM medico WHERE nome='$nome' AND email='$email' AND telefone='$telefone' AND localidade='$localidade'");
        if($select){
        $row = $select->num_rows;
        if($row > 0){
            echo "<script>
 					 alert('Não Alteraste Nada!');
				  </script>";
				echo '<script>window.location="novo_painel_cadastro_medico.php"</script>';
        }else{

		$pesq = "UPDATE medico set id='".$id."',  nome='".$nome."', email='".$email."', telefone='".$telefone."', localidade='".$localidade."' WHERE id='".$id."'";

		if (mysqli_query($mysqli, $pesq)) {
		echo "<script>
			  alert('Editado com sucesso');
			</script>";

			echo '<script>window.location="novo_painel_cadastro_medico.php"</script>';
					}else{
						echo "<script>
			  alert('Erro ao Editar!');
			</script>";
		}


	}
  }

}
?>