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
}
