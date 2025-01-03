<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    // Proses Login
    public function login($data, $psikolog = false)
    {
        // Tentukan tabel yang akan digunakan berdasarkan parameter psikolog
        $table = $psikolog ? 'psikolog' : 'users';
        // Jika psikolog, gunakan email, jika tidak gunakan username
        $field = $psikolog ? 'email' : 'username';

        $this->db->where($field, $data);
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
}
