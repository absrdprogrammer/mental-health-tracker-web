<?php
class Journal_model extends CI_Model
{

    // Menyimpan data jurnal
    public function save_journal($data)
    {
        $this->db->insert('journals', $data);
        return $this->db->insert_id(); // Mengembalikan ID jurnal yang baru disimpan
    }

    // Mendapatkan semua jurnal berdasarkan user_id
    public function get_journals_by_user($user_id)
    {
        $this->db->where('user_id', $user_id);
        $this->db->order_by('created_at', 'DESC');
        return $this->db->get('journals')->result_array();
    }

    // Memperbarui jurnal
    public function update_journal($journal_id, $data)
    {
        $this->db->where('journal_id', $journal_id);
        return $this->db->update('journals', $data);
    }

    // Menghapus jurnal
    public function delete_journal($journal_id)
    {
        $this->db->where('journal_id', $journal_id);
        return $this->db->delete('journals');
    }
}
