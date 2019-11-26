<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<?php
    class funciones {

        private static $CI = NULL;

        public function __construct(){
            self::$CI = &get_instance();
        }
        
        public function limpia_sesion(){
            $array_items = array('session_id' => '',
                                 'ip_address' => '',
                                 'user_agent' => '', 
                                 'last_activity' => '', 
                                 'nombreusuario' => '');
             self::$CI->session->unset_userdata($array_items);
        }

    }

?>