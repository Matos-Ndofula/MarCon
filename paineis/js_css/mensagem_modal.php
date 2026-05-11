
<!DOCTYPE html>
<html lang="pt">

<head> 
    <meta charset="utf-8">
    <title>CONSULTAS MÉDICAS OLINE</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  <script src="jquery-3.5.1.js"></script>
    <script src="sweetalert.min.js"></script>
    <link rel="stylesheet" href="jquery-ui.min.css"/>
    <link rel="stylesheet" href="sweetalert.min.css">
   
</head>
<!--ao carregar a pagina carrega a função horaData que apresenta a hora e a data na tela --> 
<body onLoad="horaData()">
  <!--demos ao header a classe cabecalho -->
  <header class="cabecalho">
  </header>

  <!--  nossa section da classe corpo-->
  <section class="corpo">
<input type="button" id="botao" value="Mostrar">

</section>
<footer class="rodape">
  </footer>
</body>

 <script>
        $(document).ready(function(){
$("#botao").click(function(){
        //alert("Funcionou");
    swal("BEM-VINDO!","Login efectuado com sucesso Sr.","success");
      });
       
       });             
  </script>

</html>