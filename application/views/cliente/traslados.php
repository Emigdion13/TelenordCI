<!--<input type="button" value="Boton" id="el_botonaso"></input>-->
<ol class="breadcrumb">
  <li><a href="<?php echo base_url();?>index.php/busquedacliente/index">Inicio</a></li>
  <li><a href= <?php echo base_url() . "index.php/busquedacliente/redireccionando/$parameter" ;?>>Pago Servicios a clientes</a></li>
  <li class="active">Traslados</li>
</ol>
<div class="jumbotron">
  <h1>Traslados</h1>
</div>

<div class="row">
  <div class="col-md-1 col-md-offset-10"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#infocliente">Informaci&oacute;n Cliente</button></div>
</div>

<!-- Modal -->
<div class="modal fade" id="infocliente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel"><?php echo $parameter ?></h4>
      </div>
      <div class="modal-body">
         <span id="modal-body-content"></span>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-6">
  	<div class="panel panel-success">
  		<div class="panel-heading" >
    		<h3 class="panel-title">Direcci&oacute;n Anterior</h3>
  		</div>
  		<div class="panel-body">
        <form class="form-horizontal" role="form">
          <div class="form-group has-success has-feedback">
            <label class="control-label col-sm-3" for="inputCiudad_read">Ciudad</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="inputCiudad_read" disabled>
              <!--<span class="glyphicon glyphicon-ok form-control-feedback"></span>-->
            </div>
          </div>

          <div class="form-group has-success has-feedback">
            <label class="control-label col-sm-3" for="inputSector_read">Sector</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="inputSector_read" disabled>
              <!--<span class="glyphicon glyphicon-ok form-control-feedback"></span>-->
            </div>
          </div>

          <div class="form-group has-success has-feedback">
            <label class="control-label col-sm-3" for="inputCalle_read">Calle</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="inputCalle_read" disabled>
              <!--<span class="glyphicon glyphicon-ok form-control-feedback"></span>-->
            </div>
          </div>

          <div class="form-group has-success has-feedback">
            <label class="control-label col-sm-3" for="inputEsquina_read">Esquina</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="inputEsquina_read" disabled>
              <!--<span class="glyphicon glyphicon-ok form-control-feedback"></span>-->
            </div>
          </div>

          <div class="form-group has-success has-feedback">
            <label class="control-label col-sm-3" for="inputZona_read">Zona</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="inputZona_read" disabled>
              <!--<span class="glyphicon glyphicon-ok form-control-feedback"></span>-->
            </div>
          </div>

          <div class="form-group has-success has-feedback">
            <label class="control-label col-sm-3" for="inputCasa_read">Casa #</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="inputCasa_read" disabled>
              <!--<span class="glyphicon glyphicon-ok form-control-feedback"></span>-->
            </div>
          </div>

          <div class="form-group has-success has-feedback">
            <label class="control-label col-sm-3" for="inputApartamento_read">Apartamento</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="inputApartamento_read" disabled>
              <!--<span class="glyphicon glyphicon-ok form-control-feedback"></span>-->
            </div>
          </div>

          <div class="form-group has-success has-feedback">
            <label class="control-label col-sm-3" for="inputEdificio_read">Edificio</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="inputEdificio_read" disabled>
              <!--<span class="glyphicon glyphicon-ok form-control-feedback"></span>-->
            </div>
          </div>

          <div class="form-group has-success has-feedback">
            <label class="control-label col-sm-3" for="inputReferencia_read">Referencia</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="inputReferencia_read" disabled>
              <!--<span class="glyphicon glyphicon-ok form-control-feedback"></span>-->
            </div>
          </div>

        </form>
  		</div>
    </div>
	</div>
  <div class="col-md-6">
  	<div class="panel panel-danger" >
  		<div class="panel-heading" >
    		<h3 class="panel-title">Direcci&oacute;n Actual</h3>
  		</div>
  		<div class="panel-body">
          <form class="form-horizontal" role="form">
          <div class="form-group has-error has-feedback">
            <label class="control-label col-sm-3" for="select_ciudad">Ciudad</label>
            <div class="col-sm-9">
              <?php echo form_dropdown('select_ciudad', $options, '', 'data-placeholder="Selecciona la Ciudad..." class="chosen-select chosen_select"'); ?>
              <!--<span class="glyphicon glyphicon-ok form-control-feedback"></span>-->
            </div>
          </div>

          <div class="form-group has-error has-feedback">
            <label class="control-label col-sm-3" for="select_sector">Sector</label>
            <div class="col-sm-9">
              <?php echo form_dropdown('select_sector', $options, '', 'data-placeholder="Selecciona el sector..." class="chosen-select chosen_select"'); ?>
              <!--<span class="glyphicon glyphicon-ok form-control-feedback"></span>-->
            </div>
          </div>

          <div class="form-group has-error has-feedback">
            <label class="control-label col-sm-3" for="select_calle">Calle</label>
            <div class="col-sm-9">
              <?php echo form_dropdown('select_calle', $options, '', 'data-placeholder="Selecciona la calle..." class="chosen-select chosen_select"'); ?>
              <!--<span class="glyphicon glyphicon-ok form-control-feedback"></span>-->
            </div>
          </div>

          <div class="form-group has-error has-feedback">
            <label class="control-label col-sm-3" for="inputEsquina">Esquina</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="inputEsquina">
              <!--<span class="glyphicon glyphicon-ok form-control-feedback"></span>-->
            </div>
          </div>

          <div class="form-group has-error has-feedback">
            <label class="control-label col-sm-3" for="inputZona">Zona</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="inputZona">
              <!--<span class="glyphicon glyphicon-ok form-control-feedback"></span>-->
            </div>
          </div>

          <div class="form-group has-error has-feedback">
            <label class="control-label col-sm-3" for="inputCasa">Casa #</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="inputCasa">
              <!--<span class="glyphicon glyphicon-ok form-control-feedback"></span>-->
            </div>
          </div>

          <div class="form-group has-error has-feedback">
            <label class="control-label col-sm-3" for="inputApartamento">Apartamento</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="inputApartamento">
              <!--<span class="glyphicon glyphicon-ok form-control-feedback"></span>-->
            </div>
          </div>

          <div class="form-group has-error has-feedback">
            <label class="control-label col-sm-3" for="select_edificio">Edificio</label>
            <div class="col-sm-9">
              <?php echo form_dropdown('select_edificio', $options, '', 'data-placeholder="Selecciona el edificio..." class="chosen-select chosen_select"'); ?>
              <!--<span class="glyphicon glyphicon-ok form-control-feedback"></span>-->
            </div>
          </div>

          <div class="form-group has-error has-feedback">
            <label class="control-label col-sm-3" for="inputReferencia">Referencia</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="inputReferencia">
              <!--<span class="glyphicon glyphicon-ok form-control-feedback"></span>-->
            </div>
          </div>
        </form>
  		</div>
	</div>
 </div>
</div>

<div class="row">
  <div class="col-md-3 col-md-offset-9">
    <div class="panel panel-primary">
      <div class="panel-heading" >
        <h3 class="panel-title">Monto a Pagar</h3>
      </div>
      <div class="panel-body">
        <form class="form-horizontal" role="form">
          <div class="form-group has-feedback">
            <label class="control-label col-sm-3" for="inputMonto">Monto</label>
            <div class="col-sm-9" id="div-controlar">
              <input type="text" class="form-control" id="inputMonto" disabled>
              <!--<span class="glyphicon glyphicon-ok form-control-feedback"></span>-->
            </div>
            <div class="col-sm-3 col-sm-offset-7">
              <button type="button" class="btn btn-success" id="btn_aceptar">Aceptar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>



<!--<form class="form-horizontal" role="form">
          <div class="form-group has-warning has-feedback">
            <label class="control-label col-sm-3" for="inputPago">Monto:</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="inputPago">
              <span class="glyphicon glyphicon-ok form-control-feedback"></span>
            </div>
          </div>
</form>

<button type="button" class="btn btn-danger" id="btn_cancelar">Cancelar</button>
<button type="button" class="btn btn-success" id="btn_aceptar">Aceptar</button>-->




