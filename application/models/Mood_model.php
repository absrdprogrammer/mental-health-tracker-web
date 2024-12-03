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

    public function getPieChartData($user_id)
    {
        $this->db->select('mood, COUNT(*) as count');
        $this->db->from('mood_checkins');
        $this->db->where('user_id', $user_id);
        $this->db->group_by('mood');
        $query = $this->db->get();
        return $query->result_array();
    }
}
