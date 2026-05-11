<?php

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Painel Médico Consulta</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

<script type="text/javascript" src="paineis/jquery-3.5.1.js"></script>
     <script>
        $(document).ready(function(){
            $(":button").click(function(){
              
              var text = $(":password").val();
                $("div").text(md5(text));

  <?php
      $mostra_senha = md5($senha);
      $senha = $mostra_senha;
      $mostra_senha_1 = $senha;


?>
            });
      $(":button:last").click(function(){
               
        $("div").text("");
      });
        });
    </script>

</head>
  <style>
        div{
background-color: blue;
margin-top: 5px;
color: white;
width:350px;
height: 150px;
font-size: 15pt;

        }
    </style>
<body>
    <form>
      <h2>Mostrar</h2>
      
        <input type="password" name="texto" value="">
        <input type="button"  value="Escrever">
        <div></div>
        
    </form>
    
        <input type="button" value="Apagar">

</body>

</html>

