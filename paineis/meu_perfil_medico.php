<?php
require("../configs/conexao.php");
require("config_encript_decrypt_url.php");

include("cadastro_agendamento_medico.php");
include("cadastro_medico.php");
session_start();
require("../configs/protecao.php");
protegerFuncionario();

if(isset($_GET["action"]) AND $_GET["action"] == "sair"){
    session_destroy();
    header("Location: ../login.php");
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Painel Funcionário</title>
  <meta content="" name="description">
  <meta content="" name="keywords">


  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

      <script src='fullcalendar-6.1.11/dist/index.global.min.js'></script>
      <script src='locales/pt.global.js'></script>

      <script src="js_css/jquery-3.5.1.js"></script>
    <script src="js_css/sweetalert.min.js"></script>
    <link rel="stylesheet" href="js_css/jquery-ui.min.css"/>
    <link rel="stylesheet" href="js_css/sweetalert.min.css">
   

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
<?php
    $id = $_SESSION["id"];
    $select = $mysqli->query("SELECT * FROM Admin WHERE id='$id'");
    $row = $select->num_rows;
        $get = $select->fetch_array();

        $nome = $get['nome'];
        $_SESSION['nome'] = $nome;

        $nome_sistema = $get['nome_sistema'];
        $_SESSION['nome_sistema'] = $nome_sistema;

  ?>
    <div class="d-flex align-items-center justify-content-between">
      <a href="painel_cadastro_utente_boas_vindas.php" class="logo d-flex align-items-center">
        <img src="assets/img/" alt="">
        <span class="d-none d-lg-block"><?php echo $nome_sistema; ?></span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    
    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

           
        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
           <h5 style="margin-top: 10px" class="bi bi-person-circle"></h5>
        
            
            <!--<img src="assets/img/images.jpg" alt="Profile" class="rounded-circle">-->
            <span class="d-none d-md-block dropdown-toggle ps-2" id="dado"><?php echo $nome; ?></span>
          </a><!-- End Profile Iamge Icon -->


          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="?action=sair">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sair</span>
              </a>

            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->


  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

     <li class="nav-item">
        <a class="nav-link " href="painel_cadastro_funcionario_Home.php">
          <i class="bi bi-grid"></i>
          <span>Home</span>
        </a>
      </li><!-- End Home Nav -->


      
    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">


    <section class="section dashboard">
       <div class="card">
            <div class="card-body"> 
             
              <div class="boas_vindas" style="padding: 10px; background: darkgray;
  width: 100%;height: 20%; color: #000; margin-top: 20px">
               <h2>Editar Dados Médico</h2>
             </div>
          <div class="card_corpo" style="display: inline-flex; margin-top: 20px;">

           <div class="botao_boas_vindas">
              <a class="btn btn-primary" href="painel_cadastro_medico.php">Voltar</a>
              <br>
              <br>
<?php

 if(isset($_GET['id']) && !empty($_GET['id'])){
       $id = $_GET['id'];
       $id = encryptor('decrypt', $id);

       if (!empty($id)) {
$pesq = "SELECT * FROM medico WHERE id='$id'";
  $resultado_pesquisa = mysqli_query($mysqli, $pesq);
  $rows_pesquisar = mysqli_fetch_assoc($resultado_pesquisa);

       }
    }
    ?>
      <form action="editar_dados_medico.php" method="POST">

    <div class="row">
   
      <input hidden="" type="" name="id" value="<?php echo $id; ?>">
        <div class="col-md-6 form-group mt-3 mt-md-0">
                <div class="input-group has-validation">

                <input disabled type="text" name="nome_utente" class="form-control" value="<?php echo $rows_pesquisar['nome']; ?>" required>     

               <div class="invalid-feedback">Por favor Selecione o nome utente!</div>
            </div>
          </div>
   
   <div class="col-md-6 form-group mt-3 mt-md-0">
                <div class="input-group has-validation">

                <input type="text" name="email" class="form-control" value="<?php echo $rows_pesquisar['email']; ?>" required>     

               <div class="invalid-feedback">Por favor Selecione o nome utente!</div>
            </div>
          </div>
        
<div class="col-md-6 form-group mt-3">
                <div class="input-group has-validation">

                <input type="text" name="telefone" class="form-control" value="<?php echo $rows_pesquisar['telefone']; ?>" required>     

               <div class="invalid-feedback">Por favor Selecione o nome utente!</div>
            </div>
          </div>

   <div class="col-md-6 form-group mt-3">
                <div class="input-group has-validation">

                <input type="text" name="localidade" class="form-control" value="<?php echo $rows_pesquisar['localidade']; ?>" required>     

               <div class="invalid-feedback">Por favor Selecione o nome utente!</div>
            </div>
          </div>
      
            <div class='col-md-12 form-group mt-3'>
               <button id="button" type="submit"  class="btn btn-success w-25" style="border-radius: 0px; float: right;" >Editar</button> 
          </div>
        </div>
        
          
    </form>
</div>
        </div>
        </div>
        </div>
    

    </section>

  </main>
  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>d</span></strong>. All Rights Reserved
    </div>
    <div class="credits">Designed by <a href="https://.com/">Made</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>  
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>
</html>