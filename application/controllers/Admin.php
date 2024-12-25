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
        $data['users'] = $this->Admin_model->get_users();
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
        $data['users'] = $this->Admin_model->get_users();
        $data['userbyid'] = $this->User_model->get_users_by_id($user_id);
        $data['counts'] = $this->Admin_model->get_counts();

        $this->load->view('admin/profile', $data);
    }

    public function editprofile()
    {
        $this->load->view('admin/edit-profile');
    }

    public function save_profile()
    {
        // Ambil user_id dari session
        $user_id = $this->session->userdata('user_id');

        // Ambil data dari form
        $email = $this->input->post('userEmail');
        $name = $this->input->post('userName');

        // Jika ada file gambar diupload
        $config['upload_path'] = './assets/img/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = 2048; // Maksimum 2MB
        $this->load->library('upload', $config);

        $profileImg = null;
        if ($this->upload->do_upload('profileImg')) {
            $uploadData = $this->upload->data();
            $profileImg = $uploadData['file_name'];
        }

        // Update data di database
        $data = [
            'email' => $email,
            'username' => $name,
        ];

        if ($profileImg) {
            $data['profile_image'] = $profileImg; // Tambahkan jika ada gambar baru
        }

        $this->User_model->update_user($user_id, $data);

        // Redirect kembali ke halaman profile
        redirect('admin/profile');
    }
}
