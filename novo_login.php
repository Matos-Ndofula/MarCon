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
<!-- Adicione isto ao seu <head> para os ícones -->

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
<body>

<style>

    body{
        background: #e8e5e5;
    }
    /* Estilo do Painel de Login */
    .login-container {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 0vh;
    }

    .login-card {
        width: 100%;
        max-width: 320px;
        min-height: 500pz;
        margin-top: 100px;
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(10px); /* Efeito de vidro */
        border-radius: 5px;
        border: 2px solid rgba(255, 255, 255, 0.5);
        /*box-shadow: 20px 20px 40px rgba(0, 0, 0, 0.15);*/
         box-shadow: 0 4px 6px rgba(0,0,0,0.2);
        padding: 10px;
        font-family: 'Segoe UI', sans-serif;
    }

    .login-header {
        display: flex;
        align-items: center;
        color: #1a3c5a;
        border-bottom: 2px solid #1a3c5a;
        padding-bottom: 5px;
        margin-bottom: 10px;

        
    }

    .login-header i {
        font-size: 1.8rem;
        margin-right: 15px;
    }

    .login-header h2 {
        font-size: 1.4rem;
        font-weight: 700;
        margin: 0;
        letter-spacing: 1px;
        font-family: 'Time', sans-serif;
    }

    .form-group {
        margin-bottom: 5px;
    }

    .form-label {
        display: block;
        font-weight: 600;
        color: #444;
        margin-bottom: 8px;
        font-size: 0.9rem;
    }

    .input-wrapper {
        position: relative;
    }

    .input-wrapper i {
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: #888;
    }

    .form-control-custom {
        width: 100%;
        padding: 5px 15px 8px 45px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: white;
        font-size: 0.95rem;
        transition: 0.3s;
    }

    .form-control-custom:focus {
        outline: none;
        border-color: #1a3c5a;
        box-shadow: 0 0 0 3px rgba(26, 60, 90, 0.1);
    }

    .forgot-password {
        text-align: right;
        display: block;
        font-size: 0.8rem;
        color: #1a3c5a;
        text-decoration: none;
        margin-top: 8px;
    }

    .btn-login-submit {
        width: 100%;
        background-color: #1a3c5a;
        color: white;
        border: none;
        padding: 7px;
        border-radius: 3px;
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-top: 5px;
        cursor: pointer;
        transition: background 0.3s;
    }

    .btn-login-submit:hover {
        background-color: #0d253a;
    }

    .login-footer-links {
        display: flex;
        justify-content: space-between;
        margin-top: 10px;
        font-size: 0.85rem;
    }

    .login-footer-links a {
        color: #666;
        text-decoration: none;
    }

    .login-footer-links a:hover {
        color: #1a3c5a;
        text-decoration: underline;
    }
</style>

<div class="login-container">
    <div class="login-card">
        <div class="login-header">
            <i class="bi bi-person"></i>

            <h2>Login de Utente</h2>
        </div>

        <form action="?acao=logar"method="POST">

            <div class="form-group">
                <label class="form-label">E-mail</label>
                <div class="input-wrapper">
                   <div class="input-group has-validation">
                          <i class="bi bi-person"></i>
                          <input type="email" class="form-control-custom" placeholder="Introduza o seu e-mail" id="email" name="email" values="" required>
                          <div class="invalid-feedback">Por favor digite o E-mail!</div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">Palavra-Passe</label>

                <div class="input-wrapper">
                    <div class="input-group has-validation">
                        <i class="bi bi-key"></i>
                        <input type="password" class="form-control-custom" id="senha" type="password" name="senha" values="" required placeholder="••••••••">
                    
                          <div class="invalid-feedback">Por favor digite o Senha!</div>

                    </div>
                        
                 </div>
                <a href="recuperasenha.php" class="forgot-password">Esqueceu a senha?</a>
            </div>

            <button type="submit" class="btn-login-submit" id="logar" value="Entrar" name="button">Entrar</button>

            <div class="login-footer-links">
                <a href="#"></a>
                <a href="novo_cadastro.php">Criar Nova Conta</a>
            </div>
        </form>
    </div>
</div>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <span hidden="" id="row"><?php  $row = $select->num_rows; ?></span>
  <script src="js/jquery.js"></script>
<script type="text/javascript" src="jquery-3.5.1.js"></script>

 <script type="text/javascript">

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

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
        echo '<script>window.location="paineis/novo_painel_utente_boas_vindas.php"</script>';
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

  //echo '<script>//window.location="login.php"</script>';
    }
  }elseif(isset($_POST['recupera'])){
    header("Location: recuperasenha.php");
  }
?>

