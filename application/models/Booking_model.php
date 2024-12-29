<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Booking_model extends CI_Model
{
    public function get_bookings()
    {
        $this->db->select('bookings.id as booking_id, bookings.booking_date, bookings.booking_time, bookings.status, 
                           users.username as user_name, users.email as user_email,
                           psychologists.username as psychologist_name');
        $this->db->from('bookings');
        $this->db->join('users', 'users.user_id = bookings.user_id', 'left');
        $this->db->join('users as psychologists', 'psychologists.user_id = bookings.psychologist_id', 'left');
        return $this->db->get()->result();
    }
}
