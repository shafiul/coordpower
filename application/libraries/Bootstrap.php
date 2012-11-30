<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Bootstrap {

    private $ci; 


    function __construct() {
        $this->ci = & get_instance();;
    }

    function viewLoader($viewFiles = array()) {
        
        $this->ci->load->view('bootstrap/index');
        
    }

}
