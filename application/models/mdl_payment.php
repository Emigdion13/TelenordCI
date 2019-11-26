<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class mdl_payment extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function make_payment($type, $contract,  $mount, $auxiliar)
    {
        if ($this->session->userdata('idusuario') === NULL){
            return ;
        }
        $url = 'http://telenordsfm.no-ip.biz:8080/Clientela/db_ODC.php';
        $data = array('tipo' => $type, 'codigo' => $this->session->userdata('idusuario'), 'Contrato' =>  $contract, 'Monto' => $mount, 'Auxiliar' => $auxiliar);

        $options = array(
            'http' => array(
            'method'  => 'POST',
            'header'  => 'Content-type: application/x-www-form-urlencoded',
            'content' => http_build_query($data)
            )
        );

        $context  = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        $json_a = json_decode($result,true);    

        return $json_a;
    }
}