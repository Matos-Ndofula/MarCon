<?php
require("../configs/conexao.php");
require("config_encript_decrypt_url.php");

session_start();
require("../configs/protecao.php");
protegerMedico();

if(isset($_GET["action"]) AND $_GET["action"] == "sair"){
    session_destroy();
    header("Location: ../login_medico.php");
  }
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Painel Médico Consulta</title>
  <meta content="" name="description">
  <meta content="" name="keywords">


  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <script type="text/javascript" src="jquery-3.5.1.js"></script>

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
          
          $result = mysqli_query($mysqli4, $sql);

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
      $mysqli4->close();
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
   /*       $sql = "SELECT COUNT(*) AS nome_medico_e_especialista FROM consultas_agendadas";
          
          $result = mysqli_query($mysqli, $sql);

              while($row = mysqli_fetch_array($result)){

              //  $row = $result->fetch_assoc();
                //$nome_utente = $row["nome_utente"];
                
                ?>
              

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <span class="badge bg-success badge-number"><?php echo  $row['nome_medico_e_especialista'];?></span>
          
          </a>
      </li><!-- End Notification Nav -->
           
<?php       
}*/
?>

        

<?php
    $id = $_SESSION["id"];
   $select = $mysqli->query("SELECT * FROM medico WHERE id='$id'");
    $row = $select->num_rows;
        $get = $select->fetch_array();

        $nome = $get['nome'];
        $_SESSION['nome'] = $nome;
        $especialidade = $get['especialidade'];
        $_SESSION['especialidade'] = $especialidade;

    
    
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
              <a class="dropdown-item d-flex align-items-center" href="" data-bs-toggle="modal" data-bs-target="#meu_perfil_medico">
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
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Consultas</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li> 
            <a href="" data-bs-toggle="modal" data-bs-target="#Consultas_Desmarcadas">
              <i class="bi bi-circle"></i><span>Desmarcadas</span>
                      <?php 
          $sql = "SELECT COUNT(*) AS total_consultas_desmarcadas FROM consultas_agendadas WHERE estado='Desmarcada' AND nome_medico='$nome'";
          
          $result = mysqli_query($mysqli3, $sql);

            if($result && $result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $totalConsultasDesmarcadas = $row["total_consultas_desmarcadas"];
                
                ?>
                <span style="margin-left: 4px" class="badge bg-primary badge-number"><?php echo $totalConsultasDesmarcadas;?></span>
<?php
           } else {
                echo "Nenhuma Consulta Encontrada.";
            }

      // Fechar conexão
      $mysqli3->close();
?>
            </a>
          </li>
          
        </ul>
      </li><!-- End Forms Nav -->

      

      <li class="nav-item">
        <a class="nav-link collapsed" href="" data-bs-toggle="modal" data-bs-target="#Agendamento_Medico">
          <i class="bi bi-person"></i>
          <span>Agendamento Medico</span>
        </a>
      </li><!-- End Profile Page Nav -->
      

      <li class="nav-item" style="margin-top: 330px;">
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
      <div class="card">
            <div class="card-body">     

             <div class="boas_vindas" style="padding: 10px; background: darkgray;
  width: 100%;height: 20%; color: #000; margin-top: 20px">
               <h2>Presado(a) <?php echo $nome; ?></h2>
               <p>Seja Bem-vindo ao sistema de consultas online</p>
             </div>
          <div class="card_corpo" style="display: inline-flex; margin-top: 20px;">
          
          <div class="card" style="border: none;">
            <div class="card-body">
            
            <a href="" class="btn btn-primary " style="border-radius: 0px; width: 200px" data-bs-toggle="modal" data-bs-target="#Agendamento_Medico">Agendamento Médico</a>

            <a href="" class="btn btn-primary" style="border-radius: 0px ; width: 204px" data-bs-toggle="modal" data-bs-target="#Consultas_Desmarcadas" id="consultas_desmarcadas">Consultas Desmarcadas 
      <script >
      	  $(document).ready(function(){
      	  	$(document).on('click', '#Consultas_Desmarcadas', function(){
      	  		$('#totalConsultasDesmarcadas').html('');
      	  	});
      	  }
      </script>
      <?php 
          $sql = "SELECT COUNT(*) AS total_consultas_desmarcadas FROM consultas_agendadas WHERE estado='Desmarcada' AND nome_medico='$nome'";
          
          $result = mysqli_query($mysqli2, $sql);

            if($result && $result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $totalConsultasDesmarcadas = $row["total_consultas_desmarcadas"];
                
                ?>
                <span style="margin-left: 4px" class="badge bg-primary badge-number" id="totalConsultasDesmarcadas"><?php echo $totalConsultasDesmarcadas;?></span>
<?php
           } else {
                echo "Nenhuma Consulta Encontrada.";
            }

      // Fechar conexão
      $mysqli2->close();
?></a>

      
    <div class="search-bar">
      <form class="search-form d-flex align-items-center" class="pesquisar" method="GET" action="painel_medico_consulta.php">
        <input type="text" name="pesquisar" placeholder="Nome Utente" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
    
    <span hidden=""><?php $pesquisar = $_GET['pesquisar'];?></span>
    <?php
     /*$result_pesq_1 = "SELECT * FROM consultas_agendadas WHERE nome_utente  LIKE '%$pesquisar%' ORDER BY data_horario DESC ";
    $resultado_pesquisa_1 = mysqli_query($mysqli, $result_pesq_1);*/
    
    ?>
      </form>
    </div>
    </div>
    </div>



<?php
  
    $result_pesq = "SELECT * FROM consultas_agendadas WHERE estado='Agendado' OR estado='Confirmada' OR estado='Atendido'";
    $resultado_pesquisa = mysqli_query($mysqli, $result_pesq);
   
   

    ?>

    <!-- End Search Bar -->




          </div>
      <br>
      <br>

              <div class="resultado">
      
       <div class="card">
            <div class="card-body">
              <!-- Dark Table -->
            <div class="table-responsive">
              <table class="table table-striped table-bordered table-hover">
                <caption>Consultas Marcadas</caption>
                <thead>
                  <tr>
                    <th scope="col">Nº Processo</th>
                    <th scope="col">Nome Utente</th>
                    <th scope="col">Data</th>
                    <th scope="col">Horário</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Botão</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
          
        while($rows_pesquisar = mysqli_fetch_array($resultado_pesquisa)){
              if ($rows_pesquisar['nome_medico'] == $nome  OR $rows_pesquisar['especialidade'] == $especialidade OR $rows_pesquisar['estado'] == 'Agendado' OR $rows_pesquisar['estado'] == 'Confirmada' OR $rows_pesquisar['estado'] == 'Atendido'){
/*
              while($rows_pesquisar = mysqli_fetch_array($resultado_pesquisa_1)){*/
              if ($rows_pesquisar['nome_medico'] == $nome  OR $rows_pesquisar['especialidade'] == $especialidade){ 
      ?>
                  <tr>
                    <td ><?php echo $rows_pesquisar['id']; ?></td>
                    
                    <td><?php echo $rows_pesquisar['nome_utente']; ?></td>
                    <?php ?>
                    <td><?php echo $rows_pesquisar['data_horario']; ?></td>
                    <td><?php echo $rows_pesquisar['horario']; ?></td>

                      <?php if ($rows_pesquisar['estado'] == 'Confirmada'){

                       ?>
                      <td><div style="color: white; background: blue; height: 20px; width: 100px; text-align: center; "><?php echo $rows_pesquisar['estado']; ?></div></td>    
                      <?php }else if ($rows_pesquisar['estado'] == 'Agendado'){

                       ?>
                      <td><div style="color: black;background: #ffe000; height: 20px; width: 100px; text-align: center; "><?php echo $rows_pesquisar['estado']; ?></div></td>
                      <?php }else if ($rows_pesquisar['estado'] == 'Atendido'){

                       ?>
                      <td><div style="background: green; height: 20px; width: 100px; text-align: center; "><?php echo $rows_pesquisar['estado']; ?></div></td> 
                      <?php }?>
                      
                     <td>

                      <div class="botao_boas_vindas" style="border-radius: 50%; float: left;">
 <?php

$id = $rows_pesquisar['id'];

$select = $mysqli->query("SELECT * FROM consultas_agendadas WHERE id='$id' AND estado ='Agendado'");
        if($select){
        $row = $select->num_rows;
        if($row > 0){
            
$id_agendado = encryptor('encrypt', $rows_pesquisar['id']);
      ?>

<a type="button" class="bi bi-check2-square" href="confirmar_agenda.php?id=<?php echo $id_agendado; ?>" style="border-radius: 5%; display: inline-flex;    align-items: center;justify-content: center; background: blue; color: #fff; width: 30px; height: 30px" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Confirmar Consulta"></a>
                  
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

$select = $mysqli->query("SELECT * FROM consultas_agendadas WHERE id='$id' AND estado ='Confirmada'");
        if($select){
        $row = $select->num_rows;
        if($row > 0){
                  
$id_confirmada = encryptor('encrypt', $rows_pesquisar['id']);
      
      ?>
                  
  <a type="button" class="bi bi-clipboard2-check" href="atender_agenda.php?id=<?php echo $id_confirmada; ?>" style="border-radius: 5%; display: inline-flex;    align-items: center;justify-content: center; background: green; color: #fff; width: 30px; height: 30px" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Atender Consulta"></a>

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

$select = $mysqli->query("SELECT * FROM consultas_agendadas WHERE id='$id' AND estado ='Atendido'");
        if($select){
        $row = $select->num_rows;
        if($row > 0){
            

           $id_pdf = encryptor('encrypt', $rows_pesquisar['id']);
      ?>
                  
  <a type="button" class="bi bi-file-pdf"  href="gera_pdf.php?id=<?php echo $id_pdf; ?>" style="border-radius: 5%; display: inline-flex;    align-items: center;justify-content: center; border: 1px solid #000; background: darkgray; color: #000; width: 30px; height: 30px" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Gerar PDF"></a>
      <?php
        }else{

        }
     }else{

?>
<?php

     }
  ?>
    

                      </div>

                     </td>                  </tr>
<?php
     
    }else{
    }
      //}
        }else{
    }
      }
      ?>

                </tbody>

              </table>
            </div><!-- End Dark Table -->

            </div>

          </div>
      
      <div style="clear:both;"></div>
    </div>

      <!---INICIO MODAL PARA CADATRAR AGENDAMENTO MÉDICO -->

      <div  class="modal fade" id="meu_perfil_medico" tabindex="-1" style="display: none;" aria-hidden="true">
                
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

$result_pesq = "SELECT * FROM medico";
            $resultado_pesquisa = mysqli_query($mysqli, $result_pesq);
    
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
                 <label>localidade: <?php echo $rows_pesquisar['localidade']; ?></label><br>
                        <hr>
                        <br>
            <?php

          }

       }
    ?>         
            
      </div>

                    </div>
                    </div>
                </div>
              </div>
        <!---FIM MODAL PARA CADATRAR AGENDAMENTO MÉDICO -->

        <!---INICIO MODAL PARA CADATRAR AGENDAMENTO MÉDICO -->

              <div  class="modal fade" id="Agendamento_Medico" tabindex="-1" style="display: none;" aria-hidden="true">
                                        <br>
                        <br>
                        <br>

                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                     <span>             </span> <h5 class="modal-title">Cadastro Agendamento Medico</h5>
                      <button typen="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div  class="modal-body">
       <section id="appoointment" class="appointment section-bg">
         <div class="container">
              <form action="" method="POST" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
                       <div class="row">

                            <div class="col-md-2 form-group">
                              <label>Nº Doc Médico</label>
                              <div class="input-group has-validation">
                             <input disabled type="" class="form-control" name="id_medico" value="<?php echo $id; ?>">
                              <div class="invalid-feedback">Seu Id!</div>
                             </div>
                            </div>
                          
                          <div class="col-md-4 form-group">
                              <label>Nome Médico</label>
                              <div class="input-group has-validation">
                             <input disabled type="" class="form-control" name="nome_medico" value="<?php echo $nome; ?>">
                              <div class="invalid-feedback">Por favor digite o seu nome!</div>
                             </div>
                            </div>

                            <div class="col-md-3 form-group">
                              <label>Especialidade</label>
                            <div class="input-group has-validation">
                             <input disabled type="" class="form-control" name="especialidade" value="<?php echo $especialidade; ?>">
                              <div class="invalid-feedback">Por favor digite sua Especialidade!</div>
                             </div>
                            <div class="validate"></div>
                          </div>
                                             
                          
<?php

      $result_pesq = "SELECT * FROM agendamento_medico";
        $resultado_pesquisa4 = mysqli_query($mysqli, $result_pesq);

?>
                          <div class="col-md-3 form-group">
                              <label>Dias tendimento:</label>
                               <select name="dias_da_semana" id="" class="form-select" required>
                                
                              <?php

                        while($rows_pesquisar4 = mysqli_fetch_array($resultado_pesquisa4)) {
                          if ($rows_pesquisar4["nome_medico"] == $nome) {
                          
      ?>
                                 <option value="<?php echo $rows_pesquisar4["dias_da_semana"];?>"><?php echo $rows_pesquisar4["dias_da_semana"];?></option>

   <?php
    }else{

    }
}
 ?>
                            </select>
                                    
                           <div class="validate"></div>
                              <div class="invalid-feedback">Por favor e digite o dia da semana</div>
                            </div>
                          
                          
                          
                        </div>

                        
        </form>
      </div>
     </section>


                    </div>
                    </div>
                </div>
              </div><!-- End Vertically centered Modal-->
        <!---FIM MODAL PARA CADATRAR AGENDAMENTO MÉDICO -->

<!---INICIO MODAL PARA  CADATRAR DADOS PESSOAIS MÉDICO-->

              <div  class="modal fade" id="Consultas_Desmarcadas" tabindex="-1" style="display: none;" aria-hidden="true">
                
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                     <span>             </span> <h5 class="modal-title">Tabela Consultas Desmarcadas</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div  class="modal-body">

     <div class="resultado">
      <?php
      
    $result_pesq = "SELECT * FROM consultas_agendadas WHERE estado='Desmarcada' AND nome_medico='$nome'";
    $resultado_pesquisa = mysqli_query($mysqli, $result_pesq);


    ?>

       <div class="card">
            <div class="card-body">
  
       <div class="table-responsive">
               <!-- Dark Table -->
              <table class="table table-striped table-bordered table-hover">
                <caption>Consultas Marcadas</caption>
                <thead>
                  <tr>
                    <th scope="col">Nome Utente</th>
                    <th scope="col">Data</th>
                    <th scope="col">Horário</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Botão</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
          
        while($rows_pesquisar = mysqli_fetch_array($resultado_pesquisa)){
              if ($rows_pesquisar['estado'] == 'Desmarcada'){ 
      ?>
                  <tr>
                    <td hidden><?php echo $rows_pesquisar['id']; ?></td>
                    
                    <td><?php echo $rows_pesquisar['nome_utente']; ?></td>
                    <?php ?>
                    <td><?php echo $rows_pesquisar['data_horario']; ?></td>
                    <td><?php echo $rows_pesquisar['horario']; ?></td>
                     <td><div style="background: gray; height: 20px; width: 100px; text-align: center; "><?php echo $rows_pesquisar['estado']; ?></div></td>  
                     <td>
                      <?php

            $id_elimina = encryptor('encrypt', $rows_pesquisar['id']);
      
                      ?>

      <a type="button" class="bi bi-trash" href="remover_consulta_medico.php?id=<?php echo $id_elimina; ?>" style="border-radius: 5%; display: inline-flex;    align-items: center;justify-content: center; background: #fff; color: red;border: 1px solid red; width: 30px; height: 30px" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Remover Consulta"></a>                
       <!-- <a type="button" class="bi bi-trash" href="delete_consulta_medico.php?id=<?php echo $id_elimina; ?>" style="border-radius: 5%; display: inline-flex;    align-items: center;justify-content: center; background: red; color: #fff; width: 30px; height: 30px" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Eliminar Consulta"></a>-->
                     </td>    

                  </tr>
<?php
     
    }else{
    }
      }
      ?>

                </tbody>

              </table>
          </div>     <!-- End Dark Table -->

            </div>

          </div>
      
      <div style="clear:both;"></div>
    </div>


                    </div>
                    </div>
                </div>
              </div><!-- End Vertically centered Modal-->
        <!---FIM MODAL PARA CADATRAR DADOS PESSOAIS MÉDICO -->

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
  
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>