<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Psikolog extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->check_login();
        $this->load->library('session');
        $this->load->model('Booking_model');
    }
    public function index()
    {
        $this->load->model('Booking_model'); // Pastikan model Anda sudah dibuat
        $data['bookings'] = $this->Booking_model->get_bookings(); // Ambil data dari model

        $this->load->view('psikolog/psikolog', $data); // Kirim data ke view
    }

    public function booking_list()
    {
        $this->load->model('Booking_model'); // Pastikan model Anda sudah dibuat
        $data['bookings'] = $this->Booking_model->get_bookings(); // Ambil data dari model

        $this->load->view('psikolog/psikolog', $data); // Kirim data ke view
    }

    public function check_login()
    {
        if (!$this->session->userdata('user_id')) {
            log_message('error', 'User ID not found in session. Redirecting to auth.');
            redirect('psikolog');
        } else {
            log_message('info', 'User ID in session: ' . $this->session->userdata('user_id'));
        }
    }
}
