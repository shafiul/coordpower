<?php

class Login extends CI_Controller{
    function index(){
        $this->bootstrap->viewLoader('user/login');
    }
}
