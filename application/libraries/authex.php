<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Authex {

    private $_CI;
    function __construct() {
	$this->_CI = & get_instance();
    }
    function authentication() {
	
	//load libraries
	
	
    }

    function getUserId(){
	$userInfo = $this->getUserData();
	if($userInfo !== false && isset($userInfo->user_id))
	    return $userInfo->user_id;
	return false;
    }
    function getUserData() {	

	if (!$this->loggedIn()) {
	    return false;
	} else {
	    $this->_CI->load->model('user_model');	    
            $user = $this->_CI->user_model->getUserDetailsByMail($this->_CI->session->userdata("email"));
	    if(count($user) == 1)
		return $user;
	    return false;
	}
    }

    function loggedIn() {	
	return ($this->_CI->session->userdata("email")) ? true : false;
    }
    
    function isAdmin(){
	if($this->loggedIn()){
	    $user = $this->getUserData();
	    return ( $user !== false && $user->type == 'admin' ) ? true :false;
	}
	return false;
    }
    
    public function isAdminPage() {
	if ($this->getUserData() && $this->getUserData()->type == 'admin'
		&& $this->_CI->session->userdata('page')=='admin')
	    return true;
	return false;
    }

    function login($email, $password,$type = "member") {
		
	$this->_CI->load->model('user_model');
	$user = $this->_CI->user_model->get(0,1,array('email'=>$email,'password'=>  sha1($password),
					    "type"=>$type,"status"=>'active')
				    );  	
	if($user->count == 0 ) {	    
	    return false;
	} else {
	    
	    $this->_CI->session->set_userdata("email", $user->data[0]->email);
	    return true;
	}
    }

    function logout() {	
	$this->_CI->session->unset_userdata("email");
    }

    function register() {	
		
	$data = array();	    	    
	$data['email'] = $this->input->post('email');
	$data['password'] = md5( $this->input->post('password') );
	$data['f_name'] = $this->input->post('f_name');
	$data['l_name'] = $this->input->post('l_name');
	$data['phone'] = $this->input->post('phone');
	$data['address'] = $this->input->post('address');	
	
	if ($this->can_register($data['email'])) {
	    	    
	    $this->load->model('user_model');
	    $this->user_model->add($data);

	    return true;
	}

	return false;
    }

    function canRegister($email) {
	
	$this->load->model('user_model');
	$user = $this->user_model->get(0,1,array('email'=>$email));
	return ($user->count < 1) ? true : false;

    }

}