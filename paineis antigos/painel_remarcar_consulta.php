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
               <h3>Remarcação De Consultas</h3>
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
      <form action="atualiza_estado_remarcado.php" method="POST">

    <div class="row">
      <input hidden="" type="" name="id" value="<?php echo $id; ?>">
          <div class="col-md-4 form-group mt-3 mt-md-0">
             <label>Nome Médico  </label>(<span style="color: red">*</span>)

              <div class="input-group has-validation" id="selecioneNomeMedico">
                <select disabled class="form-select" name="nome_medico" required>
                    <option  value="<?php echo $rows_pesquisar['nome_medico']; ?>"><?php echo $rows_pesquisar['nome_medico']; ?></option>
                  
                </select>

               <div class="invalid-feedback">Por favor Selecione o nome utente!</div>
            </div>
          </div>

         <div class="col-md-4 form-group mt-3 mt-md-0">
              <label>Especialidade  </label>(<span style="color: red">*</span>)
                 
                 <div class="input-group has-validation">  
                   <select disabled id="selecioneEspecialidade" name="especialidade" class="form-select" onchange="selecione();" required>
                    
                   <option  value="<?php echo $rows_pesquisar['especialidade']; ?>"><?php echo $rows_pesquisar['especialidade']; ?></option>
                           
                   </select>
                <div class="validate"></div>
                 <div class="invalid-feedback">Por favor selecione a especialidade!</div>
             </div>
          </div>

   

          <div class="col-md-4 form-group mt-3 mt-md-0">
             <label>Data Consulta  </label>(<span style="color: red">*</span>)
             
      

                <!-- <script type="text/javascript" src="dias_da_semana.js"></script>--->
                <input type="date" min="<?php echo date("Y-m-d");?>" class="form-control" id="data_horario" name="data_horario" placeholder="Digite a Data" required value="<?php echo $rows_pesquisar['data_horario']; ?>"  onchange = "selecione1();">
                
            <div class="validate"></div>
            <div class="invalid-feedback">Por favor digite a Data!</div>
          </div>
        
        <div class="row">

           
         <div class="col-md-4 form-group mt-3 mt-md-0">
              <label>Horários Disponíveis  </label>(<span style="color: red">*</span>)
                
                <div class="input-group has-validation" id="selecioneHorario">
            
                <select class="form-select" name="horario" required>
                    <option value="<?php echo $rows_pesquisar['horario']; ?>">Nome o Horário Disponível</option>
                  
                </select>
              <div class="invalid-feedback">Por favor digite o Título da Consulta!</div>
             </div>
     <?php/*
        $result_pesq = "SELECT * FROM medico";
    $resultado_pesquisa4 = mysqli_query($mysqli, $result_pesq);
    
      
          while($rows_pesquisar4 = mysqli_fetch_array($resultado_pesquisa4)){
            if ($rows_pesquisar4[''] != "") {
        }
        }*/
       ?> 
             
    
                  
             <br>
           

             <div class="alert alert-warning alert-dismissible fade show" role="alert" hidden>
                <i class="bi bi-exclamation-triangle me-1"></i>
                Todos Já Ocupados! Tente num outro dia.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
      

      
          </div>
      
            <div class='container'>
               <button id="button" type="submit"  class="btn btn-#ffe000 w-25" style="border-radius: 0px; float: right;background: #ffe000" >Remarcar</button> 
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
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
 <script>
  const inputselecioneEspecialidade = document.getElementById("selecioneEspecialidade"); 
   
      function selecione(){
       const selecione_Especialidade = inputselecioneEspecialidade.value;
      
//      var str = this.value;
        document.getElementById('mostra_especialidade').innerHTML =selecione_Especialidade;

    //    alert(selecione_Especialidade);
        
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

            // Exibe o nome do dia da semana
           // alert("O dia selecionado é " + nomeDiaSemana);
            $("#mostra_nome_dia").text(nomeDiaSemana);
    
  <?php 
            $result_pesq = "SELECT * FROM agendamento_medico ";
            
            $resultado_pesquisa = mysqli_query($mysqli, $result_pesq);

      
      
      while ($rows_pesquisar = mysqli_fetch_array($resultado_pesquisa)) {
            
            if ( $rows_pesquisar["especialidade"]) {

         echo $rows_pesquisar["dias_da_semana"];
            }
           
          }
        
      

    ?>


        
        }
    
    </script>
</body>

</html>