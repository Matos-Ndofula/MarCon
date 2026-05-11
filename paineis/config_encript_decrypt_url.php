<?php
function encryptor($accao, $string){
	$saida = false;
	$encrypt_method = "AES-256-CBC";

	$chave_secreta = 'Danilo';
	$secret_iv = 'dani@1234';

	$chave = hash('sha256', $chave_secreta);

	$iv = substr(hash('sha256', $secret_iv), 0, 16);

	if ($accao == 'encrypt') {

	$saida = openssl_encrypt($string, $encrypt_method, $chave, 0, $iv);
	$saida = base64_encode($saida);

	}
	else if ($accao == 'decrypt') 
	{
	
	$saida = openssl_decrypt(base64_decode($string), $encrypt_method, $chave, 0, $iv);
	}

	return $saida;

}

?>