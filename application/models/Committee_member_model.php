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
    
    
    function getAllMembers($unionId){
        $memberRows = $this->db->get_where(TABLE_COMMITTEE_MEMBER, array('union_id'=>$unionId))->result();
        $members = array();
        foreach( $memberRows as $memberRow){
            $array= $this->db->get_where(TABLE_USER, array('user_id'=>$memberRow->user_id))->result();
            $members[] = $array[0];
        }
        return $members;
    }

    

}

?>
