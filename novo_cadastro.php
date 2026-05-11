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

  <title>SisCOns - Cadastro</title>
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

<!-- Estilos específicos para o painel de cadastro -->
<style>
    .modal-registration {
       
          max-width: 577px;
          background: rgba(255, 255, 255, 0.8);
          backdrop-filter: blur(15px);
          border-radius: 5px;
          border: 1px solid rgba(255, 255, 255, 0.3);
          box-shadow: 20px 20px 40px rgba(0, 0, 0, 0.15);
          padding: 16px;
          margin: 50px auto;
          margin-top: 50px;
          font-family: 'Segoe UI', sans-serif;
          
}

   .cadastro-header {
        display: flex;
        align-items: center;
        color: #1a3c5a;
        border-bottom: 2px solid #1a3c5a;
        padding-bottom: 5px;
        margin-bottom: 10px;

        
    }

    .cadastro-header i {
        font-size: 1.8rem;
        margin-right: 15px;
    }

    .cadastro-header h2 {
        font-size: 1.4rem;
        font-weight: 700;
        margin: 0;
        letter-spacing: 1px;
        font-family: 'Time', sans-serif;
    }

    .form-label {
        font-weight: 600;
        color: #333;
        font-size: 0.85rem;
        margin-bottom: 5px;
    }

    .input-group-text {
        background-color: white;
        border-right: none;
        color: #888;
    }

    .form-control, .form-select {
        width: 100%;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: white;
        font-size: 0.95rem;
        transition: 0.3s;

    }

    .form-control:focus, .form-select:focus {
        box-shadow: none;
        border-color: #dee2e6;
    }

    .btn-finish {
       
        width: 100%;
        background-color: #1a3c5a;
        color: white;
        border: none;
        padding: 8px;
        border-radius: 3px;
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-top: 15px;
        cursor: pointer;
        transition: background 0.3s;
    }

    .btn-finish:hover {
        background-color: #0d253a;
        color: white;
    }

    .modal-footer-links {
        display: flex;
        justify-content: space-between;
        margin-top: 15px;
        font-size: 0.8rem;
    }

    .modal-footer-links a {
        color: #1a3c5a;
        text-decoration: none;
    }

    .cancel-link {
        color: #666 !important;
    }

    .termos:hover{
        color: #000;
    }
</style>

<!-- Estrutura do Painel -->
<div class="container">
    <div class="modal-registration">
        <div class="cadastro-header">
            <i class="bi bi-person-plus"></i>

        <h2>Registo de Novo Utente</h2>
        </div>

        <form action="" method="POST" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>

            <div class="row g-3">
                <!-- Nome Completo -->
                <div class="col-md-6">
                    <label class="form-label">Nome Completo (<span style="color: red">*</span>)</label>

                        <input type="text" name="nome_utente" id="nome_utente" class="form-control" placeholder="Seu Nome" required>

                         <div class="validate"></div>
                         <div class="invalid-feedback">Por favor Selecione o nome utente!</div>
                

                </div>

                <!-- Data de Nascimento -->
                <div class="col-md-6">
                    <label class="form-label">Data de Nascimento</label>
                    
                        <input type="date" class="form-control" name="data_nascimento" id="data_nascimento" placeholder="Sua Data Nascimento" data-rule="minlen:4" data-msg="Por favor insere Sua Data Nascimento!" required>
                             <!--<div class="validate"></div>
                              <div class="invalid-feedback">Por favor insere Sua Data Nascimento!</div>-->
                   
                </div>

                <!-- Email -->
                <div class="col-md-6">
                    <label class="form-label">Email (<span style="color: red">*</span>)</label>
                    
                              <input type="email" class="form-control" name="email" id="email" placeholder="Seu email" data-rule="email" data-msg="Por favor edigite o seu email válido" required>
                              <div class="validate"></div>
                              <div class="invalid-feedback">Por favor edigite o seu email!</div>
                </div>

                <!-- Género -->
                <div class="col-md-6">
                    <label class="form-label">Género</label>
                     <select name="sexo" id="genero" class="form-select" required>
                              <option value="">Selecione o Género</option>
                                 <option value="Masculino">Masculino</option>
                                 <option value="Feminino">Feminino</option>
                            </select>
                            <!--<div class="validate"></div>
                              <div class="invalid-feedback">Por favor Selecione o seu género!</div>-->
                </div>

                <!-- Nº Tel -->
                <div class="col-md-6">
                    <label class="form-label">Nº Tel: (<span style="color: red">*</span>)Pessoal ou WhatsApp</label>
                    <script src="paineis/mascara.min.js"></script>

                              <input type="text" class="form-control" name="telefone" data-msg="Por favor digite o seu telefone" required id="telefone" id="telefone" placeholder="9##-###-###" onkeyup="mascara('###-###-###',this,event,true);" maxlength="14">
                              <div class="validate"></div>
                              <div class="invalid-feedback">Por favor digite o seu telefone!</div>
                </div>

                <!-- Senha -->
                <div class="col-md-6">
                    <label class="form-label">Senha (<span style="color: red">*</span>)</label>

                            <input type="password" class="form-control" name="senha" id="senha" placeholder="Sua Senha" required>

                            <div class="validate"></div>
                              <div class="invalid-feedback">Por favor insere a sua senha!</div>
                </div>

               
            </div>

            <button type="submit" class="btn btn-finish" id="button" value="Cadastrar" name="button">Concluir Cadastro</button>
            
            <div class="modal-footer-links">
                            
                  <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required="">
                        <a class="nav-link collapsed termos" href="" data-bs-toggle="modal" data-bs-target="#termos_e_condições">
                        <span>Ver Termos e Condições</span>
                      </a>
                    <a href="novo_login.php">Login</a>
                    <a href="index.php" class="cancel-link">Cancelar</a>

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
    
        <span hidden="" id="row"><?php  $row = $select->num_rows; ?></span>
          <script src="js/jquery.js"></script>
        <script type="text/javascript" src="jquery-3.5.1.js"></script>

         <script type="text/javascript">


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


