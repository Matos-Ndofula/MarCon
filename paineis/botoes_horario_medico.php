<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
		<div id="botoes" style=" display: inline-flex; margin-left: 5px">
		<button value="9:00">9:00</button>
		<button value="9:30">9:30</button>
		<button value="10:00">10:00</button>
		<button value="10:30">10:30</button>
		<button value="11:00">11:00</button>
		<button value="11:30">11:30</button>
		<button value="14:00">14:00</button>
		<button value="14:30">14:30</button>
		<button value="15:00">15:00</button>
		<button value="15:30">15:30</button>
		<button value="16:00">16:00</button>
		<button value="16:30">16:30</button>
		<button value="17:00">17:00</button>
		<button value="17:30">17:30</button>
	</div>

		<label>Horário:</label><br>
        <div id="timeOptions">
            <!-- Horários serão inseridos aqui via JavaScript -->
        </div><br><br>

         <h2>Agendamento de Consulta</h2>
    <form id="consultaForm" action="agendar.php" method="post">
        <label for="data">Data:</label>
        <input type="date" id="data" name="data">
        <br><br>
        <label for="horario">Horários Disponíveis:</label>
        <br>
        <div id="horariosDisponiveis">
            <!-- Os horários serão preenchidos dinamicamente pelo JavaScript -->
        </div>
        <br><br>
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required>
        <br><br>
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <br><br>
        <button type="submit">Agendar</button>
    </form>
</body>
</html>

<script type="text/javascript">

		// Verifica os horários ocupados e desativa os radio buttons correspondentes
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('consultaForm');
    const dataInput = form.querySelector('#data');

    // Adicione um ouvinte de eventos para detectar a mudança na data
    dataInput.addEventListener('change', function () {
        const selectedDate = new Date(dataInput.value);
        const selectedDay = selectedDate.getDay(); // 0 para domingo, 1 para segunda, etc.

        // Aqui você deve fazer uma solicitação AJAX para obter os horários ocupados do PHP
        // Suponha que a função para isso se chame `getHorariosOcupados`

        // Simulação de horários ocupados
        const horariosOcupados = {
            0: ['10:00', '11:00'],
            1: ['09:00', '12:00'],
            2: ['08:00', '13:00'],
            3: [],
            4: ['09:00'],
            5: ['11:00', '14:00'],
            6: ['15:00', '16:00']
        };

        const horariosDisponiveis = document.getElementById('horariosDisponiveis');
        horariosDisponiveis.innerHTML = '';

        // Crie radio buttons para os horários disponíveis
        for (let i = 8; i <= 16; i++) {
            const hora = i < 10 ? '0' + i : i;
            const horarioCompleto = hora + ':00';

            // Verifique se o horário está ocupado
            if (!horariosOcupados[selectedDay].includes(horarioCompleto)) {
                const radio = document.createElement('input');
                radio.type = 'button';
                radio.name = 'horario';
                radio.value = horarioCompleto;

                const label = document.createElement('label');
                label.textContent = horarioCompleto;

                horariosDisponiveis.appendChild(radio);
                horariosDisponiveis.appendChild(label);
                horariosDisponiveis.appendChild(document.createElement('br'));
            }
        }
    });
});



	    // Por simplicidade, aqui estamos apenas adicionando alguns horários de exemplo
    var availableTimes = ['09:00', '10:00', '11:00', '14:00', '15:00', '16:00'];

    // Adiciona os horários disponíveis como opções de radiobutton
    for (var i = 0; i < availableTimes.length; i++) {
        var time = availableTimes[i];
        var radioButton = document.createElement('input');
        radioButton.setAttribute('type', 'button');
        radioButton.setAttribute('name', 'time');
        radioButton.setAttribute('value', time);
        radioButton.setAttribute('id', time);

        var label = document.createElement('label');
        label.setAttribute('for', time);
        label.innerHTML = time;
        timeOptions.appendChild(radioButton);
        timeOptions.appendChild(label);
        timeOptions.appendChild(document.createElement('br'));
    }



</script>