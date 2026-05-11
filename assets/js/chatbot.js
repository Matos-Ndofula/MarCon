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

            // Simular resposta do bot após 1 segundo
            setTimeout(function() {
                const responses = [
                    'Obrigado pela sua mensagem. Como posso ajudá-lo?',
                    'Entendo. Deixe-me procurar mais informações para você.',
                    'Ótima pergunta! Você gostaria de agendar uma consulta?',
                    'Em breve um atendente irá responder sua mensagem.'
                ];
                const randomResponse = responses[Math.floor(Math.random() * responses.length)];
                addMessage('bot', randomResponse);
            }, 1000);
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
