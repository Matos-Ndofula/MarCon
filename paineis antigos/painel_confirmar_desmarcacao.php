<?php
require("../configs/conexao.php");
require("config_encript_decrypt_url.php");

include ("Mensagens sweetAlerts/links_mensagens_sweetAlerts.php");

session_start();
require("../configs/protecao.php");
protegerUser();

if(isset($_GET["action"]) AND $_GET["action"] == "sair"){
    session_destroy();
    header("Location: ../usuario_normal_modal.php");
  }

  $nome_utente = null;
    if(isset($_GET['sucesso'])){
        $nome_utente = $_GET['sucesso']; 
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

    <div class="d-flex align-items-center justify-content-between">
      <a href="painel_cadastro_utente_boas_vindas.php" class="logo d-flex align-items-center">
        <img src="assets/img/" alt="">
        <span class="d-none d-lg-block">SisCOnsult</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    
    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <span class="badge bg-primary badge-number"><?php// echo $row; ?></span>
          </a>



        </li><!-- End Notification Nav -->

        
          
<?php
    $id = $_SESSION["id"];
    $select = $mysqli->query("SELECT * FROM utente WHERE id='$id'");
    $row = $select->num_rows;
        $get = $select->fetch_array();

        $nome_utente = $get['nome_utente'];
        $_SESSION['nome_utente'] = $nome_utente;

    
    
  ?>
 
        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                <i class="bi bi-person"></i>
            
            <!--<img src="assets/img/images.jpg" alt="Profile" class="rounded-circle">-->
            <span class="d-none d-md-block dropdown-toggle ps-2" id="dado"><?php echo $nome_utente; ?></span>
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
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Consultas</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li> 
            <a href="painel_utente_marcar_consulta.php">
              <i class="bi bi-circle"></i><span>Marcar consultas</span>
            </a>
          </li>
          <li>
            <a href="painel_utente_desmarcar_consulta.php">
              <i class="bi bi-circle"></i><span>Desmarcar consultas</span>
            </a>
          </li>
          
        </ul>
      </li><!-- End Forms Nav -->

      

      <li class="nav-item">
        <a class="nav-link collapsed" href="calendario_utente_consultas.php">
          <i class="bi bi-calendar-date-fill"></i>
          <span>Calendário</span>
        </a>
      </li><!-- End Profile Page Nav -->
    

      <li class="nav-item">
        <a class="nav-link collapsed" href="#">
          <i class="bi bi-person"></i>
          <span>Ver Perfil</span>
        </a>
      </li><!-- End Profile Page Nav -->

          

      
    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">


    <section class="section dashboard">
       <div class="card">
            <div class="card-body">
                       
             <div class="boas_vindas" style="padding: 10px; background: darkgray;
  width: 100%;height: 20%; color: #000;  margin-top: 20px">
               <h3>Confiramação dos Dados da Consulta a Desmarcar</h3>
             </div>
          <div class="card_corpo" style="display: inline-flex; margin-top: 20px;">
            
            <div class="botao_boas_vindas">
              <a class="btn btn-primary" href="painel_utente_desmarcar_consulta.php">Voltar</a>
              <br>
              <br>
<?php


   if(isset($_GET['id']) && !empty($_GET['id'])){
       $id_editar = $_GET['id'];
       $id = encryptor('decrypt', $id_editar);

       if (!empty($id)) {
        $pesq = "SELECT * FROM consultas_agendadas WHERE id='$id'";
  $resultado_pesquisa = mysqli_query($mysqli, $pesq);
  $rows_pesquisar = mysqli_fetch_assoc($resultado_pesquisa);
       }
    }

    ?>
      <form action="atualiza_estado_desmarcado.php" method="POST">

    <div class="row">
      <input hidden="" type="" name="id" value="<?php echo $id; ?>">
          <div class="col-md-4 form-group mt-3 mt-md-0">
            <label>Médico</label>

                <div class="input-group has-validation">

                <input disabled type="text" name="nome_utente" class="form-control" value="<?php echo $rows_pesquisar['nome_medico']; ?>" required>     

               <div class="invalid-feedback">Por favor Selecione o nome utente!</div>
            </div>
          </div>
   
   <div class="col-md-4 form-group mt-3 mt-md-0">
            <label>Especialidade</label>

                <div class="input-group has-validation">

                <input disabled type="text" name="especialidade" class="form-control" value="<?php echo $rows_pesquisar['especialidade']; ?>" required>     

               <div class="invalid-feedback">Por favor Selecione o nome utente!</div>
            </div>
          </div>

   <div class="col-md-4 form-group mt-3 mt-md-0">
            <label>Data Consulta</label>

                <div class="input-group has-validation">

                <input disabled type="text" name="data_horario" class="form-control" value="<?php echo $rows_pesquisar['data_horario']; ?>" required>     

               <div class="invalid-feedback">Por favor Selecione o nome utente!</div>
            </div>
          </div>
        
        <div class="row">
   <div class="col-md-3 form-group mt-3">
            <label>Horário Médico</label>
                <div class="input-group has-validation">

                <input disabled type="text" name="horario" class="form-control" value="<?php echo $rows_pesquisar['horario']; ?>" required>     

               <div class="invalid-feedback">Por favor Selecione o nome utente!</div>
            </div>
          </div>
      
            <div class='container'>
               <button id="button" type="submit"  class="btn btn-danger w-25" style="border-radius: 0px; float: right;" >Desmarcar</button> 
          </div>
        </div>
        
          </div>
    </form>

        </div>
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