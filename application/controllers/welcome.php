<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {


        /**
         * @var Bootstrap
         */
        public $bootstrap;
        
	public function index()
	{
//		$this->load->view('welcome_message');
//            $this->load->model("User_model");
//            var_dump( $this->User_model->insertUser('1234', 'hell', 'asdaisdas', 'asd@wer.com'));
            
            $this->load->model('Committee_member_model');
            var_dump($this->Committee_member_model->getAllMembers('2447183'));
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */