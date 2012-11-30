<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Committee_member_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function get($unionCode) {
        $results = $this->db->get_where(TABLE_COMMITTEE_MEMBER, array('union_code' => $unionCode))->result();
        $userIds = array();
        foreach ($results as $result) {
            $userIds[] = $result->user_id;
        }
        return $userIds;
    }

    function insert($unionCode, $memberId) {
        return $this->db->insert(TABLE_COMMITTEE_MEMBER, array('union_code' => $unionCode, 'user_id' => $memberId));
    }

    function remove($unionCode, $memberId) {
        return $this->db->delete(TABLE_COMMITTEE_MEMBER, array('union_code' => $unionCode, 'user_id' => $memberId));
    }

}

?>
