
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatbot Modal</title>
    <!-- Bootstrap CSS -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .chat-modal .modal-dialog {
            max-width: 400px;
        }
        .chat-messages {
            height: 300px;
            overflow-y: auto;
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
        }
        .message {
            margin-bottom: 10px;
        }
        .message.user {
            text-align: right;
        }
        .message.bot {
            text-align: left;
        }
    </style>
</head>
<body>

<!-- Botão para abrir o modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#chatModal">
    Abrir Chatbot
</button>

<!-- Modal -->
<div class="modal fade chat-modal" id="chatModal" tabindex="-1" aria-labelledby="chatModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="chatModalLabel">Chatbot MarCOn</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="chatMessages" class="chat-messages">
                    <div class="message bot">Olá! Como posso ajudar você hoje?</div>
                </div>
                <div class="input-group">
                    <input type="text" id="chatInput" class="form-control" placeholder="Digite sua mensagem...">
                    <button class="btn btn-primary" id="sendButton">Enviar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script>
document.getElementById('sendButton').addEventListener('click', function() {
    var input = document.getElementById('chatInput');
    var message = input.value.trim();
    if (message) {
        addMessage('user', message);
        input.value = '';
        // Simular resposta do bot
        setTimeout(function() {
            addMessage('bot', 'Obrigado pela sua mensagem. Em breve um atendente irá responder.');
        }, 1000);
    }
});

function addMessage(sender, text) {
    var messagesDiv = document.getElementById('chatMessages');
    var messageDiv = document.createElement('div');
    messageDiv.className = 'message ' + sender;
    messageDiv.textContent = text;
    messagesDiv.appendChild(messageDiv);
    messagesDiv.scrollTop = messagesDiv.scrollHeight;
}
</script>

</body>
</html>