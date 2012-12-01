<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Welcome extends CI_Controller {

    /**
     * @var Bootstrap
     */
    public $bootstrap;

    public function index() {
        redirect('login');
//            $this->load->model('Agenda_model');
//            var_dump( $this->Agenda_model->get() );
//            $this->load->model('Attendance_model');
//            var_dump( $this->Attendance_model->insert(1,1) );
//            var_dump( $this->Attendance_model->insert(1,2) );
//            var_dump( $this->Attendance_model->insert(2,2) );
//            var_dump( $this->Attendance_model->remove(2,2) );
//            var_dump( $this->Attendance_model->get(1) );
//            $this->load->model('Committee_member_model');
//            var_dump( $this->Committee_member_model->insert(1,1) );
//            var_dump( $this->Committee_member_model->insert(1,2) );
//            var_dump( $this->Committee_member_model->insert(2,2) );
//            var_dump( $this->Committee_member_model->insert(2,3) );
//            var_dump( $this->Committee_member_model->remove(2,2) );
//            var_dump( $this->Committee_member_model->get(1) );


//        $this->load->model('Department_model');
//        var_dump($this->Department_model->insert('asds'));
//        var_dump($this->Department_model->insert('1,2'));
//        var_dump($this->Department_model->insert('asds'));
//        var_dump($this->Department_model->get());
        
        
        $this->load->model('Department_model');
        var_dump($this->Department_model->insert('asds'));
        var_dump($this->Department_model->insert('1,2'));
        var_dump($this->Department_model->insert('asds'));
        var_dump($this->Department_model->get());



//            $this->load->model("User_model");
//            var_dump( $this->User_model->insertUser('1234', 'hell', 'asdaisdas', 'asd@wer.com'));

            
//            $this->load->model('committee_member_model');
//            var_dump($this->committee_member_model->getAllMembers('2447183'));
	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */