<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Union_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function getAllUnions($upazilaId) {
        return $this->db->get_where(TABLE_UNION, array('upazila_id' => $upazilaId))->result();
    }

    function getUnionDetails($unionCode) {
        $results = $this->db->get_where(TABLE_UNION, array('union_code' => $unionCode))->result();
        return $results[0];
    }

    function insert($upazilaId, $unionCode, $name) {
        return $this->db->insert(TABLE_UNION, array('upazila_id' => $upazilaId, 'union_code' => $unionCode, 'name' => $name));
    }

    function remove($unionCode) {
        return $this->db->delete(TABLE_UNION, array('union_code' => $unionCode));
    }

}

?>
