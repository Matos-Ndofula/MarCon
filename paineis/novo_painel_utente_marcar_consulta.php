<?php
//Oculta todos os erros na tela
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(1);

require("../configs/conexao.php");
require("config_encript_decrypt_url.php");

require("../configs/conexao.php");

//include("pega_nome_medico.php");
session_start();
require("../configs/protecao.php");
protegerUser();
//require("historico_medico.php");

if(isset($_GET["action"]) AND $_GET["action"] == "sair"){
    session_destroy();
    header("Location: ../novo_login.php");
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard Utente Marcar Consulta</title>
  <meta content="" name="description">
  <meta content="" name="keywords">


  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
   <script type="text/javascript" src="jquery-3.5.1.js"></script>
    
     <!-- Template Main CSS File -->
  <link href="assets/css/style1.css" rel="stylesheet">

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

        .action-card_cancelar{
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
              border: 1px solid #444444;

        }

        .action-card span{
        text-decoration: none;

    }


        .action-card:hover, .action-card_cancelar:hover { transform: translateY(-2px); 
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
        }

         .action-card_submit:hover { transform: translateY(-2px); 
          background: #2e5a82;

        }

        .action-card_editar {
           
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

         .action-card_editar:hover { transform: translateY(-2px); 
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
      <a href="novo_painel_utente_boas_vindas.php" class="logo d-flex align-items-center">
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

        $email = $get['email'];
        $_SESSION['email'] = $email;

        $BI = $get['BI'];
        $_SESSION['BI'] = $BI;

        $telefone = $get['telefone'];
        $_SESSION['telefone'] = $telefone;

        $endereco = $get['endereco'];
        $_SESSION['endereco'] = $endereco;

            
    
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
       
        <li class="nav-item">

        <a class="nav-link-custom" class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" >
          <i class="bi bi-file-medical"></i><span>Consultas</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav" id="consultas_abaixo">
                   
            <a href="novo_painel_utente_desmarcar_consulta.php" class="nav-link-custom_demarcar">
              <i class="bi bi-calendar-x"></i><span>Desmarcar consultas</span>
            </a>
         
          
        </ul>
      </li>
        
        <a href="novo_calendario_utente_consultas.php" class="nav-link-custom"><i class="bi bi-calendar-day"></i> Calendário</a>
        
        <a href="#" class="nav-link-custom logout-link nav-link collapsed" data-bs-toggle="modal" data-bs-target="#Pergunta_Sair"><i class="bi bi-box-arrow-right"></i> Sair</a>
    </aside>

  

    <!-- Conteúdo Principal -->

  <main id="main" class="main">

    <section class="section dashboard">
       <div class="card">
            <div class="card-body">

        <div class="boas_vindas">
               <h3>Marcação Consulta</h3>
        </div>


        <!-- Botões de Ação -->
        <div class="btn-acao">

        <a onclick="window.history.back()"><div class="action-card">
            <div class="action-icon bg-add"><i class="bi bi-box-arrow-left"></i></div>
            <span class="fw-bold">Voltar</span>
        </div>
      </a>

           
        </div>
   <style>
/* Esconde o círculo original do radio */
input[type="radio"] {
    display: none;
}

/* Estilo da Label (que parece um botão) */
label {
    padding: 6px 12px;
    font-weight: bold;
    margin: 3px 2px 9px 13px;
    border: 2px solid var(--primary-blue); 
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
    font-weight: bold;
    color: #333;
    position: relative;
    z-index: 10;
    pointer-events: auto;
    transform: translateY(-3px);
}

/* Hover: Muda o tom quando passa o rato */
label:hover {
    background-color: var(--primary-blue);
    color: #fff;
}

/* O SEGREDO: Estilo quando o input está SELECIONADO */
input[type="radio"]:checked + label {
    background-color: var(--primary-blue); 
    color: white;
}

.grade-horarios {
    display: block;
    gap: 10px;
    margin-bottom: 20px;
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
</style>

        <!--FORM -->
    <div class="form">
        <form action="#" method="POST" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
          <div class="row">

            <?php
      
    $result_pesq = "SELECT * FROM medico";
    $resultado_pesquisa = mysqli_query($mysqli, $result_pesq);
    
    //Pesquisa para Nome do medico e BI
    //SELECT * FROM funcionario WHERE nome_nivel = 'Medico'
                     
           $result_pesq = "SELECT * FROM medico";
            $resultado_pesquisa2 = mysqli_query($mysqli, $result_pesq);

             $result_pesq_agenda_medico = "SELECT * FROM agendamento_medico";
            $resultado_pesquisa_agenda_medico = mysqli_query($mysqli, $result_pesq_agenda_medico);
            
   
               //$_GET["id_Especialidade"];"<h3 id='titulo'></h3>"
            //     $rows_pesquisar2 = mysqli_fetch_array($resultado_pesquisa2);
              //  $id_Especialidade = $rows_pesquisar2['id'];
/*
              $result_pesq_compara_especialidade = "SELECT * FROM agendamento_medico";
                $resultado_pesquisa_compara_especialidade = mysqli_query($mysqli, $result_pesq_compara_especialidade);

                $rows_pesquisar_compara_especialidade = mysqli_fetch_array($resultado_pesquisa_compara_especialidade);

                $especialidade_comparada = $rows_pesquisar_compara_especialidade['especialidade'];

                 $dia_da_semana_comparada = $rows_pesquisar_compara_especialidade['dias_da_semana'];


              if ($rows_pesquisar2['especialidade'] == $especialidade_comparada) {
                            echo " <script>alert('Os dias dele são'".$resultado_pesquisa_dia_semana."'');</script> ";
                          }


                <input type="text" name="nome_utente" class="form-control" value="<?php echo $nome_utente; ?>" required>     
                <input type="text" id="mostra_especialidade" value="<?php echo $mostra_especialidade; ?>" hidden>     
                <input type="text" id="mostra_dias_da_semana" value="<?php echo $mostra_dias_da_semana; ?>" hidden>     
 const inputmostra_especialidade = document.getElementById("mostra_especialidade"); 
      const inputmostra_dias_da_semana = document.getElementById("mostra_dias_da_semana"); 
const selecione_mostra_especialidade = inputmostra_especialidade.value;
       const selecione_mostra_dias_da_semana = inputmostra_dias_da_semana.value;
                        <input type="text" name="" value="<?php echo date('w');?>">
          
*/

  ?>
        
            <div class="col-md-4 form-group mt-3 mt-md-0">
               
              <span>Nome Utente</span>

             <div class="has-validation">
               
                <input  type="text" name="nome_utente" class="form-control" value="<?php echo $nome_utente; ?>" required>

               <div class="invalid-feedback">Por favor Selecione o nome utente!</div>
            </div>
          </div>
   
             <div class="col-md-4 form-group mt-3 mt-md-0">
              <span>Especialidade</span>
              (<span style="color: red">*</span>)
                   
                   <select id="selecioneEspecialidade" name="especialidade" class="form-select" onchange="selecione();" required>
                    <option value="">Selecione a Especialidade</option>
                 <?php
                    while($rows_pesquisar2 = mysqli_fetch_array($resultado_pesquisa2)){
                      
                 ?>

                   <option  value="<?php echo $rows_pesquisar2['especialidade']; ?>" ><?php echo $rows_pesquisar2['especialidade']; 

                 ?></option>
                 <?php
                   }
                  ?>             
                   </select>
                <div class="validate"></div>
                 <div class="invalid-feedback">Por favor selecione a especialidade!</div>
             </div>

        <!---
    <script src="mostrar_dados_select.js"></script>
    <script src="mostrar_dados_select2.js">
    
--> 
    <script>
  const inputselecioneEspecialidade = document.getElementById("selecioneEspecialidade"); 
   
      function selecione(){
       const selecione_Especialidade = inputselecioneEspecialidade.value;
      

      $("#especialidade_da_funcao").val(selecione_Especialidade);
      
       // document.getElementById('mostrar_data_horario').innerHTML =selecione_Especialidade;
        document.getElementById('mostrar_data_horario').style.opacity = 1; 
       // document.getElementById('mostrar_dias_medico_').style.opacity = 1; 

        if (window.XMLHttpRequest) {
          xmlhttp = new XMLHttpRequest();
        } else{
          xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function(){
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById('selecioneNomeMedico').innerHTML = this.responseText;
          }
        }
          xmlhttp.open("GET","mostrar_dados_select2.php?value="+selecione_Especialidade, true);
          xmlhttp.send();

      /* if (window.XMLHttpRequest) {
          xmlhttp1 = new XMLHttpRequest();
        } else{
          xmlhttp1 = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp1.onreadystatechange = function(){
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById('selecioneHorario').innerHTML = this.responseText;
          }
        }
          xmlhttp1.open("GET","mostrar_dados_select.php?value="+selecione_Especialidade, true);
          xmlhttp1.send();*/
      }


 function selecione1(){
    const especialidade = inputselecioneEspecialidade.value;
    const inputdataConsulta = document.getElementById("data_horario");
    const horario= inputdataConsulta.value;

  
       //alert(horario+"  "+especialidade);

    if (window.XMLHttpRequest) {
          xmlhttp1 = new XMLHttpRequest();
        } else{
          xmlhttp1 = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp1.onreadystatechange = function(){
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById('selecioneHorario').innerHTML = this.responseText;
          }
        }
          xmlhttp1.open("GET","mostrar_dados_select3.php?data="+horario+"&value="+especialidade, true);
          xmlhttp1.send();

//---------------------------------------------------------------------------//
            // Obtém o valor do campo de entrada
            var valorData = document.getElementById("data_horario").value;

            // Cria um objeto Date com base no valor fornecido
            var data = new Date(valorData);

            // Array para armazenar os nomes dos dias da semana
            var diasSemana = ["Domingo", "Segunda-feira", "Terça-feira", "Quarta-feira", "Quinta-feira", "Sexta-feira", "Sábado"];

            // Obtém o índice do dia da semana (0 para Domingo, 1 para Segunda-feira, etc.)
            var indiceDiaSemana = data.getDay();

            // Obtém o nome do dia da semana usando o índice obtido
            var nomeDiaSemana = diasSemana[indiceDiaSemana];


    if (nomeDiaSemana === "Domingo" || nomeDiaSemana === "Sábado") {
      alert("Segundas-feiras e Sábados estão desabilitados!");
      //inputdataConsulta.value = "";
    }
            // Exibe o nome do dia da semana
           // alert("O dia selecionado é " + nomeDiaSemana);
            $("#mostra_nome_dia").val(nomeDiaSemana);
           
            switch (nomeDiaSemana){
            case "Segunda-feira":
              
              data.setDate(data.getDate() - 1);
              
              
              break;

               case "Terça-feira":
               
              data.setDate(data.getDate() - 2);

              break;

               case "Quarta-feira":
              data.setDate(data.getDate() - 3);
              
              break;

               case "Quinta-feira":
              data.setDate(data.getDate() - 4);
              
              break;

               case "Sexta-feira":
              data.setDate(data.getDate() - 5);
              
              break;

            default:
              alert("Não é possivel seleccionar Sábados e Domingos!");
            }
            let dd = String( data.getDate()).padStart(2, '0');
              let mm = String(data.getMonth() + 1).padStart(2, '0') ;
              let yy = data.getFullYear();
              data = `${yy}-${mm}-${dd}`;
             $("#mostra_nome_dia_actual").val(data);
            
  <?php 
            $result_pesq = "SELECT * FROM agendamento_medico ";
            
            $resultado_pesquisa = mysqli_query($mysqli, $result_pesq);

      
      
      while ($rows_pesquisar = mysqli_fetch_array($resultado_pesquisa)) {
            
            if ( $rows_pesquisar["especialidade"]) {

         echo $rows_pesquisar["dias_da_semana"];
            }
           
          }
        
      

    ?>

    
      var select = document.getElementById("meuSelect");
      var mensagem = document.getElementById("mensagem");

      if (select.options.length === 0) {
        mensagem.textContent = "O select está vazio!";
        mensagem.style.color = "red";
      } else {
        mensagem.textContent = "O select tem opções disponíveis.";
        mensagem.style.color = "green";
      }
    
        
        }
    
    </script>
      
        <div class="col-md-4 form-group mt-3 mt-md-0">
              <span>Nome Médico</span>(<span style="color: red">*</span>)
              
              <div class="has-validation" id="selecioneNomeMedico">
            
                <select class="form-select" name="nome_medico" required>
                    <option>Nome do Médico</option>
                  
                </select>
              <div class="invalid-feedback">Por favor digite o Título da Consulta!</div>
             </div>
            </div>

            
          </div>

          <div class="row">


             <div class="col-md-4 form-group mt-3 mt-md-0" hidden="">
              <br>
              <br>

              <input type="color" class="form-control" name="color" id="color" placeholder="Selecione a cor" value="#b7a108" >
              <div class="validate"></div>
              <div class="invalid-feedback">Por favor selecione a cor!</div>
            </div>

 <?php 
   

    ?>
            <div class="col-md-4 form-group mt-4" >
                <span>Data Consulta  </span>(<span style="color: red">*</span>)
                 
                 <div id="mostrar_data_horario"  style="opacity: 0;">
                    <script type="text/javascript" src="dias_da_semana.js"></script>
                        <input type="date" min="<?php echo date("Y-m-d");?>" max="<?php echo date("Y-m-d", strtotime("+30 days", strtotime(date("Y-m-d"))));?>"  class="form-control" id="data_horario" name="data_horario" placeholder="Digite a Data"  required  onchange = "selecione1();">
       <?php  

          
            $mostra_especialidade = '<input hidden type="text" id="especialidade_da_funcao" >';
               echo $mostra_especialidade;
          

$sql_mostra_dias =  "SELECT * FROM agendamento_medico WHERE especialidade = '$mostra_especialidade' ";
          $result_mostra_dias = mysqli_query($mysqli5, $sql_mostra_dias);

if($result_mostra_dias && $result_mostra_dias->num_rows > 0) {
            $row5 = $result_mostra_dias->fetch_assoc();
                        
                 ?>
                 <select >
                   <option  value="<?php echo $row5['dias_da_semana']; ?>" ><?php echo $row5['dias_da_semana'];?></option>
                  </select>
                 <?php

      
}
// Fechar conexão
      $mysqli5->close();  ?> 

              
                              <div class="validate"></div>
                              <div class="invalid-feedback">Por favor digite a Data!</div>
                </div>
            </div>

            

            <div class="col-md-4 form-group mt-4">
              <span for="meuSelect">Horários Disponíveis  </span>(<span style="color: red">*</span>)
                
                
         <div class="has-validation" id="selecioneHorario" class="col-md-4 form-group mt-4">
           <div id="mostrar_data_horario"  style="opacity: 0;">
       
          <div class="horarios-container" class="col-md-4 form-group mt-4">
              <p>Selecione o horário desejado:</p>
              
              <div class="grade-horarios">

              </div>
          </div>

                
              <div class="invalid-feedback">Horario vazio ou todos já estão ocupados nesse dia!</div>
            </div> 
          </div> 
         
             <br>
         
             <br>
      
      <p id="mensagem"></p>

             <div class="alert alert-warning alert-dismissible fade show" role="alert" hidden>
                <i class="bi bi-exclamation-triangle me-1"></i>
                Todos Já Ocupados! Tente num outro dia.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
      

      
          </div>
                          <div class=" col-md-4 form-group mt-4">
                              <span> Observações  </span>
                             <textarea class="form-control" name="obs" id="obs" rows="1" placeholder="Observações (Opcional)"></textarea>
                             <!--<input type="text" name="" id="mostra_nome_dia" >-->
                             <input hidden type="date" name="dia" id="mostra_nome_dia_actual" >
                          
                              <div class="validate"></div>
                          </div>

              
                       <div hidden="" class=" col-md-4 form-group mt-3 ms-0">
                            <br>  <input style="color: blue" type="text" class="form-control" name="estado" id="estado" placeholder="Selecione o estado" value="Agendado" >
                      <div class="validate"></div>
                          </div>

      </div>
         
    <div class="btn-acao">
   
     <a href="novo_painel_utente_boas_vindas.php"><div class="action-card_cancelar">
            <span class="fw-bold">Cancelar</span>
        </div>
      </a>
      <input  type="submit" id="button" class="action-card_submit" value="Marcar Consulta" name="button"/>
          <br>
        </div>

        </form>

    </div>

  <!--FORM -->

        </div>
     </div>
     
       
 <!-- Tabela de Consultas -->
        <div class="table-container">
            <div class="table-responsive" >
                <table class="table align-middle table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Nº Processo</th>
                            <th scope="col">Médico</th>
                            <th scope="col">Especialidade</th>
                            <th scope="col">Data</th>
                            <th scope="col">Hora</th>
                            <th scope="col">Estado</th>
                        </tr>
                    </thead>
                    <tbody>
              <?php
              
  $result_pesq = "SELECT * FROM consultas_agendadas  ORDER BY id DESC LIMIT 1";
    $resultado_pesquisa = mysqli_query($mysqli, $result_pesq);
   
          
        while($rows_pesquisar = mysqli_fetch_array($resultado_pesquisa)){
           
      
      ?>             
                        <tr>
                                    <td hidden="">Nº Doc: <?php echo $rows_pesquisar['id']; ?></td>
                    
                    <td><?php echo $rows_pesquisar['id']; ?></td>
                    <td><?php echo $rows_pesquisar['nome_medico']; ?></td>
                    <td><?php echo $rows_pesquisar['especialidade']; ?></td>
                    <td><?php echo $rows_pesquisar['data_horario']; ?></td>
                    <td><?php echo $rows_pesquisar['horario']; ?></td>
                     
                      <?php if ($rows_pesquisar['estado'] == 'Confirmada'){

                       ?>
                      <td><div class="badge-status-confirmada"><?php echo $rows_pesquisar['estado']; ?></div></td>  
                      <?php }else if ($rows_pesquisar['estado'] == 'Agendado'){

                       ?>
                      <td><div class="badge-status-agendado"><?php echo $rows_pesquisar['estado']; ?></div></td>  
                      <?php }else if ($rows_pesquisar['estado'] == 'Atendido'){

                       ?>
                      <td><div class="badge-status-atendido"><?php echo $rows_pesquisar['estado']; ?></div></td>  
                      <?php }else if ($rows_pesquisar['estado'] == 'Desmarcada'){

                       ?>
                       <td><div  class="badge-status-desmarcada"><?php echo $rows_pesquisar['estado']; ?></div></td>  
                      <?php } ?>
                      
                     <td>

                    
    </td>
  </tr>
<?php
     
    
      }
      ?>
<?php

include("consultas_canceladas.php");

  ?>
                        </tr>
                     
                    </tbody>
                </table>
            </div>
            <h5 class="mt-4 fw-bold">Consultas Agendadas</h5>
        </div>

               </div>  
        </div>  
      </section>

  </main>



  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    
  
  </footer><!-- End Footer -->

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

<?php
include("marcacao_utente_consulta.php");
include ("Mensagens sweetAlerts/links_mensagens_sweetAlerts.php");
?>

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
          
                <a class="btn btn-secondary" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="width: 150px; height: 35px; border-radius: 0px; float: left;" href="novo_painel_utente_boas_vindas.php">Não</a>
            </div>
          
        </div>

         </div>
        </div>
       </div>
      </div>
        <!---FIM MODAL PARA SAIR -->



        <!---INICIO MODAL PARA meu_perfil -->

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

$result_pesq = "SELECT * FROM utente";
            $resultado_pesquisa = mysqli_query($mysqli, $result_pesq);
    
        while ($rows_pesquisar = mysqli_fetch_array($resultado_pesquisa)) {
          if ($rows_pesquisar['nome_utente'] == $nome_utente) {
          
        ?>

                <div style="margin: 10px 40%">
                <h1 class="bi-person-circle" ></h1></div>
                <hr>
                
                 <span hidden="">Nº Doc: <?php echo $rows_pesquisar['id']; ?></span><br>
                 <span>Nome: <?php echo $rows_pesquisar['nome_utente']; ?></span><br>    
                 <span>Email: <?php echo $rows_pesquisar['email']; ?></span><br>    
                 <span>BI: <?php echo $rows_pesquisar['BI']; ?></span><br>    
                 <span>Telefone: <?php echo $rows_pesquisar['telefone']; ?></span><br>    
                 <span>Endereço: <?php echo $rows_pesquisar['endereco']; ?></span><br>
                        <hr>
                        <br>
              <?php

           $id = encryptor('encrypt', $rows_pesquisar['id']); 
            ?>
            <div class='container'>
               <a  href="novo_painel_editar_perfil_utente.php?id=<?php echo $id; ?>" id="button"  class="action-card_editar" >Editar</a>
          </div>
        <?php
          }

       }

    ?>            
            
      </div>

                    </div>
                    </div>
                </div>
              </div>
        <!---FIM MODAL PARA meu_perfil -->

