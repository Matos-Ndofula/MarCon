<?php
require("../configs/conexao.php");
require("config_encript_decrypt_url.php");


session_start();
require("../configs/protecao.php");
protegerUser();

if(isset($_GET["action"]) AND $_GET["action"] == "sair"){
    session_destroy();
    header("Location: ../");
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
    <script src="java/js/jquery-ui-1.12.1/jquery-ui.js"></script>
    <link href="java/js/jquery-ui-1.12.1/jquery-ui.css" rel="stylesheet">

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
              <i class="bi bi-circle"></i><span>
              Marcar consultas</span>
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
          <i class="bi bi-calendar-date-fill me-2"></i>
          <span>Calendário</span>
       </a>
      </li><!-- End Profile Page Nav -->
    
      <!-- End Profile Page Nav -->

               
      <li class="nav-item" style="margin-top: 350px;">
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

             
             <div class="boas_vindas" style="padding: 5px; background: darkgray;
  width: 100%;height: 100%; color: #000; margin-top: 20px;">
               <h2>Presado(a) <?php echo $nome_utente; ?></h2>
               <p>Seja Bem-vindo ao sistema de consultas online</p>
             </div>

          <div class="card_corpo">
          
           <div class="card" style="border: none;">
            <div class="card-body" style="margin-left: -30px;">
              
	         <a  href="calendario_utente_consultas.php" class="btn btn-primary">
           
             <i class="bi bi-calendar-date-fill  me-2"></i>
          <span>Calendário</span>
          </a>
            
          <!----->
          <a class="btn btn-primary"  href="painel_utente_marcar_consulta.php" class="col-xs-12 col-sm-6 col-md-4 col-lg-3"> <i class="bi bi-plus-lg  me-2"></i>Marcar Consulta</a>
            
           
          <a href="painel_utente_desmarcar_consulta.php" class="btn btn-primary" class="col-xs-12 col-sm-6 col-md-4 col-lg-4"><i class="bi bi-dash-lg  me-2"></i>Desmarcar Consulta</a>
            
         
       <div>
        
       </div>

 <!---   <div class="ui-widget">
<label for="nascimento">Data de nascimento:</label>
<input id="nascimento" type="text">
</div>
<script>
$(function () {
$("#nascimento").datepicker({

  changeMonth: true,
        changeYear: true,
        minDate: 0,
        maxDate: "+1M",
        beforeShowDay: function (date) {
          var disabled = ["15-05-2025", "20-05-2025"];
          var d = $.datepicker.formatDate('dd-mm-yy', date);
          return [disabled.indexOf(d) === -1];
        },
        onSelect: function (dateText) {
          alert("Você selecionou: " + dateText);
        }
showWeek: true,
firstDay: 0,
dateFormat: "dd/mm/yy",
dayNames: ["Domingo",
"Segunda-Feira",
"Terça-Feira",
"Quarta-Feira",
"Quinta-Feira",
"Sexta-Feira",
"Sábado"],
dayNamesMin: ["D", "S", "T", "Q", "Q", "S", "S"],
monthNames: ["Janeiro",
"Fevereiro",
"Março",
"Abril",
"Maio",
"Junho",
"Julho",
"Agosto",
"Setembro",
"Outubro",
"Novembro",
"Dezembro"],
monthNamesShort: ["Jan",
"Fev",
"Mar",
"Abr",
"Mai",
"Jun",
"Jul",
"Ago",
"Set",
"Out",
"Nov",
"Dez"],
showButtonPanel: true,
currentText: "Hoje",
closeText: "Fechar",
weekHeader: "#"
});
});

</script>--->
              </div>
            </div>
          </div>
          <br>
          <br>

     <div class="card" style="border: none;">
        <div class="card-body">
              <!-- Dark Table -->
          <div class="table-responsive">
              <table class="table table-striped table-bordered table-hover" style="width: 100%/*border: 0.5px solid #127;*/">
                <caption><h3><strong>Consultas Agendadas</h3></strong></caption>
                <thead>
                  <tr>
                    <th scope="col">Nº Processo</th>
                    <th scope="col">Médico</th>
                    <th scope="col">Especialidade</th>
                    <th scope="col">Data</th>
                    <th scope="col">Hora</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Botão</th>
                  </tr>
                </thead>
                <tbody>
        <?php
              
  $result_pesq = "SELECT * FROM consultas_agendadas WHERE estado='Agendado' OR estado='Confirmada' OR horario='Livre' ORDER BY data_horario ASC";
    $resultado_pesquisa = mysqli_query($mysqli, $result_pesq);
   
          
        while($rows_pesquisar = mysqli_fetch_array($resultado_pesquisa)){
           $data_actual = date("Y-m-d");
      
        if ($rows_pesquisar['nome_utente'] == $nome_utente && $rows_pesquisar['data_horario'] >= $data_actual && $rows_pesquisar['estado'] != "Desmarcada"){ 
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

$select = $mysqli->query("SELECT * FROM consultas_agendadas WHERE id='$id' AND estado ='Desmarcada' ");
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

$select = $mysqli->query("SELECT * FROM consultas_agendadas WHERE id='$id' AND estado ='Atendido'");
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

$select = $mysqli->query("SELECT * FROM consultas_agendadas WHERE id='$id' AND estado ='Agendado'");
        if($select){
        $row = $select->num_rows;
        if($row > 0){
          
           $id_agendado =  $rows_pesquisar['id'];  
      ?>
                  
  <a type="button" class="bi bi-calendar-x" onclick="abrirModalDialogo(<?php echo $id_agendado; ?>)" style="border-radius: 5%; display: inline-flex; align-items: center;justify-content: center; background: rgb(188, 48, 48); color: #fff; width: 30px; height: 30px" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Desmarcar Consulta" ></a>

      <div id="modalConfirmacao" class="modalDialogo">
          <div class="modal-conteudo">
              <h5>Tem certeza que deseja Desmarcar a Consulta?</h5>
              <hr>
              <button class="button_dialogo" onclick="fecharModal()">Não</button>
              <button class="button_dialogo"onclick="confirmar()">Sim</button>

          </div>
      </div>

      <style>
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
      </style>

      <script>
        
        var idSelecionado = null;

        function abrirModalDialogo(id_agendado){
          idSelecionado = id_agendado; // Guarda o id

          document.getElementById("modalConfirmacao").style.display = "flex";
        }

        function fecharModal(){

          document.getElementById("modalConfirmacao").style.display = "none";
          idSelecionado = null;
        }

        function confirmar(){

          if (idSelecionado) {

            window.location.href = "atualiza_estado_desmarcado.php?id=" + idSelecionado;
            document.getElementById("modal-conteudo").style.display = "none";
          }

        }

      </script>

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
            

           $id_comfirmada = encryptor('encrypt', $rows_pesquisar['id']);  
   
      ?>
                  
  <a type="button" class="bi bi-calendar-x"   href ="painel_confirmar_desmarcacao.php?id=<?php echo $id_comfirmada; ?>" style="border-radius: 5%; display: inline-flex;    align-items: center;justify-content: center; background: rgb(188, 48, 48); color: #fff; width: 30px; height: 30px" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Desmarcar Consulta"></a>
      <?php
        }else{

        }
     }else{

     }

?>

<?php

$id = $rows_pesquisar['id'];

$select = $mysqli->query("SELECT * FROM consultas_agendadas WHERE id='$id' AND estado ='Agendado'");
        if($select){
        $row = $select->num_rows;
        if($row > 0){
            

           $id_comfirmada = encryptor('encrypt', $rows_pesquisar['id']);  
   
      ?>
                  
  <a type="button" class="bi bi-bootstrap-reboot"   href ="painel_remarcar_consulta.php?id=<?php echo $id_comfirmada; ?>" style="border-radius: 5%; display: inline-flex;    align-items: center;justify-content: center; background: #ffe000; color: black; width: 30px; height: 30px" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Remarcar Consulta"></a>
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

    </div>
     

    </section>

  </main>


    <!---INICIO MODAL PARA CADATRAR AGENDAMENTO MÉDICO -->

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
                
                 <label hidden="">Nº Doc: <?php echo $rows_pesquisar['id']; ?></label><br>
                 <label>Nome: <?php echo $rows_pesquisar['nome_utente']; ?></label><br>    
                 <label>Email: <?php echo $rows_pesquisar['email']; ?></label><br>    
                 <label>BI: <?php echo $rows_pesquisar['BI']; ?></label><br>    
                 <label>Telefone: <?php echo $rows_pesquisar['telefone']; ?></label><br>    
                 <label>Endereço: <?php echo $rows_pesquisar['endereco']; ?></label><br>
                        <hr>
                        <br>
            <?php

           $id = encryptor('encrypt', $rows_pesquisar['id']); 
            ?>
            <div class='container'>
               <a  href="meu_perfil.php?id=<?php echo $id; ?>" id="button"  class="btn btn-warning w-25" style="border-radius: 0px; float: right;" >Editar</a>
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
        <!---FIM MODAL PARA CADATRAR AGENDAMENTO MÉDICO -->

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
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>  
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>
</html>
<?php
              
  $result_pesq = "SELECT * FROM consultas_agendadas WHERE estado='Agendado' OR estado='Confirmada' ORDER BY data_horario ASC";
    $resultado_pesquisa = mysqli_query($mysqli, $result_pesq);
   
          
        while($rows_pesquisar = mysqli_fetch_array($resultado_pesquisa)){
           $data_actual = date("Y-m-d");
      
            if ($rows_pesquisar['nome_utente'] == $nome_utente && $rows_pesquisar['data_horario'] < $data_actual){ 

    $query = "DELETE FROM consultas_agendadas WHERE data_horario";
            }

        }
      ?>