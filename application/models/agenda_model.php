<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Agenda_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function get() {
        $results = $this->db->get(TABLE_AGENDA)->result();
        $agendas = array();
        foreach ($results as $agenda) {
            $agendas[$agenda->agenda_id] = $agenda->name;
        }
        return $agendas;
    }
    
    function insert($name){
        return $this->db->insert(TABLE_AGENDA, array('name'=>$name));
    }

}

?>
