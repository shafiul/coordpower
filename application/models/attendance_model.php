<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Attendance_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function get($meetingId) {
        $results = $this->db->get_where(TABLE_ATTENDANCE, array('meeting_id' => $meetingId))->result();
        $userIds = array();
        foreach ($results as $result) {
            $userIds[] = $result->user_id;
        }
        return $userIds;
    }

    function insert($meetingId, $attendeeId) {
        return $this->db->insert(TABLE_ATTENDANCE, array('meeting_id' => $meetingId, 'user_id' => $attendeeId));
    }

    function remove($meetingId, $attendeeId) {
        return $this->db->delete(TABLE_ATTENDANCE, array('meeting_id' => $meetingId, 'user_id' => $attendeeId));
    }

}

?>
