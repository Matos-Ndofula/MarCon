<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Marcação de Consulta Médica</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Marcação de Consulta</h2>
    <form method="POST" action="processa_marcacao.php">
        <label for="nome_utente">Nome do Utente:</label>
        <input type="text" id="nome_utente" name="nome_utente" required>

        <label for="especialidade">Especialidade:</label>
        <select id="especialidade" name="especialidade" required>
            <option value="Cardiologia">Cardiologia</option>
            <option value="Pediatria">Pediatria</option>
            <option value="Ginecologia">Ginecologia</option>
            <option value="Ortopedia">Ortopedia</option>
        </select>

        <label for="data_marcacao">Data da Marcação:</label>
        <input type="date" id="data_marcacao" name="data_marcacao" required>

        <input type="submit" name="marcar" value="Marcar Consulta">
    </form>
</div>
</body>
</html>