<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Department_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    /**
     * return array( 'department_id' => department_name)
     */
    function get() {
        $results = $this->db->get(TABLE_DEPARTMENT)->result();
        $names = array();
        foreach ($results as $result) {
            $names[$result->department_id] = $result->name;
        }
        return $names;
    }

    function insert($name) {
        return $this->db->insert(TABLE_DEPARTMENT, array('name' => $name));
    }

}

?>
