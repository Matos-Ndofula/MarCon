var destaque = ["_imagens/campo3.png","_imagens/campo2.png"];
var destaqueAtual = destaque.length; 



function mudaImagem() {
	if(destaqueAtual >= 0){
		destaqueAtual = (destaqueAtual - 1);
		document.querySelector('.corpo .divfoto .foto').src = destaque[destaqueAtual];
		if(destaqueAtual == 0){
			document.querySelector('.corpo .divfoto .foto').src = destaque[destaqueAtual];
			destaqueAtual = destaque.length;
		}
	} 
} setInterval(mudaImagem,2000);

