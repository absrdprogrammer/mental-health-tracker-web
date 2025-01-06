<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Auth_model');
        $this->load->library('form_validation');
    }

    // Halaman Login dan Register
    public function index()
    {
        $this->load->view('auth/login_register_admin');
    }

    // Proses Login
    public function login()
    {
        // Validasi input login
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors('<div class="error-message">', '</div>'));
            redirect('auth_admin');
        } else {
            $this->load->library('session');
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $user = $this->Auth_model->login_admin($email);

            if ($user && password_verify($password, $user['password'])) {
                // Set session untuk user
                $this->session->set_userdata('admin_id', $user['user_id']);
                $this->session->set_userdata('admin_email', $user['email']);
                log_message('info', 'Session user_id set: ' . $this->session->userdata('admin_id'));

                redirect('admin'); // Ganti dengan controller dashboard
            } else {
                $this->session->set_flashdata('error', 'Email atau password salah.');
                redirect('auth_admin');
            }
        }
    }

    // Proses Register
    public function register()
    {
        // Validasi form input
        $this->form_validation->set_rules('full_name', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors('<div class="error-message">', '</div>'));
            log_message('info', 'register gagal');
            redirect('auth_admin');
        } else {
            $data = [
                'email' => $this->input->post('email'),
                'full_name' => $this->input->post('full_name'),
                'role' => 'admin',
                'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                'created_at' => date('Y-m-d H:i:s'),

            ];
            print_r($data);

            if ($this->Auth_model->register_admin($data)) {
                $this->session->set_flashdata('success', 'Akun berhasil dibuat! Silakan login.');
                redirect('auth_admin');
            } else {
                $this->session->set_flashdata('error', 'Terjadi kesalahan. Coba lagi.');
                redirect('auth_admin');
            }
        }
    }

    // Logout
    public function logout()
    {
        $this->session->unset_userdata('user_id');
        $this->session->set_flashdata('success', 'Anda telah logout.');
        redirect('auth');
    }
}
