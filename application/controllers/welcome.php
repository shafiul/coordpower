<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {


        /**
         * @var Bootstrap
         */
        public $bootstrap;
        
        
        
    
	public function index()
	{
//		$this->load->view('welcome_message');
                $this->bootstrap->viewLoader();
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */