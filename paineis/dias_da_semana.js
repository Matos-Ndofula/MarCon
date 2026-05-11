 const campoData = document.getElementById("dias_desablitados");

  // Impede que datas anteriores a hoje sejam selecionadas
  const hoje = new Date().toISOString().split("T")[0];
  campoData.setAttribute("min", hoje);

  campoData.addEventListener("input", function () {
    const dataSelecionada = new Date(this.value);
    const diaSemana = dataSelecionada.getDay(); // 0=domingo, 1=segunda, ..., 6=sábado
    
    if (diaSemana === 1 || diaSemana === 6) {
      alert("Segundas-feiras e Sábados estão desabilitados!");
      campoData.value = "";
            
    }
  });

/*function obterDiaSemana() {
            // Obtém o valor do campo de entrada
            var valorData = document.getElementById("data_horario").value;

            // Cria um objeto Date com base no valor fornecido
            var data = new Date(valorData);

            // Array para armazenar os nomes dos dias da semana
            var diasSemana = ["Domingo", "Segunda-feira", "Terça-feira", "Quarta-feira", "Quinta-feira", "Sexta-feira", "Sábado"];

            // Obtém o índice do dia da semana (0 para Domingo, 1 para Segunda-feira, etc.)
            var indiceDiaSemana = data.getDay();

            // Obtém o nome do dia da semana usando o índice obtido
            var nomeDiaSemana = diasSemana[indiceDiaSemana];

            // Exibe o nome do dia da semana
            alert("O dia selecionado é " + nomeDiaSemana);
            $("#mostra_nome_dia").text(/omeDiaSemana);
}



         <script>
     
      /*function selecione1(){

    const inputselecioneData = document.getElementById("data_horario");

       const selecione_Data = inputselecioneData.value;
      
        alert(selecione_Data);
        
        if (window.XMLHttpRequest) {
          xmlhttp3 = new XMLHttpRequest();
        } else{
          xmlhttp3 = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function(){
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById('selecioneHorario').innerHTML = this.responseText;
          }
        }
          xmlhttp3.open("GET","mostrar_dados_select.php?value="+selecione_Data, true);
          xmlhttp3.send();

      }
    </script>

    
     <!-- <li class="nav-item">
        <a class="nav-link " href="painel_cadastro_funcionario_Home.php">
          <span style="margin: 0px auto"><i class="bi bi-check2-square"></i>Confirmar</span>
        </a>
      </li> End Home Nav 

      <li class="nav-item">
        <a class="nav-link " href="painel_cadastro_funcionario_Home.php">
          <span style="margin: 0px auto"><i class="bi bi-clipboard2-check"></i>Atendido</span>
        </a>
      </li> End Home Nav 

      <li class="nav-item">
        <a class="nav-link " href="painel_cadastro_funcionario_Home.php">
          <span style="margin: 0px auto"><i class="bi bi-file-pdf"></i>PDF</span>
        </a>
      </li> End Home Nav 

      <li class="nav-item">
        <a class="nav-link " href="painel_cadastro_funcionario_Home.php">
          <span style="margin: 0px auto"><i class="bi bi-pencil-square"></i>Editar</span>
        </a>
      </li> End Home Nav 


      <li class="nav-item">
        <a class="nav-link " href="painel_cadastro_funcionario_Home.php">
          <span style="margin: 0px auto"><i class="bi bi-trash"></i>Eliminar</span>
        </a>
      </li> End Home Nav -->
*/