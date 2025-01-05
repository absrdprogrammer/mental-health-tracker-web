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

    // Fungsi untuk mengambil data psikolog berdasarkan ID
    public function get_psychologist_by_id($psychologist_id)
    {
        // Query untuk mengambil data psikolog berdasarkan ID
        $this->db->where('id', $psychologist_id);  // Menambahkan kondisi untuk ID
        $query = $this->db->get('psikolog');  // Query untuk tabel psychologists

        // Memeriksa apakah data ditemukan
        if ($query->num_rows() > 0) {
            return $query->row();  // Mengembalikan satu baris data (psikolog)
        } else {
            return null;  // Jika tidak ada data ditemukan, mengembalikan null
        }
    }
}
