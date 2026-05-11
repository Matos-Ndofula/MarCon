 <?php
    if(isset($_POST['button']) || isset($_FILES['foto'])){
        $nome = mysqli_real_escape_string($mysqli, $_POST['nome']);
        $email = mysqli_real_escape_string($mysqli, $_POST['email']);
        $BI = mysqli_real_escape_string($mysqli, $_POST['BI']);
        $sexo = mysqli_real_escape_string($mysqli, $_POST['sexo']);
        $telefone = mysqli_real_escape_string($mysqli, $_POST['telefone']);
        $nome_nivel = mysqli_real_escape_string($mysqli, $_POST['nome_nivel']);
        $N_id_medico = mysqli_real_escape_string($mysqli, $_POST['N_id_medico']);
        $especialidade = mysqli_real_escape_string($mysqli, $_POST['especialidade']);
        $atendimento = mysqli_real_escape_string($mysqli, $_POST['atendimento']);
        $endereco = mysqli_real_escape_string($mysqli, $_POST['endereco']);
        $senha = mysqli_real_escape_string($mysqli, $_POST['senha']);
        
        /*
        $extensao = strtolower(substr($_FILES['foto']['name'], -4));
        $novo_nome = md5(time()) . $extensao;
        $diretorio = "uploads/.jpg";
        move_uploaded_file($_FILES['foto']['tmp_name'], $diretorio.$novo_nome);*/


        if($nome == "" || $email == "" || $BI == "" || $sexo == "" || $telefone == "" ||  $nome_nivel == "" ||  $atendimento == "" || $endereco == "" || $senha == "" ){
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
        
        $select = $mysqli->query("SELECT * FROM Admin WHERE email='$email'");
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

            $insert = $mysqli->query("INSERT INTO `Admin`(`nome`, `email`, `BI`, `sexo`, `telefone`, `nome_nivel`,`N_id_medico`,`especialidade`, `atendimento`, `endereco`, `senha`, `nivel`, `status`) VALUES ('$nome', '$email', '$BI', '$sexo', '$telefone',  '$nome_nivel', '$N_id_medico', '$especialidade', '$atendimento', '$endereco','".md5($senha)."', 3, 1)");

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
