<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<?php

  class validacion extends CI_Controller {

      public function __construct(){
        parent::__construct();
      }
      
      private function formulariox(){

          $this->load->helper('form');
          $this->load->library('form_validation');

          $config = array(
               array(
                     'field'   => 'usuario',
                     'label'   => 'Nombre Usuario',
                     'rules'   => 'required'
                  ),
               array(
                     'field'   => 'contrasena',
                     'label'   => 'Contrasena',
                     'rules'   => 'required'
                  )
            );

          $this->form_validation->set_error_delimiters('<p class="error">'); 
          $this->form_validation->set_rules($config); 
          $error = FALSE;

          if ($this->form_validation->run() == FALSE){
              $this->load->view('formulario_ejemplo', array('error' => $error));
          } else {
                      $this->load->helper('security');
              //array('nombre'=>$this->input->post('usuario'), 'contrasena'=>do_hash($this->input->post('contrasena'), 'md5')));
         
             if (!isset($resultado)) {
                  $this->load->view('formulario_ejemplo', array('error' => !$error));
              } else {
                  if ($resultado > 0) {
                  $this->session->set_userdata(array(
                    'idusuario' => $resultado,
                    'nombreusuario' => $this->input->post('usuario')
                  ));
                  redirect('/busquedacliente/index' , 'refresh');
                  }
              }
          }
      }

      public function formulario(){
        $this->load->helper('form');
        $this->load->view('formulario_ejemplo');
      }

      public function user_validate(){
        $this->load->model('mdl_user_validate');
         $resultado = $this->mdl_user_validate->validate_user(array(
          'usuario'=> $this->input->post('usuario') ? $this->input->post('usuario') : "0", 
          'contrasena'=> $this->input->post('contrasena') ? $this->input->post('contrasena') : "0",
          'tipo' => $this->input->post('tipo') ? $this->input->post('tipo') : "0"
        ));

         if ((int)$resultado > 0){
           $this->session->set_userdata(array(
                    'idusuario' => $resultado,
                    'nombreusuario' => $this->input->post('usuario')
                  ));
         }

         echo json_encode(array("validate"=>$resultado,"redirect"=>$this->input->cookie('telenordci_redirect', TRUE)));
         //echo $this->input->cookie('telenordci_redirect', TRUE);
      }

      public function logout() {
          echo "saliendo...";
          $this->load->library(array('funciones', 'chequeousuario'));
          if ($this->session->userdata('idusuario') !== NULL) {
            $this->funciones->limpia_sesion();           
          }
          $this->chequeousuario->estara_en_sesion(true);
      }
  }

?>