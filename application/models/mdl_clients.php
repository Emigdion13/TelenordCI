<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class mdl_clients extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    //TODO: Hacer metodos con el TIPO FIJO para fijar datos IDEA.

    public function get_user_data($type, $parameter, $added=0)
    {
        
        if ($this->session->userdata('idusuario') === NULL){
            return ;
        }

        $url = 'http://telenordsfm.no-ip.biz:8080/Clientela/db_ODC.php';
        //013495003102438
        $data = array('tipo' => $type, 'codigo' => $this->session->userdata('idusuario'), 'parametro' =>  $parameter, 'agregado' => $added);

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

    public function get_last_invoice($parameter_){
        
        if ($this->session->userdata('idusuario') === NULL){
            return ;
        }

        $url = 'http://telenordsfm.no-ip.biz:8080/Clientela/db_ODC.php';
        //013495003102438
        $data = array('tipo' => '80', 'codigo' => $this->session->userdata('idusuario'), 'Contrato' =>  $parameter_);

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
