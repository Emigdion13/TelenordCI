<ol class="breadcrumb">
  <li><a href="<?php echo base_url();?>index.php/busquedacliente/index">Inicio</a></li>
  <li class="active">Registro de Cliente</li>
</ol>
<div class="jumbotron">
  <h1>Registro de Cliente</h1>
</div>

<div class="row">
   <div class="col-md-12">
    <div class="panel panel-primary">
      <div class="panel-heading" >
        <h3 class="panel-title">Nuevo Cliente</h3>
      </div>
      <div class="panel-body">
        <div class="col-md-6">  
          <form class="form-horizontal" role="form">
            <div class="form-group has-feedback">
              <label class="control-label col-sm-2" for="inputCodigo">Codigo</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" id="inputCodigo">
                <!--<span class="glyphicon glyphicon-ok form-control-feedback"></span>-->
              </div>
          </div>
          <div class="form-group has-feedback">
            <label class="control-label col-sm-2" for="sexoroundgroup">Sexo</label>
            <div class="col-sm-4">
              <div class="btn-group">
                <button type="button" class="btn btn-default" id="btn_masculino">Masculino</button>
                <button type="button" class="btn btn-default" id="btn_femenino">Femenino</button>
              </div>
            </div>
          </div>
           <div class="form-group has-feedback">
            <label class="control-label col-sm-2" for="inputCedula_rnc">Cedula o Rnc</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" id="inputCedula_rnc">
              <!--<span class="glyphicon glyphicon-ok form-control-feedback"></span>-->
            </div>
          </div>
          <div class="form-group has-feedback">
            <label class="control-label col-sm-2" for="sexoroundgroup">Estado Civil</label>
            <div class="col-sm-4">
              <div class="btn-group">
                  <button type="button" class="btn btn-default" id="btn_casado">Casado</button>
                  <button type="button" class="btn btn-default" id="btn_soltero">Soltero</button>
                </div>
              </div>
          </div>
           <div class="form-group has-feedback">
            <label class="control-label col-sm-2" for="inputPasaporte">Pasaporte</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" id="inputPasaporte">
              <!--<span class="glyphicon glyphicon-ok form-control-feedback"></span>-->
            </div>
          </div>
          <div class="form-group has-feedback">
            <label class="control-label col-sm-2" for="inputNombre">Nombres</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="inputNombre">
              <!--<span class="glyphicon glyphicon-ok form-control-feedback"></span>-->
            </div>
          </div>
          <div class="form-group has-feedback">
            <label class="control-label col-sm-2" for="inputApellidos">Apellidos</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="inputApellidos">
              <!--<span class="glyphicon glyphicon-ok form-control-feedback"></span>-->
            </div>
          </div>
          <div class="form-group has-feedback">
            <label class="control-label col-sm-2" for="inputApodo">Apodo</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="inputApodo">
              <!--<span class="glyphicon glyphicon-ok form-control-feedback"></span>-->
            </div>
          </div>
          <div class="form-group has-feedback">
            <label class="control-label col-sm-2" for="inputNacimiento">Nacimiento</label>
            <div class="col-sm-5">
              <input type="text" class="form-control" id="inputNacimiento">
              <!--<span class="glyphicon glyphicon-ok form-control-feedback"></span>-->
            </div>
          </div>
          <div class="form-group has-feedback">
            <label class="control-label col-sm-2" for="inputEmail">Email</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="inputEmail">
              <!--<span class="glyphicon glyphicon-ok form-control-feedback"></span>-->
            </div>
          </div>
          </form>
        </div>

        <div class="col-md-6">
          <div class="panel panel-danger">
            <div class="panel-heading" >
              <h3 class="panel-title">Ocupaci&oacute;n</h3>
            </div>
          <div class="panel-body">
            <form class="form-horizontal" role="form">
              <div class="form-group has-feedback">
                <label class="control-label col-sm-3" for="inputOcupacion">Ocupaci&oacute;n</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="inputOcupacion">
                  <!--<span class="glyphicon glyphicon-ok form-control-feedback"></span>-->
                </div>
              </div>

              <div class="form-group has-feedback">
                <label class="control-label col-sm-3" for="inputLugarTrabajo">Lugar de Trabajo</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="inputLugarTrabajo">
                  <!--<span class="glyphicon glyphicon-ok form-control-feedback"></span>-->
                </div>
              </div>

              <div class="form-group has-feedback">
                <label class="control-label col-sm-3" for="inputSuperiorInmediato">Superior Inmediato</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="inputSuperiorInmediato">
                  <!--<span class="glyphicon glyphicon-ok form-control-feedback"></span>-->
                </div>
              </div>

              <div class="form-group has-feedback">
                <label class="control-label col-sm-3" for="inputTelefono">Tel&eacute;fono</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" id="inputTelefono">
                  <!--<span class="glyphicon glyphicon-ok form-control-feedback"></span>-->
                </div>
              </div>

              <div class="form-group has-feedback">
                <label class="control-label col-sm-3" for="inputExtension">Extensi&oacute;n</label>
                <div class="col-sm-3">
                  <input type="text" class="form-control" id="inputExtension">
                  <!--<span class="glyphicon glyphicon-ok form-control-feedback"></span>-->
                </div>
              </div>
            </form>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-2 col-md-offset-10">
    <button type="button" class="btn btn-success">Aceptar</button>
    <button type="button" class="btn btn-danger">Cancelar</button>
  </div>  
</div>

