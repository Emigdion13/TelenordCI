$(function(){

	function codigo_repetido(){
		$("#span-error-usuario").remove();
		$("#span-error-contrasena").remove();
		$("#div-contrasena").removeClass("has-error has-feedback");
		$("#div-usuario").removeClass("has-error has-feedback has-warning");
	}

	$('button[name="btn_entrar"]').click(function(){
		codigo_repetido();

		if ($("input[name='usuario']").val().length == 0 || $("input[name='contrasena']").val().length == 0){
			
			if ($("input[name='usuario']").val().length == 0) {
					$("#div-usuario").addClass("has-error has-feedback");
					$( "#span-usuario" ).append( "<span id='span-error-usuario'>El usuario no debe estar vacio.</span>" );
			}

			if ($("input[name='contrasena']").val().length == 0){
					$("#div-contrasena").addClass("has-error has-feedback");
					$( "#span-contrasena" ).append( "<span id='span-error-contrasena'>La contrasena no debe estar vacio.</span>" );
			}
		} else {
			$.post( link_to('user_validate') , 
			{ tipo:"1", 
			usuario: $("input[name='usuario']").val(), 
			contrasena:$.md5($("input[name='contrasena']").val()) },
			function(data){
				if (data.validate > 0) {

					if (!$.cookie('direccion') || !$.cookie('ciudad') || !$.cookie('telefono'))
						$(location).attr('href',redirection('config/estafeta'));
					else if(data.redirect)  $(location).attr('href',redirection(data.redirect)); 
					else $(location).attr('href',redirection('busquedacliente/index'));
					
				} else {
					$("#div-usuario").addClass("has-warning has-feedback");
					$( "#span-usuario" ).append( "<span id='span-error-usuario'>Usuario y/o contrasena invalidos</span>" );
				}
			},
			"json"
			);
		}
		$("input[name='contrasena']").val("");
	});


	$("input[name='usuario']").keyup(function() {
		codigo_repetido();
	});

	$("input[name='contrasena']").keyup(function() {
		codigo_repetido();
	});

	/*$('body').keyup(function(event){
		if(event.keyCode == 13){
			$('button[name="btn_entrar"]').click();
	        codigo_repetido();
	    }
	});*/

});