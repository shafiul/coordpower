<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Department_Report extends CI_Controller {

    private $_model_name = "department_report";
    
    public function index()
    {
        $this->bootstrap->viewLoader();
    }
    
    private function _load_model(){
        $this->load_model($this->_model_name."_model",$this->_model_name);
    }
    
    public function create(){
        
        $meeting_id = $this->input->post('meeting_id');
        $dept_id = $this->input->post('dept_id');
        $discussion = $this->input->post('discussion');
        $decision = $this->input->post('decision');
        $responsiblee = $this->input->post('responsiblee');
        
        $this->_load_model();
        
        $this->department->create($meeting_id,$dept_id,$discussion,$decision,$responsiblee);
        
        $this->load_view('after_create');
        
    }
    
    public function delete(){
        
        $id = $this->input->get('id');
        
        $this->_load_model();
        
        $this->department->delete($id);
        
        $this->load_view('after_delete');
        
    }
    
    public function update(){
        
        $id = $this->input->get('id');
        $name = $this->input->post('name');
        
        $this->_load_model();
        
        $this->department->update($id,$name);
        
        $this->load_view('after_department');
        
    }
    
    
    
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */