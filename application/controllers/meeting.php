<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Meeting extends MY_Controller {

    private $_model_name = "meeting";
            
    public function index()
    {
        $this->bootstrap->viewLoader();
    }
    
    private function _load_model(){
        $this->load->model($this->_model_name."_model",$this->_model_name);
    }
    
    
    public function create(){
        
        $union_code = $this->input->post('union_code');
        $date = $this->input->post('date');
        $time = $this->input->post('time');
        $president = $this->input->post('president');
        $place = $this->input->post('place');
        
        $this->_load_model();
        
        $this->meeting->insertMeetingInfo($union_code, $date, $time, $president, $place);
        
        $this->load->view('after_create');                
        
    }
    
    public function update(){
        
        $date = $this->input->post('date');
        $time = $this->input->post('time');
        $president = $this->input->post('president');
        $place = $this->input->post('place');
        
        $this->_load_model();
        
        $this->meeting->create($date,$time,$president,$place);
        
        $this->load->view('after_update');                
    }
    
    public function delete(){
        
        $id = $this->input->post('id');        
        
        $this->_load_model();
        
        $this->meeting->delete($id);
        
        $this->load->view('after_delete');                
        
    }
    
    public function attendence(){
        
        $attendence_list = $this->input->post('attendence');
        
        $this->_load_model();
        
        if(is_array($attendence_list)){
            
            foreach($attendence_list as $user_id=>$attendece){
                $this->meeting->give_attendece($user_id,$attendece);
            }
        }
    }
    
    public function view2(){
        
        $start = $this->input->get('start');        
        $limit = 10;
        
        $this->_load_model('meeting_model','meeting');
        
        $all_meetings = $this->meeting->getAll($start,$limit);
                
        $this->load->view('show_meetings',array('all_meetings',$all_meetings));
                
    }
    
    
    function view($meetingId = null) {
        $this->load->model('Meeting_model');

        if (is_numeric($meetingId)) {
            $meeting = $this->Meeting_model->getInfo($meetingId);
            $this->load->model('User_model');
            $president = $this->User_model->getUserDetailsByUserId($meeting->president_id);
            $this->load->model('Report_model');
            $reports = $this->Report_model->get($meetingId);
            $reportsAvailable = true;
            if (empty($reports)) {
                $reportsAvailable = false;
            }
            $this->bootstrap->viewLoader('meeting/details', array('meeting' => $meeting, 'president' => $president, 'reportsAvailable' => $reportsAvailable));
        } else {
            $meetings = $this->Meeting_model->get(0, 100);
            $this->bootstrap->viewLoader(
                    'meeting/view', array('meetings' => $meetings)
            );
        }
    }

    function print_card($meetingId) {

        $this->load->model('Meeting_model');
        $meeting = $this->Meeting_model->getInfo($meetingId);

        $this->load->model('Union_model');
        $union = $this->Union_model->getUnionDetails($meeting->union_code);

        $randomToken = random_string('alnum', 10);

        $this->load->model('Attendance_model');
        $attendeeIds = $this->Attendance_model->get($meetingId);
        $this->load->model('User_model');
        $attendees = array();
        foreach ($attendeeIds as $attendeeId) {
            $attendees[] = $this->User_model->getUserDetailsByUserId($attendeeId);
        }

        $this->bootstrap->viewLoader('meeting/print_card', array('attendees' => $attendees, 'union' => $union, 'meeting' => $meeting, 'token' => $randomToken));
    }

    function report($meetingId = null) {
        if ($meetingId == null) {
            echo 'meeting id is null';
            return;
        }

        $this->load->model('Agenda_model');
        $agendas = $this->Agenda_model->get();

        $this->load->model('Department_model');
        $departments = $this->Department_model->get();

        $this->load->model('Meeting_model');
        $meeting = $this->Meeting_model->getInfo($meetingId);

        $this->load->model('User_model');
        $president = $this->User_model->getUserDetailsByUserId($meeting->president_id);

        $this->load->model('Report_model');
        $reports = $this->Report_model->get($meetingId);

        $data = array(
            'meeting' => $meeting,
            'reports' => $reports,
            'agendas' => $agendas,
            'departments' => $departments,
            'president' => $president);
        $this->bootstrap->viewLoader('meeting/report', $data);
    }
    
    public function send_notification(){
        
        
    }
    
    
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */