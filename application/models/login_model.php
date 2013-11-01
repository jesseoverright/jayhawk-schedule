<?php

class Login_model extends CI_Model {
    function __construct() {
        $this->load->database();
    }

    public function verify_user($username, $password) {
        $query = $this->db->get_where(
            'users',
            array (
                'username' => $username,
                'password' => sha1($password)
                )
            );
            
        if ($query->num_rows() > 0)
            return $query->row();
        else return false;

    }
}