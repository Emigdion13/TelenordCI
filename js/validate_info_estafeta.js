$(function(){
	
	if (!$.cookie('direccion') || !$.cookie('ciudad') || !$.cookie('telefono'))
						$(location).attr('href',OpenInSelfTab('config/estafeta'));

});