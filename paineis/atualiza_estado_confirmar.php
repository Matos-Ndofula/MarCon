<?php
require("../configs/conexao.php");

	if (count($_POST) > 0) {
		
		$id = $_POST["id"];


$select = $mysqli->query("SELECT * FROM consultas_agendadas WHERE id='$id' AND estado ='Confirmada'");
        if($select){
        $row = $select->num_rows;
        if($row > 0){
            
        echo "<script>alert('Esta consulta já está Confirmada !');</script>";

        echo '<script>window.location="novo_painel_medico.php"</script>';

        }else{
		$pesq = "UPDATE consultas_agendadas set id='".$id."', estado='Confirmada', color='#0000ff' WHERE id='".$id."'";

		if (mysqli_query($mysqli, $pesq)) {
		echo "<script>
		  alert('Consulta Confirmada!');
		</script>";

		echo '<script>window.location="novo_painel_medico.php"</script>';
				}else{
		echo "<script>
		  alert('Erro ao confirmar consulta!');
		</script>";
		}


	}

	}else{

	}
	}


?>