<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class busquedacliente extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->library('chequeousuario');
        $this->load->model('mdl_clients');
        $this->load->helper('url');
    }
    
    public function index(){
         $this->chequeousuario->estara_en_sesion(true);

         $this->load->helper('form');
         $this->load->view('hf/header', array(
            'precss' => array(
                "http://fonts.googleapis.com/css?family=Sonsie+One"
                    ),
            'css' => array(
                "jquery.jqGrid-4.5.4/css/ui.jqgrid",
                "le-frog/jquery-ui",
                "busquedacliente/busquedacliente",
                "bootstrap/bootstrap"
                ),

            'js' => array(
                "jquery-1.11.0.min",
                "header",
                "jquery.jqGrid-4.5.4/js/i18n/grid.locale-es",
                "jquery.jqGrid-4.5.4/js/jquery.jqGrid.min",
                "principal",
                "bootstrap/bootstrap.min"
                ),
            'usuario' => $this->session->userdata('nombreusuario')
            )
         );
         $this->load->view('principal');
         $this->load->view('hf/footer');
     }

     public function data(){
        $user_logged = $this->chequeousuario->estara_en_sesion();

        $page       = $this->input->post('page') ? $this->input->post('page') : 1;
        $rp         = $this->input->post('rows') ? $this->input->post('rows') : 50;
        $sortname   = $this->input->post('sidx') ? $this->input->post('sidx') : '';
        $sortorder  = $this->input->post('sord') ? $this->input->post('sord') : 'DESC';
        $limit      = $rp * $page - $rp;
        $offset     = $rp;

        $parameter = ($this->input->post('searchString') ? $this->input->post('searchString') : null);
        $json_a = $this->mdl_clients->get_user_data('9', $parameter);

        $filter = array();
        $totalRecords   = count($json_a['resultado']);
        $results        = $json_a['resultado']; 
        $totalPages     = ceil($totalRecords / $rp);

        $json_output = array(
            'total'     => $totalPages,
            'page'      => $page,
            'records'   => $totalRecords,
            'rows'      => $results,
            'user_logged' => $user_logged
        );
        
        echo json_encode($json_output);
     }

     public function redireccionando($parameter = ''){
        preg_match("/^[a-zA-Z][0-9]{7}[a-zA-Z]$/", $parameter, $output_array);

        if (empty($output_array[0])){
            echo $parameter . " Es un dato invalido";
            return ;
        }

        $this->chequeousuario->estara_en_sesion(true, 'busquedacliente/redireccionando/' . $parameter);
        $this->load->view('redireccionando', array('parameter' => $parameter));
     }

 }