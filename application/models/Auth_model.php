<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    // Proses Login
    public function login($username)
    {
        $this->db->where('username', $username);
        $query = $this->db->get('users');

        if ($query->num_rows() == 1) {
            $result = $query->row_array();
            log_message('debug', 'Login result: ' . print_r($result, true));
            return $result;
        } else {
            log_message('error', 'Login failed: invalid credentials.');
            return false;
        }
    }

    // Proses Register
    public function register($data)
    {
        return $this->db->insert('users', $data);
    }
}
