

    <!---INICIO MODAL PARA CADATRAR AGENDAMENTO MÉDICO -->

      <div  class="modal fade" id="resp_quest" tabindex="-1" style="display: none;" aria-hidden="true">
                
                <div class="modal-dialog modal-lg">
                  <br>
                  <br>
                  <br>
                  <div class="modal-content">
                    <div class="modal-header">
                     <span>             </span> <h5 class="modal-title">Deves Responder as Questões para serem enviados no Histórico Médico</h5>
                      <button typen="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div  class="modal-body">
  <form action="#" method="POST">
    <div class="row">      
         <div class="col-md-4 form-group mt-3 mt-md-0">
              <label>Especialidade  </label>(<span style="color: red">*</span>)
                   
                   <select id="selecioneEspecialidade" name="especialidade" class="form-select" onchange="selecione();" required>
                    <option value="">Selecione a Especialidade</option>
                 <?php
       
        $result_pesq = "SELECT * FROM medico";
        $resultado_pesquisa2 = mysqli_query($mysqli, $result_pesq);
   
                    while($rows_pesquisar2 = mysqli_fetch_array($resultado_pesquisa2)){
                 ?>

                   <option id="option" value="<?php echo $rows_pesquisar2['especialidade']; ?>" ><?php echo $rows_pesquisar2['especialidade']; ?></option>
                 <?php
                  }
                  ?>             
                   </select>
                <div class="validate"></div>
                 <div class="invalid-feedback">Por favor selecione a especialidade!</div>
             </div>
      
    </div>

      <div id="teste" style="display: none;">
  <p > 
  </p>
        <?php
                  
        $result_pesq = "SELECT * FROM questao";
        $resultado_pesquisa3 = mysqli_query($mysqli, $result_pesq);
   
        while($rows_pesquisar3 = mysqli_fetch_array($resultado_pesquisa3)){
                 if ($rows_pesquisar3['especialidade'] == 'Oftalmologia') {
                   
                 ?>
             <div style="display: inline-flex; margin-left: 10px; align-items: center; justify-content: center; margin-top: 8px">
                <input type="checkbox" name="checkbox">
   
                  <input type="text" hidden name="questao" value="<?php echo $rows_pesquisar3['questao']; ?>">
                  <label style="display: inline-flex; margin-left: 8px;"><strong><?php echo $rows_pesquisar3['questao']; ?></strong></label>
              
                  <input type="text" name="acrescentar" placeholder="Acrescentar" style="border-bottom: black solid 1px; border-top: transparent; border-right: transparent; border-left: transparent; margin-left: 8px">
              </div>
  <?php
   }
   }
?>
      <div class="col-md-8 form-group mt-3">
        <button type="submit" name="button_questao" class="btn btn-success w-50" style="border-radius: 0px; float: right;">Enviar Histórico</button>
      </div>          
                </div>
                
      <div id="teste_1" style="display: none;">
  <p>
  </p>
        <?php
                  
        $result_pesq = "SELECT * FROM questao";
        $resultado_pesquisa3 = mysqli_query($mysqli, $result_pesq);
   
        while($rows_pesquisar3 = mysqli_fetch_array($resultado_pesquisa3)){
                 if ($rows_pesquisar3['especialidade'] == 'Cardiologia') {
                   
                 ?>
       
             <div style="display: inline-flex; margin-left: 10px; align-items: center; justify-content: center; margin-top: 8px;">
                    <div id="radioset">
                       <input type="radio" id="radio1" name="radio"><label for="radio1"> SIM</label>
                        <input type="radio" id="radio2" name="radio"><label for="radio2"> NÃO</label>
                        

                  <input type="" hidden name="questao" value="<?php echo $rows_pesquisar3['questao']; ?>">
                  <label style="display: inline-flex; margin-left: 8px;"><strong><?php echo $rows_pesquisar3['questao']; ?></strong></label>
              
                  <input type="text" name="acrescentar" placeholder="Acrescentar" style="border-bottom: black solid 1px; border-top: transparent; border-right: transparent; border-left: transparent; margin-left: 8px">
          
                      </div>

              </div>    

<?php
   }
   }
?>  <div class="col-md-8 form-group mt-3">
        <button type="submit" class="btn btn-success w-50" style="border-radius: 0px; float: right;">Enviar Histórico</button>
      </div>
                </div>
      

      <div id="teste_2" style="display: none;">
    <p>
    </p>
                  <?php
                  
        $result_pesq = "SELECT * FROM questao";
        $resultado_pesquisa3 = mysqli_query($mysqli, $result_pesq);
   
        while($rows_pesquisar3 = mysqli_fetch_array($resultado_pesquisa3)){
                 if ($rows_pesquisar3['especialidade'] == 'Dermatologia') {
                   
                 ?>
        
             <div style="display: inline-flex; margin-left: 10px; align-items: center; justify-content: center; margin-top: 8px">
                <input type="checkbox" name="checkbox">
   
                  <input type="" hidden name="questao" value="<?php echo $rows_pesquisar3['questao']; ?>">
                  <label style="display: inline-flex; margin-left: 8px;"><strong><?php echo $rows_pesquisar3['questao']; ?></strong></label>
              
                  <input type="text" name="acrescentar" placeholder="Acrescentar" style="border-bottom: black solid 1px; border-top: transparent; border-right: transparent; border-left: transparent; margin-left: 8px">
              </div>
<?php
   }
   }
?>
      <div class="col-md-8 form-group mt-3">
        <button type="submit" class="btn btn-success w-50" style="border-radius: 0px; float: right;">Enviar Histórico</button>
      </div>
                </div>
      
      <!---->
        <script type="text/javascript">
           $(document).ready(function(){
            $("#selecioneEspecialidade").change(function(){
              var text = $("#selecioneEspecialidade").val();
              //alert(text);
              if (text == 'Oftalmologia') {
              $("#teste").show("slow");

              }else {
              $("#teste").hide("slow");

              } if (text == 'Cardiologia') {
              $("#teste_1").show("slow");

              }else {
              $("#teste_1").hide("slow");

              } if (text == 'Dermatologia') {
              $("#teste_2").show("slow");

              } else {
              $("#teste_2").hide("slow");

              }
                    
            });
        });
        </script>
                    </div>
</form>
                    </div>
                </div>
              </div><!-- End Vertically centered Modal-->
        <!---FIM MODAL PARA CADATRAR AGENDAMENTO MÉDICO -->