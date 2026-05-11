// Chatbot Toggle e Mensagens
document.addEventListener('DOMContentLoaded', function() {
    const chatToggleBtn = document.getElementById('chatToggleBtn');
    const chatModal = document.getElementById('chatModal');
    const chatInput = document.getElementById('chatInput');
    const sendButton = document.getElementById('sendButton');
    const chatMessages = document.getElementById('chatMessages');

    // Abrir/Fechar modal ao clicar no botão flutuante
    if (chatToggleBtn) {
        chatToggleBtn.addEventListener('click', function() {
            const modal = new bootstrap.Modal(chatModal);
            modal.show();
        });
    }

    // Enviar mensagem ao clicar no botão Enviar
    if (sendButton) {
        sendButton.addEventListener('click', sendMessage);
    }

    // Enviar mensagem ao pressionar Enter
    if (chatInput) {
        chatInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                sendMessage();
            }
        });
    }

    function sendMessage() {
        const message = chatInput.value.trim();
        if (message) {
            addMessage('user', message);
            chatInput.value = '';
            chatInput.focus();

            // Enviar para o backend
            fetch('chatbot_api.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ message: message })
            })
            .then(response => response.json())
            .then(data => {
                if (data.reply) {
                    addMessage('bot', data.reply);
                } else if (data.error) {
                    addMessage('bot', 'Erro: ' + data.error);
                } else {
                    addMessage('bot', 'Desculpe, não consegui processar a resposta.');
                }
            })
            .catch(error => {
                addMessage('bot', 'Erro de conexão: ' + error.message);
            });
        }
    }

    function addMessage(sender, text) {
        const messageDiv = document.createElement('div');
        messageDiv.className = 'message ' + sender;
        
        const messageText = document.createElement('div');
        messageText.className = 'message-text';
        messageText.textContent = text;
        
        messageDiv.appendChild(messageText);
        chatMessages.appendChild(messageDiv);
        
        // Scroll para a última mensagem
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }
});
