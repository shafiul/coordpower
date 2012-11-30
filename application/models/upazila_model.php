<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Upazilla_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function get($districtId) {
        return $this->db->get_where(TABLE_UPAZILA, array('district_id' => $districtId))->result();
    }

}

?>
