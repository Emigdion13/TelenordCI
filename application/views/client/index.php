<ol class="breadcrumb">
  <li><a href="<?php echo base_url();?>index.php/busquedacliente/index">Inicio</a></li>
  <li class="active">Pago Servicios a clientes</li>
</ol>
<div class="jumbotron">
  <h1>Pago Servicios a clientes</h1>
</div>


<div class="row" style="margin-top: 1em;">
	<div class="col-md-4 col-md-offset-6" id="contenedor_botones_superior">
		<ul>
			<li>
		<?php 
			$type_array = array('0' => 'Hoja A4','1' => 'Hoja Star');
			echo "<label for='type_printer'>Tipo Hoja:</label>";
			echo form_dropdown('type_printer', $type_array, '');?>
			<button name='btn_reimprimir_factura' role='button' class="btn btn-primary">Reimprimir Ultima Factura</button></li>
		</ul>
	</div>
</div>

<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<ul class="well well-sm" id="contenedor_datos_cliente">
			<li><label>Cliente: <?=  $basic_info['Nombre']; ?></label></li>
			<li><label>Contrato: <?php echo $basic_info['Contrato']; ?></label></li>
			<li><label>Cedula: <?php echo $basic_info['Cedula']; ?></label></li>
			<li><label>Direccion: <?php echo $basic_info['Direccion']; ?></label></li>
			<li>
			<?php 
				$type_array = array('0' => 'Pago Mensualidad','1' => 'Caja Digital');
				if(in_array($basic_info['CodigoEstatus'], array(1,4,12,13)))
					$type_array[] = 'Pago de Reconexión';
				echo "<label for='type'>Accion a realizar:</label>";
				echo form_dropdown('type', $type_array, '');
			?>
			</li>
		</ul>
	</div>
</div>

<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<table id="lista"></table> 
		<span class="generated_balance" id="generated_sumbalance"></span>
	</div>
</div>

<div class="row">
	<div class="col-md-7 col-md-offset-2">
		<div class="col-md-2"><label class="control-label" for='txt_monto_pago'>Monto a pagar:</label></div>
		<div class="col-md-4"><input type='number' class="number form-control" name='txt_monto_pago'></input></div>
		<div class="col-md-1"> <button name='btn_pagar_monto' role='button' class="btn btn-primary">Pagar</button></div>
	</div>
</div>


