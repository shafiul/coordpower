<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Report_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function get($meetingId, $type) {
        $result = $this->db->get_where(TABLE_REPORT, array('meeting_id' => $meetingId, 'type' => $type));
        return $result[0];
    }

    function isReportExist($meetingId, $type, $typeId) {
        return count($this->db->get_where(TABLE_REPORT, array(
                            'meeting_id' => $meetingId,
                            'type' => $type,
                            'type_id' => $typeId))) == 1;
    }

    function insert($meetingId, $type, $typeId, $discussion, $decision, $responsiblee) {
        return $this->db->insert(TABLE_REPORT, array(
                    'meeting_id' => $meetingId,
                    'type' => $type,
                    'type_id' => $typeId,
                    'discussion' => $discussion,
                    'decision' => $decision,
                    'responsiblee' => $responsiblee));
    }

    function update($meetingId, $type, $typeId, $discussion, $decision, $responsiblee) {
        return $this->db->update(TABLE_REPORT, array(
                    'type' => $type,
                    'type_id' => $typeId,
                    'discussion' => $discussion,
                    'decision' => $decision,
                    'responsiblee' => $responsiblee), array(
                    'meeting_id' => $meetingId));
    }

    function remove($meetingId, $type, $typeId) {
        return $this->db->delete(TABLE_MEETING, array(
                    'meeting_id' => $meetingId,
                    'type' => $type,
                    'type_id' => $typeId));
    }

}

?>
