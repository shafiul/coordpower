<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

            
    public function index()
    {
        $this->bootstrap->viewLoader();
    }
    
    public function create(){
        
        $role = $this->input->get('role');        
        $username = $this->input->get('username');
        $password = $this->input->get('password');
        $email = $this->input->get('email');
        
        $this->load_model('user_model','user');
        
        $this->user->insert_user($username,$password,$email,$role);        
        $this->load_view('user_reg_succes');
    }
    
    public function delete(){
        
    }
    
    public function update(){
        
    }
    
    public function view(){
        
    }
    
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */