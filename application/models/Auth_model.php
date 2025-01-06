<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    // Proses Login
    public function login($email, $psikolog = false)
    {
        // Tentukan tabel yang akan digunakan berdasarkan parameter psikolog
        $table = $psikolog ? 'psikolog' : 'users';

        $this->db->where('email', $email);
        $query = $this->db->get($table);

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
    public function register($data, $psikolog = false)
    {
        // Tentukan tabel yang akan digunakan berdasarkan parameter psikolog
        $table = $psikolog ? 'psikolog' : 'users';

        // Insert data ke tabel yang sesuai
        return $this->db->insert($table, $data);
    }

    public function login_admin($email)
    {
        $this->db->where('email', $email);
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
    public function register_admin($data)
    {
        // Insert data ke tabel yang sesuai
        return $this->db->insert('users', $data);
    }
}
