$(function(){
	$('.chosen_select').chosen({width: '100%'});

	$('select[name="select_ciudad"]').change(function(event){
		alert($('select[name="select_ciudad"]').val());
	});

	$('select[name="select_sector"]').change(function(event){
		alert($('select[name="select_sector"]').val());
	});

	$('select[name="select_calle"]').change(function(event){
		alert($('select[name="select_calle"]').val());
	});

	$('select[name="select_edificio"]').change(function(event){
		alert($('select[name="select_edificio"]').val());
	});

	$('#modal-body-content').html("<p> Total a pagar: <span> RD$ 200.00</span></p>" +
								   "<p>Eso es</p>");
	
});