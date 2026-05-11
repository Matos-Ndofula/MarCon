<?php
require("../configs/conexao.php");
require("config_encript_decrypt_url.php");

include ("Mensagens sweetAlerts/links_mensagens_sweetAlerts.php");
include("cadastro_agendamento_medico.php");
include("cadastro_medico.php");
session_start();
require("../configs/protecao.php");
protegerFuncionario();

if(isset($_GET["action"]) AND $_GET["action"] == "sair"){
    session_destroy();
    header("Location: ../novo_login_admin.php");
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard Admin Cadastro Médico</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style1.css" rel="stylesheet">
<script src='fullcalendar-6.1.11/dist/index.global.min.js'></script>
      <script src='locales/pt.global.js'></script>

    <script src="js_css/jquery-3.5.1.js"></script>
    <script src="java/js/jquery-ui-1.12.1/jquery-ui.js"></script>
    <link href="java/js/jquery-ui-1.12.1/jquery-ui.css" rel="stylesheet">

    <script src="js_css/sweetalert.min.js"></script>
    <link rel="stylesheet" href="js_css/jquery-ui.min.css"/>
    <link rel="stylesheet" href="js_css/sweetalert.min.css">


   <style>
        :root {
            --sidebar-bg: #ffffff;
            --main-bg: #f0f2f5;
            --primary-blue: #1a3c5a;
            --accent-orange: #ffc107;
        }

        body { 
          background-color: #9a9ca2; 
          font-family: 'Segoe UI', sans-serif; 
          overflow-x: hidden;
          padding: 0;
        }

        
/*--------------------------------------------------------------
# Header
--------------------------------------------------------------*/
.logo {
  line-height: 1;
}

@media (min-width: 1200px) {
  .logo {
    width: 225px;
    text-decoration: none;
}

  }

   @media (max-width: 1199px) {
    .logo {
    text-decoration: none;
}
        }
}

.logo img {
  max-height: 26px;
  margin-right: 6px;
}

.logo span {
  font-size: 26px;
  font-weight: 700;
  color: #444444;
  font-family: "Nunito", sans-serif;
  text-decoration: none;
}


       
     .header{
          transition: all 0.5s;
          z-index: 997;
          height: 40px;
          box-shadow: 0px 2px 20px #6c757d;
          background: var(--sidebar-bg);
          padding-left: 20px;
        }

.header .toggle-sidebar-btn {
  font-size: 32px;
  padding-left: 0px;
  cursor: pointer;
  color: #444444;
  margin-left: 0px;
}



.toggle-sidebar-btn:hover {
  background: darkgray;
  padding: 0 0 0 0;
}


/*--------------------------------------------------------------
# Header Nav
--------------------------------------------------------------*/
.header-nav ul {
  list-style: none;
}

.header-nav>ul {
  margin: 0;
  padding: 0;
}

.header-nav .nav-icon {
  font-size: 22px;
  color: #444444;
  margin-right: 25px;
  position: relative;
}

.header-nav .nav-profile {
  color: #444444;
}

.header-nav .nav-profile img {
  max-height: 36px;
}

.header-nav .nav-profile span {
  font-size: 14px;
  font-weight: 600;
}

.header-nav .profile {
  min-width: 240px;
  padding-bottom: 0;
  top: 8px !important;
}

.header-nav .profile .dropdown-header h6 {
  font-size: 18px;
  margin-bottom: 0;
  font-weight: 600;
  color: #444444;
}

.header-nav .profile .dropdown-header span {
  font-size: 14px;
}

.header-nav .profile .dropdown-item {
  font-size: 14px;
  padding: 10px 15px;
  transition: 0.3s;
}

.header-nav .profile .dropdown-item i {
  margin-right: 10px;
  font-size: 18px;
  line-height: 0;
}

.header-nav .profile .dropdown-item:hover {
  background-color: var(--primary-blue);
   color: #fff;
}

        @media (min-width: 1200px) {
          .toggle-sidebar .sidebar {
            left: -191px;
            width: 50px;
            height: 100vh;
            background: var(--sidebar-bg);
            margin-top: 41px;
            left: 0;
            top: 0;
            border-right: 1px solid #dee2e6;
            display: flex;
            flex-direction: column;
            padding: 20px 0;
          }

          .nav-link-custom:hover {
          background: var(--primary-blue);
          color: #fff;
        }
        .nav-link-custom.active {
          background: #e9ecef;
          color: var(--primary-blue);
          border-left: 7px solid var(--primary-blue);
        }
        a:hover {
          color: #717ff5;
          text-decoration: none;
        }
        a:hover {
          --bs-link-color-rgb: var(--bs-link-hover-color-rgb);
        }
        .nav-link-custom {
          padding: 12px 15px;
          color: #555;
          text-decoration: none;
          left: 291px;
          display: flex;
          align-items: center;
          transition: 0.3s;
          border-left: 7px solid var(--primary-blue);
        }
        }

        @media (max-width: 1199px) {
          .toggle-sidebar .sidebar {
             left: 0px;
             width: 50px;
          }
        }
        /* Sidebar */
        .sidebar {
            width: 240px;
            height: 100vh;
            background: var(--sidebar-bg);
            margin-top: 30px;
            left: 0;
            top: 0;
            border-right: 1px solid #dee2e6;
            display: flex;
            flex-direction: column;
            padding: 20px 0;
            overflow-y: auto;
            transition: 0.3s;
            position: fixed;


        }
        .sidebar-brand { padding: 0 25px; font-weight: bold; font-size: 1.5rem; color: #555; margin-bottom: 30px; }

        .nav-link-custom { padding: 12px 15px; color: #555; text-decoration: none; display: flex; align-items: center; transition: 0.3s; border-left: 7px solid var(--primary-blue);}
        
        
        .nav-link-custom.active { background: #e9ecef; color: var(--primary-blue); border-left: 7px solid var(--primary-blue); }

        .nav-link-custom:hover {background: var(--primary-blue); color: #fff}
        .nav-link-custom i { margin-right: 15px; width: 20px; }

        .nav-link-custom_marcar, .nav-link-custom_demarcar{
          padding: 12px 15px; color: #555; text-decoration: none; display: flex; align-items: center; transition: 0.3s; border-left: 7px solid #26649b;margin-left: -32px;
        }

         .nav-link-custom_marcar:hover {
        background: #26649b; color: #fff
        }
         .nav-link-custom_demarcar:hover {
        background: #26649b; color: #fff
        }

         .nav-link-custom_marcar i, .nav-link-custom_demarcar i{
         margin-right: 15px; width: 20px; 
        }

        .logout-link { margin-top: auto; color: #666; }

        /* Main Content */
        .main-content { margin-left: 240px; padding: 20px 40px; }

        /* Top Bar */
        .topbar { background: white; padding: 10px 40px; border-bottom: 1px solid #dee2e6; display: flex; justify-content: flex-end; align-items: center; margin-bottom: 30px; margin-left: 240px; }
        .user-profile { display: flex; align-items: center; font-weight: 500; color: #444; }
        .user-profile i { font-size: 1.5rem; margin-right: 10px; }

/*--------------------------------------------------------------
# Main
--------------------------------------------------------------*/
#main {
  margin-top: 110px;
  padding: 110px 30px;
  transition: all 0.3s;
}

@media (max-width: 1199px) {
  #main {
    padding: 0px 61px 0px;
      margin-top: 60px;

  }
}

@media (min-width: 1200px) {

  #main{
    margin-top: -50px;
    margin-left: 220px;
  }
}
@media (min-width: 1200px) {

  .toggle-sidebar #main {
    margin-left: 30px;
  }

  
}

        /*BOAS VINDAS*/
        .boas_vindas{
          border-radius: 5px;
          padding: 5px; 
          background: darkgray;
          width: 100%;
          height: 100%; 
          color: #000; 
          margin-top: 20px;"
        }

.card-body {
  padding: 0 10px 20px 15px;
}


/* Search Bar */
.search-bar {
  width: 100%;
    padding: 20px 300px;
  margin-bottom: -20px;

}

@media (max-width: 1199px) {
   .search-bar {
   left: 0;
    right: 0;
    padding: 25px 5px 0px 0px;
    box-shadow: 0px 0px 15px 0px rgba(1, 41, 112, 0.1);
    background: white;
    z-index: 9999;
    transition: 0.3s;
    width: 100%;

  }

  .search-bar-show {
    top: 60px;
    visibility: visible;
    opacity: 1;
  }
}

.search-form {
  width: 100%;
}

.search-form input {
  border: 0;
  font-size: 14px;
  color: #fff;
  border: 1px solid rgba(1, 41, 112, 0.2);
  padding: 7px 38px 7px 8px;
  border-radius: 3px;
  transition: 0.3s;
  width: 100%;
}

.search-form input:focus,
.header .search-form input:hover {
  outline: none;
  box-shadow: 0 0 10px 0 rgba(1, 41, 112, 0.15);
  border: 1px solid rgba(1, 41, 112, 0.3);
}

.search-form button {
  border: 0;
  padding: 0;
  margin-left: -30px;
  background: none;
}

.search-form button i {
  color: #fff;
}
/**/
}


.search-form {
  width: 100%;
}

.search-form input {
  border: 0;
  font-size: 14px;
  color: #000;
  border: 1px solid rgba(1, 41, 112, 0.2);
  padding: 7px 38px 7px 8px;
  border-radius: 3px;
  transition: 0.3s;
  width: 100%;
}

.search-form input:focus,
.search-form input:hover {
  outline: none;
  box-shadow: 0 0 10px 0 rgba(1, 41, 112, 0.15);
  border: 1px solid rgba(1, 41, 112, 0.3);
}

.search-form button {
  border-radius: 2px;
  width: 30px;
  height: 30px;
  padding: 0;
  border: 1px solid #0764de;
  margin-left: -35px;
  background: none;
}

.search-form button i {
  color: #0764de;
}

/* Search Bar */
        /* Action Cards */
        
         .btn-acao .agendada{
            margin-top: 18px;
            width: 65px; 
            border-radius: 2px; 
            height: 10px; 
            background: #b7a108;"
        }
  
         .btn-acao .confirmada{
            margin-top: 18px;
            width: 65px; 
            border-radius: 2px; 
            height: 10px; 
            background: #6e6ef0;
        }
  
         .btn-acao .atendida{
            margin-top: 18px;
            width: 65px; 
            border-radius: 2px; 
            height: 10px; 
            background: green;
        }
  
         .btn-acao .desmarcada{
            margin-top: 18px;
            width: 65px; 
            border-radius: 2px; 
            height: 10px; 
            background: #939292;"
        }

       .btn-acao a{
            color: #444444;
              text-decoration: none;
        }
        .action-card {
           
              background: var(--sidebar-bg);
              border-radius: 5px;
              padding: 12px 20px;
              margin-top: 13px;
              display: inline-flex;
              align-items: center;
              justify-content: center;
              box-shadow: 0 4px 6px rgba(0,0,0,0.2);
              cursor: pointer;
              transition: transform 0.2s;
              margin-left: 8px;
        }
        .action-card:hover { transform: translateY(-2px); 
          background: #c1c1c1;

        }

        .action-card_submit {
           
              background: var(--primary-blue);
              border-radius: 5px;
              padding: 12px 20px;
              margin-top: 13px;
              display: inline-flex;
              align-items: center;
              justify-content: center;
              box-shadow: 0 4px 6px rgba(0,0,0,0.2);
              cursor: pointer;
              transition: transform 0.2s;
              margin-left: 8px;
              color: #fff;
              text-decoration: none;
        }

         .action-card_submit:hover { transform: translateY(-2px); 
          background: #2e5a82;

        }


        .action-icon {
            width: 50px;
            height: 33px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 20px;
            color: white;
            transform: translateY(-2px); 
        }
        .bg-calendar,.bg-add ,.bg-remove { background: var(--primary-blue); }

        /* Table Card */
        .table-container {
            background: white;
            border-radius: 5px;
            padding: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            margin-top: 30px;
        }
        .badge-status { background-color: var(--accent-orange); color: #000; padding: 8px 15px; border-radius: 5px; font-weight: 600; font-size: 0.8rem; }

        .badge-status-agendado{
            background-color: var(--accent-orange);
             color: #000; 
             padding: 8px 15px; 
             border-radius: 5px; 
             font-weight: 600; 
             font-size: 0.8rem;
             width: 90px; 
        }

        .badge-status-confirmada{
            background-color: #0768ff;
             color: #fff; 
             padding: 8px 15px; 
             border-radius: 5px; 
             font-weight: 600; 
             font-size: 0.8rem;
             width: 90px; 
        }

        .badge-status-desmarcada{
            background-color: #9d9a9a;
             color: #000; 
             padding: 8px 15px; 
             border-radius: 5px; 
             font-weight: 600; 
             font-size: 0.8rem;
             width: 90px; 
        }

        .badge-status-atendido{
            background-color: #517d56;
             color: #000; 
             padding: 8px 15px; 
             border-radius: 5px; 
             font-weight: 600; 
             font-size: 0.8rem;
             width: 90px; 
        }

        .table th { font-size: 0.85rem; color: #666; font-weight: 600; border-top: none; }
        .btn-action-table { padding: 5px 8px; border-radius: 4px; font-size: 0.9rem; }

        #botao_desmarcar{
          border-radius: 4px;
          display: inline-flex;
          align-items: center;
          justify-content: center;
          background: #fff;
          color: red;
          border: 1px solid red;
          padding: 5px 6px;
          text-decoration: none;
        }

        #botao_remarcar{
          border-radius: 4px;
          display: inline-flex;
          align-items: center;
          justify-content: center;
          background: #fff;
          color: #444444;
          border: 2.3px solid #ffbf00;
          padding: 5px 6px;
           text-decoration: none;
        }


        #botao_pdf{
          border-radius: 4px;
          display: inline-flex;
          align-items: center;
          justify-content: center;
          background: #fff;
          color: darkgray;
          border: 1px solid darkgray;
          padding: 5px 6px;
           text-decoration: none;
        }


        #botao_remover{
          border-radius: 4px;
          display: inline-flex;
          align-items: center;
          justify-content: center;
          background: #fff;
          color: red;
          border: 1px solid red;
          padding: 5px 6px;
           text-decoration: none;
        }

        #botao_editar_medico{
          border-radius: 4px; 
          display: inline-flex; 
          align-items: center;
          justify-content: center; 
          background: #fff; 
          /*background: #04AA6D;*/ 
          color: green;
          border: 1px solid green;
          padding: 5px 6px;
           text-decoration: none;
        }

        #botao_eliminar_medico{
          border-radius: 4px; 
          display: inline-flex;    
          align-items: center;
          justify-content: center; 
          background: #fff;
          /*background: #f44336;*/
          color: red; 
          border: 1px solid red;
          padding: 5px 6px;
          text-decoration: none;
          margin-left: 10px 
        }



        /*MODAL DIALOGO*/

        .modalDialogo{
          display: none;
          position: fixed;
          inset: 0;
          background: rgba(0, 0, 0, 0.5);
          justify-content: center;
          align-items: center;
          top: 0;
          left: 0;
          width: 100%;
          height: 100%;
          z-index: 9999;
        }

        .modal-conteudo{
          background: white;
          padding: 15px;
          border-radius: 8px;
          text-align: center;
          margin-left: 20px;
        }

        .modal-conteudo .button_dialogo{
          margin: 5px;
          padding: 8px 15px;
          cursor: pointer;
          background: darkgray;
          width: 140px;

        }

        .modal-conteudo .button_dialogo+.button_dialogo{
          background: green;
          color: white;
          border-radius: 1px;
          width: 140px;
          margin-left: 70px;
        }



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

        @media (max-width: 1199px) {
  .sidebar {
    width: 50px;
  }
}

    </style>
</head>
<body>

      <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="novo_painel_admin.php" class="logo d-flex align-items-center">
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
    $select = $mysqli->query("SELECT * FROM Admin WHERE id='$id'");
    $row = $select->num_rows;
        $get = $select->fetch_array();

        $nome = $get['nome'];
        $_SESSION['nome'] = $nome;

    
  ?>
 
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
              <a class="dropdown-item d-flex align-items-center" href="" data-bs-toggle="modal" data-bs-target="#meu_perfil">
                <i class="bi bi-person-circle"></i>
                <span>Perfil</span>
              </a>

            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->


    <!-- Sidebar -->
   
      <aside id="sidebar" class="sidebar">
       
        <a href="novo_painel_admin.php" class="nav-link-custom"><i class="bi bi-house"></i> Home</a>

        <a href="#" class="nav-link-custom logout-link nav-link collapsed" data-bs-toggle="modal" data-bs-target="#Pergunta_Sair"><i class="bi bi-box-arrow-right"></i> Sair</a>

    </aside>

<!-- Conteúdo Principal -->

  <main id="main" class="main">

    <section class="section dashboard">
       <div class="card">
            <div class="card-body">

        <div class="boas_vindas">
               <h3>Cadastro Médico</h3>
        </div>


        <!-- Botões de Ação -->
    
    <div class="btn-acao">
       
      <a onclick="window.history.back()"><div class="action-card">
            <div class="action-icon bg-add"><i class="bi bi-box-arrow-left"></i></div>
            <span class="fw-bold">Voltar</span>
        </div>
      </a>

       <a href="" data-bs-toggle="modal" data-bs-target="#modalAddMedico">
        <div class="action-card">
            <div class="action-icon bg-add"><i class="bi bi-file-medical"></i></div>
            <span class="fw-bold"> + Médico</span>
        </div>
      </a>

        <a href="" data-bs-toggle="modal" data-bs-target="#Agendamento_Medico">
          <div class="action-card">
            <div class="action-icon bg-remove"><i class="bi bi-calendar-day"></i></div>
            <span class="fw-bold"> + Agendamento</span>
        </div>
      </a>

  <div class="search-bar">
      <form class="search-form d-flex align-items-center" class="pesquisar" method="GET" action="novo_painel_cadastro_medico.php">
        <input type="text" name="pesquisar" placeholder="pesquisar" title="pesquisa">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div>
    
    <span hidden=""><?php $pesquisar = $_GET['pesquisar'];?></span>
    <?php
  
    $result_pesq_tabela = "SELECT * FROM medico ORDER BY id ASC";
    $resultado_pesquisa_tabela = mysqli_query($mysqli7, $result_pesq_tabela);
   
    $result_pesq = "SELECT * FROM medico WHERE id LIKE '%$pesquisar%' ORDER BY id DESC";
    $resultado_pesquisa = mysqli_query($mysqli, $result_pesq);
    ?>

    <!-- End Search Bar -->

    </div>

       <?php
      
    $result_pesq = "SELECT * FROM medico";
    $resultado_pesquisa2 = mysqli_query($mysqli, $result_pesq);

    ?>

        <!-- -->
     <!-- Tabela de Consultas -->
        <div class="table-container">
            <div class="table-responsive" >
                <table class="table align-middle table-striped table-hover">
                    <thead>
                    <tr>
                       <th scope="col">Nº Documento</th>
                      <th scope="col">Nome</th>
                      <th scope="col">Especialidade</th>
                      <th scope="col">Género</th>
                      <th scope="col">Telefone</th>
                      <th scope="col">Localidade</th>
                      <th scope="col">Botão</th>
                      
                  </tr>
                    </thead>
               <tbody>
      <?php
     
        while($rows_pesquisar = mysqli_fetch_array($resultado_pesquisa_tabela)){

      ?>
                    
                  <tr>
                    <td><?php echo $rows_pesquisar['id']; ?></td>
                    <td><?php echo $rows_pesquisar['nome']; ?></td>
                    <td><?php echo $rows_pesquisar['especialidade']; ?></td>
                    <td><?php echo $rows_pesquisar['genero']; ?></td>
                    <td><?php echo $rows_pesquisar['telefone']; ?></td>
                    
                      <td hidden><span><?php echo $rows_pesquisar['email']; ?></span>
                      </td>

                      <td><?php echo $rows_pesquisar['localidade']; ?></td>

                     <td >

              
            <div >
                        
                <?php

            $id_editar_medico = encryptor('encrypt', $rows_pesquisar['id']);
   
                ?>
                
                <!--<a type="button" id="botao_editar_medico" class="bi bi-pencil-square"  href="novo_painel_editar_perfil_medico.php?id=<?php echo $id_editar_medico; ?>"  data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Editar">
                         
                       </a>-->
                 <div class="row">

                     <div class="col-md-2 form-group mt-0">
                        <button type="button" class="editbtn" id="botao_editar_medico"  ><span class="bi bi-pencil-square"></span></button>
                     </div> 

                       <div class="col-md-2 form-group mt-0">
                        <button type="button" class=" deletebtn" id="botao_eliminar_medico"  ><span class="bi bi-trash"></span></button>
                     </div> 
                     
                  </div> 

      <!--  

    <?php
/*
     
            $id_eliminar_medico = $rows_pesquisar['id'];
  */
      ?>
            
                      <a type="button" onclick="abrirModalDialogo(<?php echo $id_eliminar_medico; ?>)"  class="bi bi-trash" id="botao_eliminar_medico"data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Eliminar"></a>

      <div id="modalConfirmacaoEliminar" class="modalDialogo">
                <div class="modal-conteudo">
                    <h5>Tem certeza que deseja Eliminar o médico <?php echo $id_eliminar_medico; ?>?</h5>
                    <hr>
                    <button class="button_dialogo" onclick="fecharModal()">Não</button>
                    <button class="button_dialogo"onclick="confirmar()">Sim</button>

                </div>
            </div>

             <script>
        
        var idSelecionado = null;
        function abrirModalDialogo(id_eliminar_medico){
          idSelecionado = id_eliminar_medico; // Guarda o id

          document.getElementById("modalConfirmacaoEliminar").style.display = "flex";
        }

        function fecharModal(){

          document.getElementById("modalConfirmacaoEliminar").style.display = "none";
          idSelecionado = null;
        }

        function confirmar(){

          if (idSelecionado) {
            window.location.href = "delete_medico.php?id=" + idSelecionado;
            document.getElementById("modal-conteudo").style.display = "none";
          }

        }

      </script>         
-->
                      </div>

                     </td>

                    </tr>

        
        <?php
      
       
     }
  ?>
                </tbody>

              </table>
            </div>
                <h5 class="mt-4 fw-bold"> Médicos Cadastrado</h5>
        </div>
          <!-- End Table 6-->

             <!---INICIO MODAL PARA DELETAR DADOS PESSOAIS MÉDICO -->

              <div  class="modal fade" id="deletemodal" tabindex="-1" style="display: none;" aria-hidden="true">
                
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                     <h5 class="modal-title">Cadastro Medico</h5>
                     <label style="color: #000 ; margin-left: 20px">Campos Obrigatórios </label>(<span style="color: red">*</span>) 
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div  class="modal-body">
       <section id="appoointment" class="appointment section-bg">
         <div class="container">
              <form action="delete_medico.php" method="POST" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
                

             <div class="row">


                <div class="col-md-12 form-group mt-3">
                           
                             <h3>Deseja Eliminar o médico</h3><input type="text" class="form-control" name="id" id="id">


                          </div>

                          
                        </div>

<script>
  
$(document).ready(function(){
    $('.editbtn').on('click', function(){

      $('#editmodal').modal('show');

      $tr = $(this).closest('tr');

      var data = $tr.children("td").map(function(){
        return $(this).text();
      }).get();

      console.log(data);

      $('#id').val(data[0]);
      $('#nome').val(data[1]);
      $('#genero').val(data[3]);
      $('#telefone').val(data[4]);
      $('#email').val(data[5]);
      $('#localidade').val(data[6]);

      
    
    });
  
  });


  $(document).ready(function(){
    $('.deletebtn').on('click', function(){

      $('#deletemodal').modal('show');

      $tr = $(this).closest('tr');

      var data = $tr.children("td").map(function(){
        return $(this).text();
      }).get();

      console.log(data);

      $('#id').val(data[0]);
      
    });
  
  });


</script>
                        <br>
                        <br>
                       
                        
                            <div class='container mt-3' >
                              <input  type="submit" id="button"  class="action-card_submit" value="Eliminar" name="button_delete"/>
                            </div>
                        
        </form>
      </div>
     </section>


                    </div>
                    </div>
                </div>
              </div><!-- End Vertically centered Modal-->
        <!---FIM MODAL PARA DELETAR DADOS PESSOAIS MÉDICO -->



           <!---INICIO MODAL PARA EDITAR DADOS PESSOAIS MÉDICO -->

              <div  class="modal fade" id="editmodal" tabindex="-1" style="display: none;" aria-hidden="true">
                
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                     <h5 class="modal-title">Cadastro Medico</h5>
                     <label style="color: #000 ; margin-left: 20px">Campos Obrigatórios </label>(<span style="color: red">*</span>) 
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div  class="modal-body">
       <section id="appoointment" class="appointment section-bg">
         <div class="container">
           

          <form action="editar_dados_medico.php" method="POST">

    <div class="row">
   
      <input hidden type="" name="id" id="id" value="<?php echo $id; ?>">
        <div class="col-md-6 form-group mt-3 mt-md-0">
                <div class="input-group has-validation">

                <input type="text" id="nome" name="nome" class="form-control" value="<?php echo $rows_pesquisar['nome']; ?>" required>     

               <div class="invalid-feedback">Por favor Selecione o nome utente!</div>
            </div>
          </div>
   
   <div class="col-md-6 form-group mt-3 mt-md-0">
                <div class="input-group has-validation">

                <input type="text" id="email" name="email" class="form-control" value="<?php echo $rows_pesquisar['email']; ?>" required>     

               <div class="invalid-feedback">Por favor Selecione o nome utente!</div>
            </div>
          </div>
        
<div class="col-md-6 form-group mt-3">
                <div class="input-group has-validation">

                <input type="text" id="telefone" name="telefone" class="form-control" value="<?php echo $rows_pesquisar['telefone']; ?>" required>     

               <div class="invalid-feedback">Por favor Selecione o nome utente!</div>
            </div>
          </div>

   <div class="col-md-6 form-group mt-3">
                <div class="input-group has-validation">

                <input type="text" id="localidade" name="localidade" class="form-control" value="<?php echo $rows_pesquisar['localidade']; ?>" required>     

               <div class="invalid-feedback">Por favor Selecione o nome utente!</div>
            </div>
          </div>
      
      </div>
    
            
                            <div class='container mt-3' >
                              <input  type="submit" id="button"  class="action-card_submit" value="Editar" name="button_editar"/>
                            </div>
                        
        </form>
      </div>
     </section>


                    </div>
                    </div>
                </div>
              </div><!-- End Vertically centered Modal-->
        <!---FIM MODAL PARA EDITAR DADOS PESSOAIS MÉDICO -->


 <!---INICIO MODAL PARA CADATRAR DADOS PESSOAIS MÉDICO -->

              <div  class="modal fade" id="modalAddMedico" tabindex="-1" style="display: none;" aria-hidden="true">
                
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                     <h5 class="modal-title">Cadastro Medico</h5>
                     <label style="color: #000 ; margin-left: 20px">Campos Obrigatórios </label>(<span style="color: red">*</span>) 
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div  class="modal-body">
       <section id="appoointment" class="appointment section-bg">
         <div class="container">
              <form action="#" method="POST" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
                       <div class="row">

                            <div class="col-md-6 form-group">
                     <label>Nome Médico </label>(<span style="color: red">*</span>)
                              <div class="input-group has-validation">
                             
                              <input type="text" name="nome" class="form-control" id="nome" placeholder="Seu Nome" data-rule="minlen:4" required value="">

                              <div class="invalid-feedback">Por favor digite o seu nome!</div>
                             </div>
                            </div>

                            <div class="col-md-6 form-group mt-3 mt-md-0">
                              <label>Email </label>(<span style="color: red">*</span>)
                              <input type="email" class="form-control" name="email" id="email" placeholder="Seu email" data-rule="email" data-msg="Por favor edigite o seu email válido" required>
                              <div class="validate"></div>
                              <div class="invalid-feedback">Por favor edigite o seu email!</div>
                            </div>
                          </div>

                          <div class="row">

                          
                            <div class="col-md-4 form-group mt-3">
                      <script src="mascara.min.js"></script>
                        <label>Nº Telefone </label>(<span style="color: red">*</span>)
                              <input type="text" class="form-control" name="telefone" data-msg="Por favor digite o seu telefone" required id="telefone" id="telefone" placeholder="9##-###-###" onkeyup="mascara('###-###-###',this,event,true);" maxlength="14">
                              <div class="validate"></div>
                              <div class="invalid-feedback">Por favor digite o seu telefone!</div>
                            </div>

                           <div class="col-md-4 form-group mt-3">
                            <label>Género </label>(<span style="color: red">*</span>)
                            <select name="genero" id="genero" class="form-select" required>
                              <option value="">Selecione o Género</option>
                                 <option value="Masculino">Masculino</option>
                                 <option value="Feminino">Feminino</option>
                            </select>
                            <div class="validate"></div>
                          </div>

                          <div class="col-md-4 form-group mt-3">
                            <label>Localidade </label>(<span style="color: red">*</span>)
                            <select name="localidade" id="localidade" class="form-select" required>
                              <option value="">Selecione a Localidade</option>
                                          <option value="Viana">Viana</option>
                                          <option value="Cacuaco">Cacuaco</option>
                                          <option value="Belas">Belas</option>
                                          <option value="Cazenga">Cazenga</option>
                                          <option value="Quissama">Quissama</option>
                                          <option value="Luanda">Luanda</option>
                                          <option value="Talatona">Talatona</option>
                            </select>
                            <div class="validate"></div>
                          </div>
                        </div>

                        <div class="row">

                         <div class="col-md-4 form-group mt-3">
                          <label>Data Nascimento </label>(<span style="color: red">*</span>)
                            <input type="date" class="form-control" name="data_nascimento" id="data_nascimento" placeholder="Sua Data Nascimento" data-rule="minlen:4" data-msg="Por favor insere Sua Data Nascimento!" required>
                            <div class="validate"></div>
                             <div class="invalid-feedback">Por favor insere Sua Data Nascimento!</div>
                          </div>

                          <div class="col-md-4 form-group mt-3">
                            <label>BI </label>(<span style="color: red">*</span>)
                            <input type="text" class="form-control" name="BI" placeholder="Nº BI: 00#######AB0## 007188380LA042" data-rule="minlen:4" data-msg="Por favor insere Sua Data Nascimento!" required maxlength="14">
                            <div class="validate"></div>
                             <div class="invalid-feedback">Por favor insere o número do seu BI!</div>
                          </div>

                          <div class="col-md-4 form-group mt-3">
                            <label>Especialidade </label>(<span style="color: red">*</span>)
                            <select name="especialidade" id="especialidade" class="form-select" required>
                              <option value="">Selecione a Especialidade</option>
                                 <option value="Dermatologia">Dermatologia</option>
                                 <option value="Pediatra">Pediatra</option>
                                 <option value="Cardiologia">Cardiologia</option>
                                 <option value="Oftalmologia">Oftalmologia</option>
                            </select>
                            <div class="validate"></div>
                          </div>

                           <div class="col-md-4 form-group mt-3">
                            <label>Senha </label>(<span style="color: red">*</span>)
                            <input type="password" class="form-control" name="senha" id="senha" placeholder="Sua Senha" data-rule="minlen:4" data-msg="Por favor insere a sua senha!" required>
                            <div class="validate"></div>
                             <div class="invalid-feedback">Por favor insere a sua senha!</div>
                          </div>

                          
                        </div>

                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        
                            <div class='container mt-3' >
                              <input  type="submit" id="button"  class="action-card_submit" value="Cadastrar" name="button1"/>
                            </div>
                        
        </form>
      </div>
     </section>


                    </div>
                    </div>
                </div>
              </div><!-- End Vertically centered Modal-->
        <!---FIM MODAL PARA CADATRAR DADOS PESSOAIS MÉDICO -->




        <!---INICIO MODAL PARA CADATRAR AGENDAMENTO MÉDICO -->

              <div  class="modal fade" id="Agendamento_Medico" tabindex="-1" style="display: none;" aria-hidden="true">
                
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                     <span>             </span> <h5 class="modal-title">Cadastro Agendamento Medico</h5>
                     <label style=" margin-left: 20px">Campos Obrigatórios </label>(<span style="color: red">*</span>)
                      <button typen="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div  class="modal-body">
       <section id="appoointment" class="appointment section-bg">
         <div class="container">
              <form action="" method="POST" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
                         <?php
  
 
            while($rows_pesquisar2 = mysqli_fetch_array($resultado_pesquisa2)) {

      ?>
                    <input type="" name="id_medico" value="<?php echo $rows_pesquisar2['id'];?>" hidden>
                      
                      <input type="" name="especialidade" value="<?php echo $rows_pesquisar2['especialidade'];?>" hidden> 
  <?php
}
 ?>

 <?php

      $result_pesq = "SELECT nomeDiaSemana FROM nomeDiaSemana";
        $resultado_pesquisa4 = mysqli_query($mysqli, $result_pesq);

         $result_pesq = "SELECT * FROM medico WHERE id";
        $resultado_pesquisa5 = mysqli_query($mysqli, $result_pesq);
   
?>
   
                       <div class="row">

                                                    
                            <div class="col-md-6 form-group mt-3">
                              <label>Nome Médico </label>(<span style="color: red">*</span>)
                               <select name="nome_medico" id="" class="form-select" required>
                                <option value="">Selecione o Médico</option>
      <?php

                        while($rows_pesquisar5 = mysqli_fetch_array($resultado_pesquisa5)) {

      ?>

                                 <option value="<?php echo $rows_pesquisar5["nome"];?>"><?php echo $rows_pesquisar5["nome"];?></option>
                                 
   <?php
}
 ?>
                            </select>
        

                           <div class="validate"></div>
                              <div class="invalid-feedback">Por favor selecione o Médico</div>
                            </div>
                              
                       <div class="col-md-6 form-group mt-3">
                              <label>Dias da Semana de Atendimento </label>(<span style="color: red">*</span>)
                               <select name="dias_da_semana" id="" class="form-select" required>
                                <option value="">Selecione o Dia de Atendimento</option>
                              <?php

                        while($rows_pesquisar4 = mysqli_fetch_array($resultado_pesquisa4)) {
      ?>
                                 <option value="<?php echo $rows_pesquisar4["nomeDiaSemana"];?>"><?php echo $rows_pesquisar4["nomeDiaSemana"];?></option>

   <?php
}
 ?>
                            </select>
                                    
                           <div class="validate"></div>
                              <div class="invalid-feedback">Por favor e digite o dia da semana</div>
                            </div>
                          
                          
                          
                        </div>

                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        
            <div class='container'>
               <input  type="submit" id="button" class="action-card_submit" value="Cadastrar" name="button"/>
           </div>
                        
        </form>
      </div>
     </section>


                    </div>
                    </div>
                </div>
              </div><!-- End Vertically centered Modal-->
        <!---FIM MODAL PARA CADATRAR AGENDAMENTO MÉDICO -->


        <!---INICIO MODAL PERGUNTA SE DESEJA ELIMINAR MÉDICO -->

              <div  class="modal fade" id="Delete_Medico" tabindex="-1" style="display: none;" aria-hidden="true">
                
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                     <span>             </span> <h5 class="modal-title">Confirmar eliminação do Medico</h5>
                      <button typen="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div  class="modal-body">
       <section id="appoointment" class="appointment section-bg">
         <div class="container">
          <h3>Pretende Eliminar Médico?</h3>
              <div class="row">
                <div class="col-md-4 form-group mt-3">
                            
    <a type="button" href ="delete_medico.php?id=<?php echo $rows_pesquisar['id']; ?>" style="border-radius: 5%; display: inline-flex;    align-items: center;justify-content: center; background: red; color: #fff; width: 30px; height: 30px" >Sim</a>

                            <div class="validate"></div>
                             <div class="invalid-feedback">Por favor insere Sua Data Nascimento!</div>
                          </div>

                  <div class="col-md-4 form-group mt-3">
          <a type="button" href ="#" data-bs-dismiss="modal" aria-label="Close" style="border-radius: 5%; display: inline-flex;    align-items: center;justify-content: center; background: green; color: #fff; width: 30px; height: 30px" >Não</a>

                            <div class="validate"></div>
                             <div class="invalid-feedback">Por favor insere Sua Data Nascimento!</div>
                          </div>

              </div>
      </div>
     </section>


                    </div>
                    </div>
                </div>
              </div><!-- End Vertically centered Modal-->
        <!---FIM MODAL PERGUNTA SE DESEJA ELIMINAR MÉDICO -->


<!---INICIO MODAL PERFIL -->

      <div  class="modal fade" id="meu_perfil" tabindex="-1" style="display: none;" aria-hidden="true">
                
                <div class="modal-dialog modal-ms">
                  <br>
                  <br>
                  <br>
                  <br>
                  <br>
                  <div class="modal-content">
                    <div class="modal-header">
                     <span>             </span> <h5 class="modal-title">Seus Dados</h5>
                      <button typen="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div  class="modal-body">

         <div class="container" >
          
          <?php

          $result_pesq = "SELECT * FROM Admin";
            $resultado_pesquisa = mysqli_query($mysqli4, $result_pesq);
          
        while ($rows_pesquisar = mysqli_fetch_array($resultado_pesquisa)) {
          if ($rows_pesquisar['nome'] == $nome) {
          
        ?>

                <div style="margin: 10px 40%">
                <h1 class="bi-person-circle" ></h1></div>
                <hr>
                
                 <label hidden="">Nº Doc: <?php echo $rows_pesquisar['id']; ?></label><br>
                 <label>Nome: <?php echo $rows_pesquisar['nome']; ?></label><br>    
                 <label>Email: <?php echo $rows_pesquisar['email']; ?></label><br>    
                 <label>BI: <?php echo $rows_pesquisar['BI']; ?></label><br>    
                 <label>Telefone: <?php echo $rows_pesquisar['telefone']; ?></label><br>    
                 <label>Endereço: <?php echo $rows_pesquisar['endereco']; ?></label><br>
                 <label>Nome Sistema: <?php echo $rows_pesquisar['nome_sistema']; ?></label><br>
                        <hr>
                        <br>
            <?php

           $id = encryptor('encrypt', $rows_pesquisar['id']); 
            ?>
            <div class='container'>
               <a  href="novo_painel_editar_perfil_admin.php?id=<?php echo $id; ?>" id="button"  class="action-card_submit" >Editar</a>
          </div>
        <?php
          }

       }
    ?>         
         </div>

                    </div>
                    </div>
                </div>
              </div><!-- End Vertically centered Modal-->
        <!---FIM MODAL PERFIL -->


 


 <!---INICIO MODAL PARA PARA SAIR  -->

      <div  class="modal fade" id="Pergunta_Sair" tabindex="-1" style="display: none;" aria-hidden="true">
                
                <div class="modal-dialog modal-ms">
                
                  <div class="modal-content" style="margin-top: 250px;">
                    
                    <div  class="modal-body">

                <div class="container" >
            
              <div>
                <h3>Pretende Sair do Sistema?</h3></div>
                <hr>
               

           
            <div class='container'>
           
     
                 <a type="submit" href="?action=sair" id="button"  class="btn btn-danger" style="width: 150px; height: 35px; border-radius: 0px; float: right;" >Sim</a>
          
                <a class="btn btn-secondary" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="width: 150px; height: 35px; border-radius: 0px; float: left;">Não</a>
            </div>
          
        </div>

         </div>
        </div>
       </div>
      </div>
        <!---FIM MODAL PARA SAIR -->

          </div>
        </div>
      </section>

  </main>

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

