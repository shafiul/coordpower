<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Department extends MY_Controller {

    private $_model_name = "department";
    private $_ci = "";
    
    
    private function _load_model(){                
        $this->_ci->load->model($this->_model_name."_model",$this->_model_name);
    }
    
    public function __construct() {
        parent::__construct();
        $this->_ci  = get_instance();     
    }
    
    public function index(){
        $this->bootstrap->viewLoader(
                'department/create'
        );        
    }
    
    public function create(){
        
        $name = $this->input->post('name');
        
        $this->_load_model();
        
        $this->department->create($name);
        
        $this->bootstrap->viewLoader(
                'department/create'
        );        
        
    }
    
    public function delete(){
        
        $id = $this->input->get('id');
        
        $this->_load_model();
        
        $this->department->delete($id);
        
        $this->bootstrap->viewLoader(
                'department/after_delete'
        );
        
    }
    
    public function update(){
        
        $id = $this->input->get('id');
        $name = $this->input->post('name');
        
        $this->_load_model();
        
        $this->department->update($id,$name);
        
        $this->bootstrap->viewLoader(
                'department/after_update'
        );
        
    }
    
    public function list_all(){
        
        $this->_load_model();
                
        $dept_info = $this->input->get();
        
        $this->bootstrap->viewLoader(
                'department/list_dipartment'
        );
        
    }
    
    
    
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */