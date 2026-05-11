<?php
require("../../configs/conexao.php");

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Painel Médico Consulta</title>
  <meta content="" name="description">
  <meta content="" name="keywords">



</head>

<body>
  <form action="#" method="post">
    
      <h2>Entrei</h2>
      <input type="checkbox" name="checkbox[]" value="check_1"><strong>check_1</strong><br>

      
      <input type="checkbox" name="checkbox[]" value="check_2"><strong>check_2</strong><br>
      <input type="checkbox" name="checkbox[]" value="check_3"><strong>check_3</strong><br>
      <input type="checkbox" name="checkbox[]" value="check_4"><strong>check_4</strong><br>
    
    <input type="submit" value="submit" name="submit"> 

  </form>
</body>

</html>

<?php
  if(isset($_POST['submit'])){
        
        $checkbox_var = $_POST['checkbox'];
        
        $checkbox_var_1 = "";

        foreach ($checkbox_var as $checkbox_var_2) {
          $checkbox_var_1.=$checkbox_var_2;
        }

           $insert = $mysqli->query("INSERT INTO `historico_medico`(`questao_2`) VALUES ('$checkbox_var_1')");
        if($insert){
                echo '
                <script >
                alert("checkbox inserida!");
            </script>     
            
              ';
              
            
            }else{
                echo "Erro ao inserir";
            }
      

  }
?>