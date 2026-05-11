 <?php
    if(isset($_POST['button']) || isset($_FILES['foto'])){
        $nome_utente = mysqli_real_escape_string($mysqli, $_POST['nome_utente']);
        $email = mysqli_real_escape_string($mysqli, $_POST['email']);
        $BI = mysqli_real_escape_string($mysqli, $_POST['BI']);
        $sexo = mysqli_real_escape_string($mysqli, $_POST['sexo']);
        $telefone = mysqli_real_escape_string($mysqli, $_POST['telefone']);
        $tipo_sanguinio = mysqli_real_escape_string($mysqli, $_POST['tipo_sanguinio']);
        $endereco = mysqli_real_escape_string($mysqli, $_POST['endereco']);
        $data_nascimento = mysqli_real_escape_string($mysqli, $_POST['data_nascimento']);
        $senha = mysqli_real_escape_string($mysqli, $_POST['senha']);
        $nome_responsavel = mysqli_real_escape_string($mysqli, $_POST['nome_responsavel']);
        $BI_responsavel = mysqli_real_escape_string($mysqli, $_POST['BI_responsavel']);
        
        /*
        $extensao = strtolower(substr($_FILES['foto']['name'], -4));
        $novo_nome = md5(time()) . $extensao;
        $diretorio = "uploads/.jpg";
        move_uploaded_file($_FILES['foto']['tmp_name'], $diretorio.$novo_nome);*/


        if($nome_utente == "" || $email == "" || $sexo == "" || $telefone == "" ||  $data_nascimento == "" || $senha == ""){
            echo ' 
              <div class="modal fade show" id="smallModal" tabindex="-1" aria-modal="true" role="dialog" style="display:block;">
                    <div class="modal-dialog modal-sm">
                          <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                    <div class="modal-body">
                                        <i class="bi bi-exclamation-circle text-warning"></i>
                                                <div>
                                                  <h5>Preencha todos os campos!</h5>
                                                  
                                                </div>
                                      
                                    </div>
                            
                          </div>
                    </div>
                </div>
             ';
            return true;
        }
        
        $select = $mysqli->query("SELECT * FROM utente WHERE email='$email'");
        if($select){
        $row = $select->num_rows;
        if($row > 0){
            echo "    
               <div class='container'>
            <div  class='alert alert-warning bg-warning border-0 alert-dismissible fade show' role='alert'>
                Ja existe um usuario cadastrado com esse email
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
              </div>
              </div>";
        }else{

            $insert = $mysqli->query("INSERT INTO `utente`(`nome_utente`, `email`, `BI`, `sexo`, `telefone`, `tipo_sanguinio`,`endereco`, `data_nascimento`, `senha`, `nome_responsavel`, `BI_responsavel`, `nivel`, `status`) VALUES ('$nome_utente', '$email', '$BI', '$sexo', '$telefone', '$tipo_sanguinio', '$endereco', '$data_nascimento','".md5($senha)."', '$nome_responsavel',  '$BI_responsavel', 2, 1)");

            if($insert){
                echo '
                 <div class="modal fade show" id="smallModal" tabindex="-1" aria-modal="true" role="dialog" style="display: block;">
                <div class="modal-dialog modal-sm">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      
                        <i class="bi bi-check-circle text-success"></i>
                        <div>
                          <h5>Paciente cadastrado com sucesso!</h5>
                          
                        </div>
                      
                    </div>
                    
                  </div>
                </div>
              </div>
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
