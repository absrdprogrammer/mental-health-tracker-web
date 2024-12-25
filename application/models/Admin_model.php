<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function get_counts()
    {
        $query = $this->db->query("
            SELECT 
                (SELECT COUNT(*) FROM journals) AS total_journals,
                (SELECT COUNT(*) FROM users) AS total_users,
                (SELECT COUNT(*) FROM messages) AS total_messages
        ");
        return $query->row_array(); // Mengembalikan hasil sebagai array
    }

    public function get_users()
    {
        $this->db->select('username, email, is_active, role');
        $query = $this->db->get('users');
        return $query->result_array();
    }
}
