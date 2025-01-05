<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Psikolog extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        // $this->check_login();
        $this->load->library('session');
        $this->load->model('Booking_model');
        $this->load->model('User_model');
    }
    public function index()
    {
        $psychologist_id = $this->session->userdata('psikolog_id');

        $data['bookings'] = $this->Booking_model->get_bookings($psychologist_id); // Ambil data dari model
        $data['psychologist'] = $this->User_model->get_psychologist_by_id($psychologist_id); // Ambil data dari model
        $this->load->view('psikolog/psikolog', $data); // Kirim data ke view
    }

    // Approve booking
    public function approve($booking_id)
    {
        $booking = $this->Booking_model->get_booking_by_id($booking_id);

        if ($booking && $booking->status === 'pending') {
            $this->Booking_model->update_status($booking_id, 'confirmed');
            echo json_encode(['status' => 'success', 'message' => 'Booking approved successfully.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Booking cannot be approved.']);
        }
    }

    // Decline booking
    public function decline()
    {
        $booking_id = $this->input->post('booking_id');
        $reason = $this->input->post('reason');

        $booking = $this->Booking_model->get_booking_by_id($booking_id);

        if ($booking && $booking->status === 'pending') {
            $this->Booking_model->update_status($booking_id, 'canceled', $reason);
            echo json_encode(['status' => 'success', 'message' => 'Booking declined successfully.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Booking cannot be declined.']);
        }
    }

    public function check_login()
    {
        if (!$this->session->userdata('psikolog_id')) {
            log_message('error', 'User ID not found in session. Redirecting to auth.');
            redirect('auth_psikolog');
        } else {
            log_message('info', 'User ID in session: ' . $this->session->userdata('psikolog_id'));
        }
    }
}
