 <?php
    if(isset($_POST['button'])){
        
        $nome_medico = mysqli_real_escape_string($mysqli, $_POST['nome_medico']);
        $especialidade = mysqli_real_escape_string($mysqli, $_POST['especialidade']);
        
        $dias_da_semana = mysqli_real_escape_string($mysqli, $_POST['dias_da_semana']);
        

        if($nome_medico == "" || $dias_da_semana == "" ){
            echo ' 
            <script >
                alert("Preencha todos os campos!");
            </script>
             ';
            echo '<script>window.location="painel_cadastro_medico.php"</script>';

        }
        
        $select = $mysqli->query("SELECT * FROM agendamento_medico WHERE  nome_medico='$nome_medico' AND especialidade='$especialidade' AND dias_da_semana='$dias_da_semana'");
        if($select){
        $row = $select->num_rows;
        if($row > 0){
            echo ' 
            <script >
                alert("Ja existe um agendamento com esse dia marcado");
            </script>     
            ';
            echo '<script>window.location="painel_cadastro_medico.php"</script>';

        }else{

            $insert = $mysqli->query("INSERT INTO `agendamento_medico`(`nome_medico`, `especialidade`, `dias_da_semana`) VALUES ('$nome_medico', '$especialidade', '$dias_da_semana')");

            if($insert){
                echo '
                <script >
                alert("Agendamento cadastrado com sucesso!");
            </script>     
            
              ';
            echo '<script>window.location="painel_cadastro_medico.php"</script>';
              
            
            }else{
                echo "Erro aqui 1";
            }
        }
    }else{
         echo "Erro aqui 2";
    }
}

?>
