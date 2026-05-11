<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatbot Consulta Online</title>
</head>
<body>
    <h1>Chatbot Consulta Online</h1>
    <div id="chatbox"></div>
    <input type="text" id="userInput" placeholder="Digite sua mensagem...">
    <button onclick="enviarMensagem()">Enviar</button>

    <script>
        function enviarMensagem() {
            var userInput = document.getElementById("userInput").value;
            var chatbox = document.getElementById("chatbox");

            // Exibir mensagem do usuário
            chatbox.innerHTML += "<p><strong>Você:</strong> " + userInput + "</p>";

            // Enviar mensagem para o servidor PHP
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    // Exibir resposta do chatbot
                    chatbox.innerHTML += "<p><strong>Chatbot:</strong> " + this.responseText + "</p>";
                }
            };
            xhttp.open("GET", "chatbot.php?mensagem=" + userInput, true);
            xhttp.send();
        }
    </script>
</body>
</html>