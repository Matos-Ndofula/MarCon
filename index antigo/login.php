<?php
  require("configs/conexao.php");
  session_start();
?>
<!DOCTYPE html >
<html >
<head>
   <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>SisCOns - Login</title>

  <!-- Favicons -->
  <link href="assets/img/imagem_logo_acima.png" rel="icon">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

    <script src="paineis/jquery-3.5.1.js"></script>
    <script src="paineis/js_css/sweetalert.min.js"></script>
    <link rel="stylesheet" href="paineis/js_css/jquery-ui.min.css"/>
    <link rel="stylesheet" href="paineis/js_css/sweetalert.min.css">
   
  
</head>
<body style="background: darkgray">
 
    <div class="container">
       <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
 
                <div class="card" style="border: none; border-radius: 0px; border-top: 6px solid #0d6efd">
                  <div class="card-body">
                    <div  >

                              
                              <h1 style="margin-left: 45%; width: 100px; height: 40px; color: #0d6efd; margin-top: 20px " class="bi bi-person-circle"></h1>
                         
                    
                 <form action="?acao=logar"method="POST">
                   <h5 id="efeito_botao" style="color: #000;padding: 2px;">
                    <div style="justify-items: center; align-items: center; margin-left: 200px margin: 20px auto;">
                    <p style=" margin-left: 50px"> Para marcar uma consulta </p>
                    <p style=" margin-left: 20px"> deve cadastrar-se e fazer o login </p></h5>
                    </div>

                    <label for="email" style="color: #000;" >E-mail</label>

                      <div class="col-md-12 form-group mt-3 mt-md-0" style="margin: 10px auto; border: 2px solid #639bf1;">
                          <div class="input-group has-validation">
                          <input type="email" class="form-control" id="email" placeholder="Digite teu E-mail" class="txt bradius" name="email" values="" required>
                          <div class="invalid-feedback">Por favor digite o E-mail!</div>
                         </div>
                    </div>

                    <label for="senha" style="color: #000;" >Senha</label>
                    <div class="col-md-12 form-group mt-3 mt-md-0" style="margin: 10px auto; border: 2px solid #639bf1;">
                          <div class="input-group has-validation">
                          <input class="form-control" placeholder="Digite a tua Senha" id="senha" type="password" class="txt bradius" name="senha" values="" required>

                          <div class="invalid-feedback">Por favor digite o Senha!</div>
                         </div>
                    </div>

                     <input type="submit" id="logar" value="Entrar" name="button" class="btn btn-primary" style="width: 100%; border-radius: 2px; height: 40px" class="col-xs-3 col-sm-4 col-md-6 col-lg-12 " />
                     <br>
                     <div class="d-flex mt-2">
                  <!--  <a href="index.php" id="cancelar" class="btn btn" value=""   class="col-xs-3 col-sm-4 col-md-6 col-lg-12 ">Cancelar</a>-->

                    <a href="cadastrar.php" type="button" value="" name="" style="color: #0d6efd; float: right;" class="col-xs-2 col-md-0 col-lg-4 "><u>Cadastrar Já!</u></a>
                      
                    
                    <a href="recuperasenha.php" style="color: #000; float: right;" class="col-xs-3 col-sm-6 col-md-6 col-lg-10 "><u>Esqueceu a sua Palavra Passe?</u></a>
                          </div>    
                  </form>
               
           </div>  
           </div>  
           </div>  
    </section>
</div>
	<span hidden="" id="row"><?php  $row = $select->num_rows; ?></span>
  <script src="js/jquery.js"></script>
<script type="text/javascript" src="jquery-3.5.1.js"></script>

 <script type="text/javascript">
 /* 
                          <input type="button" id="showPassword" value="Mostrar" class="button" />
 $(document).ready(function(){
  $('#showPas
    var passwordFielsword').on('click', function(){
    d = $('#senha');
    var passwordFieldType = passwordField.attr('type');
    if(passwordFieldType == 'password')
    {
        passwordField.attr('type', 'text');
        $(this).val('Ocultar');
    } else {
        passwordField.attr('type', 'password');
        $(this).val('Mostrar');
    }
  });
});*/
</script>
</body>
</html>

<?php
  if(isset($_POST["button"])){
    $email = mysqli_real_escape_string($mysqli, $_POST["email"]);
    $senha = mysqli_real_escape_string($mysqli, md5($_POST["senha"]));

    if($email == "" || $senha == ""){
      echo "
         <div class='alert alert-success bg-success text-light border-0 alert-dismissible fade show' role='alert' > ". $nome." Logado Com Sucesso!
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
              </div>
      ";
      return true;
    }

   //$select = $mysqli->query("SELECT * FROM usuarios_n WHERE email='$email' AND senha='$senha'");
    $select = $mysqli->query("SELECT id, nome_utente, email, nivel, senha, status FROM utente WHERE email='$email' AND senha='$senha'");

    $row = $select->num_rows;
    
     $get = $select->fetch_array();

    ?>
    
    
  
    <span hidden=""><?php $id =$get['id'];?></span>
    <span hidden=""><?php $_SESSION['id'] = $id;?></span>
    <span hidden=""><?php $nome =$get['nome_utente'];?></span>
    <span hidden=""><?php $perm = $get['nivel'];?></span>
    <span hidden=""><?php $status = $get['status'];?></span>

    

    
    
<?php
    if($row > 0){
      if($perm == 1 AND $status == 1){
        //psession_start();
        $_SESSION["nivel"] = 1;
        echo '<script src="Mensagens sweetAlerts Login/mensagem_sweetAlert.js"></script>';
        sleep(3);
        echo '<script>window.location="paineis/painel_cadastro_utente_boas_vindas.php"</script>';
     /* 
       
       header('Location: paineis/painel_cadastro_utente_boas_vindas.php');
      */
    }else{
      echo "  <div class='aviso yellow'>
          Sua conta foi bloqueada!!
                </div>";
    }

    }else{
      echo '<script src="Mensagens sweetAlerts Login/mensagem_sweetAlert_erro.js"></script>
      ';

  //echo '<script>window.location="login.php"</script>';
    }
  }elseif(isset($_POST['recupera'])){
    header("Location: recuperasenha.php");
  }
?>
