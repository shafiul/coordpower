<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class District_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function get($divisionId) {
        return $this->db->get_where(TABLE_DISTRICT, array('division_id' => $divisionId))->result();
    }

}

?>
