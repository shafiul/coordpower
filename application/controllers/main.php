<?php

class Main extends CI_Controller{
    
    
    function newUser(){
        $this->bootstrap->viewLoader('user/create');
    }
    
    
    function newMeeting(){
        $this->bootstrap->viewLoader('meeting/create');
    }
    
    
    function about(){
        $this->bootstrap->viewLoader('about');
    }
    
    
    function georank(){
        $this->bootstrap->viewLoader('report/georank');
    }
}
