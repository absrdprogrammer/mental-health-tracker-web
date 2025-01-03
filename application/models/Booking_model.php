<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Booking_model extends CI_Model
{
    public function get_bookings()
    {
        $this->db->select('bookings.id as booking_id, bookings.booking_date, bookings.booking_time, bookings.status, 
                       users.full_name as user_name, users.email as user_email,
                       psychologists.full_name as psychologist_name'); // Ganti username dengan full_name dari tabel psikolog
        $this->db->from('bookings');
        $this->db->join('users', 'users.user_id = bookings.user_id', 'left');
        $this->db->join('psikolog as psychologists', 'psychologists.id = bookings.psychologist_id', 'left'); // Ganti tabel users dengan psikolog
        return $this->db->get()->result();
    }
}
