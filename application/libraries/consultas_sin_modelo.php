<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<?php
    
class consultas_sin_modelo {
    
    private static $CI = NULL;

    public function __construct(){
        self::$CI = &get_instance();
        self::$CI->load->library('chequeousuario');
        /*if (!self::$CI->chequeousuario->estara_en_sesion()){
            self::$CI = NULL;
        }*/
    }

    public function login($datos = array()){
       /* $querystring = 'select androidlogin(?,?) as resultado;';
        $result =  self::$CI->db->query($querystring, array('nombre' => $datos['nombre'], 
                                                            'contrasena' => $datos['contrasena']));
        return $result->row(0)->resultado;*/
        //return "170";

        //Domingo 170
        //Shogy 370
    }

}

?>
