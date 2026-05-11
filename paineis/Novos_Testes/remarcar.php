<?php
// Receber dados do formulário
$id_consulta   = mysqli_real_escape_string($con, $_POST['id_consulta']);
$nova_data     = mysqli_real_escape_string($con, $_POST['data_consulta']);
$novo_horario  = mysqli_real_escape_string($con, $_POST['horario_consulta']);

// 1. Buscar dados originais da consulta
$sql_dados = "SELECT especialidade, data_consulta FROM consultas WHERE id = '$id_consulta'";
$result_dados = mysqli_query($con, $sql_dados);

if (mysqli_num_rows($result_dados) > 0) {
    $dados = mysqli_fetch_assoc($result_dados);
    $especialidade_original = $dados['especialidade'];
    $data_original = $dados['data_consulta'];

    // 2. Verifica se está tentando remarcar para o mesmo dia
    if ($nova_data === $data_original) {
        echo "Erro: A nova data deve ser diferente da original!";
        exit;
    }

    // 3. Verifica conflito com mesma especialidade no novo dia e horário
    $sql_verifica_conflito = "SELECT * FROM consultas 
                              WHERE data_consulta = '$nova_data' 
                              AND horario_consulta = '$novo_horario' 
                              AND especialidade = '$especialidade_original'
                              AND id != '$id_consulta'";

    $resultado_conflito = mysqli_query($con, $sql_verifica_conflito);

    if (mysqli_num_rows($resultado_conflito) > 0) {
        echo "Erro: Já existe uma consulta da mesma especialidade neste dia e horário!";
        exit;
    }

    // 4. Atualiza a consulta
    $sql_update = "UPDATE consultas 
                   SET data_consulta = '$nova_data', horario_consulta = '$novo_horario' 
                   WHERE id = '$id_consulta'";

    if (mysqli_query($con, $sql_update)) {
        echo "Consulta remarcada com sucesso!";
    } else {
        echo "Erro ao remarcar: " . mysqli_error($con);
    }

} else {
    echo "Consulta não encontrada.";
}

mysqli_close($con);
?>
   

   


   


   

<?php
require("../configs/conexao.php");
include ("Mensagens sweetAlerts/links_mensagens_sweetAlerts.php");
require("config_encript_decrypt_url.php");
  
if (count($_POST) > 0) {
    
    $id = $_POST["id"];

    $data_horario = $_POST["data_horario"];
    $horario = $_POST["horario"];
   

$sql_data_horario = "SELECT * FROM tabela_eventos_calendario WHERE data_horario = '$data_horario' ";
 
  $res_data_horario = mysqli_query($mysqli, $sql_data_horario);
  $row_data_horario = mysqli_fetch_assoc($res_data_horario);

$sqlTotal = "SELECT COUNT(*) as total, horario FROM tabela_eventos_calendario WHERE data_horario = '$data_horario' ";
$resTotal = mysqli_query($mysqli3, $sqlTotal);
 $rowTotal = $resTotal->fetch_assoc();
$total_geral = $rowTotal['total'];



     /*AND horario = '$horario'  
      if ($total_geral >= 3 && $horario_geral != "Livre") { */
    if ($total_geral >= 3) {
   
echo '<script>alert("Já existem 3 marcações neste dia.Excedeu o limite de consultas. Tente novamente no outro dia.");</script>
';
  
  echo "<script>window.location='painel_cadastro_utente_boas_vindas.php'</script>";


} elseif (!empty($row_data_horario['data_horario'])) {
   
echo '<script>alert(" Tente novamente no outro dia.");</script>
';
  
  echo "<script>window.location='painel_cadastro_utente_boas_vindas.php'</script>";


}else{
    $pesq = "UPDATE tabela_eventos_calendario set id='".$id."', data_horario='".$data_horario."', horario='".$horario."' WHERE id='".$id."'";

    if (mysqli_query($mysqli, $pesq)) {
    echo "<script>
  alert('Consulta Remarcada');
</script>";

echo '<script>window.location="painel_cadastro_utente_boas_vindas.php"</script>';
    }else{
      echo "<script>
  alert('Erro ao Remarcar!');
</script>";
    }
}

  }

  ?>
