<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Meeting_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get( $offset, $limit){
        return $this->db->get(TABLE_MEETING,   $limit, $offset)->result();
    }

    function getInfo($meetingId) {
        $results = $this->db->get_where(TABLE_MEETING, array('meeting_id' => $meetingId))->result();
        return $results[0];
    }

    function insert($unionCode, $date, $time, $presidentId, $place) {
        return $this->db->insert(TABLE_MEETING, array(
                    'union_code' => $unionCode,
                    'date' => $date,
                    'time' => $time,
                    'president_id' => $presidentId,
                    'place' => $place
                ));
    }

    function update($meetingId, $unionCode, $date, $time, $president, $place) {
        return $this->db->update(TABLE_MEETING, array('union_code' => $unionCode,
                    'date' => $date,
                    'time' => $time,
                    'president_id' => $presidentId,
                    'place' => $place), array('meeting_id' => $meetingId));
    }

    function remove($meetingId) {
        return $this->db->delete(TABLE_AGENDA, array('meeting_id'=>$meetingId));
    }

}

?>
