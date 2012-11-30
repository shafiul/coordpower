<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Committee extends CI_Controller {

    private $_model_name = "committee";
            
    public function index()
    {
        $this->bootstrap->viewLoader();
    }
    
    private function _load_model(){
        $this->load_model($this->_model_name."_model",$this->_model_name);
    }
    
    
    public function create(){
        
        $union_id = $this->input->post('union_id');
        $user_ids = $this->input->post('user_ids');
        
        $this->_load_model();
        
        if( !is_array($user_ids) ){
            $user_ids[] = array( $user_ids );
        }
        foreach( $user_ids as $a_user_id ){
            $this->committee->create($union_id,$a_user_id);
        }
        
        
        $this->load_view('after_create');
    }
    
    public function delete(){
        
        $committee_id = $this->input->post('id');
        
        $this->_load_model();
        
        $this->committee->delete($committee_id);
        
    }
    
    public function view(){
        
        $start = $this->input->get('start') ? $this->input->get('start') : 0;
        $limit = 100;
        
        $this->_load_model();
        $this->committee->get($start,$limit);
        
        $this->load_view('committee_view');
        
    }
    
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */