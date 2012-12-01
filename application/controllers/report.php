<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report extends MY_Controller {

        
    private $_model_name = "report";
    
    
    public function index()
    {
        $this->bootstrap->viewLoader();
    }
    
    private function _load_model(){
        $this->load->model($this->_model_name."_model",$this->_model_name);
    }
    
    public function generate_report(){
        
    }
    
    public function get_report(){
        
    }
    
    public function show_all_report(){
        
        $this->bootstrap->viewLoader('report/view');        
    }
    
    public function show_stats(){
        
    }
    
    function create_test(){
        $this->bootstrap->viewLoader('report/create');
    }
    
    
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */