<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Psikolog extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
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
}
