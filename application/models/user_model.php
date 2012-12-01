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
        return $this->db->get(TABLE_USER, $offset, $limit)->result();
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

    function insert($name, $password, $role, $designation, $email, $mobileNumber) {
        if ($this->userExist($userId))
            return false;

        return $this->db->insert(TABLE_USER, array(
                    'name' => $name,
                    'password' => sha1($password),
                    'role' => $role,
                    'designation' => $designation,
                    'email' => $email,
                    'mobile_number' => $mobileNumber)
        );
    }

    function update($userId, $name, $password, $role, $designation, $email, $mobileNumber) {
        return $this->db->update(TABLE_USER, array(
                    'name' => $name,
                    'password' => sha1($password),
                    'role' => $role,
                    'designation' => $designation,
                    'email' => $email,
                    'mobile_number' => $mobileNumber), array(
                    'user_id' => $userId)
        );
    }

    function remove($userId) {
        return $this->db->delete(TABLE_USER, array('user_id' => $userId));
    }

    function makeLogIn($email, $password) {
        if (count($this->db->get_where(TABLE_USER, array('email' => $email, 'password' => sha1($password)))->result()) == 1) {
            $_SESSION['currentUser'] = $this->getUserDetails($email);
        }
    }

    function makeLogOut() {
        $_SESSION['currentUser'] == null;
    }

}

?>
