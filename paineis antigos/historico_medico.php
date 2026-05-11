
 <?php
    if(isset($_POST['button'])){
        
        $especialidade = mysqli_real_escape_string($mysqli, $_POST['especialidade']);
        
        $questao = $_POST['questao'];

        $acrescentar =  $_POST['acrescentar'];
        

        if($especialidade == ""){
            echo ' 
            <script >
                alert("Preencha o campo de especialidade!");
            </script>
             ';
            echo '<script>window.location="painel_utente_marcar_consulta.php"</script>';

        }

        if($questao == ""){
            echo ' 
            <script >
                alert("Questões Vazias");
            </script>     
            ';
            echo '<script>window.location="painel_utente_marcar_consulta.php"</script>';
        }
        
           
        $checkbox_var_1 = "";

        foreach ($questao as $checkbox_var_2) {
          $checkbox_var_1.=$checkbox_var_2.",";
        }

        $acrescentar_var_1 = "";

        foreach ($acrescentar as $acrescentar_var_2) {
          $acrescentar_var_1.=$acrescentar_var_2.",";
        }
        
        $insert = $mysqli->query("INSERT INTO `historico_medico`(`especialidade`,`questao`,`acrescentar`) VALUES ('$especialidade','$checkbox_var_1','$acrescentar_var_1')");
             
            if($insert){
                echo '';
              
            
            }else{
                echo "Erro aqui 1";
            }
         
        
    }else{
         
    }



?>
