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

    function viewLoader($viewFile='', $data= array(), $headerData = array() ) {
        
        if( empty($viewFile) ){
            $viewFile = 'body' ;
        }
        
        if( empty($headerData) ){
            $headerData = array('title' => 'Coordination Power');
        }
        
        
        $this->ci->load->view('bootstrap/header', $headerData );
        $this->ci->load->view('bootstrap/sidebar');
        
        $this->ci->load->view($viewFile, $data);
        
        $this->ci->load->view('bootstrap/footer');
        
    }

}

