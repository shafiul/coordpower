<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class User_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function getAllUsers() {
        return $this->db->get(TABLE_USER)->result();
    }
    
    function userExist($username){
        return count( $this->db->get_where(TABLE_USER, array('user_id'=>$username))->result()) == 1;
    }
    
    function insertUser($userId, $password, $role, $email){
        if($this->userExist($username)) return false;
        
        $this->db->set(array(
            'user_id'=>$userId, 
            'password'=> sha1($password),
            'role'=>$role,
            'email'=>$email));
        return $this->db->insert(TABLE_USER);
    }

}

?>
