 <?php
    if(isset($_POST['button']) || isset($_FILES['foto'])){
        $nome_utente = mysqli_real_escape_string($mysqli, $_POST['nome_utente']);
        $email = mysqli_real_escape_string($mysqli, $_POST['email']);
        $sexo = mysqli_real_escape_string($mysqli, $_POST['sexo']);
        $telefone = mysqli_real_escape_string($mysqli, $_POST['telefone']);
        $data_nascimento = mysqli_real_escape_string($mysqli, $_POST['data_nascimento']);
        $senha = mysqli_real_escape_string($mysqli, $_POST['senha']);
        
        /*
        $extensao = strtolower(substr($_FILES['foto']['name'], -4));
        $novo_nome = md5(time()) . $extensao;
        $diretorio = "uploads/.jpg";
        move_uploaded_file($_FILES['foto']['tmp_name'], $diretorio.$novo_nome);*/


        if($nome_utente == "" || $email == "" || $sexo == "" || $telefone == "" ||  $data_nascimento == "" || $senha == ""){
            echo '
                  <script type="text/javascript">alert("Preencha todos os campos!")</script>

             ';
            return true;
        }
        
        $select = $mysqli->query("SELECT * FROM utente WHERE email='$email'");
        if($select){
        $row = $select->num_rows;
        if($row > 0){
            echo ' 
                  <script type="text/javascript">alert("Ja existe um usuario cadastrado com esse email!")</script>
            ';
        }else{

            $insert = $mysqli->query("INSERT INTO `utente`(`nome_utente`, `email`, `sexo`, `telefone`, `data_nascimento`, `senha`,  `nivel`, `status`) VALUES ('$nome_utente', '$email', '$sexo', '$telefone', '$data_nascimento','".md5($senha)."', 1, 1)");

            if($insert){
                echo '
                  <script type="text/javascript">alert("Paciente cadastrado com sucesso!")</script>

              ';
            
            }else{
                echo "Erro aqui 1";
            }
        }
    }else{
         echo "Erro aqui 2";
    }
}

?>