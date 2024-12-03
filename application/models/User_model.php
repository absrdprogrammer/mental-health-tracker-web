<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function get_users_by_id($user_id)
    {
        $this->db->where('user_id', $user_id);
        $this->db->select('username, email, role, is_active');
        $query = $this->db->get('users');
        return $query->row_array();
    }
}
