
	const inputselecioneEspecialidade = document.getElementById("selecioneEspecialidade");
	const inputselecioneNomeMedico = document.getElementById("selecioneNomeMedico");

	if (inputselecioneEspecialidade) {

		inputselecioneEspecialidade.addEventListener("change", async () => {

			 const selecione_Especialidade = inputselecioneEspecialidade.value;
          
			const inputselecioneNomeMedico = document.getElementById("selecioneNomeMedico");

			 inputselecioneNomeMedico.innerHTML = "<option value=''>Carregando...</option>";
		
			 await fetch('mostrar_dados_select.php?selecione_Especialidade=' +selecione_Especialidade);

		});

	}		