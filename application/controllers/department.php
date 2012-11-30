<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Department extends CI_Controller {

    private $_model_name = "department";
            
    public function index()
    {
        
    }
    
    private function _load_model(){
        $this->load_model($this->_model_name."_model",$this->_model_name);
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
    
    public function list_department(){
        
        $this->_load_model();
//        $dept_info = $this->input->
        
    }
    
    
    
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */