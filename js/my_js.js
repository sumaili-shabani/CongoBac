$(document).ready(function(){
      $(document).on('keyup', '.rechercher_un_utilisateur', function(){
      	var query = $(this).val();
      	var format = $('.resutat_de_recherce_users');

      	$.ajax({
      		url:"<?php echo(base_url()) ?>admin/recherche_utilisateur",
      		method: 'POST',
      		data: {
      			query: query
      		},
      		success: function(data){
      			format.html(query);
      		}
      	});
      	
      });
});