<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class detallecliente extends CI_Controller {

 	public function __construct(){
        parent::__construct();
        $this->load->library('chequeousuario');
        $this->load->model('mdl_clients');
    }


 	public function cliente ($parameter = ''){	
        preg_match("/^[a-zA-Z][0-9]{7}[a-zA-Z]$/", $parameter, $output_array);

        if (empty($output_array[0])){
            echo $parameter . " Es un dato invalido";
            return ;
        }

 		$this->chequeousuario->estara_en_sesion(true, 'busquedacliente/redireccionando/' . $parameter);

 		$this->load->helper('form');
 		$data = array();

 		$basic_info = $this->mdl_clients->get_user_data('9', $parameter);

        if (empty($basic_info['resultado'][0])){
            echo $parameter . " No fue encontrado en la base de datos";
            return ;
        }

 		$data['basic_info'] = $basic_info['resultado'][0];

        $this->load->view('hf/header', array(
            'precss' => array(
                "http://fonts.googleapis.com/css?family=Sonsie+One"
                    ),
            'css' => array(
                "jquery.jqGrid-4.5.4/css/ui.jqgrid",
                "le-frog/jquery-ui",
                "bootstrap/bootstrap",
                "client/index"
                ),

            'js' => array(
                "jquery-1.11.0.min",
                "header",
                "jquery.jqGrid-4.5.4/js/i18n/grid.locale-es",
                "jquery.jqGrid-4.5.4/js/jquery.jqGrid.min",
                "bootstrap/bootstrap.min",
                "client_info",
                "jquery.jqGrid-4.5.4/js/jquery-ui-1.10.4.custom.min",
                "jquery.cookie",
                "claseNumerica",
                ),
            
            'prejs' => array(
                 "var contract = '$parameter'",
                ),
            'menu_servicios' => 'y',
            'contract' => $parameter,
            'title' => "Detalle Contrato"
            )
         );
        $this->load->view('client/index', $data);
        $this->load->view('hf/footer');
 	}

 	public function credit_info(){
        $this->chequeousuario->estara_en_sesion(true);

 		$type =  $this->input->post('type');
 		$parameter = $this->input->post('parameter');
        $add = $this->input->post('add');

 		$cred_info = $this->mdl_clients->get_user_data($type, $parameter, $add);
 		/*if($cred_info == null || $cred_info == '')
 			$cred_info = 0;*/

        $sumBalance['Balance'] = 0;
        if ($cred_info['resultado'] !== null)
        {
            foreach ($cred_info['resultado'] as $value) {
                foreach ($value as $id => $valuetwo) {
                    $id === "Balance" ? (isset($sumBalance[$id]) ? $sumBalance[$id]+=$valuetwo :  $sumBalance[$id] = $valuetwo) : '' ;
                }
            }
        }

        $totalRecords   = count($cred_info['resultado']);
        $results        = $cred_info['resultado'];

        $json_output = array(
            'total'      => 0,
            'page'       => 0,
            'records'    => $totalRecords,
            'rows'       => $results,
            'sumBalance' => number_format($sumBalance['Balance'], 2)
        );
        
        echo json_encode($json_output);
 	}

    public function make_payment(){
        
        $this->chequeousuario->estara_en_sesion(true);

        $this->load->model('mdl_payment');

        $type = $this->input->post('type');
        $balance_anterior = $this->input->post('balance_anterior');
        $mount = $this->input->post('mount');
        $contract = $this->input->post('contract');
        $auxiliar = $this->input->post('Auxiliar');

        $cred_info = $this->mdl_payment->make_payment($type, $contract,  $mount , $auxiliar);

        //$cred_info = (object) array_merge( (array)$cred_info, array( 'balance_anterior' => $balance_anterior, 'mount' => $mount, 'contract' => $contract));
        
    }

    public function present_error(){

        $mensaje = $this->input->post('mensaje');
        empty($mensaje) ? $mensaje = "Error Desconocido" : '' ;  
        $this->load->view('messages_views/error_window', array('mensaje' => $mensaje));      
    }

 }
?>

