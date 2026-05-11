<?php
require("../configs/conexao.php");
include("marcacao_utente_consulta.php");
session_start();
require("../configs/protecao.php");
protegerUser();

if(isset($_GET["action"]) AND $_GET["action"] == "sair"){
    session_destroy();
    header("Location: ../");
  }

 $result_events = "SELECT id, nome_utente, especialidade, nome_medico, color, data_horario, horario FROM consultas_agendadas";
  $resultado_events = mysqli_query($mysqli, $result_events);

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
    <script src='script.js'></script>
    <script src='jquery-3.5.1.js'></script>

    <style>
        :root {
            --bs-success-rgb: 71, 222, 152 !important;
        }

        html,
        body {
            height: 100%;
            width: 100%;
          
        }

        .btn-info.text-light:hover,
        .btn-info.text-light:focus {
            background: #000;
        }
        table, tbody, td, tfoot, th, thead, tr {
            border-color: #ededed !important;
            border-style: 5px solid #000;
            border-width: 1px !important;
        }
        .title{
            font-size: 30px;
        }
    </style>

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
      
    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">


    <section class="section dashboard">
      <div class="card">
            <div class="card-body">     

             <div class="boas_vindas" style="padding: 10px; background: darkgray;
  width: 100%;height: 20%; color: #000; margin-top: 20px">
               <h3>Calendário de consultas marcadas</h3>
             </div>

              <a class="btn btn-primary" style="width: 150px; height: 35px; border-radius: 0px;" href="painel_cadastro_utente_boas_vindas.php">Voltar</a>

          <div class="card_corpo" style="display: inline-flex; margin-top: 20px; margin-left: 20px">
          
           <div class="botao_boas_vindas">
              
              <label>Agendada <div style="width: 65px; border-radius: 2px; height: 10px; background: #b7a108;"></div></label>
              <label> | Confirmada <div style="width: 65px; border-radius: 2px; height: 10px; margin-left: 10px; background: #6e6ef0"></div></label>
              <label> | Atendida <div style="width: 65px; border-radius: 2px; height: 10px; margin-left: 5px; background:green"></div></label>
              <label> | Desmarcada <div style="width: 65px; border-radius: 2px; height: 10px; margin-left: 12px; background: #939292"></div></label>

            </div>

            </div>

             <br>
          <div class="card-body">
              <div class="modal fade" id="Modal_Calendario" tabindex="-1" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Visualizar Consulta</h5>
                      <button type="button"  class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                  <label><strong> Especialidade:  </strong></label><span id="visualizar_dados_especialidade"> </span>      <br>      
                  <label><strong> Data Consulta:  </strong></label><span id="visualizar_dados_data_horario"> </span>     <br>
                      <br>  
                   <!--- <form>

                      <div>
                      <textarea style="width: 100%" placeholder="Justufique a sua Desmarcação"></textarea>
                              <?php/*
      $result_pesq = "SELECT * FROM consultas_agendadas";
            $resultado_pesquisa = mysqli_query($mysqli, $result_pesq);

        while ($rows_pesquisar = mysqli_fetch_array($resultado_pesquisa)) {

              if ($rows_pesquisar['nome_utente'] == $nome_utente){
        */?>
        
         <label>Nome Medico: '<?php/* echo $rows_pesquisar['nome_medico']*/?>'</label>
         <label>Data : '<?php/* echo $rows_pesquisar['data_horario']*/?>'</label>
         <label>Hora : '<?/*php echo $rows_pesquisar['horario']*/?>'</label>
          <br>
          <br>
      
        
        <?php/*
        }else{

        }
        }*/
        ?>

                      </div>

                      <button type="submit" id="" class="btn btn-danger w-100">Desmarcar</button>
                    </form>--->

                    </div>
                  </div>
                </div>
              </div>
          </div>

          <?php
/*            while ($row_events = mysqli_fetch_array($resultado_events)) {
              ?>
              {
                id:'<?php echo $row_events['id'];?>',
                Nome_utente:'<?php echo $row_events['nome_utente'];?>',
                nome_medico_e_especialista:'<?php echo $row_events['nome_medico_e_especialista'];?>',
                title:'<?php echo $row_events['title'];?>',
                color:'<?php echo $row_events['color'];?>', 
                data_horario:'<?php echo $row_events['data_horario'];?>', 
                horario:'<?php echo $row_events['horario'];?>', 
              },

              <?php
            }
*/
          ?>
 <?php

$result_pesq = "SELECT * FROM consultas_agendadas";
            $resultado_pesquisa = mysqli_query($mysqli, $result_pesq);
    ?>

  <script>
       
  document.addEventListener('DOMContentLoaded', function() {
   var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {

      headerToolbar: {
        left: 'today',
        center: 'title',
        right: 'dayGridMonth'
      },
      locales:'pt-Pt',
      editable: true,
      eventLimit:true,
      extraParams:function(){
        return {
          cachebuster:new Date().valueOf()
        };
      },

      eventClick:function(info){  
          info.jsEvents.preventDefault();
          $('#id').text(info.event.id);
      },

      selectable: true,
      select: function(info){ 
        //alert('Inicio do Evento ' + info.start.toLocaleString());
      //  $('#Modal_Calendario').modal('show');
      },


      eventClick: function(info) {
            // Abre o modal com os detalhes do evento
       //   if (confirm('Are you sure you want to delete this event?')) {
        //alert('Inicio do Evento ' + info.event.id.toLocaleString());
         
          
      //  }
         $('#visualizar_dados_especialidade').html(info.event.title);     
         $('#visualizar_dados_data_horario').html(info.event.id); 
         $('#visualizar_dados_nome_medico').html(info.event.end); 
        $('#Modal_Calendario').modal('show');
      
    },

  

<?php $data = date("d-m-y");?>
      Date: <?php echo "".$data.""; ?>,
      navLinks: true, // can click day/week names to navigate views
      selectMirror: true,
      editable: true,
      dayMaxEvents: true, // allow "more" link when too many events
      

      events:[
        <?php
        while ($rows_pesquisar = mysqli_fetch_array($resultado_pesquisa)) {

              if ($rows_pesquisar['nome_utente'] == $nome_utente && $rows_pesquisar['estado'] != "consulta_desmarcada"){
                $horario = '<br><strong>Horario Consulta: </strong>';
                $nome_medico = '<br><strong>Nome Médico: </strong>';
        ?>
        {
          
          title: '<?php echo $rows_pesquisar['especialidade']?>',
          id: '<?php echo $rows_pesquisar['data_horario']?> <?php echo $horario ?> <?php echo $rows_pesquisar['horario']?> <?php echo $nome_medico ?> <?php echo $rows_pesquisar['nome_medico']?>',
          start: '<?php echo $rows_pesquisar['data_horario']?>',
          end: '<?php echo $rows_pesquisar['nome_medico']?>',
          color: '<?php echo $rows_pesquisar['color']?>',
          textColor: 'black'
      },
        
        <?php
        }else{

        }
        }
        ?>
        
      ] 
 });

    calendar.render();
  });

</script>
    <div class="card" style="border: none;">
       <div class="card-body" style="margin-left: -30px;">
    <div id="calendar" style="width: 40%; border: 2px solid #000; border-radius: 5px"></div>
         
  
       </div>
     </div>
        </div>
        </div>
        </div>
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
  
<!--  
    <script src="script.js"></script>
    <script>
        var scheds = $.parseJSON('<?=/*json_encode*/($result_pesq) ?>')
    </script>

 Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>