<?php
	require("configs/conexao.php");

	ini_set('smtp_port', '25');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
	<title>Recuperar Senha</title>
	<link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'/>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css"/>
	<!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">

</head>
<body style="background: darkgray">
	<?php
		if(isset($_POST['acao']) && $_POST['acao'] == 'recuperar'){
			$email = strip_tags(filter_input(INPUT_POST, 'emailRecupera', FILTER_SANITIZE_STRING));
			
			$select = $mysqli->query("SELECT email FROM utente WHERE email = '$email'
											UNION 
										SELECT email FROM medico WHERE email = '$email'");
			$row = $select->num_rows;
			if($row == 1){
				$codigo = base64_encode($email);
				$data_expirar = date('Y-m-d H:i:s', strtotime('+1 day'));
				$email_remetente = 'danielalfredovalentim@gmail.com';

				$mensagem = '<p>Recebemos uma tentativa de recuperação de email caso 
				nao tenha sido voce desconsidere este email, caso contrario clique no link
				abaixo <br  /> <a href="http://localhost/tcc/recuperar.php?codigo='.$codigo.'">Recuperar Senha</a></p>';

				$headers = "MIME-Version: 1.1\n";
				$headers .= "Content-type: text/html; charset=iso-8859-1\n";
				$headers .= "From: $email_remetente\n";
				$headers .= "Return-Path: $email_remetente\n";
				$headers .= "Reply-To: $email\n";

				$insert = $mysqli->query("INSERT INTO codigo_senha set codigo = '$codigo', data = '$data_expirar'");
			if($insert){
					if(mail("$email", "Assuton", "$mensagem", $headers, "-f$email_remetente")){
						echo 'Enviamos um e-mail com um link para a recuperação de senha';
					}
				}
			}
		}
		
	?>
	<div class="formulario" class="form bradius">
		<div class="message">

		</div>
	
		<div class="logo"></div>
		<div class="acomodar";>
			<div class="container">

			<form action="" method="POST" enctype="multipart/form-data">
				<div style=" background: #fff; width: 280px; height: 200px; border-radius: 5px; padding: 8px; box-shadow: #ccc; margin: 100px auto " class="form_campos_login" >
                    <div class="logo" style="align-items: center; justify-content: center;" >
                        <img src="paineis/assets/img/images.jpg" alt="Profile" class="rounded-circle" width="50px">
                     
                   </div> 
				<label for="email">E-mail</label>
				<div class="col-md-12 form-group mt-3 mt-md-0" style="margin: 20px auto; border: 2px solid blue; border-radius: 5px">
                          <div class="input-group has-validation">
                          <input type="email" class="form-control" id="email" placeholder="E-mail" class="txt bradius" name="emailRecupera" values="" required>
                          <div class="invalid-feedback">Por favor digite o E-mail!</div>
                         </div>
                    </div>

				<input type="hidden" name="acao" value="recuperar"/>
                <input type="submit" id="logar" class="btn btn-primary w-100" value="Recuperar senha" name="recupera"/>

              </div>
			</form>

		</div>
  </div>
	</div>
</body>