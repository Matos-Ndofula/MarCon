<?php

require("../configs/conexao.php");
$dia = $_GET["data"];
$especialidade = $_GET["value"];

//$val_M = mysql_real_escape_string($mysqli, $val);

    $result_pesq = "SELECT horario FROM horario_medico";
       $resultado_pesquisa4 = mysqli_query($mysqli, $result_pesq);

       $pesq1 = "SELECT horario FROM `consultas_agendadas` WHERE data_horario= '$dia'";
          
           $pesquisa1 = mysqli_query($mysqli, $pesq1);  
           $cont=0;
           $horario_ocupado=array(); 
           while($rows_pesquisar4 = mysqli_fetch_array($resultado_pesquisa4)){

           $horario_ocupado[$cont]=$rows_pesquisar4['horario'];
           $cont=$cont+1;
        }
        $cont=$cont-1;

        while($rows_pesquisar1 = mysqli_fetch_array($pesquisa1)){        
               for ($i=0; $i <$cont ; $i++) { 
                if ($rows_pesquisar1['horario']==$horario_ocupado[$i]) {
                  $horario_ocupado[$i]=null;
                }

               }
         
         } 
            //$resposta = "Todos Já Ocupados! Tente num outro dia.";


          echo"<div class='horarios-container'" ;
         
          echo"<div class='grade-horarios' id='meuSelect' >" ; 
            for ($i=0; $i <$cont ; $i++) { 
               if ($horario_ocupado[$i]!=null) {

             
              echo "<input type='radio' name='horario' id='Select_horario$i'  value=".$horario_ocupado[$i]." required>"; 
                echo "<label for='Select_horario$i'>".$horario_ocupado[$i]."</label>";
              
            } 
          }  
         echo "</div>";
         echo "</div>";
        /* 
dia.";
          echo"<div class='col-auto' name='horario' id='meuSelect' required>" ; 
            for ($i=0; $i <$cont ; $i++) { 
               if ($horario_ocupado[$i]!=null) {
             
            echo "<button name='hora' value=".$horario_ocupado[$i]." class='btn btn-horario active'>".$horario_ocupado[$i]."</button>"; 
        
            } 
          }  
         echo "</div>";
        echo "<select class='form-select' name='horario' id='meuSelect' required>"; 
                    for ($i=0; $i <$cont ; $i++) { 
                       if ($horario_ocupado[$i]!=null) {
                      echo "<option value=".$horario_ocupado[$i].">". $horario_ocupado[$i] ."</option>";  
                    
                    } 
                  }  
                 echo "</select>";


        if ($horario_ocupado[$i] == " ") {
        
         echo "<br>";
         echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>";
         echo " <i class='bi bi-exclamation-triangle me-1'></i>";
         echo "  Todos Já Ocupados! Tente num outro dia.";
         echo " <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>";
         echo  "</div>";
         }*/
          
?>