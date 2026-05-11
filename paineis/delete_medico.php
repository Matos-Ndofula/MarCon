<?php
require("../configs/conexao.php");
require("config_encript_decrypt_url.php");


if (isset($_POST['button_delete'])) {
  

	$id = $_POST['id'];
	/*$id = encryptor('decrypt', $id);*/
    
 $query = "DELETE FROM medico WHERE id='".$id."'";
  
  if(mysqli_query($mysqli5, $query)){
  echo '<script>alert("Médico número eliminado");</script>
';
  
  echo "<script>window.location='novo_painel_cadastro_medico.php'</script>";
}else{
  echo '<script>alert("Aquivo não foi eliminado");</script>';

} 

}
?>
