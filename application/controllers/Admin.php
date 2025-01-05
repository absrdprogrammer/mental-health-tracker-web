<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Admin_model');
        $this->load->model('User_model');
        $this->load->model('Mood_model');
        $this->load->library('session');
    }

    public function index()
    {
        $user_id = $this->session->userdata('user_id');
        log_message('info', 'Session user_id set: ' . $this->session->userdata('user_id'));

        // Ambil data dari model
        $data['users'] = $this->User_model->get_users();
        $data['userbyid'] = $this->User_model->get_users_by_id($user_id);
        $data['counts'] = $this->Admin_model->get_counts();

        $this->load->view('admin/dashboard.php', $data);
    }

    public function get_mood_all_data()
    {
        $moodBarData = $this->Mood_model->getBarChartAllData(); // Data untuk Bar Chart
        $pieData = $this->Mood_model->getPieChartAllData(); // Data untuk Pie Chart

        // Format data yang akan dikirim ke frontend
        $barData = [];
        foreach ($moodBarData as $data) {
            $barData[] = [
                'date' => $data['date'],
                'sad' => $data['sad_count'],
                'neutral' => $data['neutral_count'],
                'happy' => $data['happy_count']
            ];
        }

        // Return data dalam format JSON
        echo json_encode(['barData' => $barData, 'pieData' => $pieData]);
    }

    public function profile()
    {
        $user_id = $this->session->userdata('user_id');
        log_message('info', 'Session user_id set: ' . $this->session->userdata('user_id'));

        // Ambil data dari model
        $data['users'] = $this->User_model->get_users();
        $data['userbyid'] = $this->User_model->get_users_by_id($user_id);
        $data['counts'] = $this->Admin_model->get_counts();

        $this->load->view('admin/profile', $data);
    }

    public function editprofile()
    {
        $this->load->view('admin/edit-profile');
    }

    public function daftaruser()
    {
        $this->load->view('admin/daftar_user');
    }

    public function daftarpsikolog()
    {
        $this->load->view('admin/daftar_psikolog');
    }

    public function jurnal()
    {
        $this->load->view('admin/jurnal');
    }
    
    public function users()
    {
        $data['users'] = $this->User_model->get_users();
        $this->load->view('admin/daftar_user', $data);
    }

    public function psychologists()
    {
        $data['psychologists'] = $this->User_model->get_psychologists();
        $this->load->view('admin/daftar_psikolog', $data);
    }
}
