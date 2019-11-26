<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class config extends CI_controller{

		public function __construct(){
			parent::__construct();
			$this->load->library('chequeousuario');
		}

		public function estafeta(){
			$this->chequeousuario->estara_en_sesion(true, 'config/estafeta');
            $this->load->helper('form');

			 $this->load->view('hf/header', array(
		            'precss' => array(
		                "http://fonts.googleapis.com/css?family=Sonsie+One"
		                    ),
		            'css' => array(
		                "bootstrap/bootstrap",
		                "chosen.min",
		                "config/estafeta"
		                ),

		            'js' => array(
		                "jquery-1.11.0.min",
		                "bootstrap/bootstrap.min",
		                "jquery.cookie",
		                "claseNumerica",
		                "chosen.jquery.min",
                		"chosen.proto.min",
                		"config/estafeta"
		                ),
		            
		            'prejs' => array(
		                ),
		            'title' => "Configuracion Estafeta"
		            )

			);
			 $this->load->view('config/estafeta');
        	 $this->load->view('hf/footer');
		}




	}