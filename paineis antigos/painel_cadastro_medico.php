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
    header("Location: ../login_Admin.php");
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Painel Cadastro Médico</title>
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
      <a href="painel_cadastro_funcionario_Home.php" class="logo d-flex align-items-center">
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
          <i class="bi bi-grid"></i>
          <span>Home</span>
        </a>
      </li><!-- End Home Nav -->

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
        <div class="card">
            <div class="card-body">     

             <div class="boas_vindas" style="padding: 10px; background: darkgray;
  width: 100%;height: 20%; color: #000; margin-top: 20px">
               <h2>Cadastro Médico</h2>
             </div>
          <div class="card_corpo" style="display: inline-flex; margin-top: 20px">

             <div class="botao_boas_vindas">
              <a class="btn btn-primary" style="; width: 100px" href="painel_cadastro_funcionario_Home.php">Voltar</a>

              <a href="" class="btn btn-success" style="border-radius: 0px; width: 120px" data-bs-toggle="modal" data-bs-target="#verticalycentered"> + Médico</a>

              <a href="" class="btn btn-success" style="border-radius: 0px; width: 130px" data-bs-toggle="modal" data-bs-target="#Agendamento_Medico"> + Agendamento</a>

      
    <div class="search-bar">
      <form class="search-form d-flex align-items-center" class="pesquisar" method="GET" action="painel_cadastro_medico.php">
        <input type="text" name="pesquisar" placeholder="Pesquisar o nº Documento" title="Enter search keyword">
        <button type="submit" title="Pesquisar"><i class="bi bi-search"></i></button>
      </form>
    </div>
    
    <span hidden=""><?php $pesquisar = $_GET['pesquisar'];?></span>
<?php
  
    $result_pesq = "SELECT * FROM medico";
    $resultado_pesquisa = mysqli_query($mysqli, $result_pesq);
   
    $result_pesq = "SELECT * FROM medico WHERE id LIKE '%$pesquisar%' ORDER BY id DESC";
    $resultado_pesquisa = mysqli_query($mysqli, $result_pesq);
    ?>

    <!-- End Search Bar -->



            </div>
      </div>
              
              <div class="resultado">
      <?php
      
    $result_pesq = "SELECT * FROM medico";
    $resultado_pesquisa2 = mysqli_query($mysqli, $result_pesq);

    ?>
    <br>

       <div class="card">
            <div class="card-body">
       <div class="table-responsive">
              <!-- Dark Table -->

              <table class="table table-striped table-bordered table-hover">
                <caption>Médicos Cadastrados</caption>
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
          
        while($rows_pesquisar = mysqli_fetch_array($resultado_pesquisa)){
      ?>
                  <tr>
                    <td><?php echo $rows_pesquisar['id']; ?></td>
                    <td><?php echo $rows_pesquisar['nome']; ?></td>
                    <td><?php echo $rows_pesquisar['especialidade']; ?></td>
                    <td><?php echo $rows_pesquisar['genero']; ?></td>
                    <td><?php echo $rows_pesquisar['telefone']; ?></td>
                    <td><?php echo $rows_pesquisar['localidade']; ?></td>
                     <td >
                       <div class="botao_boas_vindas" style="display: inline-flex; border-radius: 5%; float: left;">
                        
                <?php

            $id_editar_medico = encryptor('encrypt', $rows_pesquisar['id']);
   
                ?>
                       <a type="button" class="bi bi-pencil-square"  href="meu_perfil_medico.php?id=<?php echo $id_editar_medico; ?>" style="border-radius: 5%; display: inline-flex; align-items: center;justify-content: center; background: green; /*background: #04AA6D;*/ color: #fff; width: 30px; height: 30px" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Editar"></a>

                       <?php

            $id_eliminar_medico = encryptor('encrypt', $rows_pesquisar['id']);
   
                ?>
                       <a type="button" class="bi bi-trash" data-bs-toggle="modal" data-bs-target="#Pergunta_Eliminar"  style="border-radius: 5%; display: inline-flex;    align-items: center;justify-content: center; background: red;/*background: #f44336;*/color: #fff; width: 30px; height: 30px; margin-left: 10px" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Eliminar"></a>

                    

                      </div>

                     </td>

                    </tr>
                  <?php
      }
      ?>
                </tbody>
              </table>
            </div> <!-- End Dark Table -->

            </div>
          </div>
      
      <div style="clear:both;"></div>
    </div>
    
        <!---INICIO MODAL PARA CADATRAR DADOS PESSOAIS MÉDICO -->

              <div  class="modal fade" id="verticalycentered" tabindex="-1" style="display: none;" aria-hidden="true">
                
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
                              <input  type="submit" id="button"  class="btn btn-success w-50" style="border-radius: 0px; float: right;" value="Cadastrar" name="button1"/>
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
  
 
            while($rows_pesquisar2zx = mysqli_fetch_array($resultado_pesquisa2)) {

      ?>
                    <input type="" name="id_medico" value="<?php echo $rows_pesquisar2zx['id'];?>" hidden>
                      
                      <input type="" name="especialidade" value="<?php echo $rows_pesquisar2zx['especialidade'];?>" hidden> 
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
               <input  type="submit" id="button"  class="btn btn-success w-25" style="border-radius: 0px; float: right;" value="Cadastrar" name="button"/>
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


 <!---INICIO MODAL PARA PARA ELIMINAR  -->

      <div  class="modal fade" id="Pergunta_Eliminar" tabindex="-1" style="display: none;" aria-hidden="true">
                
                <div class="modal-dialog modal-ms">
                
                  <div class="modal-content" style="margin-top: 250px;">
                    
                    <div  class="modal-body">

                <div class="container" >
            
              <div>
                <h3>Pretende Eliminar Médico?</h3></div>
                <hr>
               

           
            <div class='container'>
           
     
                 <a type="submit" href="delete_medico.php?id=<?php echo $id_eliminar_medico; ?>" id="button"  class="btn btn-danger" style="width: 150px; height: 35px; border-radius: 0px; float: right;" >Sim</a>
          
                <a class="btn btn-secondary" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="width: 150px; height: 35px; border-radius: 0px; float: left;">Não</a>
            </div>
        </div>

         </div>
        </div>
       </div>
      </div>
        <!---FIM MODAL PARA ELIMINAR -->


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

             
          </div>
    </section>

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

 <!-- Vendor JS Files 
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>-->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>