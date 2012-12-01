<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends MY_Controller {

    private $_model_name = "user";
            
    public function index()
    {
        $this->bootstrap->viewLoader();
    }
    
    private function _load_model(){
        $this->load_model($this->_model_name."_model",$this->_model_name);
    }
    
    public function create(){
        
        $role = $this->input->post('role');        
        $name = $this->input->post('name');
        $password = $this->input->post('password');
        $email = $this->input->post('email');
        $mobile_number = $this->input->post('mobile_number');
        
        $this->_load_model();
        
        $this->user->insertUser($name, $password, $role, $email, $mobile_number);
        
        $this->load_view('user_reg_succes');
    }
    
    public function delete(){
        
        $role = $this->input->post('id');                
        
        $this->_load_model();
        
        $this->user->delete($id);
        $this->load_view('after_delete');
    }
    
    public function update(){
        
        $role = $this->input->post('role');        
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $email = $this->input->post('email');
        
        $this->_load_model();
        
        $this->user->update($username,$password,$email);
        
        $this->load_view('after_update');
    }
    
    public function view(){
        
        $this->_load_model();
        
        $users = $this->user_model->getAllUsers($start,$limit);
        
        $this->load_view('user_model',array('user',$users));
        
    }
    
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */