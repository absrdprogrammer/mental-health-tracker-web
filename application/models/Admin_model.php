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

    public function update_user($user_id, $data)
    {
        // Menentukan kondisi untuk update berdasarkan user_id
        $this->db->where('id', $user_id);

        // Menjalankan query update
        return $this->db->update('users', $data); // Ganti 'users' dengan nama tabel Anda jika berbeda
    }
}
