<?php
//Oculta todos os erros na tela
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(1);


require("../configs/conexao.php");
include("marcacao_utente_consulta.php");
include ("Mensagens sweetAlerts/links_mensagens_sweetAlerts.php");
//include("pega_nome_medico.php");
session_start();
require("../configs/protecao.php");
protegerUser();
//require("historico_medico.php");

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

							<div class="boas_vindas" style="padding: 10px; background: darkgray;
	width: 100%;height: 20%; color: #000;  margin-top: 20px">
							 <h3>Marcação Consulta</h3>
						 </div>
					<div class="card_corpo" style="display: inline-flex;  margin-top: 20px">
					

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

						 $result_pesq_agenda_medico = "SELECT * FROM agendamento_medico";
						$resultado_pesquisa_agenda_medico = mysqli_query($mysqli, $result_pesq_agenda_medico);
						
	 
							 //$_GET["id_Especialidade"];"<h3 id='titulo'></h3>"
						//     $rows_pesquisar2 = mysqli_fetch_array($resultado_pesquisa2);
							//  $id_Especialidade = $rows_pesquisar2['id'];
/*
							$result_pesq_compara_especialidade = "SELECT * FROM agendamento_medico";
								$resultado_pesquisa_compara_especialidade = mysqli_query($mysqli, $result_pesq_compara_especialidade);

								$rows_pesquisar_compara_especialidade = mysqli_fetch_array($resultado_pesquisa_compara_especialidade);

								$especialidade_comparada = $rows_pesquisar_compara_especialidade['especialidade'];

								 $dia_da_semana_comparada = $rows_pesquisar_compara_especialidade['dias_da_semana'];


							if ($rows_pesquisar2['especialidade'] == $especialidade_comparada) {
														echo " <script>alert('Os dias dele são'".$resultado_pesquisa_dia_semana."'');</script> ";
													}


								<input type="text" name="nome_utente" class="form-control" value="<?php echo $nome_utente; ?>" required>     
								<input type="text" id="mostra_especialidade" value="<?php echo $mostra_especialidade; ?>" hidden>     
								<input type="text" id="mostra_dias_da_semana" value="<?php echo $mostra_dias_da_semana; ?>" hidden>     
 const inputmostra_especialidade = document.getElementById("mostra_especialidade"); 
			const inputmostra_dias_da_semana = document.getElementById("mostra_dias_da_semana"); 
const selecione_mostra_especialidade = inputmostra_especialidade.value;
			 const selecione_mostra_dias_da_semana = inputmostra_dias_da_semana.value;
												<input type="text" name="" value="<?php echo date('w');?>">
					
*/

	?>
				
						<div class="col-md-4 form-group mt-3 mt-md-0">
							<label>Nome Utente  </label>

								<div class="input-group has-validation">

								<input type="text" name="nome_utente" class="form-control" value="<?php echo $nome_utente; ?>" required>     

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

									 <option  value="<?php echo $rows_pesquisar2['especialidade']; ?>" ><?php echo $rows_pesquisar2['especialidade']; 

								 ?></option>
								 <?php
									 }
									?>             
									 </select>
								<div class="validate"></div>
								 <div class="invalid-feedback">Por favor selecione a especialidade!</div>
						 </div>

				<!---
		<script src="mostrar_dados_select.js"></script>
		<script src="mostrar_dados_select2.js">
		
--> 
		<script>
	const inputselecioneEspecialidade = document.getElementById("selecioneEspecialidade"); 
	 
			function selecione(){
			 const selecione_Especialidade = inputselecioneEspecialidade.value;
			

			$("#especialidade_da_funcao").val(selecione_Especialidade);
			
			 // document.getElementById('mostrar_data_horario').innerHTML =selecione_Especialidade;
				document.getElementById('mostrar_data_horario').style.opacity = 1; 
			 // document.getElementById('mostrar_dias_medico_').style.opacity = 1; 

				if (window.XMLHttpRequest) {
					xmlhttp = new XMLHttpRequest();
				} else{
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange = function(){
					if (this.readyState == 4 && this.status == 200) {
						document.getElementById('selecioneNomeMedico').innerHTML = this.responseText;
					}
				}
					xmlhttp.open("GET","mostrar_dados_select2.php?value="+selecione_Especialidade, true);
					xmlhttp.send();

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


		if (nomeDiaSemana === "Domingo" || nomeDiaSemana === "Sábado") {
			alert("Segundas-feiras e Sábados estão desabilitados!");
			//inputdataConsulta.value = "";
		}
						// Exibe o nome do dia da semana
					 // alert("O dia selecionado é " + nomeDiaSemana);
						$("#mostra_nome_dia").val(nomeDiaSemana);
					 
						switch (nomeDiaSemana){
						case "Segunda-feira":
							
							data.setDate(data.getDate() - 1);
							
							
							break;

							 case "Terça-feira":
							 
							data.setDate(data.getDate() - 2);

							break;

							 case "Quarta-feira":
							data.setDate(data.getDate() - 3);
							
							break;

							 case "Quinta-feira":
							data.setDate(data.getDate() - 4);
							
							break;

							 case "Sexta-feira":
							data.setDate(data.getDate() - 5);
							
							break;

						default:
							alert("Não é possivel seleccionar Sábados e Domingos!");
						}
						let dd = String( data.getDate()).padStart(2, '0');
							let mm = String(data.getMonth() + 1).padStart(2, '0') ;
							let yy = data.getFullYear();
							data = `${yy}-${mm}-${dd}`;
						 $("#mostra_nome_dia_actual").val(data);
						
	<?php 
						$result_pesq = "SELECT * FROM agendamento_medico ";
						
						$resultado_pesquisa = mysqli_query($mysqli, $result_pesq);

			
			
			while ($rows_pesquisar = mysqli_fetch_array($resultado_pesquisa)) {
						
						if ( $rows_pesquisar["especialidade"]) {

				 echo $rows_pesquisar["dias_da_semana"];
						}
					 
					}
				
			

		?>

		
			var select = document.getElementById("meuSelect");
			var mensagem = document.getElementById("mensagem");

			if (select.options.length === 0) {
				mensagem.textContent = "O select está vazio!";
				mensagem.style.color = "red";
			} else {
				mensagem.textContent = "O select tem opções disponíveis.";
				mensagem.style.color = "green";
			}
		
				
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

							<input type="color" class="form-control" name="color" id="color" placeholder="Selecione a cor" value="#b7a108" >
							<div class="validate"></div>
							<div class="invalid-feedback">Por favor selecione a cor!</div>
						</div>

 <?php 
	 

		?>
						<div class="col-md-4 form-group mt-4" >
								<label>Data Consulta  </label>(<span style="color: red">*</span>)
								 
								 <div id="mostrar_data_horario"  style="opacity: 0;">
										<script type="text/javascript" src="dias_da_semana.js"></script>
												<input type="date" min="<?php echo date("Y-m-d");?>" max="<?php echo date("Y-m-d", strtotime("+30 days", strtotime(date("Y-m-d"))));?>"  class="form-control" id="data_horario" name="data_horario" placeholder="Digite a Data"  required  onchange = "selecione1();">
			 <?php  

					
						$mostra_especialidade = '<input type="text" id="especialidade_da_funcao" >';
							 echo $mostra_especialidade;

										$rows_pesquisar_agenda_medico = mysqli_fetch_array($resultado_pesquisa_agenda_medico);

												 $especialidade_agenda_medico = $rows_pesquisar_agenda_medico['especialidade'];

									
											
								
	?> 
													
								 <input type="text" value="<?php echo $rows_pesquisar_agenda_medico['dias_da_semana']; ?>">
									
								 <?php

									?> 

							
															<div class="validate"></div>
															<div class="invalid-feedback">Por favor digite a Data!</div>
								</div>
						</div>

		 <style>
		 	.form-control , .form-select{
  border: 2px solid #0764de;
}
		  .radio-group {
		  display: block; 
		gap: 10px; 
	font-family: sans-serif; 
} 
/* Esconde o rádio original */ 
.radio-group input[type="radio"] {
 display: none; 
  
cursor: pointer; 
} 

/* Estilo do botão (Label) quando não selecionado */ 

.radio-group label {
 padding: 10px 20px;
  background-color: white;
   color: #007bff; 
border: 2px solid #007bff;
 border-radius: 5px;
transition: all 0.3s ease; 
font-weight: bold;                                                                                                     
} 

/* Estilo quando o rato passa por cima */ 

.radio-group label:hover {
 background-color: #f0f7ff; 
} 

/* Estilo do botão selecionado (Azul) */ 

.radio-group input[type="radio"]:checked + label {
 background-color: #007bff; color: white; 
} 
</style> 
						 

						<div class="col-md-4 form-group mt-4">
							<label for="meuSelect">Horários Disponíveis  </label>(<span style="color: red">*</span>)
								
								
								<div class="input-group has-validation" id="selecioneHorario">
									<div id="mostrar_data_horario"  style="opacity: 0;">
											
											
							<div class="radio-group"  name="horario" id="meuSelect"  required> 
							        							     
							    </div>

								
											<div class="invalid-feedback">Horario vazio ou todos já estão ocupados nesse dia!</div>
										</div> 
								</div> 
				 
						 <br>
			
			<p id="mensagem"></p>

						 <div class="alert alert-warning alert-dismissible fade show" role="alert" hidden>
								<i class="bi bi-exclamation-triangle me-1"></i>
								Todos Já Ocupados! Tente num outro dia.
								<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
							</div>
			

			
					</div>
													<div class=" col-md-4 form-group mt-4">
															<label> Observações  </label>
														 <textarea class="form-control" name="obs" id="obs" rows="1" placeholder="Observações (Opcional)"></textarea>
														 <!--<input type="text" name="" id="mostra_nome_dia" >-->
														 <input type="date" name="dia" id="mostra_nome_dia_actual" >
													
															<div class="validate"></div>
													</div>

							
											 <div hidden="" class=" col-md-4 form-group mt-3 ms-0">
														<br>  <input style="color: blue" type="text" class="form-control" name="estado" id="estado" placeholder="Selecione o estado" value="Agendado" >
											<div class="validate"></div>
													</div>

								<div class="col-md-4 form-group mt-0">
										<label>Campos Obrigatórios </label>(<span style="color: red">*</span>)
								
									</div>
											 

			</div>
				 
						<div class='container'>
	 
			<input  type="submit" id="button" class="btn btn-primary w-10" style="width: 150px; margin-left: 50px; height: 35px; border-radius: 0px; float: right;" value="Marcar Consulta" name="button"/>
			<a class="btn btn-danger" style="width: 150px; height: 35px; border-radius: 0px; float: right;" href="painel_cadastro_utente_boas_vindas.php">Cancelar</a>
					<br>
				</div>
				</form>
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
							 <a  href="meu_perfil.php?id=<?php echo $id; ?>" id="button"  class="btn btn-danger w-25" style="border-radius: 0px; float: right;" >Editar</a>
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
</body>

</html>


//$resposta = "Todos Já Ocupados! Tente num outro dia.";
          echo"<div class='radio-group' name='horario' id='meuSelect' required>" ; 
            for ($i=0; $i <$cont ; $i++) { 
               if ($horario_ocupado[$i]!=null) {

              echo "<input type='radio' id='opcao1' value=".$horario_ocupado[$i]." name='escolha'>"; 
              echo "<label for='opcao1'>".$horario_ocupado[$i]."</label>"; 
              
              
             
            
            } 
          }  
         echo "</div>";
         


         $data = "SELECT horario FROM consultas_agendadas WHERE data_horario = '$data_horario' AND especialidade <>'$especialidade' AND horario = $horario";

         $res_horario = mysqli_query($mysqli3, $data);
         $row_horario = mysqli_fetch_array($res_horario);
         $cont = 0;
         while ($row_horario){
            
          if ($horario = $row_horario[$cont]) {
             echo '<script>alert("Já tens uma consulta marcada nesse horario!");</script>';
             $existe = 'Sim';
             break;
          }else{
             $existe = 'Não';
             echo  $existe.'<script>alert("Não tens uma consulta marcada nesse horario!");</script>';

         }

            $cont=$cont+1;
          }





CREATE TABLE consultas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    data_consulta DATE NOT NULL,
    status ENUM('Marcada', 'Realizada', 'Cancelada') NOT NULL
);
Use o código com cuidado.

2. O Código (index.php)
Este script faz tudo: conecta ao banco, processa os totais por mês e por status,
 e gera os gráficos.
php
<?php
// Configurações de conexão
$host = "localhost";
$user = "root";
$pass = "";
$db   = "sistema_medico";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// 1. Dados para o Gráfico de Linha (Consultas por Mês)
$meses_label = ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", 
"Out", "Nov", "Dez"];
$dados_meses = array_fill(0, 12, 0);

$res_mes = $conn->query("SELECT MONTH(data_consulta) as mes, COUNT(*) as total 
FROM consultas GROUP BY mes");
while($row = $res_mes->fetch_assoc()) {
    $dados_meses[$row['mes'] - 1] = $row['total'];
}

// 2. Dados para o Gráfico de Pizza (Consultas por Status)
$status_counts = ['Marcada' => 0, 'Realizada' => 0, 'Cancelada' => 0];
$res_status = $conn->query("SELECT status, COUNT(*) as total FROM consultas GROUP
 BY status");
while($row = $res_status->fetch_assoc()) {
    $status_counts[$row['status']] = $row['total'];
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Painel Admin - Consultas</title>
    <script src="https://cdn.jsdelivr.net"></script>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f7f6; padding: 20px; }
        .container { max-width: 900px; margin: auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .chart-container { margin-bottom: 40px; padding: 20px; border: 1px solid #eee; border-radius: 8px; }
        h2 { font-size: 1.2rem; color: #333; border-bottom: 1px solid #eee; padding-bottom: 10px; }
    </style>
</head>
<body>

<div class="container">
    <h1>Painel Admin - Sistema de Consultas Médicas Online</h1>

    <!-- Gráfico de Linha -->
    <div class="chart-container">
        <h2>Consultas por Mês</h2>
        <canvas id="graficoLinha"></canvas>
    </div>

    <!-- Gráfico de Pizza -->
    <div class="chart-container">
        <h2>Consultas por Status</h2>
        <canvas id="graficoPizza" style="max-height: 400px;"></canvas>
    </div>
</div>

<script>
// Configuração Gráfico de Linha
const ctxLinha = document.getElementById('graficoLinha').getContext('2d');
new Chart(ctxLinha, {
    type: 'line',
    data: {
        labels: <?php echo json_encode($meses_label); ?>,
        datasets: [{
            label: 'Total de Consultas',
            data: <?php echo json_encode($dados_meses); ?>,
            borderColor: '#3498db',
            backgroundColor: '#3498db',
            fill: false,
            tension: 0.1,
            pointRadius: 5
        }]
    }
});

// Configuração Gráfico de Pizza
const ctxPizza = document.getElementById('graficoPizza').getContext('2d');
new Chart(ctxPizza, {
    type: 'pie',
    data: {
        labels: ['Marcada', 'Realizada', 'Cancelada'],
        datasets: [{
            data: [
                <?php echo $status_counts['Marcada']; ?>, 
                <?php echo $status_counts['Realizada']; ?>, 
                <?php echo $status_counts['Cancelada']; ?>
            ],
            backgroundColor: ['#4caf50', '#2196f3', '#f44336']
        }]
    },
    options: {
        plugins: {
            legend: { position: 'right' }
        }
    }
});
</script>

</body>
</html>



*********************


          <?php 
          // CONSULTAS POR MÊS
    $queryMes = "SELECT MONTH(data_horario) AS mes, COUNT(*) as total_consultas_1 FROM consultas_agendadas GROUP BY MONTH(data_horario) ORDER BY mes ";


            $resultMes = mysqli_query($mysqli, $queryMes);

            $meses = [];
            $totaisMes = [];

            while($row = mysqli_fetch_assoc($resultMes)){
                $meses[] = $row['mes'];
                $totaisMes[] = $row['total_consultas_1'];
            }
           ?>


        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Consultas por Mês</h5>

              <!-- Line Chart -->
              <canvas id="lineChart" style="max-height: 400px;"></canvas>
              <script>
                const meses = <?php echo json_encode($meses); ?>;
                const totaisMes = <?php echo json_encode($totaisMes); ?>;
                document.addEventListener("DOMContentLoaded", () => {
                  new Chart(document.querySelector('#lineChart'), {
                    type: 'line',
                    data: {
                      labels: meses,
                      datasets: [{
                        label: 'Total de Consultas',
                        data: totaisMes,
                        fill: false,
                        borderColor: 'rgb(75, 192, 192)',
                        tension: 0.1
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
              <!-- End Line CHart -->

            </div>
          </div>
        </div> 

        /////////////


        <?php
        // 1. Dados para o Gráfico de Linha (Consultas por Mês)

$dados_meses = array_fill(0, 12, 0);

$res_mes = $conn->query("SELECT MONTH(data_horario) as mes, COUNT(*) as total 
FROM consultas_agendadas GROUP BY mes");
while($row = $res_mes->fetch_assoc()) {
    $dados_meses[$row['mes'] - 1] = $row['total'];
}

   ?>

   <!-- Gráfico de Linha -->
    <div class="chart-container">
        <h2>Consultas por Mês</h2>
        <canvas id="graficoLinha"></canvas>
    </div>
<script>
// Configuração Gráfico de Linha
const ctxLinha = document.getElementById('graficoLinha').getContext('2d');
new Chart(ctxLinha, {
    type: 'line',
    data: {
        labels: <?php echo json_encode($meses_label); ?>,
        datasets: [{
            label: 'Total de Consultas',
            data: <?php echo json_encode($dados_meses); ?>,
            borderColor: '#3498db',
            backgroundColor: '#3498db',
            fill: false,
            tension: 0.1,
            pointRadius: 5
        }]
    }
});

</script>

/////////

<div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <br>
              <h5 class="">Consultas de cada mês</h5>

              <!-- Bar Chart -->
              <canvas id="barChart" style="max-height: 400px; display: block; box-sizing: border-box; height: 220px; width: 438px;" width="438" height="219"></canvas>
              <?php 
         

          $sql5 =  "SELECT COUNT(data_horario) AS total_consultas FROM consultas_agendadas WHERE data_horario=date('2025-05-29')";
          $result5 = mysqli_query($mysqli5, $sql5);

            if($result5 && $result5->num_rows > 0) {
                $row5 = $result5->fetch_assoc();
                $totalConsultas = $row5["total_consultas"];
                $mes = date('M');
                ?>

              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  new Chart(document.querySelector('#barChart'), {
                    type: 'bar',
                    data: {
                      labels: ['January', 'February', 'March', '<?php echo $mes;?>', 'May', 'June', 'July'],
                      datasets: [{
                        label: 'Bar Chart',
                        data: [65, 59, 80, 81, 56, 55, <?php echo $totalConsultas;?>],
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

          	
									<p>
										<button class="btn btn-outline-primary" type="button" data-toggle="collapse" data-target=#collapseExample aria-expanded="false" aria-controls="collapseExample"> 
										Botão 1
									</button>

									<button class="btn btn-outline-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="true" aria-controls="collapseExample"> 
										Botão 1
									</button>

									<button class="btn btn-outline-primary" type="button" data-toggle="collapse" data-target=#collapseExample aria-expanded="false" aria-controls="collapseExample"> 
										Botão 1
									</button>
									</p>