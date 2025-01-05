<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mood_model extends CI_Model
{
    public function getBarChartData($user_id)
    {
        $this->db->select('date, mood, COUNT(*) as count');
        $this->db->from('mood_checkins');
        $this->db->where('user_id', $user_id);
        $this->db->group_by(['date', 'mood']);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getBarChartAllData()
    {
        // Query untuk mendapatkan jumlah mood per tanggal
        $this->db->select('date, 
                           SUM(CASE WHEN mood = "sad" THEN 1 ELSE 0 END) as sad_count,
                           SUM(CASE WHEN mood = "neutral" THEN 1 ELSE 0 END) as neutral_count,
                           SUM(CASE WHEN mood = "happy" THEN 1 ELSE 0 END) as happy_count');
        $this->db->group_by('date');
        $query = $this->db->get('mood_checkins'); // Gantilah dengan tabel mood yang sesuai

        return $query->result_array();
    }

    public function getPieChartData($user_id)
    {
        $this->db->select('mood, COUNT(*) as count');
        $this->db->from('mood_checkins');
        $this->db->where('user_id', $user_id);
        $this->db->group_by('mood');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getPieChartAllData()
    {
        $this->db->select('mood, COUNT(*) as count');
        $this->db->from('mood_checkins');
        $this->db->group_by('mood');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function mood_checkin($data)
    {
        return $this->db->insert('mood_checkins', $data);
    }
}
