 <?php
 
include ("Mensagens sweetAlerts/links_mensagens_sweetAlerts.php");

    if(isset($_POST['button1']) || isset($_FILES['foto'])){
        $nome = mysqli_real_escape_string($mysqli, $_POST['nome']);
        $email = mysqli_real_escape_string($mysqli, $_POST['email']);
        $genero = mysqli_real_escape_string($mysqli, $_POST['genero']);
        $BI = mysqli_real_escape_string($mysqli, $_POST['BI']);
        $telefone = mysqli_real_escape_string($mysqli, $_POST['telefone']);
        $localidade = mysqli_real_escape_string($mysqli, $_POST['localidade']);
        $data_nascimento = mysqli_real_escape_string($mysqli, $_POST['data_nascimento']);
        $especialidade = mysqli_real_escape_string($mysqli, $_POST['especialidade']);
        $senha = mysqli_real_escape_string($mysqli, $_POST['senha']);
        
        /*
        $extensao = strtolower(substr($_FILES['foto']['name'], -4));
        $novo_nome = md5(time()) . $extensao;
        $diretorio = "uploads/.jpg";
        move_uploaded_file($_FILES['foto']['tmp_name'], $diretorio.$novo_nome);*/


        if($nome == "" || $email == "" || $telefone == "" || $genero == "" || $BI == "" || $localidade == "" || $data_nascimento == ""  || $especialidade == "" || $senha == "" ){
           
        echo "<script>alert('Preencha todos os campos!');</script>";
        echo "<script>window.location='novo_painel_cadastro_medico.php'</script>";

        }
        $select = $mysqli->query("SELECT * FROM medico WHERE email='$email'");
        if($select){
        $row = $select->num_rows;
        if($row > 0){
            
        echo "<script>alert('Ja existe um usuario cadastrado com esse email');</script>";
        echo "<script>window.location='novo_painel_cadastro_medico.php'</script>";

        }else{

            $insert = $mysqli->query("INSERT INTO `medico`(`nome`, `email`, `telefone`, `genero`,`BI`, `localidade`, `data_nascimento`,  `especialidade`, `senha`, `nivel`, `status`) VALUES ('$nome', '$email', '$telefone', '$genero', '$BI', '$localidade', '$data_nascimento', '$especialidade', '".md5($senha)."', 2, 1)");

            if($insert){
       
        echo "<script>alert('Medico Cadastrado com sucesso');</script>";
        echo '<script src="Mensagens sweetAlerts/msg_sweetAlert_sucesso_exito.js"></script>';
        echo "<script>window.location='novo_painel_cadastro_medico.php'</script>";
            
                        
            
            }else{
                echo "Erro aqui 1";
            }
        }
    }else{
         echo "Erro aqui 2";
    }
}

?>
