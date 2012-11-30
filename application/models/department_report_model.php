<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Department_report_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }
    
    /**
     *returns array( 'department_id' => [ 'department_id'=> '...' ,  'discussion'=>'....' , 'decision'=>'...' , 'responsiblee'='.....' ] )
     * @param type $meetingId 
     */
    function getDepartmentReports($meetingId){
        
    }
    
    function isReportExist($meetingId, $departmentId){
        
    }
    
    function insertReport($meetingId, $departmentId, $discussion, $decision, $responsiblee){
        
    }

}

?>
