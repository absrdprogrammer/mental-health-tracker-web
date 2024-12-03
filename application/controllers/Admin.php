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
}
