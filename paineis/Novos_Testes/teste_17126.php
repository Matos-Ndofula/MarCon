   <?php
                if (selecione()) {
                ?>
                  <input type="date" min="<?php echo date("Y-m-d");?>" class="form-control" id="data_horario" name="data_horario" placeholder="Digite a Data" required  onchange = "selecione1();">
                <?php
                }else{
                  ?>
                  <input type="date" min="<?php echo date("Y-m-d");?>" class="form-control" id="data_horario" name="data_horario" placeholder="Digite a Data" disabled required  onchange = "selecione1();">
                <?php
                }
                ?>


                 <script type="text/javascript">
                          function escolhaHora(){
        //alert("Funcionou!");onchange = "/*escolhaHora();"
        document.getElementById('horarios_disponiveis').style
        .opacity = 1; 

          
}

      $(document).ready(function(){
            $(":button").onchange(function(){
             // alert("Funcionou");
              var text = $("#id_efeitoBotao:input").val();
                $("#aqui").text(text);
            });
        });
     // const selecione_Especialidade =document.getElementById("id_efeitoBotao").value;
      
//      var str = this.value;
        //alert(selecione_Especialidade);
//document.getElementById('aqui').innerHTML =selecione_Especialidade;
       // document.getElementById('id_efeitoBotao').style
       // .background = "blue"; 
          

                        </script >

const inputselecioneEspecialidade = document.getElementById("selecioneEspecialidade"); 
   
      function selecione(){
       const selecione_Especialidade = inputselecioneEspecialidade.value;
      
//      var str = this.value;
        document.getElementById('mostra_especialidade').innerHTML =selecione_Especialidade;

                      
    //    alert(selecione_Especialidade);
<div id="horarios_disponiveis" class=" col-md-7 form-group mt-3 ms-2 " >
                  
                    
                     <?php
                
       
                 $mostra_especialidade = "<div><h3 id='mostra_especialidade'></h3></div>";
           echo $mostra_especialidade;      
      
                   ?>
                    <br>
        </div>
            <div class='container'>
    <style type="text/css">
      #horarios_disponiveis input:hover{
       /* background: blue;
        color: white;
        cursor: pointer;*/
      }
      #horarios_disponiveis{
        opacity: 0; 
        /*display: inline-flex;*/
      }
      #horarios_disponiveis input{

      /*border-radius: 0px;
      margin-left: -10px;
      padding: 0px;
      width: 70px; 
      height: 40px; 
      border: 1px solid blue; 
      margin-left: 5px;*/
     
      }
    </style>      