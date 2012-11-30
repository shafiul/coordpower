<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
    
    private $_ci;
    
    public function __construct() {
        parent::__construct();
        $this->_init();
    }
    
    private function _init(){
        
        $this->_ci = get_instance();        
        $lang = $this->_ci->input->get('lang');        
        if($lang  && in_array($lang, $this->_ci->config->item('lang') ) ) {
            $this->lang->load('filename', $lang);            
        }
        
    }
    
    
    

    
}

