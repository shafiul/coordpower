<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Resolution extends CI_Controller {

            
    private $_model_name = "resolution";
    
    public function index()
    {
        $this->bootstrap->viewLoader();
    }
    
    private function _load_model(){
        $this->load_model($this->_model_name."_model",$this->_model_name);
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */