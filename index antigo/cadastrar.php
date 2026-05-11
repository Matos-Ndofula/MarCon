<?php
  require("configs/conexao.php");
  include("cadastrar_utente.php");

  session_start();
?>
<!DOCTYPE html >
<html >
<head>
   <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>SisCOns - Login</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Vendor CSS Files -->
  <link href="assets_paineis/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets_paineis/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets_paineis/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  

   <script type="text/javascript" src="jquery-3.5.1.js"></script>
    
     <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <link href="assets/css/style_login_medico.css" rel="stylesheet">

    
   
  
</head>
<body style="background: darkgray">
 
    <div class="container">
       <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4" style="width: 680px;margin: 20px auto;">
 
                <div class="card" style="border: none; border-radius: 0px; border-top: 6px solid #129">
                  <div class="card-body">
                    <div lass="form_campos_login" >

              <h4 style="color: #000" class="modal-title">Cadastra-se!</h4>
                    <label style="color: #000 ;">Campos Obrigatórios </label>(<span style="color: red">*</span>)                      
                
                              <h1 style="margin-left: 45%; width: 100px; height: 40px; color: #000;" class="bi bi-person-circle"></h1>
                         
                    
              
              <form action="" method="POST" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
                       <div class="row">

                            <div class="col-md-7 form-group">
                              <label>Nome (<span style="color: red">*</span>)</label>
                              

                             <input type="text" name="nome_utente" id="nome_utente" class="form-control" placeholder="Seu Nome" required>

                               <div class="validate"></div>
                               <div class="invalid-feedback">Por favor Selecione o nome utente!</div>
                            
                        </div>

                   <div class="col-md-5 form-group mt-3 mt-md-0">
                              <label>Nº Tel: (<span style="color: red">*</span>)Pessoal ou WhatsApp</label>
                      <script src="paineis/mascara.min.js"></script>

                              <input type="text" class="form-control" name="telefone" data-msg="Por favor digite o seu telefone" required id="telefone" id="telefone" placeholder="9##-###-###" onkeyup="mascara('###-###-###',this,event,true);" maxlength="14">
                              <div class="validate"></div>
                              <div class="invalid-feedback">Por favor digite o seu telefone!</div>
                            </div>
                            
                        
                        </div>

                          <div class="row">
                            
                            <div class="col-md-7 form-group mt-3 mt-md-3">
                              <label>Email (<span style="color: red">*</span>)</label>
                            
                              <input type="email" class="form-control" name="email" id="email" placeholder="Seu email" data-rule="email" data-msg="Por favor edigite o seu email válido" required>
                              <div class="validate"></div>
                              <div class="invalid-feedback">Por favor edigite o seu email!</div>
                            </div>


                           <div class="col-md-5 form-group mt-3">
                              <label>Género (<span style="color: red">*</span>)</label>
                            
                            <select name="sexo" id="genero" class="form-select" required>
                              <option value="">Selecione o Gênero</option>
                                 <option value="Masculino">Masculino</option>
                                 <option value="Feminino">Feminino</option>
                            </select>
                            <div class="validate"></div>
                              <div class="invalid-feedback">Por favor Selecione o seu género!</div>
                          </div>

                        </div>

                        <div class="row">

                          <div class="col-md-7 form-group mt-3">
                              <label>Data Nascimento (<span style="color: red">*</span>)</label>

                            <input type="date" class="form-control" name="data_nascimento" id="data_nascimento" placeholder="Sua Data Nascimento" data-rule="minlen:4" data-msg="Por favor insere Sua Data Nascimento!" required>
                            <div class="validate"></div>
                             <div class="invalid-feedback">Por favor insere Sua Data Nascimento!</div>
                          </div>


                           <div class="col-md-5 form-group mt-3">
                              <label>Senha (<span style="color: red">*</span>)</label>

                            <input type="password" class="form-control" name="senha" id="senha" placeholder="Sua Senha" required>

                            <div class="validate"></div>
                              <div class="invalid-feedback">Por favor insere a sua senha!</div>
                          </div>

                          <div class="row">
                            <div class="col-md-12 form-group mt-3">
                              <div class="form-check">

                              <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required="">
                              <label class="form-check-label" for="invalidCheck">
                               <a href=""></a>
                                  <a class="nav-link collapsed" href="" data-bs-toggle="modal" data-bs-target="#termos_e_condições">
                                    <span>Aceitar os termos e condições</span>
                                  </a>
                            </div>

                          
                        </div>

                        <br>
                        <br>
                        <br>

            <div class="row">
                        <div class="col-md-4 form-group mt-0">
                          <br>
                        	<input type="submit" id="button" value="Cadastrar" name="button" class="btn btn-success w-75" style="border-radius: 0px;" name="button" />  
                    	</div>

                       <div class="col-md-4 form-group mt-0">
                          <br>
                        <a href="index.php" type="button" value="" class="btn w-75" style="border-radius: 0px; float: left; color: #fff; background: rgb(188, 48, 48);" name="" >Cancelar</a>
                            
                      </div>
                        
                        <div class="col-md-4 form-group mt-0">
                          <br>
           		        	<a href="login.php" type="button" value="" class="btn btn-primary w-75" style="border-radius: 0px; float: left;" name="" >Logar</a>
                    	</div>
                    </div>


	                        
    <!---INICIO MODAL PARA TERMOS E CONDIÇÕES -->

      <div  class="modal fade" id="termos_e_condições" tabindex="-1" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-ms">
                  <div class="modal-content">
                    <div class="modal-header">
                     <span>             </span> <h5 class="modal-title">Termos e Condições</h5>
                      <button typen="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div  class="modal-body">

         <div class="" >
             <p> Abaixo estão alguns dos Termos e Condições:</p>
            
      </div>

                    </div>
                    </div>
                </div>
              </div>
        <!---FIM MODAL PARA CADATRAR AGENDAMENTO MÉDICO -->
        
        </form>
        <script src="assets/vendor/tinymce/tinymce.min.js"></script>


           </div>  
           </div>  
           </div>  
    </section>
</div>
	<span hidden="" id="row"><?php  $row = $select->num_rows; ?></span>
  <script src="js/jquery.js"></script>
<script type="text/javascript" src="jquery-3.5.1.js"></script>

 <script type="text/javascript">
 /* 
                          <input type="button" id="showPassword" value="Mostrar" class="button" />
 $(document).ready(function(){
  $('#showPassword').on('click', function(){
    
    var passwordField = $('#senha');
    var passwordFieldType = passwordField.attr('type');
    if(passwordFieldType == 'password')
    {
        passwordField.attr('type', 'text');
        $(this).val('Ocultar');
    } else {
        passwordField.attr('type', 'password');
        $(this).val('Mostrar');
    }
  });
});*/
</script>
  <!-- Vendor JS Files -->
  <script src="paineis/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets_paineis/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets_paineis/assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets_paineis/assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets_paineis/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets_paineis/assets/js/main.js"></script>


</body>
</html>
