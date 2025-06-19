$(function(){

    $( "#datepicker" ).datepicker({
		altField: "#datepicker",
		closeText: 'Fermer',
		prevText: 'Précédent',
		nextText: 'Suivant',
		currentText: 'Aujourd\'hui',
		monthNames: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
		monthNamesShort: ['Janv.', 'Févr.', 'Mars', 'Avril', 'Mai', 'Juin', 'Juil.', 'Août', 'Sept.', 'Oct.', 'Nov.', 'Déc.'],
		dayNames: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'],
		dayNamesShort: ['Dim.', 'Lun.', 'Mar.', 'Mer.', 'Jeu.', 'Ven.', 'Sam.'],
		dayNamesMin: ['D', 'L', 'M', 'M', 'J', 'V', 'S'],
		weekHeader: 'Sem.',
		dateFormat: 'yy-mm-dd'
	});

	$('#author').keyup(function() {

  		var search = $(this).val();
  		url = $(this).data('url');
  		if(search.length >= 2){
  			$.ajax({
  			headers: {
    			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
  			},
            method: 'POST',
            url: url,
            data: {
	            'search': search
        	},
	        success: function(response){
	        	$('.search-result').html(response);            
	        }
       	 });
  		}
	});
	
});