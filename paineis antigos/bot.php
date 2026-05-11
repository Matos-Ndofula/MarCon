<?php
    include "JSON/palavras_chaves_JSON.php";
  require("../configs/conexao.php");
  

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Chatboot</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Jan 29 2024 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

  <!-- Template Main CSS File -->
  <link href="assets/assets/css/style.css" rel="stylesheet">
  <script type="text/javascript" src="jquery-3.5.1.js"></script>
  

</head>
<body>
    <div class="wrapper">
        <div class="title">Chatbot Consultas Online </div>
        <div class="form">
            <div class="bot-inbox inbox">
                <div class="icon">
                    <i class="bi bi-person-circle"></i>
                </div>
                <div class="msg-header" style="max-width: 80%">
                  <div class="ficheiro_perguntas_respostas">
                    <div class="bem-vindo_nome">
         <?php
         
            $sql=$mysqli->prepare("SELECT MAX(nome_utente) FROM utente ");
        $sql->execute();
        $sql->bind_result($nome_utente);
        ?>
             <?php
          
        while($sql->fetch()){
      ?>   
                    <p>Olá <?php echo $nome_utente; ?>, bem vindo a consulta expontânea, eu sou o ChatConsult sou responsável de realizar a tua consulta, diz me de qual distrito de Viana és? <br><br>
                          SEDE DE VIANA ?<br>
                          CAPALANGA Destrito ?<br>
                          ESTALAGEM ?<br>
                          MULENVOS  ?<br>
                          BAIA      ?<br>
                          ZANGO LESTE ?<br>
                          ZANGO OESTE ?<br>
                          CALUMBO   ?<br>
                         <br><br>
                     <?php $data = date("d/m/y"); echo "".$data.""; ?>  <span> , </span>  <?php $hora = date('H:m:s'); echo "".$hora."";?>
                     </p>
                 <?php
      }
      ?>              
                    </div>
                    <!--                    
                    <div class="sintomas">
                    <p>'Quais sintomas estás a sentir?</p>
                      <p>[1] - Febre alta, calafrios, dor de cabeça, náuseas, vômitos, cansaço e falta de apetite?</p>
                      <p>[2] - Febre, dores musculares com dor lombar proeminente, dor de cabeça, perda de apetite, náusea, vômito, fadiga, icterícia (“amarelamento” da pele e dos olhos), urina escura, sangramentos a partir da boca, nariz, olhos ou estômago?</p>
                      <p> [3] - Diarreia leve ou diarreia aquosa e profusa, vômitos, dor abdominal e cãibras?</p>
                     <p>[4] - Febre alta, dores de cabeça, mal-estar geral, falta de apetite, retardamento do ritmo cardíaco, aumento do volume do baço, manchas rosadas no tronco, prisão de ventre ou diarreia, tosse seca.? <br><br
                     <?php $data = date("d/m/y"); echo "".$data.""; ?>  <span> , </span>  <?php $hora = date('H:m:s'); echo "".$hora."";?></p>
                     </div>-->
            </div>          
            
                <div class="card-body" style=" border-radius: 5px 5px 5px 5px; border: 2px solid #ccc; padding: 3px">
              <h6 class="card-title">Card with titles, buttons, and links</h6>
              <a href="#" class="btn btn-outline-primary w-100" style="border-radius: 0 0 0 0;border: 1px solid #ccc;" value="Aqui">Button</a>
              <input type="" name="" value="input" class="btn btn-outline-primary w-100" style="border-radius: 0 0 0 0;border: 1px solid #ccc">
              <a href="#" class="btn btn-outline-primary w-100"style="border-radius: 0 0 0 0;border: 1px solid #ccc">Button</a>
            </div>
                </div>
            </div>
          
          <div class="card"><!-- Slides with captions -->
            <div class="card-body">
              <h6 class="card-title">Seleccione</h6>

              
              <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                
                <div class="carousel-inner">
                  
                  <div class="carousel-item active">
                    <input type="text" id="dados" value="Dor de cabeça" name="" style="display: none;">
                      <button type="button" id="botao" class="btn btn-outline-primary w-100">Dor de cabeça</button>
                      
                  </div>

                  <div class="carousel-item">
                      <input type="text" id="dados" value="Vómitos" name="" style="display: none;">
                      <input type="" id="botao" class="btn btn-outline-primary w-100" value="Vómitos">
                  </div>

                  <div class="carousel-item">
                       <input type="text" id="dados" value="Diarreia" name="" style="display: none;">
                      <button type="button" id="botao" class="btn btn-outline-primary w-100">Diarreia</button>
                  </div>

                </div>
                  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev" style="background-color: grey; border-radius: 25px; width: 35px; height: 35px; margin: 1px 0 0 -7px">
                  <span class="carousel-control-prev-icon" aria-hidden="true" style=" width: 25px; height: 25px"></span>
                  <span class="visually-hidden">Anterior</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next" style="background-color: grey; border-radius: 25px; width: 35px; height: 35px; margin: 1px -7px 0 0">
                  <span class="carousel-control-next-icon" aria-hidden="true" style=" width: 25px; height: 25px"></span>
                  <span class="visually-hidden">Próximo</span>
                </button>
              </div>

            </div>
          </div><!-- End Slides with captions -->

            
        </div>
        <div class="typing-field">
            <div class="input-data">
                <input id="data" type="text" name="mensagem" placeholder="Digite aqui.." required>
                <button id="send-btn" class="ri-send-plane-fill"></button>
            </div>
        </div>
    </div>

    <script>
      $(document).ready(function(){
            $("#botao").click(function(){
            
              
                $value = $("#dados").val();
                $msg = '<div class="user-inbox inbox"><div class="msg-header" style="max-width: 80%"><p>'+ $value +' <br><br><?php $data = date("d/m/y"); echo "".$data.""; ?>  <span> , </span>  <?php $hora = date('H:m:s'); echo "".$hora."";?></p></div><div class="icon" style="background: #dbdada; color:#000"><i class="bi bi-person-circle"></i></div></div>';
                $(".form").append($msg);
                $("#dados").val();

                // Inicio do código Ajax
                $.ajax({
                    url:'mensagem.php',
                    type: 'POST',
                    data: 'text='+$value,
                    success: function(resultado){
                    $replay = '<div class="bot-inbox inbox"><div class="icon"><i class="fas fa-user"></i><i class="bi bi-facebook"></i></div><div class="msg-header" style="max-width: 80%"><p>'+ resultado +' <br><br><?php $data = date("d/m/y"); echo "".$data.""; ?>  <span> , </span>  <?php $hora = date('H:m:s'); echo "".$hora."";?></p></div>';            
                    $(".form").append($replay);
                    
                    //quando conversa abaixa a barra de rolagem automaticamente vem ao fundo  
                    $(".form").scrollTop($(".form")[0].scrollHeight);
    
                }
                });
            });
    });
        $(document).ready(function(){
            $("#send-btn" ).on("click", function(){
                
              
                $value = $("#data").val();
                $msg = '<div class="user-inbox inbox"><div class="msg-header" style="max-width: 80%"><p>'+ $value +' <br><br><?php $data = date("d/m/y"); echo "".$data.""; ?>  <span> , </span>  <?php $hora = date('H:m:s'); echo "".$hora."";?></p></div><div class="icon" style="background: #dbdada; color:#000"><i class="bi bi-person-circle"></i></div></div>';
                $(".form").append($msg);
                $("#data").val();

                // Inicio do código Ajax
                $.ajax({
                    url:'mensagem.php',
                    type: 'POST',
                    data: 'text='+$value,
                    success: function(resultado){
                    $replay = '<div class="bot-inbox inbox"><div class="icon"><i class="fas fa-user"></i><i class="bi bi-facebook"></i></div><div class="msg-header" style="max-width: 80%"><p>'+ resultado +' <br><br><?php $data = date("d/m/y"); echo "".$data.""; ?>  <span> , </span>  <?php $hora = date('H:m:s'); echo "".$hora."";?></p></div>';            
                    $(".form").append($replay);
                    
                    //quando conversa abaixa a barra de rolagem automaticamente vem ao fundo  
                    $(".form").scrollTop($(".form")[0].scrollHeight);
    
                }
                });
            });
        });

    </script>
    

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>
</html>