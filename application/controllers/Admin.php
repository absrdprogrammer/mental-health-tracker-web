<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->check_login();
        $this->load->model('Admin_model');
        $this->load->model('User_model');
        $this->load->model('Mood_model');
        $this->load->library('session');
    }

    public function index()
    {
        $user_id = $this->session->userdata('admin_id');
        log_message('info', 'Session user_id set: ' . $this->session->userdata('user_id'));

        // Ambil data dari model
        $data['users'] = $this->User_model->get_last_5_users();
        $data['psychologists'] = $this->User_model->get_last_5_psychologists();
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
        $user_id = $this->session->userdata('admin_id');
        log_message('info', 'Session user_id set: ' . $this->session->userdata('user_id'));

        // Ambil data dari model
        $data['userbyid'] = $this->User_model->get_users_by_id($user_id);
        $data['counts'] = $this->Admin_model->get_counts();

        $this->load->view('admin/profile', $data);
    }

    public function editprofile()
    {
        $this->load->view('admin/edit-profile');
    }

    public function users()
    {
        $data['users'] = $this->User_model->get_all_users();
        $this->load->view('admin/daftar_user', $data);
    }

    public function psychologists()
    {
        $data['psychologists'] = $this->User_model->get_all_psychologists();
        $this->load->view('admin/daftar_psikolog', $data);
    }

    public function review()
    {
        $data['psychologists'] = $this->User_model->get_inactive_psychologists();
        $this->load->view('admin/review', $data);
    }

    public function approve($psychologist_id)
    {
        $psychologist = $this->User_model->get_psychologist_by_id($psychologist_id);

        if ($psychologist && $psychologist->is_active == 0) {
            $this->User_model->update_status($psychologist_id, 1);
            echo json_encode(['status' => 'success', 'message' => 'Psychologist approved successfully.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Psychologist cannot be approved.']);
        }
    }

    public function decline($psychologist_id)
    {
        $psychologist = $this->User_model->get_psychologist_by_id($psychologist_id);

        if ($psychologist && $psychologist->is_active == 0) {
            $this->User_model->update_status($psychologist_id, 2);
            echo json_encode(['status' => 'success', 'message' => 'Psychologist declined successfully.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Psychologist cannot be declined.']);
        }
    }

    public function check_login()
    {
        if (!$this->session->userdata('admin_id')) {
            log_message('error', 'User ID not found in session. Redirecting to auth.');
            redirect('auth_admin');
        } else {
            log_message('info', 'User ID in session: ' . $this->session->userdata('admin_id'));
        }
    }
}
