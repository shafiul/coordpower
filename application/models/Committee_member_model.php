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
    
    
    function getAllMemberIds($unionId){
        $member = $this->db->get_where(TABLE_COMMITTEE_MEMBER, array('union_id'=>$unionId))->result();
    }
    
    function updateMember($unionId, $memberId){
        
    }

    

}

?>
