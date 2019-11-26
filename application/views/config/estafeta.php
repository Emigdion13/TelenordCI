<ol class="breadcrumb">
  <li><a href="<?php echo base_url();?>index.php/busquedacliente/index">Inicio</a></li>
  <li class="active">Configuraci&oacute;n estafeta</li>
</ol>
<div class="jumbotron">
  <h1>Configuraci&oacute;n Estafeta</h1>
</div>

<div class="row">
   <div class="col-md-6 col-sm-offset-3">
    <div class="panel panel-primary">
      <div class="panel-heading" >
        <h3 class="panel-title">Configuraci&oacute;n Estafeta</h3>
      </div>
      <div class="panel-body">
          <form class="form-horizontal" role="form">
            <div class="form-group has-feedback">
              <label class="control-label col-sm-2" for="inputDireccion">Direcci&oacute;n</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="inputDireccion">
                <!--<span class="glyphicon glyphicon-ok form-control-feedback"></span>-->
              </div>
          </div>
           <div class="form-group has-feedback">
            <label class="control-label col-sm-2" for="inputCiudad">Ciudad</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="inputCiudad">
              <!--<span class="glyphicon glyphicon-ok form-control-feedback"></span>-->
            </div>
          </div>
           <div class="form-group has-feedback">
            <label class="control-label col-sm-2" for="inputTelefono">Tel&eacute;fono</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="inputTelefono">
              <!--<span class="glyphicon glyphicon-ok form-control-feedback"></span>-->
            </div>
          </div>
          <div class="form-group has-feedback">
            <label class="control-label col-sm-2" for="inputFax">Fax</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="inputFax">
              <!--<span class="glyphicon glyphicon-ok form-control-feedback"></span>-->
            </div>
          </div>
          </form>
      </div>
    </div>
  </div>

  <div class="col-sm-3 col-sm-offset-7">
    <button type="button" class="btn btn-success" id="btn_aceptar">Aceptar</button>
    <button type="button" class="btn btn-danger" id="btn_cancelar">Cancelar</button>
  </div>  
</div>