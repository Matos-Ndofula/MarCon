<?php
require("../configs/conexao.php");
require("config_encript_decrypt_url.php");

session_start();
require("../configs/protecao.php");
protegerUser();

if(isset($_GET["action"]) AND $_GET["action"] == "sair"){
    session_destroy();
    header("Location: ../");
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
        
         <?php 
          $sql = "SELECT * FROM Admin";
          
          $result = mysqli_query($mysqli2, $sql);

            if($result && $result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $nome_sistema = $row["nome_sistema"];
                
                ?>

                   <span class="d-none d-lg-block"><?php echo $nome_sistema;?></span>
                          
<?php
           } else {
                echo "Nenhum usuário encontrado.";
            }

      // Fechar conexão
      $mysqli2->close();
?>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    
    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

          
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
           <h5 style="margin-top: 10px" class="bi bi-person-circle"></h5>
        
            
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
    
      
    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">


    <section class="section dashboard">
      <div class="card">
            <div class="card-body">     

             <div class="boas_vindas" style="padding: 10px; background: darkgray;
  width: 100%;height: 20%; color: #000; margin-top: 20px">
               <h2>Editar Dados</h2>
             </div>
              
              <br>
<?php
 if(isset($_GET['id']) && !empty($_GET['id'])){
       $id = $_GET['id'];
       $id = encryptor('decrypt', $id);

       if (!empty($id)) {
$pesq = "SELECT * FROM utente WHERE id='$id'";
  $resultado_pesquisa = mysqli_query($mysqli, $pesq);
  $rows_pesquisar = mysqli_fetch_assoc($resultado_pesquisa);

       }
    }

    ?>
      <form action="editar_dados.php" method="POST">

    <div class="row">
   
      <input hidden="" type="" name="id" value="<?php echo $id; ?>">
          <div class="col-md-6 form-group mt-3 mt-md-0">
                    <h5>Nome</h5>
                <div class="input-group has-validation">

                <input type="text" name="nome_utente" class="form-control" value="<?php echo $rows_pesquisar['nome_utente']; ?>" required>     

               <div class="invalid-feedback">Por favor Selecione o nome utente!</div>
            </div>
          </div>
   
   <div class="col-md-6 form-group mt-3 mt-md-0">
                    <h5>Email</h5>
                <div class="input-group has-validation">

                <input type="text" name="email" class="form-control" value="<?php echo $rows_pesquisar['email']; ?>" required>     

               <div class="invalid-feedback">Por favor Selecione o nome utente!</div>
            </div>
          </div>
     </div>

     <div class="row">
  
     <div class="col-md-6 form-group mt-3">
                    <h5>BI</h5>
                <div class="input-group has-validation">

                <input type="text" name="BI" class="form-control" value="<?php echo $rows_pesquisar['BI']; ?>" required>     

               <div class="invalid-feedback">Por favor Selecione o nome utente!</div>
            </div>
          </div>

    <div class="col-md-6 form-group mt-3 ">
                    <h5>Telefone</h5>
                <div class="input-group has-validation">
                  
                <script src="mascara.min.js"></script>

                <input type="text" class="form-control" name="telefone" data-msg="Por favor digite o seu telefone"  value="<?php echo $rows_pesquisar['telefone']; ?>" required id="telefone" id="telefone" placeholder="9##-###-###" onkeyup="mascara('###-###-###',this,event,true);" maxlength="14">
                              
               <div class="invalid-feedback">Por favor Selecione o nome utente!</div>
            </div>
          </div>
</div>   
<div class="row">  
     <div class="col-md-6 form-group mt-3">
                    <h5>Endereço</h5>
                <div class="input-group has-validation">

                <input type="text" name="endereco" class="form-control" value="<?php echo $rows_pesquisar['endereco']; ?>" required>     

               <div class="invalid-feedback">Por favor Selecione o nome utente!</div>
            </div>
          </div>
      </div>

      <div class="row">  
          <div class="col-md-12 form-group mt-3">
               <button id="button" type="submit"  class="btn btn-primary w-10" style="width: 150px; margin-left: 50px; height: 35px; border-radius: 0px; float: right;" >Editar</button> 
              <a class="btn btn-danger" style="width: 150px; height: 35px; border-radius: 0px; float: right;" href="painel_cadastro_utente_boas_vindas.php">Cancelar</a>
          
              </div>
        </div>
  
        </div>
        
          
    </form>
</div>
        </div>
    

    </section>

  </main>
  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
   
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