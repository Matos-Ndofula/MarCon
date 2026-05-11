<?php
require("../configs/conexao.php");

	if (count($_POST) > 0) {
		
		$id = $_POST["id"];


$select = $mysqli->query("SELECT * FROM consultas_agendadas WHERE id='$id' AND estado ='Atendido'");
        if($select){
        $row = $select->num_rows;
        if($row > 0){
            
        echo "<script>alert('Utente já foi Atendido');</script>";

        echo '<script>window.location="novo_painel_medico.php"</script>';

        }else{
		$pesq = "UPDATE consultas_agendadas set id='".$id."', estado='Atendido', color='#008000', horario='Livre' WHERE id='".$id."'";

		if (mysqli_query($mysqli, $pesq)) {
		echo "<script>
			  alert('Consulta Atendida!');
			</script>";

			echo '<script>window.location="novo_painel_medico.php"</script>';
					}else{
						echo "<script>
			  alert('Erro ao atender consulta!');
			</script>";
					}


	}

	}else{

	}
	}


?>