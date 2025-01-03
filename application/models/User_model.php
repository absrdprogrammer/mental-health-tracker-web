<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function get_users_by_id($user_id)
    {
        $this->db->where('user_id', $user_id);
        // Menghitung umur berdasarkan tanggal lahir
        $this->db->select('full_name, email, role, is_active, TIMESTAMPDIFF(YEAR, dob, CURDATE()) AS age');
        $query = $this->db->get('users');
        return $query->row_array();
    }


    public function get_psychologists()
    {
        return $this->db->get('psikolog')->result();
    }

    // Fungsi untuk mengambil gambar profil psikolog berdasarkan ID
    public function get_image_profile($psikolog_id)
    {
        $this->db->select('photo');
        $this->db->from('psikolog');
        $this->db->where('id', $psikolog_id); // Menyesuaikan dengan primary key atau ID psikolog
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->row()->photo; // Mengembalikan nama file foto
        }

        return null; // Jika tidak ditemukan
    }
}
