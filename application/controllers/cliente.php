<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>


<?php
	class cliente extends CI_controller{
		
		public function __construct(){
			parent::__construct();
			$this->load->library('chequeousuario');
		}

		public function traslados($parameter){
			$this->chequeousuario->estara_en_sesion(true, 'cliente/traslados/' . $parameter);
            $this->load->helper('form');

			$this->load->view('hf/header', array(
            'precss' => array(
                "http://fonts.googleapis.com/css?family=Sonsie+One"
                    ),
            'css' => array(
                "jquery.jqGrid-4.5.4/css/ui.jqgrid",
                "le-frog/jquery-ui",
                "bootstrap/bootstrap",
                "cliente/traslados",
                "chosen.min"
                ),

            'js' => array(
                "jquery-1.11.0.min",
                "header",
                "jquery.jqGrid-4.5.4/js/i18n/grid.locale-es",
                "jquery.jqGrid-4.5.4/js/jquery.jqGrid.min",
                "bootstrap/bootstrap.min",
                "jquery.jqGrid-4.5.4/js/jquery-ui-1.10.4.custom.min",
                "jquery.cookie",
                "claseNumerica",
                "cities/__construct",
                "chosen.jquery.min",
                "chosen.proto.min",
                "cliente/traslados"
                ),
            
            'prejs' => array()
            )
         );
        $this->load->view('cliente/traslados', array('options' =>  array( '' => "",
                                                                        1 => "San Francisco de Macoris" , 
                                                                        2 => "San Juan de la Maguana",
                                                                        3 => "San Pedro de Macoris",
                                                                        4 => "Nagua",
                                                                        5 => "Pimentel",
                                                                        6 => "Las guarnas",
                                                                        7 =>  "Santiago"
                                                                        ),
                                                                    'parameter' => $parameter

                                                    )
                        );
        $this->load->view('hf/footer');

		}

        public function registro_cliente(){
            $this->chequeousuario->estara_en_sesion(true, 'cliente/registro_cliente/');
            $this->load->helper('form');

            $this->load->view('hf/header', array(
            'precss' => array(
                "http://fonts.googleapis.com/css?family=Sonsie+One"
                    ),
            'css' => array(
                "bootstrap/bootstrap",
                "cliente/client_register"
                ),

            'js' => array(
                "jquery-1.11.0.min",
                "header",
                "bootstrap/bootstrap.min",
                "claseNumerica",
                ),
            
            'prejs' => array()
            )
         );
        $this->load->view('cliente/client_register');
        $this->load->view('hf/footer');

        }
	}
?>
