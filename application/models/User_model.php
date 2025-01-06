<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function get_all_users()
    {
        $this->db->select('users.*, 
                       COUNT(messages.message_id) AS post_count, 
                       COUNT(journals.journal_id) AS journal_count');
        $this->db->from('users');
        $this->db->join('messages', 'messages.user_id = users.user_id', 'left'); // Join dengan tabel posts
        $this->db->join('journals', 'journals.user_id = users.user_id', 'left'); // Join dengan tabel journals
        $this->db->where('users.role', 'user');
        $this->db->group_by('users.user_id'); // Kelompokkan data berdasarkan user ID
        $query = $this->db->get();
        return $query->result();
    }

    public function get_users_by_id($user_id)
    {
        $this->db->where('user_id', $user_id);
        // Menghitung umur berdasarkan tanggal lahir
        $this->db->select('full_name, email, role, is_active, TIMESTAMPDIFF(YEAR, dob, CURDATE()) AS age');
        $query = $this->db->get('users');
        return $query->row_array();
    }

    public function get_last_5_users()
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('role', 'user');
        $this->db->order_by('created_at', 'DESC');
        $this->db->limit(5);
        $query = $this->db->get();
        return $query->result();
    }
    public function get_all_psychologists()
    {
        $this->db->select('psikolog.*, 
                    COUNT(DISTINCT bookings.user_id) AS patient_count,
                       COUNT(CASE WHEN bookings.status = "pending" THEN 1 END) AS pending_count,
                       COUNT(CASE WHEN bookings.status = "confirmed" THEN 1 END) AS confirmed_count,
                       COUNT(CASE WHEN bookings.status = "canceled" THEN 1 END) AS canceled_count,
                       COUNT(CASE WHEN bookings.status = "finished" THEN 1 END) AS finished_count');
        $this->db->from('psikolog');
        $this->db->join('bookings', 'bookings.psychologist_id = psikolog.id', 'left');
        $this->db->group_by('psikolog.id');

        $query = $this->db->get();
        return $query->result();
    }

    public function get_counts_psychologist($psychologist_id)
    {
        $this->db->select('COUNT(DISTINCT bookings.user_id) AS patient_count,
                       COUNT(CASE WHEN bookings.status = "pending" THEN 1 END) AS pending_count,
                       COUNT(CASE WHEN bookings.status = "confirmed" THEN 1 END) AS confirmed_count,
                       COUNT(CASE WHEN bookings.status = "canceled" THEN 1 END) AS canceled_count,
                       COUNT(CASE WHEN bookings.status = "finished" THEN 1 END) AS finished_count');
        $this->db->from('psikolog');
        $this->db->join('bookings', 'bookings.psychologist_id = psikolog.id', 'left');
        $this->db->where('psikolog.id', $psychologist_id);  // Menambahkan filter berdasarkan ID psikolog
        $this->db->group_by('psikolog.id');

        $query = $this->db->get();
        return $query->row();  // Menggunakan row() karena hanya ada satu psikolog berdasarkan ID
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

    public function get_last_5_psychologists()
    {
        $this->db->select('*');
        $this->db->from('psikolog');
        $this->db->order_by('created_at', 'DESC');
        $this->db->limit(5);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_inactive_psychologists()
    {
        $this->db->where('is_active', 0);
        $query = $this->db->get('psikolog');
        return $query->result();
    }

    public function update_status($psychologist_id, $status)
    {
        $data = [
            'is_active' => $status,
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        $this->db->where('id', $psychologist_id);
        return $this->db->update('psikolog', $data);
    }
}
