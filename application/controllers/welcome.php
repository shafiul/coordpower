<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Welcome extends MY_Controller {

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
        
        $randomToken = random_string('alnum', 10);


        $this->load->model('Attendance_model');
        $attendeeIds = $this->Attendance_model->get($meetingId);
        $this->load->model('User_model');
        $attendees = array();
        foreach ($attendeeIds as $attendeeId) {
            $attendees[] = $this->User_model->getUserDetailsByUserId($attendeeId);
        }
        
        
        $this->bootstrap->viewLoader('meeting/print_card', array('attendees' => $attendees, 'meeting' => $meeting, 'token'=>$randomToken));
    }
    
    function report($meetingId = null){
        if($meetingId == null){
            echo 'meeting id is null';
            return;
        }
        
        $this->load->model('Agenda_model');
        $agendas = $this->Agenda_model->get();
        
        $this->load->model('Department_model');
        $departments = $this->Department_model->get();
        
        $this->load->model('Meeting_model');
        $meeting = $this->Meeting_model->getInfo($meetingId);
        
        $this->load->model('Report_model');
        $reports = $this->Report_model->get($meetingId);
        
        $ths->bootstrap->viewLoader('meeting/report', array(
            'meeting'=>$meeting, 
            'reports'=>$reports,
            'agendas'=>$agendas,
            'departments'=>$departments));
    }

}

