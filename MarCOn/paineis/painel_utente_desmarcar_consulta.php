<?php
require("../configs/conexao.php");
require("config_encript_decrypt_url.php");

include("marcacao_utente_consulta.php");
include ("Mensagens sweetAlerts/links_mensagens_sweetAlerts.php");

session_start();
require("../configs/protecao.php");
protegerUser();

if(isset($_GET["action"]) AND $_GET["action"] == "sair"){
    session_destroy();
    header("Location: ../");
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
        
              <li class="nav-item d-block d-md-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->
                
          
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
  width: 100%;height: 20%; color: #000;  margin-top: 20px">
               <h3>Desmarcação Consulta</h3>
             </div>
          <div class="card_corpo" style="display: inline-flex; margin-top: 20px">
          
           <div class="botao_boas_vindas">
              <a class="btn btn-primary" href="painel_cadastro_utente_boas_vindas.php">Voltar</a>

            </div>

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" class="pesquisar" method="GET" action="painel_utente_desmarcar_consulta">
        <input type="date" name="pesquisar" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div>
    
    <span hidden=""><?php $pesquisar = $_GET['pesquisar'];?></span>
<?php
  
    $result_pesq = "SELECT * FROM tabela_eventos_calendario";
    $resultado_pesquisa = mysqli_query($mysqli, $result_pesq);
   
    $result_pesq = "SELECT * FROM tabela_eventos_calendario WHERE data_horario LIKE '%$pesquisar%' ORDER BY data_horario ASC";
    $resultado_pesquisa = mysqli_query($mysqli, $result_pesq);
    ?>

    <!-- End Search Bar -->

          </div>
            <div class="resultado">
      <?php
      
    ?>
    <br>

    <div class="card" style="border: none;">
        <div class="card-body">
              <!-- Dark Table -->
          <div class="table-responsive">
              <table class="table table-striped table-bordered table-hover" style="width: 100%/*border: 0.5px solid #127;*/">
                <caption>Desmarcar Consultas</caption>
                <thead>
                  <tr>
                    <th scope="col">Nº Processo</th>
                    <th scope="col">Médico</th>
                    <th scope="col">Especialidade</th>
                    <th scope="col">Data</th>
                    <th scope="col">Hora</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Desmarcar</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
          
          if ($resultado_pesquisa->num_rows > 0) {
           
        while($rows_pesquisar = mysqli_fetch_array($resultado_pesquisa)){
           $data_actual = date("Y-m-d");
      
        if ($rows_pesquisar['nome_utente'] == $nome_utente && $rows_pesquisar['data_horario'] >= $data_actual && $rows_pesquisar['estado'] != "consulta_desmarcada"){

      ?>
                    
                    <td hidden="">Nº Doc: <?php echo $rows_pesquisar['id']; ?></td>
                    
                    <td><?php echo $rows_pesquisar['id']; ?></td>
                    <td><?php echo $rows_pesquisar['nome_medico']; ?></td>
                    <td><?php echo $rows_pesquisar['especialidade']; ?></td>
                    <td><?php echo $rows_pesquisar['data_horario']; ?></td>
                    <td><?php echo $rows_pesquisar['horario']; ?></td>
                     
                      <?php if ($rows_pesquisar['estado'] == 'Confirmada'){

                       ?>
                      <td><div style="color: white;background: blue; height: 20px; width: 100px; text-align: center; "><?php echo $rows_pesquisar['estado']; ?></div></td>  
                      <?php }else if ($rows_pesquisar['estado'] == 'Agendado'){

                       ?>
                      <td><div style="color: black;background: #ffe000; height: 20px; width: 100px; text-align: center; "><?php echo $rows_pesquisar['estado']; ?></div></td>  
                      <?php }else if ($rows_pesquisar['estado'] == 'Atendido'){

                       ?>
                      <td><div style="color: white;background: green; height: 20px; width: 100px; text-align: center; "><?php echo $rows_pesquisar['estado']; ?></div></td>  
                      <?php }else if ($rows_pesquisar['estado'] == 'Desmarcada'){

                       ?>
                      <td><div style="background: gray; height: 20px; width: 100px; text-align: center; "><?php echo $rows_pesquisar['estado']; ?></div></td>  
                      <?php } ?>
                      
                     <td>
                      <div class="botao_boas_vindas" style="border-radius: 50%; position: relative;">       
                        <?php

$id = $rows_pesquisar['id'];

$select = $mysqli->query("SELECT * FROM tabela_eventos_calendario WHERE id='$id' AND estado ='Desmarcada' ");
        if($select){
        $row = $select->num_rows;
        if($row > 0){
            
            $id_elimina = encryptor('encrypt', $rows_pesquisar['id']);
      ?>
                  
  <a type="button" class="bi bi-trash" href="remover.php?id=<?php echo $id_elimina; ?>" style="border-radius: 5%; display: inline-flex;    align-items: center;justify-content: center; background: #fff; color: red;border: 1px solid red; width: 30px; height: 30px" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Remover Consulta"></a>

      <?php
        }else{

        }
     }else{

?>
<?php

     }
  ?>
          <?php

$id = $rows_pesquisar['id'];

$select = $mysqli->query("SELECT * FROM tabela_eventos_calendario WHERE id='$id' AND estado ='Atendido'");
        if($select){
        $row = $select->num_rows;
        if($row > 0){
            
           $id_pdf = encryptor('encrypt', $rows_pesquisar['id']);  
      ?>
                  
  <a type="button" class="bi bi-file-pdf" href="gera_pdf.php?id=<?php echo $id_pdf; ?>" style="border-radius: 5%; display: inline-flex; border: 1px solid #000;    align-items: center;justify-content: center; background: darkgray; color: #000; width: 30px; height: 30px" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Gerar PDF"></a>

      <?php
        }else{

        }
     }else{


     }
  
?>


      <?php

$id = $rows_pesquisar['id'];

$select = $mysqli->query("SELECT * FROM tabela_eventos_calendario WHERE id='$id' AND estado ='Agendado'");
        if($select){
        $row = $select->num_rows;
        if($row > 0){
          
           $id_agendado = encryptor('encrypt', $rows_pesquisar['id']);  
      ?>
                  
  <a type="button" class="bi bi-calendar-x"  href ="painel_confirmar_desmarcacao.php?id=<?php echo $id_agendado; ?>" style="border-radius: 5%; display: inline-flex; align-items: center;justify-content: center; background: rgb(188, 48, 48); color: #fff; width: 30px; height: 30px" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Desmarcar Consulta"></a>
      <?php
        }else{

        }
     }else{

?>
<?php

     }
  ?>
<?php

$id = $rows_pesquisar['id'];

$select = $mysqli->query("SELECT * FROM tabela_eventos_calendario WHERE id='$id' AND estado ='Confirmada'");
        if($select){
        $row = $select->num_rows;
        if($row > 0){
            

           $id_comfirmada = encryptor('encrypt', $rows_pesquisar['id']);  
   
      ?>
                  
  <a type="button" class="bi bi-calendar-x"   href ="painel_confirmar_desmarcacao.php?id=<?php echo $id_comfirmada; ?>" style="border-radius: 5%; display: inline-flex;    align-items: center;justify-content: center; background: rgb(188, 48, 48); color: #fff; width: 30px; height: 30px" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Desmarcar Consulta"></a>
      <?php
        }else{

        }
     }else{

     }

?>


                  </div>

              </td>                 
           </tr>
<?php
     
    }else{
    }
      }
    }
      ?>
<?php

include("consultas_canceladas.php");

  ?>
                </tbody>

              </table>
          </div><!-- End Dark Table -->

           </div>
          </div>
            </div>
          </div>
      
      <div style="clear:both;"></div>
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
  
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html