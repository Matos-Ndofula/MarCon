
   $(document).ready(function(){
      
  $('#selecioneEspecialidade').change(function(){
      $selectValor = $(this).val();
              alert(selectValor);
    if ( $(this).val() ) {
      $('#selecioneNomeMedico').hide();
      $.getJSON('mostrar_dados_select.php?search='.(id: $(this).val(), ajax: 'true'), function(j){
        var options = '<option value="">Escolha o nome do Médico</option>';
        for (var i = 0; i < j.length; i++) {
          options += '<option value="' + j[i].id +'">' + j[i].nome_medico + '</option>';
        }
        $('#selecioneNomeMedico').html(options).show();
      });
    }else{
      $('#selecioneNomeMedico').html('<option value="">Escolha o nome do Médico</option>');
    }

  });
});
