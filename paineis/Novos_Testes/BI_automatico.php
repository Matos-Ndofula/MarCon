<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Automático</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        .form-group button {
            padding: 10px 15px;
            background-color: #28a745;
            border: none;
            color: white;
            cursor: pointer;
        }
        .form-group button:disabled {
            background-color: #ccc;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Cadastro Automático</h1>
        <div class="form-group">
            <label for="bilhete">Número do Bilhete de Identidade:</label>
            <input type="text" id="bilhete" name="bilhete" placeholder="Digite o número do Bilhete de Identidade" oninput="fetchData()">
        </div>
        <form id="data-form">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" readonly>
            </div>
            <div class="form-group">
                <label for="data_nascimento">Data de Nascimento:</label>
                <input type="text" id="data_nascimento" name="data_nascimento" readonly>
            </div>
            <div class="form-group">
                <label for="endereco">Endereço:</label>
                <input type="text" id="endereco" name="endereco" readonly>
            </div>
            <div class="form-group">
                <label for="telefone">Telefone:</label>
                <input type="text" id="telefone" name="telefone" readonly>
            </div>
        </form>
    </div>
    <script>
        function fetchData() {
            var bilhete = document.getElementById('bilhete').value;
            if (bilhete) {
                var xhr = new XMLHttpRequest();
                xhr.open('GET', 'fetch_data.php?bilhete=' + encodeURIComponent(bilhete), true);
                xhr.onload = function() {
                    if (this.status === 200) {
                        var response = JSON.parse(this.responseText);
                        if (response.success) {
                            document.getElementById('nome').value = response.data.nome;
                            document.getElementById('data_nascimento').value = response.data.data_nascimento;
                            document.getElementById('endereco').value = response.data.endereco;
                            document.getElementById('telefone').value = response.data.telefone;
                        } else {
                            clearFields();
                            alert(response.message);
                        }
                    } else {
                        clearFields();
                        alert('Erro ao buscar dados.');
                    }
                };
                xhr.send();
            } else {
                clearFields();
            }
        }

        function clearFields() {
            document.getElementById('nome').value = '';
            document.getElementById('data_nascimento').value = '';
            document.getElementById('endereco').value = '';
            document.getElementById('telefone').value = '';
        }
    </script>
</body>
</html>
