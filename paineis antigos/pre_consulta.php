<?php
require("../configs/conexao.php");
include("marcacao_utente_consulta.php");
include ("Mensagens sweetAlerts/links_mensagens_sweetAlerts.php");
//include("pega_nome_medico.php");
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
    
      
    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">


    <section class="section dashboard">
          <div class="card">
            <div class="card-body">     

              <div class="boas_vindas" style="padding: 10px; background: darkgray;
  width: 100%;height: 20%; color: #000;  margin-top: 20px">
               <h3>Marcação Consulta</h3>
             </div>
          <div class="card_corpo" style="display: inline-flex;  margin-top: 20px">
          
           <div class="botao_boas_vindas">
              <a class="btn btn-primary" href="painel_cadastro_utente_boas_vindas.php">Voltar</a>
          <label>Campos Obrigatórios </label>(<span style="color: red">*</span>)

            </div>

            </div>
                          <!-- ======= INICIO JUNTE SE A NOS CADASTRO PARA O LOGIN ======= -->
    <section id="appointment" class="appointment section-bg">
     <br>     

      <div class="container">
         
                <div class="section-title">
          <h2>Agendar Consulta</h2>
          
            <br>
        </div>

       <!-- <for+
        m action="painel_usuario.php" method="POST" role="form" class="php-email-form" enctype="multipart/form-data">-->
      <form action="#" method="POST" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
          <div class="row">

            <?php
      
    $result_pesq = "SELECT * FROM medico";
    $resultado_pesquisa = mysqli_query($mysqli, $result_pesq);
    
    //Pesquisa para Nome do medico e BI
    //SELECT * FROM funcionario WHERE nome_nivel = 'Medico'
                     
           $result_pesq = "SELECT * FROM medico";
            $resultado_pesquisa2 = mysqli_query($mysqli, $result_pesq);
   
               //$_GET["id_Especialidade"];"<h3 id='titulo'></h3>"
            //     $rows_pesquisar2 = mysqli_fetch_array($resultado_pesquisa2);
              //  $id_Especialidade = $rows_pesquisar2['id'];

              // $result_pesq = "SELECT * FROM agendamento_medico WHERE id_medico = '$id_Especialidade'";
                //  $resultado_pesquisa4 = mysqli_query($mysqli, $result_pesq);

  ?>
        
            <div class="col-md-4 form-group mt-3 mt-md-0">
              <label>Nome Utente  </label>

                <div class="input-group has-validation">

                <input type="text" name="nome_utente" class="form-control" value="<?php echo $nome_utente; ?>" required>     
   <form action="#" method="POST" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
   
               <div class="invalid-feedback">Por favor Selecione o nome utente!</div>
            </div>
          </div>
   
         <div class="col-md-4 form-group mt-3 mt-md-0">
              <label>Especialidade  </label>(<span style="color: red">*</span>)
                   
                   <select id="selecioneEspecialidade" name="especialidade" class="form-select" onchange="selecione();" required>
                    <option value="">Selecione a Especialidade</option>
                 <?php
                    while($rows_pesquisar2 = mysqli_fetch_array($resultado_pesquisa2)){
                 ?>

                   <option  value="<?php echo $rows_pesquisar2['especialidade']; ?>" ><?php echo $rows_pesquisar2['especialidade']; ?></option>
                 <?php
                  }
                  ?>             
                   </select>
                <div class="validate"></div>
                 <div class="invalid-feedback">Por favor selecione a especialidade!</div>
             </div>

  </script>
        <!---
    <script src="mostrar_dados_select.js"></script>
    <script src="mostrar_dados_select2.js">
    
--> 
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
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById('botoes_submits').innerHTML = this.responseText;
          }
        }
          xmlhttp.open("GET","mostrar_dados_select2.php?value="+selecione_Especialidade, true);
          xmlhttp.send();

          /*xmlhttp.open("GET","mostrar_dados_select5.php?value="+selecione_Especialidade, true);
          xmlhttp.send();*/

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
            alert("O dia selecionado é " + nomeDiaSemana);
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
      
            <div class="col-md-4 form-group mt-3 mt-md-0">
              <label>Nome Médico  </label>(<span style="color: red">*</span>)
              
              <div class="input-group has-validation" id="selecioneNomeMedico">
            
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

              <input type="color" class="form-control" name="color" id="color" placeholder="Selecione a cor" value="#dc1616" >
              <div class="validate"></div>
              <div class="invalid-feedback">Por favor selecione a cor!</div>
            </div>


      <div class="col-md-4 form-group mt-4">
         <label>Data Consulta  </label>(<span style="color: red">*</span>)
         
      

                <!-- <script type="text/javascript" src="dias_da_semana.js"></script>--->
                <input type="date" min="<?php echo date("Y-m-d");?>" class="form-control" id="data_horario" name="data_horario" placeholder="Digite a Data" required  onchange = "selecione1();">
                
                              <div class="validate"></div>
                              <div class="invalid-feedback">Por favor digite a Data!</div>
                            </div>

            <div class="col-md-4 form-group mt-4">
              <label>Horários Disponíveis  </label>(<span style="color: red">*</span>)
                
                <div class="input-group has-validation" id="selecioneHorario">
            
                <select class="form-select" name="data_horario" required>
                    <option>Nome o Horário Disponível</option>
                  
                </select>
              <div class="invalid-feedback">Por favor selecione o horário da Consulta!</div>
             </div>
            </div>
                          <div class=" col-md-4 form-group mt-4">
                            <label> Observações  </label>
                             <textarea class="form-control" name="obs" id="obs" rows="1" placeholder="Observações (Opcional)"></textarea>
                              <div class="validate"></div>
                          </div>


              

                       <div hidden="" class=" col-md-4 form-group mt-3 ms-0">
                            <br>  <input style="color: blue" type="text" class="form-control" name="estado" id="estado" placeholder="Selecione o estado" value="Agendado" >
                            <div class="validate"></div>
                      </div>
                          
                    <div class=" col-md-4 form-group mt-3 ms-0">
                                      
                          <h5 id="mostra_nome_dia">aQUI</h5>
                          <div class="validate"></div>
                          </div>
                    <div  id="mostra_nome_medico" class=" col-md-4 form-group mt-4">
                         </div>

      </div>
                        <script type="text/javascript">
                          function escolhaHora(){
        //alert("Funcionou!");onchange = "/*escolhaHora();"
        document.getElementById('horarios_disponiveis').style
        .opacity = 1; 

          
}

      $(document).ready(function(){
            $(":button").click(function(){
             // alert("Funcionou");
              var text = $("#id_efeitoBotao:input").val();
                $("#aqui").text(text);
            });
        });
     // const selecione_Especialidade =document.getElementById("id_efeitoBotao").value;
      
//      var str = this.value;
        //alert(selecione_Especialidade);
//document.getElementById('aqui').innerHTML =selecione_Especialidade;
       // document.getElementById('id_efeitoBotao').style
       // .background = "blue"; 
          

                        </script >
<?php
      /*
                    <h5>Escolha uma Data para ver o Horário Disponivel do Médico</h5>
        
       $result_pesq = "SELECT * FROM agendamento_medico";
            $resultado_pesquisa5 = mysqli_query($mysqli, $result_pesq);
            $mostra_nome_dia =  "<h5 id='mostra_nome_dia'>Aqui</h5>";
       while($rows_pesquisar5 = mysqli_fetch_array($resultado_pesquisa5)){
            if ($rows_pesquisar5['dias_da_semana'] == $mostra_nome_dia) {
           
             echo '<div >
             <input type="button"  class="btn btn" " name="horario" value="' . $rows_pesquisar5['horario'] . '"  ">

                              </div>
                            ';* 
             }else{
              
              
             }
          }
                     


                     $result_pesq = "SELECT * FROM agendamento_medico";
            $resultado_pesquisa5 = mysqli_query($mysqli, $result_pesq);
            
       while($rows_pesquisar5 = mysqli_fetch_array($resultado_pesquisa5)){
            if ($rows_pesquisar5['especialidade'] == $rows_pesquisar4['especialidade']) {
       
       $result_pesq = "SELECT * FROM horario_medico ";
            $resultado_pesquisa6 = mysqli_query($mysqli, $result_pesq);
$rows_pesquisar6 = mysqli_fetch_array($resultado_pesquisa6);

       while($rows_pesquisar6 = mysqli_fetch_array($resultado_pesquisa6)){
            if ($rows_pesquisar6['horario'] == $rows_pesquisar4['horario']) {
           
             echo '<div >
             <input type="radio"  class="btn btn" " name="horario" value="' . $rows_pesquisar4['horario'] . '"">
             <label >' . $rows_pesquisar4['horario'] . '</label><br>

                </div>
                            '; 
           }else{
              
              
             }  
          }
          }else{
              
              
             }
          }*/

          
        // }
                   ?>                    
                    <div id="horarios_disponiveis"  style='opacity: 1;' class=" col-md-7 form-group mt-3 ms-2 " >
                  
                    
                     <?php
                    /*/ Array com os horários disponíveis (substitua com seus próprios dados)
                    <input type="button" name="" value="8:00">
                    <input type="button" id="id_efeitoBotao" name="" value="8:30">
                    
                    <input type="button" name="" value="9:00">
                    <input type="button" name="" value="9:30">
                    <input type="button" name="" value="10:00">
                    <input type="button" name="" value="10:30">
                    <input type="button" name="" value="11:00">
                    <input type="button" name="" value="11:30">
                    <input type="button" name="" value="14:00">
                    <input type="button" name="" value="14:30">
                    <input type="button" name="" value="15:00">
                    <input type="button" name="" value="15:30">
                    <input type="button" name="" value="16:00">
                    <input type="button" name="" value="16:30">
                    <input type="button" name="" value="17:00">
                    <input type="button" name="" value="17:30">

                     
         $horarios_disponiveis = array(
                    
                       "9:00","9:30",
                        "10:00","10:30",
                        "11:00","11:30",
                        "14:00","14:30",
                        "15:00","15:30",
                        "16:00","16:30",
                        "17:00","17:30"
                    );
                    // Loop para criar radiobuttons para cada horário disponível
                    
                    foreach ($horarios_disponiveis as $horario) {

          
        
    // $rows_pesquisar4 = mysqli_fetch_array($resultado_pesquisa4);
      //           $data_hora = ; 
                 

         //if ($data = "2023-04-09") {
      /*     
                 $nome_especialista = $rows_pesquisar4['nome_especialista'];
           
            if (($rows_pesquisar4['data_horario']) && ($rows_pesquisar4['especialidade']) ) {
              
            echo '<div ><input disable type="radio" name="horario" value="' . $rows_pesquisar4['horario'] . '" ">
                            <label >' . $rows_pesquisar4['horario'] . '</label><br>
                              </div>
                            ';
             
             
             }else{

                            
             }
             }
              //    $hora = ;
           
         }*/
         //style="display:inline-flex"

         
         /* $sql = "SELECT COUNT(*) AS total_usuarios FROM utente";
          
          $result = mysqli_query($mysqli, $sql);

            if($result && $result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $totalUsuarios = $row["total_usuarios"];
                
                ?>
            
<?php
           } else {
                echo "Nenhum usuário encontrado.";
            }

      // Fechar conexão
      $mysqli->close();
*/
       
         
                 $mostra_especialidade = "<div><h3 id='mostra_especialidade'></h3></div>

                 ";
           echo $mostra_especialidade;      
        /*   $result_pesq = "SELECT * FROM consultas_agendadas ";
            $resultado_pesquisa4 = mysqli_query($mysqli, $result_pesq);
            $rows_pesquisar4 = mysqli_fetch_array($resultado_pesquisa4);     

       while($rows_pesquisar4 = mysqli_fetch_array($resultado_pesquisa4)){
            if ($rows_pesquisar4['especialidade']) {
            //echo "<div><h3 id='mostra_especialidade'></h3></div>";           
             echo '<div >
             <input type="radio"  class="btn btn" " name="horario" value="' . $rows_pesquisar4['horario'] . '"">
             <label >' . $rows_pesquisar4['horario'] . '</label><br>

                </div>
                            '; 
             }else{
              
              
             }
          }

          while($rows_pesquisar4 = mysqli_fetch_array($resultado_pesquisa4)){
        // Horários disponíveis (exemplo: das 08:00 às 18:00)
        $inicio = strtotime("08:00");
        $fim = strtotime("17:00");

        // Intervalo de 30 minutos
        $intervalo = 30 * 60;

        // Gerar radio buttons para cada intervalo de 30 minutos
        for ($horario = $inicio; $horario <= $fim; $horario += $intervalo) {

            $hora_formatada = date("H:i", $horario);

            if ($hora_formatada == $rows_pesquisar4['horario']) {
            echo $mostra_especialidade;
            
            echo '<input type="radio" name="horario1" value="' . $hora_formatada . '"> ' . $hora_formatada . '<br>';
       }else{
              
              
             }
          }
        }
        */
        //<br>
                     

          
        // }
                   ?>
                    <br>
                        </div>
            <div class='container'>
    <style type="text/css">
      #horarios_disponiveis input:hover{
       /* background: blue;
        color: white;
        cursor: pointer;*/
      }
      #horarios_disponiveis{
        opacity: 0;
        /*display: inline-flex;*/
      }
      #horarios_disponiveis input{

      /*border-radius: 0px;
      margin-left: -10px;
      padding: 0px;
      width: 70px; 
      height: 40px; 
      border: 1px solid blue; 
      margin-left: 5px;*/
     
      }
    </style>      

      <div class="botoes_submits">
        <a class='btn btn-warning w-25' style='border-radius: 0px;'>Responder questões</a>

          <input type="submit" id="button" class="btn btn-success w-25" style=" border-radius: 0px; float: right;" value="Agendar Consulta" name="button" disabled/>
          <br>
      </div>
     </form> 
 </div>
          
      </section>

              

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
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
