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
    
    public function view(){
        
        $start = $this->input->get('start');        
        $limit = 10;
        
        $this->_load_model('meeting_model','meeting');
        
        $all_meetings = $this->meeting->getAll($start,$limit);
                
        $this->load->view('show_meetings',array('all_meetings',$all_meetings));
                
    }
    
    public function send_notification(){
        
        
    }
    
    
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */