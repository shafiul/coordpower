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

    function get($offset, $limit) {
        return $this->db->get(TABLE_USER)->result();
    }

    function getUserDetailsByMail($email) {
        $result = $this->db->get_where(TABLE_USER, array('email' => $email))->result();
        return $result[0];
    }

    function getUserDetailsByUserId($userId) {
        $array = $this->db->get_where(TABLE_USER, array('user_id' => $userId))->result();
        return $array[0];
    }

    function userExist($userId) {
        return count($this->db->get_where(TABLE_USER, array('user_id' => $userId))->result()) == 1;
    }

    function insert($name, $password, $role, $email, $mobileNumber) {
        if ($this->userExist($userId))
            return false;

        $this->db->set(array(
            'name' => $name,
            'password' => sha1($password),
            'role' => $role,
            'email' => $email,
            'mobile_number' => $mobileNumber));
        return $this->db->insert(TABLE_USER);
    }

    function update($userId, $name, $password, $role, $email, $mobileNumber) {
        
    }

    function remove($userId) {
        
    }

    function makeLogIn($email, $password) {
        if (count($this->db->get_where(TABLE_USER, array('email' => $email, 'password' => sha1($password)))->result()) == 1) {
            $_SESSION['currentUser'] = $this->getUserDetails($email);
        }
    }

}

?>
