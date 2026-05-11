  <!---INICIO ÁREA PARA CADATRAR AGENDAMENTO MÉDICO -->
  <p></p>
  <p></p>
   <h6>Seleccione alguns sintomas para serem enviados no Histórico Médico</h6>
                      
  <form action="#" method="POST">
    
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
                
                  <input type="checkbox" name="questao[]" value="<?php echo $rows_pesquisar3['questao']; ?>"><strong><?php echo $rows_pesquisar3['questao']; ?></strong>
              
                  <input type="text" name="acrescentar[]" placeholder="Acrescentar" style="border-bottom: black solid 1px; border-top: transparent; border-right: transparent; border-left: transparent; margin-left: 8px">
              </div>

  <?php
   }
   }
?>
              
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
       
             <div style="display: inline-flex; margin-left: 10px; align-items: center; justify-content: center; margin-top: 8px">

                <input type="checkbox" name="questao[]" value="<?php echo $rows_pesquisar3['questao']; ?>"><strong><?php echo $rows_pesquisar3['questao']; ?></strong>

                  <input type="text" name="acrescentar[]"  placeholder="Acrescentar" style="border-bottom: black solid 1px; border-top: transparent; border-right: transparent; border-left: transparent; margin-left: 8px">
              </div>   

<?php
   }
   }
?>  
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
              
                <input type="checkbox" name="questao[]" value="<?php echo $rows_pesquisar3['questao']; ?>"><strong><?php echo $rows_pesquisar3['questao']; ?></strong>

              
                  <input type="text" name="acrescentar[]" placeholder="Acrescentar" style="border-bottom: black solid 1px; border-top: transparent; border-right: transparent; border-left: transparent; margin-left: 8px">
              </div>
<?php
   }
   }
?>
  
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

        <!---FIM ÁREA PARA CADATRAR AGENDAMENTO MÉDICO -->


           
                       <div class=" col-md-4 form-group mt-3 ms-0">
                            <br>          
                          <h5 id="mostra_nome_dia">Aqui</h5>
                          <div class="validate"></div>
                        </div>
                          <div  id="mostra_nome_medico" class=" col-md-4 form-group mt-4">
                         </div>


         /*
                    <h5>Escolha uma Data para ver o Horário Disponivel do Médico</h5>
        
       $result_pesq = "SELECT * FROM agendamento_medico";
            $resultado_pesquisa5 = mysqli_query($mysqli, $result_pesq);
            $mostra_nome_dia =  "<h5 id='mostra_nome_dia'>Aqui</h5>";
       while($rows_pesquisar5 = mysqli_fetch_array($resultado_pesquisa5)){
            if ($rows_pesquisar5['dias_da_semana'] == $mostra_nome_dia) {
           
             echo '<div >
             <input type="button"  class="btn btn" " name="horario" value="' . $rows_pesquisar5['horario'] . '"  ">

                              </div>
                            ';* 
             }else{
              
              
             }
          }
                     


                     $result_pesq = "SELECT * FROM agendamento_medico";
            $resultado_pesquisa5 = mysqli_query($mysqli, $result_pesq);
            
       while($rows_pesquisar5 = mysqli_fetch_array($resultado_pesquisa5)){
            if ($rows_pesquisar5['especialidade'] == $rows_pesquisar4['especialidade']) {
       
       $result_pesq = "SELECT * FROM horario_medico ";
            $resultado_pesquisa6 = mysqli_query($mysqli, $result_pesq);
      $rows_pesquisar6 = mysqli_fetch_array($resultado_pesquisa6);

       while($rows_pesquisar6 = mysqli_fetch_array($resultado_pesquisa6)){
            if ($rows_pesquisar6['horario'] == $rows_pesquisar4['horario']) {
           
             echo '<div >
             <input type="radio"  class="btn btn" " name="horario" value="' . $rows_pesquisar4['horario'] . '"">
             <label >' . $rows_pesquisar4['horario'] . '</label><br>

                </div>
                            '; 
           }else{
              
              
             }  
          }
          }else{
              
              
             }
          }*/

          
        // }
                   ?>                    
                    <div id="horarios_disponiveis" class=" col-md-7 form-group mt-3 ms-2 " >
                  
                    
                     <?php
                    /*/ Array com os horários disponíveis (substitua com seus próprios dados)
                    <input type="button" name="" value="8:00">
                    <input type="button" id="id_efeitoBotao" name="" value="8:30">
                    
                    <input type="button" name="" value="9:00">
                    <input type="button" name="" value="9:30">
                    <input type="button" name="" value="10:00">
                    <input type="button" name="" value="10:30">
                    <input type="button" name="" value="11:00">
                    <input type="button" name="" value="11:30">
                    <input type="button" name="" value="14:00">
                    <input type="button" name="" value="14:30">
                    <input type="button" name="" value="15:00">
                    <input type="button" name="" value="15:30">
                    <input type="button" name="" value="16:00">
                    <input type="button" name="" value="16:30">
                    <input type="button" name="" value="17:00">
                    <input type="button" name="" value="17:30">

                     
         $horarios_disponiveis = array(
                    
                       "9:00","9:30",
                        "10:00","10:30",
                        "11:00","11:30",
                        "14:00","14:30",
                        "15:00","15:30",
                        "16:00","16:30",
                        "17:00","17:30"
                    );
                    // Loop para criar radiobuttons para cada horário disponível
                    
                    foreach ($horarios_disponiveis as $horario) {

          
        
        // $rows_pesquisar4 = mysqli_fetch_array($resultado_pesquisa4);
        //           $data_hora = ; 
                 

         //if ($data = "2023-04-09") {
    /*     
          