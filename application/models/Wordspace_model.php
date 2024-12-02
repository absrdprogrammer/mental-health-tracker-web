<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Wordspace_model extends CI_Model
{
    public function get_all_messages()
    {
        return $this->db->order_by('created_at', 'DESC')->get('messages')->result_array();
    }

    public function save_message($data)
    {
        $this->db->insert('messages', $data);
    }
}
