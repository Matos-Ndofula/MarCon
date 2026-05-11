<?php	

	include_once("../configs/conexao.php");
require("config_encript_decrypt_url.php");
	

	$html = '<table class="table table-striped table-bordered table-hover" border=1 style="width: 100%">';	
	$html .= '<thead>';
	$html .= '<tr>';
	$html .= '<th>Nº Documento</th>';
	$html .= '<th>Nome Utente</th>';
	$html .= '<th>Especialidade</th>';
	$html .= '<th>Nome Médico</th>';
	$html .= '<th>Data Consulta</th>';
	$html .= '<th>Estado Consulta</th>';
	$html .= '</tr>';
	$html .= '</thead>';
	$html .= '<tbody>';
	

if(isset($_GET['id']) && !empty($_GET['id'])){
       $id = $_GET['id'];
       $id = encryptor('decrypt', $id);

       if (!empty($id)) {

	$result_transacoes = "SELECT * FROM consultas_agendadas WHERE id='$id'";
	$resultado_trasacoes = mysqli_query($mysqli, $result_transacoes);
	while($row_transacoes = mysqli_fetch_assoc($resultado_trasacoes)){
		$html .= '<tr style="text-align: center;"><td>'.$row_transacoes['id'] . "</td>";
		$html .= '<td>'.$row_transacoes['nome_utente'] . "</td>";
		$html .= '<td>'.$row_transacoes['especialidade'] . "</td>";
		$html .= '<td>'.$row_transacoes['nome_medico'] . "</td>";
		$html .= '<td>'.$row_transacoes['data_horario'] . "</td>";
		$html .= '<td style="color: green;">'.$row_transacoes['estado'] . "</td></tr>";
				
	}
	
	$html .= '</tbody>';
	$html .= '</table>';

	$html .= '<br>';
	$html .= '<br>';
	$html .= '<br>';
	$html .= '<br>';
	$html .= '<br>';


	$html .= '<h5 style="text-align: center;">Assinado</h5>';
	$html .= '<br>';
	
	$html .= '<span style="text-align: center; width: 100px"><hr style="width: 500px"></span>';


       }


    }

	
	//referenciar o DomPDF com namespace
	use Dompdf\Dompdf;

	// include autoloader
	require_once("dompdf-2.0.7/dompdf/autoload.inc.php");

	//Criando a Instancia
	$dompdf = new DOMPDF();
	
	// Carrega seu HTML
	$dompdf->load_html('
			<h1 style="text-align: center;">SisCOns</h1>
			<h4 style="text-align: center;">Relatório Médico</h4>
			'. $html .'
		');

	//Renderizar o html
	$dompdf->render();

	//Exibibir a página
	$dompdf->stream(
		"Consulta_Atendida.pdf", 
		array(
			"Attachment" => true //Para realizar o download somente alterar para true
		)
	);

	 // Buscar dados da tabela de origem
    $result_pesq = "SELECT * FROM consultas_agendadas WHERE id='".$id."'";

    $resultado_pesquisa = mysqli_query($mysqli, $result_pesq);

    if ($resultado_pesquisa->num_rows > 0) {
      
       while($rows_pesquisar = mysqli_fetch_array($resultado_pesquisa)){

          $id_utente = mysqli_real_escape_string($mysqli, $rows_pesquisar['id']);
          $nome_utente = mysqli_real_escape_string($mysqli, $rows_pesquisar['nome_utente']);
          $especialidade = mysqli_real_escape_string($mysqli, $rows_pesquisar['especialidade']);
          $nome_medico = mysqli_real_escape_string($mysqli, $rows_pesquisar['nome_medico']);
          $color = mysqli_real_escape_string($mysqli, $rows_pesquisar['color']);
          $data_horario = mysqli_real_escape_string($mysqli, $rows_pesquisar['data_horario']);
          $estado = mysqli_real_escape_string($mysqli, $rows_pesquisar['estado']);
          $obs = mysqli_real_escape_string($mysqli, $rows_pesquisar['obs']);
          $horario = mysqli_real_escape_string($mysqli, $rows_pesquisar['horario']);



            // Inserir na tabela de destino
           
   $insert = $mysqli->query("INSERT INTO `consultas_atendidas`(`id_utente`,`nome_utente`,`especialidade`, `nome_medico`, `color`, `data_horario`, `estado`, `obs`, `horario`) VALUES ('$id_utente','$nome_utente', '$especialidade', '$nome_medico', '$color', '$data_horario','$estado', '$obs', '$horario')");
        }

       if($insert){
   echo '<script>alert("Consulta removida");</script>
';
  
  echo "<script>window.location='painel_utente_desmarcar_consulta.php'</script>";

   $query = "DELETE FROM consultas_agendadas WHERE id='".$id."'";
    if(mysqli_query($mysqli, $query)){
  
} 
            }else{
    echo '<script>alert("Consulta não foi removida");</script>';
            }

}else{
         echo "Erro de Linha";
    }
?>