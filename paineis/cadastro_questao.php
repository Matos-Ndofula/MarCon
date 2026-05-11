 <?php
    if(isset($_POST['button'])){
        
        $especialidade = mysqli_real_escape_string($mysqli, $_POST['especialidade']);
        
        $questao = mysqli_real_escape_string($mysqli, $_POST['questao']);
        

        if($especialidade == "" || $questao == "" ){
            echo ' 
            <script >
                alert("Preencha todos os campos!");
            </script>
             ';
            echo '<script>window.location="painel_cadastro_funcionario_Home.php"</script>';

        }
        
        $select = $mysqli->query("SELECT * FROM questao WHERE questao='$questao'");
        if($select){
        $row = $select->num_rows;
        if($row > 0){
            echo ' 
            <script >
                alert("Essa questão já existe");
            </script>     
            ';
            echo '<script>window.location="painel_cadastro_funcionario_Home.php"</script>';

        }else{

            $insert = $mysqli->query("INSERT INTO `questao`(`especialidade`, `questao`) VALUES ('$especialidade', '$questao')");

            if($insert){
                echo '
                <script >
                alert("Questão cadastrada com sucesso!");
            </script>     
            
              ';
            echo '<script>window.location="painel_cadastro_funcionario_Home.php"</script>';
              
            
            }else{
                echo "Erro aqui 1";
            }
        }
    }else{
         echo "Erro aqui 2";
    }
}

?>
