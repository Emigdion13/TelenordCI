<html>
	<header><title>Cargando los datos</title>

	<script type='text/javascript' src="<?php echo base_url()?>js/jquery-1.11.0.min.js"></script>

	<script type="text/javascript">
		$(function(){
			var eso=window.open("<?php echo base_url() ?>" + "index.php/detallecliente/cliente/" + "<?php echo $parameter;?>" ,'_self'); 
	        eso.focus();
		});
	</script>

	</header>
	<body>
		<p>Cargando los datos, por favor espera...</p>

		
	</body>
</html>