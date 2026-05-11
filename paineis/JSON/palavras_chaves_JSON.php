<?php

// Função para carregar as respostas do arquivo JSON
function carregarRespostas($caminho) {
    $conteudo = file_get_contents($caminho);
    return json_decode($conteudo, true);
}

// Função para obter a resposta do chatbot com base na entrada do usuário
function obterResposta($input, $respostas) {
    $input = strtolower($input); // Converter para minúsculas para evitar problemas de case-sensitive
    if (array_key_exists($input, $respostas)) {
        $possiveisRespostas = $respostas[$input];
        $resposta = $possiveisRespostas[array_rand($possiveisRespostas)]; // Escolha uma resposta aleatória do array
        return $resposta;
    } else {
        return "Desculpe, não entendi. Pode reformular sua pergunta?";
    }
}

// Caminho para o arquivo JSON
$caminhoArquivoJSON = "JSON/respostas.json";

// Carregar respostas do arquivo JSON
$respostas = carregarRespostas($caminhoArquivoJSON);

// Obter a entrada do usuário (pode ser obtida de qualquer fonte, como um formulário HTML)
$entradaUsuario = isset($_POST['mensagem']) ? $_POST['mensagem'] : "";

// Obter resposta do chatbot
$respostaChatbot = obterResposta($entradaUsuario, $respostas);



?>
