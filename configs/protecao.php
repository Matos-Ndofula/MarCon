
<?php
//bloqueia usuario nivel 1 acessar a url de admin
	// Oculta todos os erros na tela
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(0);

	function protegerUser(){
		if($_SESSION["nivel"] != 1){
			echo "<script>location.href='../'</script>";
				
		}
	}

	function protegerMedico(){
		if($_SESSION["nivel"] != 2){
			echo "<script>location.href='../novo_login_medico.php'</script>";
		
		}
				
	}

	function protegerFuncionario(){
		if($_SESSION["nivel"] != 3){
			echo "<script>location.href='../novo_login_admin.php'</script>";
		}
	}
?>