<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends CI_Controller {

    private $_name = 'user';
    private $_uName;
    private $_managementPage = 'manageUsers';

    public function __construct() {
	parent::__construct();
	$this->_init();
	// Your own constructor code
    }

    private function _init() {
	$this->_uName = ucfirst($this->_name);
    }

    public function index() {

	//$this->ir_view->load('tos');
    }

    private function _loadModel() {
	$this->load->model($this->_name . '_model', 'content_model');
    }



    public function add() {

	$msg = "";
	$response = new stdClass;
	$response->status = 0;
	$data = array(); 
	
	if ($this->input->post('doAdd') !== false) {
    
	    $this->load->library('form_validation');	    
	    if ($this->form_validation->run('user_register') == FALSE) {
		
		$response->error = validation_errors();				
		$this->session->set_userdata('from_error',validation_errors());
	    } else{
				
		$data['email'] = $this->input->post('email');
		$data['password'] = md5($this->input->post('password'));
		$data['f_name'] = $this->input->post('f_name');
		$data['l_name'] = $this->input->post('l_name');
		$data['phone'] = $this->input->post('phone');
		$data['address'] = $this->input->post('address');

		if ($this->authex->isAdmin()) {
		    $data['status'] = $this->input->post('status');
		    $data['type'] = $this->input->post('type');
		} else {
		    $data['status'] = 'active';
		    $data['type'] = 'member';
		}

		$this->_loadModel();	    

		if ( $this->content_model->hasUser($data['email']) ){
		    $response->error = "Email Address is already associated with another account.";
		    $response->msg = "Email Address is already associated with another account.";
		}else{
		
		    if ($this->content_model->add($data)) {
			$response->status = 1;		
			$success = $this->ir_view->getErrorMsg($this->_uName, 'CONTENT_ADD_SUCCESS');
			$msg  = "success/" . $success;
			$response->msg = $success."Please Login.";
		    }else{	    
			$error = $this->ir_view->getErrorMsg($this->_uName, 'CONTENT_ADD_FAIL');		
			$msg  = "error/" . $error;
			$response->msg = $error;
		    }
		}
	    }
	}	
	
	if( $response->status == 1 &&
		isset($_POST['fastAdd']) && $_POST['fastAdd']){
	    
	    $response->email = $data['email'];
	}
	$this->doAfterOperationalTask($response,$msg);
    }
    
    public function fastAdd(){
		
	$_POST['password'] = $this->config->item('default_user_pass');
		
	if(!isset($_POST['email']) || $_POST['email'] == ''){
	    $_POST['email'] = time()."@anonymus.com";
	    $email  = preg_split("/[@.]/",$_POST['email']);	
	    $_POST['f_name'] = trim($email[1]);
	}else{	
	    $email  = preg_split("/[@.]/",$_POST['email']);	
	    $_POST['f_name'] = trim($email[0]);
	}
	
	$_POST['l_name'] = '';
	$_POST['phone'] = '000000';
	$_POST['address'] = 'default';
	$_POST['status'] = 'active';
	$_POST['type'] = 'member';
	$_POST['doAdd'] = 1;
	$_POST['fastAdd'] = 1;
	
	
	return $this->add();
    }
    

    public function edit() {

	$msg = "";
	$response = new stdClass;
	$response->status = 0;
	
	if ($this->input->post('doEdit') !== false) {
    
	    $this->load->library('form_validation');	    
	    if ($this->form_validation->run('user_edit') == FALSE) {
	
		$response->error = validation_errors();	
		$this->session->set_userdata('from_error',validation_errors());
	    }
	    else{
		$data = array();
		$data['email'] = $this->input->post('email');

		if ($this->input->post('password') != "")
		    $data['password'] = md5($this->input->post('password'));

		$data['f_name'] = $this->input->post('f_name');
		$data['l_name'] = $this->input->post('l_name');
		$data['phone'] = $this->input->post('phone');
		$data['address'] = $this->input->post('address');

		if ($this->authex->isAdmin()) {
		    $data['status'] = $this->input->post('status');
		    $data['type'] = $this->input->post('type');
		} 

		$where = array();
		$where[$this->_name . '_id'] = $this->input->post($this->_name . '_id');

		$this->_loadModel();
		if ($this->content_model->update($data, $where)) {
		    $response->status = 1;
		    $success = $this->ir_view->getErrorMsg($this->_uName, 'CONTENT_UPDATE_SUCCESS');
		    $msg  = "success/" . $success;
		    $response->msg = $success;
		}else{
		    $error = $this->ir_view->getErrorMsg($this->_uName, 'CONTENT_UPDATE_FAIL');
		    $msg  = "error/" . $error;
		    $response->msg = $error;
		}
	    }
	}
	$this->doAfterOperationalTask($response,$msg);
    }

    public function delete() {

	$msg="";
	if ($this->input->post($this->_name . 'Ids')) {

	    $this->load->library('form_validation');	    
	    if ($this->form_validation->run('user_delete') == FALSE) {
	
		$response->error = validation_errors();		
		$this->session->set_userdata('from_error',validation_errors());
		
	    }else{
		
		$this->_loadModel();

		$contentIds = $this->input->post($this->_name . 'Ids');
		if (!is_array($contentIds)) {
		    $contentIds = array($contentIds);
		}
		$success = true;
		foreach ($contentIds as $aContentId) {
		    $success &= $this->content_model->delete(array($this->_name . '_id' => $aContentId));
		}
		if ($success) {
		    $msg = $this->ir_view->getErrorMsg($this->_uName, 'CONTENT_REMOVE_SUCCESS');
		    $msg = "success/$msg";
		} else {
		    $msg = $this->ir_view->getErrorMsg($this->_uName, 'CONTENT_REMOVE_FAIL');
		    $msg = "error/$msg";
		}
		if (!$this->input->is_ajax_request())
		    $this->redirectToManagementPage($msg);
		else {
		    echo $msg;
		    die();
		}
	    }
	}
	if (!$this->input->is_ajax_request())
	    $this->redirectToManagementPage();
	else {
	    echo "error=invalid .$this->_name.";
	    die();
	}
    }

    function getById() {
	$response = new stdClass();
	$response->status = 0;
	$contentId = $this->input->post($this->_name . '_id');
	if (intval($contentId) > 0) {
	    $this->_loadModel();
	    $content = $this->content_model->get(0, 1, array($this->_name . '_id' => $contentId));
	    $response->data = $content->data[0];
	    $response->status = 1;
	} else {
	    $response->error = 'Invalid ' . $this->_name . ".";
	}

	if ($this->input->is_ajax_request()) {
	    echo json_encode($response);
	    die();
	} else {
	    return $response;
	}
    }

    function get() {

	$start = $this->input->post('start') ? $this->input->post($start) : 0;
	$limit = $this->input->post('limit') ? $this->input->post($limit) : $this->config->item('per_page');
	$filters = $this->input->post('filters') ? $this->input->post('filters') : array();
	//nicePrint($filters);

	$this->_loadModel();
	$contents = $this->content_model->get($start, $limit, $filters, array('reg_time' => 'DESC'));

	if ($this->input->is_ajax_request()) {
	    echo json_encode($contents->data);
	    die();
	} else {
	    return $contents->data[0];
	}
    }

   
    
    public function doAfterOperationalTask($response,$msg = ""){
	if ($this->authex->isAdminPage()){	    
	    $this->redirectToManagementPage($msg);
	}else {
	    if ($this->input->is_ajax_request()) {
		echo json_encode($response);
		die();
	    } else {
		return $response;
	    }
	}
    }

    public function redirectToManagementPage($msg = "") {
	if ($msg != "")
	    $msg = "/" . $msg;
	redirect("admin/$this->_managementPage{$msg}");
    }

}

?>
