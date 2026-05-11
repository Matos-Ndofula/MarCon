<!DOCTYPE html>
<html>
<head>
	<title>Esconder</title>
</head>
      	<script type="text/javascript" src="jquery-3.5.1.js"></script>

	<script>
		$(document).ready(function(){

	$("#select").change(function(){
		
		var selectValor = $("#pai").val();
		alert(selectValor);

		});
</script>
<body>

	<select id="select" name="select">
		<option value="">Selecione</option>
		<option value="div1">Div1</option>
		<option value="div2">Div2</option>
		<option value="div3">Div3</option>
	</select>

	<div id="pai">
		<div id="div1">
		Qualquer texto.
	</div>

	<div id="div2">
		<img src="departments-5.jpg">
	</div>

	<div id="div1">
		Nome: <input type="text" id="form" name="">
	</div>
	</div>
</body>
</html>