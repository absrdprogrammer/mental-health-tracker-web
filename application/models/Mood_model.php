<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mood_model extends CI_Model
{

    public function get_user_checkins($user_id)
    {
        $this->db->select('*');
        $this->db->from('mood_checkins');
        $this->db->where('user_id', $user_id);
        $this->db->order_by('created_at', 'ASC');
        return $this->db->get()->result_array();
    }

    public function get_mood_distribution($user_id)
    {
        $this->db->select('mood, COUNT(*) AS mood_count');
        $this->db->from('mood_checkins');
        $this->db->where('user_id', $user_id);
        $this->db->group_by('mood');
        return $this->db->get()->result_array();
    }

    public function get_weekly_checkins($user_id)
    {
        $this->db->select('DATE(created_at) AS checkin_date, mood, COUNT(*) AS mood_count');
        $this->db->from('mood_checkins');
        $this->db->where('user_id', $user_id);
        $this->db->where('created_at >=', date('Y-m-d', strtotime('-7 days')));
        $this->db->group_by(['checkin_date', 'mood']);
        $this->db->order_by('checkin_date', 'ASC');
        return $this->db->get()->result_array();
    }
}
