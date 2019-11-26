 <html>
        <head>
            <title>Login Sistema Cobros Telenord</title>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/bootstrap/bootstrap.css" media="screen">
            <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/login/login.css" media="screen">
            
            <?php $ajax_url = site_url() .'/'. $this->router->class; ?>

            <script type="text/javascript">
                var ajax_url = '<?php echo $ajax_url; ?>';
                var site_url = '<?php echo site_url() ?>';

                function link_to(url)
                {
                    return ajax_url + "/" + url;
                }

                function redirection(url){
                    return site_url + "/" + url;
                }

            </script>
            <script type='text/javascript' src="<?php echo base_url()?>js/jquery-1.11.0.min.js"></script>
            <script type='text/javascript' src="<?php echo base_url()?>js/bootstrap/bootstrap.min.js"></script>
            <script type="text/javascript" src="<?php echo base_url()?>js/formulario_ejemplo.js"></script>
            <script type="text/javascript" src="<?php echo base_url()?>js/jquery.md5.js"></script>
            <script type="text/javascript" src="<?php echo base_url()?>js/jquery.cookie.js"></script>
        </head>

        <body>
        
            <?php echo form_open();?>

            <div class="container" id="contenedor-header">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3 well">
                        <center><h2>Entrada al sistema</h2></center>
                    </div>
                </div>
            </div>

            <div class="container" id="contenedor-inputs">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3 well">
                        <div id="div-usuario" class="group-form">
                            <?php echo form_label('Nombre Usuario:', 'usuario');?>
                            <?php echo form_input('usuario', '', "class='form-control'");?>
                             <span id="span-usuario" class=""></span>
                        </div>
                        <div id="div-contrasena" class="group-form">
                            <?php echo form_label('Contrasena:', 'contrasena');?>
                            <?php echo form_password('contrasena', '' , "class='form-control'");?>
                             <span id="span-contrasena" class=""></span>
                        </div>
                        <div class="row" id="row-entrarbtn">
                            <div class="col-sm-1">
                                <button name="btn_entrar" type="button" class='btn btn-default'>Entrar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php echo form_close();?>

    
        </body>
    </html>



