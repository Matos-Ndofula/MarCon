<?php
	// Conexão cim a BD
    $user = "root";
	$serv = "localhost";
	$pass = "";
	$data = "boot";

	$mysqli = new mysqli($serv, $user, $pass, $data);
	if($mysqli-> connect_error){
		echo "Erro de conexao com o banco de dados";
		exit();
	}else{
	}

?>