<?php
require("configs/conexao.php");
  
// Oculta todos os erros na tela
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(0);

  
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>SisCOns - Página Principal</title>
  
  <!-- Vendor CSS Files -->
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
	<script src="hora.js"></script>

</head>
<body onLoad="horaData()">
  <!-- ======= Top Bar ======= -->
  <div id="topbar" class=" align-items-center fixed-top">
	<div class="estado-dados" style="display: flex; background: #707070; color: #fff; height: 20px;"><!--div para apresentar a data e hora -->
      <p id="data" style="margin-left: 20px"></p><p id="hora" style="margin-left: 20px"></p>
    </div><!-- fim div para apresentar a data e hora -->
	
  <div>
  		<marquee  SCROLLAMOUNT=3>
        <?php include('marquee.php');?>
		</marquee>
    
  </div>

  </div>
  
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

  <?php 
          $sql = "SELECT * FROM Admin";
          
          $result = mysqli_query($mysqli, $sql);

            if($result && $result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $nome_sistema = $row["nome_sistema"];
                
                ?>
                   <h1 class="logo me-auto"><a href="index.php"><?php echo $nome_sistema;?></a></h1>
                            
                          
<?php
           } else {
                echo "Nenhum usuário encontrado.";
            }

      // Fechar conexão
      $mysqli->close();
?>
      
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="index.php">Home</a></li>
          <li><a class="nav-link scrollto" href="sobre_nos.php">Sobre Nós</a></li>
        
      <!-- .navbar -->

      <div>
        <a href="cadastrar.php" id="efeito_botao" class="appointment-btn scrollto">Cadastre-se</a>     
         <a href="login.php"  class="appointment-btn scrollto">Login</a>
           </div> 
      
      </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero1" class="d-flex align-items-center">
    <div id="slider">

      <?php include('imagens_slides_fundo.php');?>

    <div class="container" class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
      <h1 id="efeito_botao">Bem-vindo ao <span>SisCOns</span> <br><h5>Um Sistema de serviços de consultas médicas online, de marcação e realização de consultas online</h5></h1>


      <div class="efeito">
        <br>
      <a href="paineis/bot.php"  class="btn-get-started scrollto" >Consultar Agora!</a>
      <a href="login_pag_marc_consulta.php"  class="btn-get-started scrollto" >Pré-Consulta --> Agendamento</a>
      </div>


    </div>
  </div>   

  </section><!-- End Hero -->

  <!-- ======= Footer ======= -->
  <footer id="footer" >

     <div class="container d-md-flex py-4">
      <div class="col-lg-3 col-md-3 footer-contact">
            <h3>SisCOns</h3>
              <i class="bi bi-phone"></i> +244 940 045 812<br>
              <i class="bi bi-envelope"></i> <a href="danielalfredovalentim@gmail.com">danielalfredovalentim@gmail.com</a><br>
     
          </div>
   
      <div class="me-md-auto text-center text-md-start" class="align-items-center justify-content-center" style="margin-top: 40px">
        <div class="copyright">
          &copy; Copyright <strong><span>SisCOns</span></strong>
        <div class="">
          <span>Declaração de Privacidade |</span>
          <span>Termos e condições |</span>
          <span>© 2024 Uan DEI. Todos os direitos reservados</span>
        </div> 
        </div>
      
      </div>
      <div>
          <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
          <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
          <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
          <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
      </div>      
    </div>
  </footer><!-- End Footer -->
  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/assets/vendor/php-email-form/validate.js"></script>


  <!-- Vendor JS Files -->
  <script src="../paineis/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../paineis/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../paineis/assets/vendor/chart.js/chart.umd.js"></script>
  <script src="../paineis/assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../paineis/assets/vendor/php-email-form/validate.js"></script>


  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="assets/js/troca_imagem.js"></script>
</body>

</html>
