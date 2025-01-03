<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->check_login();
        $this->load->model('Mood_model');
        $this->load->model('User_model');
        $this->load->library('session');
    }
    public function index()
    {
        $user_id = $this->session->userdata('user_id');
        $data['user'] = $this->User_model->get_users_by_id($user_id);
        $data['psychologists'] = $this->User_model->get_psychologists();
        $this->load->view('user/main', $data);
    }

    public function check_login()
    {
        if (!$this->session->userdata('user_id')) {
            log_message('error', 'User ID not found in session. Redirecting to auth.');
            redirect('auth');
        } else {
            log_message('info', 'User ID in session: ' . $this->session->userdata('user_id'));
        }
    }

    public function get_mood_data()
    {
        $user_id = $this->session->userdata('user_id');
        $barData = $this->Mood_model->getBarChartData($user_id); // Data untuk Bar Chart
        $pieData = $this->Mood_model->getPieChartData($user_id); // Data untuk Pie Chart

        // Return data dalam format JSON
        echo json_encode(['barData' => $barData, 'pieData' => $pieData]);
    }

    public function edit_profile()
    {
        $this->load->view('user/profile');
    }

    public function submit()
    {
        // Ambil data dari request
        $input = json_decode(file_get_contents('php://input'), true);

        $psychologist_id = $input['psychologist_id'];
        $booking_date = $input['booking_date'];
        $booking_time = $input['booking_time'];

        // Simpan ke database
        $data = [
            'user_id' => $this->session->userdata('user_id'), // ID user dari session
            'psychologist_id' => $psychologist_id,
            'booking_date' => $booking_date,
            'booking_time' => $booking_time,
            'status' => 'pending',
        ];

        $this->db->insert('bookings', $data);

        // Kirim respon ke frontend
        echo json_encode(['message' => 'Booking berhasil!']);
    }

    public function checkin_user()
    {
        $json = file_get_contents('php://input');
        $input = json_decode($json, true);

        $mood = $input['mood'];

        $data = [
            'user_id' => $this->session->userdata('user_id'),
            'mood' => $mood,
            'date' => date('Y-m-d'),
        ];

        log_message('debug', 'Prepared Data: ' . print_r($data, true));

        if ($this->Mood_model->mood_checkin($data)) {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(['message' => 'Check-in berhasil']));
        } else {
            $this->output
                ->set_status_header(500)
                ->set_content_type('application/json')
                ->set_output(json_encode(['message' => 'Gagal menyimpan check-in']));
        }
    }
}
