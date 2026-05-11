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
    <title>SisCons - Consultas Médicas Online</title>
   
  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style1.css" rel="stylesheet">
    <script src="hora.js"></script>

    <style>
        :root {
            --primary-blue: #1a3c5a;
            --accent-teal: #28a745;
            --light-bg: #f8f9fa;
        }

        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
        }

        .novo_cadastro{
   padding: 3px 16px;
  background: #146c43;
  margin: 7px 5px 9px 5px;
   
    border-radius: 4px;
    cursor: pointer;
    font-weight: bold;
    
    position: relative;
    z-index: 10;
    pointer-events: auto;
    text-decoration: none;
        }

    .novo_login{

    padding: 3px 16px;
  background: transparent;
  margin: 7px 5px 9px 5px;
  border: 1px solid white; 
    border-radius: 4px;
    cursor: pointer;
    font-weight: bold;
    
    position: relative;
    z-index: 10;
    pointer-events: auto;
    text-decoration: none;
        }

        .novo_login a,  .novo_cadastro a{
        color: #fff;
          text-decoration: none;
        }

        .novo_login:hover , .novo_cadastro:hover {
            transition: 0.3s;
            transform: translateY(-3px);
        }

        #topbar {
          background: #2a4e6c;
          height: 24px;
          font-size: 13.9px;
          transition: all 0.5s;
          z-index: 999;
          color: white;
}
        /* Navbar Custom */
        .navbar { 
            background-color: var(--primary-blue); 
            padding: 5px 0; 
        }
        .navbar-brand { font-weight: bold; color: white !important; font-size: 1.5rem; }
        .nav-link { color: rgba(255,255,255,0.8) !important; margin: 0 10px; }
        .btn-success, .btn-success a, .btn-outline-light a{ color: white; border: none; text-decoration: none; }
        .btn-outline-light a:hover{ color: black; padding: 0px; border: none;}

        /* Hero Section */
        .hero {
            background: linear-gradient(rgba(26, 60, 90, 0.7), rgba(30, 60, 90, 0.5)), 
                        url('img/image_1b46f30b.png'); /* Substituir pela imagem do hospital */
            background-size: cover;
            background-position: center;
            height: 405px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }
        .hero-card {
           background: rgba(255, 255, 255, 0.95);
          padding: 12px;
          border-radius: 10px;
          max-width: 760px;
          box-shadow: 0 10px 30px rgba(0,0,0,0.2);
          border: 10px solid #c6c6c669;
          margin-top: 80px;
        }
        .hero-card:hover{
            transition: 0.3s;
            transform: translateY(-3px);
        }
        .btn-hero { background-color: var(--primary-blue); color: white; padding: 10px 25px; border-radius: 5px; text-decoration: none; font-weight: bold; }

        .btn-hero a:hover { 

            transition: 0.3s;
            transform: translateY(-3px);
        }


        /* Partners Section */
        .partners { padding: 10px 0; background: white; text-align: center; }
        .partner-logos img { height: 40px; filter: grayscale(100%); opacity: 0.6; margin: 0 20px; transition: 0.3s; }
        .partner-logos img:hover { filter: grayscale(0); opacity: 1; }

        /* Footer */
        footer { background-color: var(--primary-blue); color: white; padding: 15px 0 0px; font-size: 0.9rem; }
        footer a { color: rgba(255,255,255,0.7); text-decoration: none; }
        footer h5 { font-size: 1.1rem; margin-bottom: 0px; }
        .social-icons a { font-size: 1.2rem; margin-right: 15px; }

        /* Chatbot Flutuante */
        .chat-widget {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 320px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 5px 25px rgba(0,0,0,0.2);
            overflow: hidden;
            z-index: 1000;
        }
        .chat-header { background: var(--primary-blue); color: white; padding: 12px; display: flex; justify-content: space-between; align-items: center; }
        .chat-body { padding: 15px; height: 250px; overflow-y: auto; background: #f0f2f5; }
        .msg { background: white; padding: 8px 12px; border-radius: 15px; margin-bottom: 10px; font-size: 0.85rem; max-width: 85%; }
        .msg-user { background: var(--primary-blue); color: white; margin-left: auto; text-align: right; }
        .chat-options .btn-sm { border-radius: 20px; border: 1px solid #ddd; margin: 2px; background: white; }
        .chat-footer { padding: 10px; border-top: 1px solid #eee; display: flex; 


.form{

  margin-top: 50px;
}
   .form-control, .form-select{
            width: 100%;
            padding: 12px 0;
            background: transparent;
            border: none;
            border-radius: 0px;
            border-bottom: 2px solid var(--primary-blue);
            color: #64748b;
            font-size: 16px;
            outline: none;
            transition: 0.3s;

}

        /* Efeito ao focar ou preencher */
        .form-control:focus, .form-select:focus{
            outline: none !important;
            box-shadow: none !important;
            border-color: #000;

        }

        @media (max-width: 991px) {
  .navbar ul {
    display: none;
  }
}
    </style>
</head>
<body onLoad="horaData()">

      
<!-- ======= Header ======= -->
  <header class="fixed-top">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">

             <?php 
          $sql = "SELECT * FROM Admin";
          
          $result = mysqli_query($mysqli, $sql);

            if($result && $result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $nome_sistema = $row["nome_sistema"];
                
                ?>
                   <a class="navbar-brand" href="index.php"><?php echo $nome_sistema;?></a>
                            
                          
<?php
           } else {
                echo "Nenhum usuário encontrado.";
            }

      // Fechar conexão
      $mysqli->close();
?>

            <div class="collapse navbar-collapse justify-content-center">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="index.php">Início</a></li>
                    <li class="nav-item"><a class="nav-link" href="sobre_nos.php">Sobre Nós</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Serviços</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Contacto</a></li>
                </ul>
            </div>
            <div>
                <button class="novo_cadastro"><a href="novo_cadastro.php">Cadastre-se</a></button>
                <button class="novo_login"><a href="novo_login.php">Entrar</a></button>
            </div>
        </div>
    </nav>

     <!-- ======= Top Bar ======= -->
  <div id="topbar" class=" align-items-center fixed">
  <div>
        <marquee  SCROLLAMOUNT=3>
        <?php include('marquee.php');?>
        </marquee>
    
  </div>

  </div>
     </header><!-- End Header -->

 
    <!-- Hero -->
    <section class="hero">

      
        <div class="hero-card">
            <h1 class="fw-bold">Bem-vindo ao Novo SisCons</h1>
            <p class="lead mb-3">Seu portal inteligente para consultas médicas online rápidas e seguras. Experimente a saúde do futuro.</p>
            <a href="novo_login.php" class="btn-hero">AGENDAR SUA CONSULTA AGORA</a>
        </div>
      
    </section>

    <!-- Parceiros -->
    <section class="partners">
        <div class="container">
            <p class="text-muted mb-4">Approved Partner Clinics</p>
            <div class="partner-logos d-flex justify-content-center align-items-center flex-wrap">
                <!-- Usei ícones como exemplo para os logos -->
                <span class="mx-3 fw-bold text-muted"><i class="fas fa-heartbeat me-1"></i> Imaginard</span>
                <span class="mx-3 fw-bold text-muted"><i class="fas fa-clinic-medical me-1"></i> Clinic Plus</span>
                <span class="mx-3 fw-bold text-muted"><i class="fas fa-plus-square me-1"></i> Approve</span>
            </div>
        </div>
    </section>

    <!-- Chatbot -->
    <div class="chat-widget">
        <div class="chat-header">
            <span><i class="fas fa-robot me-2"></i> Dr. Bot - Assistente SisCons</span>
            <i class="fas fa-times"></i>
        </div>
        <div class="chat-body">
            <div class="text-center text-muted small mb-2">Today</div>
            <div class="msg shadow-sm">Olá! Posso te ajudar a agendar uma consulta?</div>
            <div class="msg msg-user shadow-sm">Sim, gostaria de ver os horários.</div>
            <div class="msg shadow-sm">Para qual especialidade?</div>
            <div class="chat-options">
                <button class="btn btn-sm">Clínica Geral</button>
                <button class="btn btn-sm">Cardiologia</button>
            </div>
        </div>
        <div class="chat-footer">
            <input type="text" class="form-control form-control-sm border-0" placeholder="Escreva sua mensagem...">
            <button class="btn btn-link btn-sm text-muted"><i class="fas fa-paper-plane"></i></button>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <h5 class="fw-bold">SisCons</h5>
                    <p class="mb-1"><i class="fas fa-phone me-2"></i> +244 940 045 812</p>
                    <p><i class="fas fa-envelope me-2"></i> danielalfredovalentin@gmail.com</p>
                    <div class="social-icons">
                        <a href="#"><i class="bi bi-facebook"></i></a>
                        <a href="#"><i class="bi bi-twitter"></i></a>
                        <a href="#"><i class="bi bi-instagram"></i></a>
                        <a href="#"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <h5>Links Rápidos</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Início</a></li>
                        <li><a href="#">Serviços</a></li>
                        <li><a href="#">Contacto</a></li>
                    </ul>
                </div>
                <div class="col-md-4 mb-4">
                    <h5>Informações Legais</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Termos e Condições</a></li>
                       
                    </ul>
                </div>
            </div>
            <hr class="bg-light">
            <div class="d-flex justify-content-between small text-white-50">
                 <div class="estado-dados" style="display: flex; color: #fff; height: 20px;"><!--div para apresentar a data e hora -->
                  <p id="data" style="margin-left: 20px"></p><p id="hora" style="margin-left: 20px"></p>
                </div><!-- fim div para apresentar a data e hora -->
               
                <p>&copy; Copyright <span><?php date('d-m-Y')?></span> Uan DEI</p>
            </div>
        </div>
    </footer>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>
</html>

