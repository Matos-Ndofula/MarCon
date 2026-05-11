<?php
require("../configs/conexao.php");
require("config_encript_decrypt_url.php");

include("cadastro_questao.php");

session_start();
require("../configs/protecao.php");
protegerFuncionario();

if(isset($_GET["action"]) AND $_GET["action"] == "sair"){
    session_destroy();
    header("Location: ../login_Admin.php");
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Painel Administrador</title>
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

<!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="painel_cadastro_funcionario_Home.php">
          <span style="margin: 0px auto"><i class="bi bi-house"></i>Home</span>
        </a>
      </li><!-- End Home Nav -->


      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="">
          <i class="bi bi-journal-text"></i><span>Cadastro</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          
          <li>
            <a href="painel_cadastro_medico.php">
              <i class="bi bi-circle"></i><span>Cadastro Médico</span>
            </a>
          </li>
          
          <li>
            <a href="#" data-bs-toggle="modal" data-bs-target="#questoes">
              <i class="bi bi-circle"></i><span>Cadastro Questões</span>
            </a>
          </li>
          
          
        </ul>
      </li><!-- End Forms Nav -->

            
      <li class="nav-item" style="margin-top: 300px;">
       <hr>
        <a class="nav-link collapsed" data-bs-toggle="modal" data-bs-target="#Pergunta_Sair">
         <i class="bi bi-box-arrow-right"></i>
          <span>Sair</span>
        </a>
       <hr>

      </li>
      

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">


    <section class="section dashboard">
    <div class="card" style="background: transparent; border: 1px solid transparent">
            <div class="card-body">     

             <div class="boas_vindas" style="padding: 10px; background: transparent;
  width: 100%;height: 20%; color: #000; margin-top: 0px">
    <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-3 col-md-3" >
            <br>
                  <div class="card info-card sales-card" class="hover_card_totais" style="height: 100px; background: #fff; border-top: 25px solid #0d6efd;
                  ">


                        <?php 
          $sql = "SELECT COUNT(*) AS total_usuarios FROM utente";
          
          $result = mysqli_query($mysqli3, $sql);

            if($result && $result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $totalUsuarios = $row["total_usuarios"];
                
                ?>
                          <div class="filter" style="background: #0d6efd; border-radius: 50%; height: 40px; margin-right: 20px; margin-top: -5px; justify-content: center;align-items: center;">
                                  <div style="margin-left: 20px; margin-top: 10px; color: black;">
                                  <i class="bi bi-person-circle"></i>
                                  <a class="icon" href="#" data-bs-toggle="dropdown"><span class="badge badge-number" class=" color-black" ><?php echo $totalUsuarios;?></span></a>
                     
                                  
                                </div>
                          </div>

        <div  style="margin-left: 20px; height: 80px">
             <br>
             <strong><p>Total Utentes</p></strong>
            
        </div>
<?php
           } else {
                echo "Nenhum usuário encontrado.";
            }

      // Fechar conexão
      $mysqli3->close();
?>
                   </div>
            </div><!-- End Sales Card -->

            <!-- Sales Card -->
            <div class="col-xxl-3 col-md-3" >
            <br>
                <div class="card info-card sales-card" class="hover_card_totais" style="height: 100px; background: #fff; border-top: 25px solid #20c997 ">


                        <?php 
          $sql = "SELECT COUNT(especialidade) AS total_servicos FROM medico";
          
          $result = mysqli_query($mysqli, $sql);

            if($result && $result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $totalServicos = $row["total_servicos"];
                
                  ?>
                      <div class="filter" style="background: #267961; border-radius: 50%; height: 40px; margin-right: 20px; margin-top: -5px; justify-content: center;align-items: center;">
                                  <div style="margin-left: 20px; margin-top: 10px">
                                  <i class="bi bi-person-circle"></i>
                                  <a class="icon" href="#" data-bs-toggle="dropdown"><span class="badge badge-number"><?php echo $totalServicos;?></span></a>
               
                            
                               </div>
                          </div>


        <div  style="margin-left: 20px; height: 80px">
             <br>
               <strong><p>Total Serviços </p></strong>
        </div>
<?php
           } else {
                echo "Nenhum usuário encontrado.";
            }

      // Fechar conexão
      $mysqli->close();
?>
                   </div>
            </div><!-- End Sales Card -->
                      
            <!-- Sales Card -->
            <div class="col-xxl-3 col-md-3">
            <br>
                  <div class="card info-card sales-card" class="hover_card_totais" style="height: 100px; background: #fff; border-top: 25px solid #ffc107">


                        <?php 
         $sql1 = "SELECT COUNT(*) AS total_medicos FROM medico";
          
          $result1 = mysqli_query($mysqli1, $sql1);

            if($result1 && $result1->num_rows > 0) {
                $row1 = $result1->fetch_assoc();
                $totalMedicos = $row1["total_medicos"];
                
                ?>
                           
                      <div class="filter" style="background: #866c1e; border-radius: 50%; height: 40px; margin-right: 20px; margin-top: -5px; justify-content: center;align-items: center;">
                                  <div style="margin-left: 20px; margin-top: 10px">
                                  <i class="bi bi-person-circle"></i>
                                  <a class="icon" href="#" data-bs-toggle="dropdown"><span class="badge badge-number"><?php echo $totalMedicos;?></span></a>
               
                            
                                </div>
                          </div>

        <div  style="margin-left: 20px; height: 80px">
             <br>
             <strong><p>Total Médicos</p></strong>
              
        </div>
<?php
           } else {
                echo "Nenhum usuário encontrado.";
            }

      // Fechar conexão
      $mysqli1->close();
?>
                   </div>
            </div><!-- End Sales Card -->
          
            <!-- Sales Card -->
            <div class="col-xxl-3 col-md-3">
            <br>
                  <div class="card info-card sales-card" class="hover_card_totais" style="height: 100px; background: #fff; border-top: 25px solid #dc3545;">


                        <?php 
         
          $sql2 =  "SELECT COUNT(*) AS total_funcionarios FROM Admin";
          $result2 = mysqli_query($mysqli2, $sql2);

            if($result2 && $result2->num_rows > 0) {
                $row2 = $result2->fetch_assoc();
                $totalFuncionarios = $row2["total_funcionarios"];
                
                ?> 
                      <div class="filter" style="background: #842932; border-radius: 50%; height: 40px; margin-right: 20px; margin-top: -5px; justify-content: center;align-items: center;">
                                  <div style="margin-left: 20px; margin-top: 10px">
                                  <i class="bi bi-person-circle"></i>
                                  <a class="icon" href="#" data-bs-toggle="dropdown"><span class="badge badge-number"><?php echo $totalFuncionarios;?></span></a>
               
                                  </div>
                                  
                          </div>

         <div  style="margin-left: 20px; height: 80px">
             <br>
             <strong><p>Admin </p></strong>
        </div>

<?php
           } else {
                echo "Nenhum usuário encontrado.";
            }

      // Fechar conexão
      $mysqli2->close();
?>
                   </div>
            </div><!-- End Sales Card -->
          </div>



        </div>

            
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-3 col-md-3">
            <br>
                  <div class="card info-card sales-card" class="hover_card_totais" style="height: 100px; background: #fff; border-top: 25px solid #2a8fa6;">


                        <?php 
         
          $sql2 =  "SELECT COUNT(*) AS consultas_agendadas FROM consultas_agendadas";
          $result2 = mysqli_query($mysqli4, $sql2);

            if($result2 && $result2->num_rows > 0) {
                $row2 = $result2->fetch_assoc();
                $consultas_agendadas = $row2["consultas_agendadas"];
                
                ?> 
                      <div class="filter" style="background: #2a8fa6; border-radius: 50%; height: 40px; margin-right: 20px; margin-top: -5px; justify-content: center;align-items: center;">
                                  <div style="margin-left: 20px; margin-top: 10px">
                                  <i class="bi bi-person-circle"></i>
                                  <a class="icon" href="#" data-bs-toggle="dropdown"><span class="badge badge-number"><?php echo $consultas_agendadas;?></span></a>
               
                                  </div>
                                  
                          </div>

         <div  style="margin-left: 20px; height: 80px">
             <br>
             <strong><p>Consultas agendadas </p></strong>
        </div>

<?php
           } else {
                echo "Nenhum usuário encontrado.";
            }

?>
                   </div>
            </div><!-- End Sales Card -->

            <!-- Sales Card -->
            <div class="col-xxl-3 col-md-3">
            <br>
                  <div class="card info-card sales-card" class="hover_card_totais" style="height: 100px; background: #fff; border-top: 25px solid #8935dc;">


                        <?php 
         
          $sql2 =  "SELECT COUNT(*) AS consultas_demarcadas FROM consultas_demarcadas";
          $result2 = mysqli_query($mysqli4, $sql2);

            if($result2 && $result2->num_rows > 0) {
                $row2 = $result2->fetch_assoc();
                $consultas_demarcadas = $row2["consultas_demarcadas"];
                
                ?> 
                      <div class="filter" style="background: #8935dc; border-radius: 50%; height: 40px; margin-right: 20px; margin-top: -5px; justify-content: center;align-items: center;">
                                  <div style="margin-left: 20px; margin-top: 10px">
                                  <i class="bi bi-person-circle"></i>
                                  <a class="icon" href="#" data-bs-toggle="dropdown"><span class="badge badge-number"><?php echo $consultas_demarcadas;?></span></a>
               
                                  </div>
                                  
                          </div>

         <div  style="margin-left: 20px; height: 80px">
             <br>
             <strong><p>Consultas desmarcadas</p></strong>
        </div>

<?php
           } else {
                echo "Nenhum usuário encontrado.";
            }

?>
                   </div>
            </div><!-- End Sales Card -->

            <!-- Sales Card -->
            <div class="col-xxl-3 col-md-3">
            <br>
                  <div class="card info-card sales-card" class="hover_card_totais" style="height: 100px; background: #fff; border-top: 25px solid #2b2821;">


                        <?php 
         
          $sql2 =  "SELECT COUNT(*) AS consultas_canceladas FROM consultas_canceladas";
          $result2 = mysqli_query($mysqli4, $sql2);

            if($result2 && $result2->num_rows > 0) {
                $row2 = $result2->fetch_assoc();
                $consultas_canceladas = $row2["consultas_canceladas"];
                
                ?> 
                      <div class="filter" style="background: #2b2821; border-radius: 50%; height: 40px; margin-right: 20px; margin-top: -5px; justify-content: center;align-items: center;">
                                  <div style="margin-left: 20px; margin-top: 10px">
                                  <i class="bi bi-person-circle"></i>
                                  <a class="icon" href="#" data-bs-toggle="dropdown"><span class="badge badge-number"><?php echo $consultas_canceladas;?></span></a>
               
                                  </div>
                                  
                          </div>

         <div  style="margin-left: 20px; height: 80px">
             <br>
             <strong><p>Consultas canceladas</p></strong>
        </div>

<?php
           } else {
                echo "Nenhum usuário encontrado.";
            }

?>
                   </div>
            </div><!-- End Sales Card -->


            <!-- Sales Card -->
            <div class="col-xxl-3 col-md-3">
            <br>
                  <div class="card info-card sales-card" class="hover_card_totais" style="height: 100px; background: #fff; border-top: 25px solid #bf531f;">


                        <?php 
         
          $sql2 =  "SELECT COUNT(*) AS consultas_atendidas FROM consultas_atendidas";
          $result2 = mysqli_query($mysqli4, $sql2);

            if($result2 && $result2->num_rows > 0) {
                $row2 = $result2->fetch_assoc();
                $consultas_atendidas = $row2["consultas_atendidas"];
                
                ?> 
                      <div class="filter" style="background: #bf531f; border-radius: 50%; height: 40px; margin-right: 20px; margin-top: -5px; justify-content: center;align-items: center;">
                                  <div style="margin-left: 20px; margin-top: 10px">
                                  <i class="bi bi-person-circle"></i>
                                  <a class="icon" href="#" data-bs-toggle="dropdown"><span class="badge badge-number"><?php echo $consultas_atendidas;?></span></a>
               
                                  </div>
                                  
                          </div>

         <div  style="margin-left: 20px; height: 80px">
             <br>
             <strong><p>Consultas atendidas </p></strong>
        </div>

<?php
           } else {
                echo "Nenhum usuário encontrado.";
            }

?>
                   </div>
            </div><!-- End Sales Card -->
            
        </div>
        
    
    <br>
     <div class="row">

        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <br>
              <h5 class="">Consultas de cada mês</h5>

              <!-- Bar Chart -->
              <canvas id="graficoLinha" style="max-height: 400px; display: block; box-sizing: border-box; height: 220px; width: 438px;" width="438" height="219"></canvas>
              <?php 
         

          $sql5 =  "SELECT MONTH(data_horario) as mes, COUNT(*) as total FROM consultas_canceladas GROUP BY mes ";
          $result5 = mysqli_query($mysqli5, $sql5);

          $meses_label = ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"];
          $dados_meses = array_fill(0, 12, 0);

            if($result5 && $result5->num_rows > 0) {
                $row5 = $result5->fetch_assoc();
                
               // $totalConsultas = $row5["total_consultas"];
               // $mes = date('M');

                 $dados_meses[$row5['mes'] - 1] = $row5['total'];

                ?>

              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  new Chart(document.querySelector('#graficoLinha'), {
                    type: 'line',
                    data: {
                      labels: <?php echo json_encode($meses_label); ?>,
                      datasets: [{
                        label: 'Mostrar Linhas',
                        data:<?php echo json_encode($dados_meses); ?>,
                        backgroundColor: [
                          'rgba(255, 99, 132, 0.2)',
                          'rgba(255, 159, 64, 0.2)',
                          'rgba(255, 205, 86, 0.2)',
                          'rgba(75, 192, 192, 0.2)',
                          'rgba(54, 162, 235, 0.2)',
                          'rgba(153, 102, 255, 0.2)',
                          'rgba(201, 203, 207, 0.2)'
                        ],
                        borderColor: [
                          'rgb(255, 99, 132)',
                          'rgb(255, 159, 64)',
                          'rgb(255, 205, 86)',
                          'rgb(75, 192, 192)',
                          'rgb(54, 162, 235)',
                          'rgb(153, 102, 255)',
                          'rgb(201, 203, 207)'
                        ],
                        borderWidth: 1
                      }]
                    },
                    options: {
                      scales: {
                        y: {
                          beginAtZero: true
                        }
                      }
                    }
                  });
                });
              </script>
              <!-- End Bar CHart -->
<?php
        
           } else {
                echo "Nenhum usuário encontrado.";
            }

      // Fechar conexão
      $mysqli5->close();
?>
            </div>
          </div>
          </div>

    <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <br>
              <h5>Totais</h5>

              <!-- Pie Chart -->
              <div id="pieChart"></div>

              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  new ApexCharts(document.querySelector("#pieChart"), {
                    series: [<?php echo $consultas_agendadas;?>, <?php echo $consultas_demarcadas;?>, <?php echo $consultas_canceladas;?>, <?php echo $consultas_atendidas;?>],
                    chart: {
                      height: 242,
                      type: 'pie',
                      toolbar: {
                        show: false
                      }
                    },
                    labels: ['Total consultas agendadas', 'Total consultas desmarcadas', 'Total consultas canceladas', 'Total consultas atendidas', ]
                  }).render();
                });
              </script>
              <!-- End Pie Chart -->

            </div>
          </div>
        </div>

  </div>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>



        <!--<div class="card_body_inf">
    
        <div class="card_corpo">
               <i class="bi bi-alarm-fill"></i>
               <div class="informacao">
               <label>Marque</label>
               <br>

              <a href="" class="btn btn-success" style="border-radius: 0px" data-bs-toggle="modal" data-bs-target="#informacao_marque">+ Inf. Marque</a>
                 
               </div>
             </div>
         </div>
          


        ---INICIO MODAL PARA CADATRAR AGENDAMENTO MÉDICO 

      <div  class="modal fade" id="informacao_marque" tabindex="-1" style="display: none;" aria-hidden="true">
                
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                     <span>             </span> <h5 class="modal-title">Informacão no Marque</h5>
                      <button typen="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div  class="modal-body">
       <section id="appoointment" class="appointment section-bg">
         <div class="container">
              <form action="" method="POST" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
                 
                 <div class="row">
                                                   
                    <div class="col-md-8 form-group mt-3">
                 <label>Nome do Dia da Semana de Atendimento:</label>
                      <textarea class="w-100"></textarea>               
                        <div class="validate"></div>
                        <div class="invalid-feedback">Por favor e digite o dia da semana</div>
                    </div>
                          
                  </div>

                        <br>
                        <br>
                        
            <div class='container'>
               <input  type="submit" id="button"  class="btn btn-success w-25" style="border-radius: 0px; float: right;" value="Enviar" name="button"/>
                            </div>
                        
        </form>
      </div>
     </section>


                    </div>
                    </div>
                </div>
              </div> End Vertically centered Modal-->
        <!---FIM MODAL PARA CADATRAR AGENDAMENTO MÉDICO -->
      </div>
    </div>
    </div>
    </section>
  </main>


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
               <a  href="meu_perfil_admin.php?id=<?php echo $id; ?>" id="button"  class="btn btn-danger w-25" style="border-radius: 0px; float: right;" >Editar</a>
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



             <!---INICIO MODAL PERFIL -->

      <div  class="modal fade" id="questoes" tabindex="-1" style="display: none;" aria-hidden="true">
                
                <div class="modal-dialog modal-lg">
                  <br>
                  <br>
                  <br>
                  <div class="modal-content">
                    <div class="modal-header">
                     <span>             </span> <h5 class="modal-title">Cadastro Questões</h5>
                     <label style=" margin-left: 20px">Campos Obrigatórios </label>(<span style="color: red">*</span>)
                      <button typen="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div  class="modal-body">

   <?php
        $result_pesq = "SELECT * FROM medico";
            $resultado_pesquisa = mysqli_query($mysqli4, $result_pesq);
          
   ?>
        <form action="" method="POST">
     
   
        <div class="row">

           <div class="col-md-6 form-group mt-3 mt-md-0">
              <label>Especialidade  </label>(<span style="color: red">*</span>)
                   
                   <select id="selecioneEspecialidade" name="especialidade" class="form-select" onchange="selecione();" required>
                    <option value="">Selecione a Especialidade</option>
                 <?php
                    while($rows_pesquisar = mysqli_fetch_array($resultado_pesquisa)){
                 ?>

                   <option  value="<?php echo $rows_pesquisar['especialidade']; ?>" ><?php echo $rows_pesquisar['especialidade']; ?></option>
                 <?php
                  }
                  ?>             
                   </select>
                <div class="validate"></div>
                 <div class="invalid-feedback">Por favor selecione a especialidade!</div>
             </div>

        <div class="col-md-6 form-group mt-3 mt-md-0">
              <label>Questões </label>(<span style="color: red">*</span>)
               
             <input type="checkbox" name="checkbox" hidden="">

              <input type="text" name="questao" class="form-control" id="questao" placeholder="questao" required value="">

              <input type="text" name="acrescentar" placeholder="Acrescentar" style="border-bottom: black solid 1px; border-top: transparent; border-right: transparent; border-left: transparent" hidden="">    

                <div class="validate"></div>
                 <div class="invalid-feedback">Por favor selecione a questão!</div>
             </div>
              </div>
        <br>
      <div>
            <input  type="submit" id="button" class="btn btn-success w-25" style="border-radius: 0px; float: right;" value="Guardar Respostas" name="button"/>
      </div>

    </form>
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
          
                <a class="btn btn-secondary" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="width: 150px; height: 35px; border-radius: 0px; float: left;" href="painel_cadastro_utente_boas_vindas.php">Não</a>
            </div>
          
        </div>

         </div>
        </div>
       </div>
      </div>
        <!---FIM MODAL PARA SAIR -->


  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
   
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>