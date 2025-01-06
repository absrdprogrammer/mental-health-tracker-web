<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Booking_model extends CI_Model
{
    public function get_bookings($psychologist_id)
    {
        $this->db->select('bookings.id as booking_id, bookings.booking_date, bookings.booking_time, bookings.status, 
                       users.full_name as user_name, users.email as user_email,
                       psychologists.full_name as psychologist_name,
                       psychologists.photo as psychologist_photo');
        $this->db->from('bookings');
        $this->db->join('users', 'users.user_id = bookings.user_id', 'left');
        $this->db->join('psikolog as psychologists', 'psychologists.id = bookings.psychologist_id', 'left');
        $this->db->where('bookings.psychologist_id', $psychologist_id);
        return $this->db->get()->result();
    }

    public function get_bookings_by_user($user_id)
    {
        $this->db->select('bookings.id as booking_id, bookings.booking_date, bookings.booking_time, bookings.status, 
                       users.full_name as user_name, users.email as user_email,
                       psychologists.full_name as psychologist_name,
                       psychologists.photo as psychologist_photo');
        $this->db->from('bookings');
        $this->db->join('users', 'users.user_id = bookings.user_id', 'left');
        $this->db->join('psikolog as psychologists', 'psychologists.id = bookings.psychologist_id', 'left');
        $this->db->where('bookings.user_id', $user_id);
        return $this->db->get()->result();
    }


    // Update booking status
    public function update_status($booking_id, $status, $notes = null)
    {
        $data = [
            'status' => $status,
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        if (!empty($notes)) {
            $data['notes'] = $notes;
        }

        $this->db->where('id', $booking_id);
        return $this->db->update('bookings', $data);
    }

    // Get booking details by ID
    public function get_booking_by_id($booking_id)
    {
        $this->db->where('id', $booking_id);
        return $this->db->get('bookings')->row();
    }
}
