var dia_array=new Array("Domingo","Segunda-feira","Terça-feira","Quarta-feira","Quinta-feira","Sexta-feira","Sábado")
var mes_array=new Array("01","02","03","04","05","06","07","08","09","10","11","12")

function pegaData(){
// pegamos a data e atribuimos na variavel data
var data=new Date()


// criamos variável ano e lhe atribuimos o ano data 
var ano=data.getFullYear()

// na variavel dia atribuimos o nome do dia da correspondente
var dia=data.getDay()
// na mes recebe o mes em curso
var mes=data.getMonth()

// criamos a variavel diam para recceber o numero do dia 
//(que normalmente aparece em algarismo)
var diam=data.getDate()

// se o numero do dia for menor que 10 então
if (diam<10)
// acrescente um zero antes "09"
diam="0"+diam
// fim pegar os dados da data

//inicio para pegar os dados da hora
// pegar a hora
var hora=data.getHours()
// pegar os minutos
var minutos=data.getMinutes()
// pegar segundo
var segundos=data.getSeconds()

//acrescentar os zeros antes das horas, minutos e segundos
if(hora<=9)
hora = "0"+hora
if(minutos<=9)
minutos="0"+minutos
if(segundos<=9)
segundos="0"+segundos

//guardamos os dados da data na variavel apresentar_data
var apresentar_data=dia_array[dia]+" - "+diam+"/"+mes_array[mes]+"/"+ano

//guardamos os dados da hora na variavel apresentar_hora
var apresentar_hora=hora+":"+minutos+":"+segundos

document.getElementById("hora").innerHTML=apresentar_hora
document.getElementById("data").innerHTML=apresentar_data
}


function horaData(){
//if (document.getElementById)
setInterval("pegaData()",1000)
}