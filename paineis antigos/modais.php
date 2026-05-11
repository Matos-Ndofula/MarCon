<?php

 ?>
<!---INICIO MODAL PERFIL -->

      <div  class="modal fade" id="meu_perfil" tabindex="-1" style="display: none;" aria-hidden="true">
                
                <div class="modal-dialog modal-ms">
                  <br>
                  <br>
                  <br>
                  <br>
                  <br>
                  <div class="modal-content">
                    <div class="modal-header">
                     <span>             </span> <h5 class="modal-title">Seus Dados</h5>
                      <button typen="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div  class="modal-body">

         <div class="container" >
          
          <?php

          $result_pesq = "SELECT * FROM Admin";
            $resultado_pesquisa = mysqli_query($mysqli4, $result_pesq);
          
        while ($rows_pesquisar = mysqli_fetch_array($resultado_pesquisa)) {
          if ($rows_pesquisar['nome'] == $nome) {
          
        ?>

                <div style="margin: 10px 40%">
                <h1 class="bi-person-circle" ></h1></div>
                <hr>
                
                 <label hidden="">Nº Doc: <?php echo $rows_pesquisar['id']; ?></label><br>
                 <label>Nome: <?php echo $rows_pesquisar['nome']; ?></label><br>    
                 <label>Email: <?php echo $rows_pesquisar['email']; ?></label><br>    
                 <label>BI: <?php echo $rows_pesquisar['BI']; ?></label><br>    
                 <label>Telefone: <?php echo $rows_pesquisar['telefone']; ?></label><br>    
                 <label>Endereço: <?php echo $rows_pesquisar['endereco']; ?></label><br>
                 <label>Nome Sistema: <?php echo $rows_pesquisar['nome_sistema']; ?></label><br>
                        <hr>
                        <br>
            <?php

           $id = encryptor('encrypt', $rows_pesquisar['id']); 
            ?>
            <div class='container'>
               <a  href="meu_perfil_admin.php?id=<?php echo $id; ?>" id="button"  class="btn btn-danger w-25" style="border-radius: 0px; float: right;" >Editar</a>
          </div>
        <?php
          }

       }
    ?>         
         </div>

                    </div>
                    </div>
                </div>
              </div><!-- End Vertically centered Modal-->
        <!---FIM MODAL PERFIL -->
