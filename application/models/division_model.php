<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Division_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get(){
        return $this->db->get(TABLE_DIVISION)->result();
    }

}

?>
