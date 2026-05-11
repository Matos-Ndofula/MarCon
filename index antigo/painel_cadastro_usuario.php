<?php
  require("configs/conexao.php");

  include("cadastro_usuario.php");
  session_start();
?>
<!DOCTYPE html PUBLIC>
<html>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
  <title>Login</title>
  <link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'/>



  <!-- Favicons -->
  <link href="assets/img/imagem_logo_acima.png" rel="icon">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  
</head>
<body style="background: darkgray">

<section class="section dashboard">
      
        <div class="card" style="border: none;">
            <div class="card-body">

             <div class="boas_vindas" style=" padding: 10px;background: darkgray;
              width: 100%; height: 100%; color: #000">
               <h4 style="margin: 5px auto;">Cadastra-se!</h4>
             </div>
              <br>
         <div class="card" style="border: none;">
            <div class="card-body">

          <form action="" method="POST" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
                       <div class="row">

                            <div class="col-md-6 form-group">
                              <label>Nome</label>
                              <div class="input-group has-validation">
                             
                              <input type="text" name="nome_utente" class="form-control" id="nome" placeholder="Seu Nome" data-rule="minlen:4" required value="">

                              <div class="invalid-feedback">Por favor digite o seu nome!</div>
                             </div>
                            </div>


                          
                            <div class="col-md-6 form-group mt-3 mt-md-0">
                              <label>Nº Telefónico</label>

                              <script src="paineis/mascara.min.js"></script>

                              <input type="text" class="form-control" name="telefone" data-msg="Por favor digite o seu telefone" required id="telefone" id="telefone" placeholder="9##-###-###" onkeyup="mascara('###-###-###',this,event,true);" maxlength="14">
                              <div class="validate"></div>
                              <div class="invalid-feedback">Por favor digite o seu telefone!</div>
                            </div>
                            
                        <div class="col-md-6 form-group mt-3 mt-md-3">
                              <label>Email</label>

                              <input type="email" class="form-control" name="email" id="email" placeholder="Seu email" data-rule="email" data-msg="Por favor edigite o seu email válido" required>
                              <div class="validate"></div>
                              <div class="invalid-feedback">Por favor edigite o seu email!</div>
                            </div>


                           <div class="col-md-6 form-group mt-3">
                              <label>Género</label>

                            <select name="sexo" id="genero" class="form-select" required>
                              <option value="">Selecione o Género</option>
                                 <option value="Masculino">Masculino</option>
                                 <option value="Feminino">Feminino</option>
                            </select>
                            <div class="validate"></div>
                          </div>

                        </div>

                        <div class="row">

                          <div class="col-md-6 form-group mt-3">
                              <label>Data Nascimento</label>

                            <input type="date" class="form-control" name="data_nascimento" id="data_nascimento" placeholder="Sua Data Nascimento" data-rule="minlen:4" data-msg="Por favor insere Sua Data Nascimento!" required>
                            <div class="validate"></div>
                             <div class="invalid-feedback">Por favor insere Sua Data Nascimento!</div>
                          </div>


                           <div class="col-md-6 form-group mt-3">
                              <label>Senha</label>

                            <input type="password" class="form-control" name="senha" id="senha" placeholder="Sua Senha" data-rule="minlen:4" data-msg="Por favor insere a sua senha!" required>
                            <div class="validate"></div>
                             <div class="invalid-feedback">Por favor insere a sua senha!</div>
                          </div>

                          
                        </div>

                        <br>
                        <br>
                        <br>
                        <br>
                        
                          <a href="login_pag_marc_consulta.php" id="cancelar" class="btn btn" value=""  style="border-radius: 0px; height: 40px; background: #f44336; color: #fff; width: 30%; margin: 10px;">Voltar</a>
                          <input type="submit" id="button" value="Cadastrar" name="button" class="btn btn-success" style="border-radius: 0px; margin: 10px auto; width: 55%; height: 40px" />  
                        
        </form>
          </div>
            </div>
        <script src="assets/vendor/tinymce/tinymce.min.js"></script>

       </div>
         </div>
           </div>
  </section>
</body>