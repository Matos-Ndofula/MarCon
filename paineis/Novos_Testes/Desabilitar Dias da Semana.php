
<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <title>Desabilitar Dias da Semana</title>
  <style>
    body { font-family: Arial; padding: 20px; }
    input { padding: 10px; width: 200px; }
  </style>
</head>
<body>

<h3>Escolha uma data (Segundas e Sábados não são permitidos)</h3>

<form action="gravar_data.php" method="POST">
  <input type="date" id="data" name="data" required>
  <button type="submit">Gravar</button>
</form>

<script>
  const campoData = document.getElementById("data");

  // Impede que datas anteriores a hoje sejam selecionadas
  const hoje = new Date().toISOString().split("T")[0];
  campoData.setAttribute("min", hoje);

  
  campoData.addEventListener("input", function () {
    const dataSelecionada = new Date(this.value);
    const diaSemana = dataSelecionada.getDay(); // 0=domingo, 1=segunda, ..., 6=sábado

    if (diaSemana === 1 || diaSemana === 6) {
      alert("Segundas-feiras e Sábados estão desabilitados!");
      campoData.value = "";
      diaSemana.attr('disabled', true);
      diaSemana = $("input:disabled");
     diaSemana.draggable('disable');
    }
  });
</script>

</body>
</html>
