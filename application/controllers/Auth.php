<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('auth_model');
        $this->load->library('form_validation');
    }

    // Halaman Login dan Register
    public function index()
    {
        $this->load->view('auth/login_register');
    }

    // Proses Login
    public function login()
    {
        // Validasi input login
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors('<div class="error-message">', '</div>'));
            redirect('auth');
        } else {
            $this->load->library('session');
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $user = $this->auth_model->login($username);

            if ($user && password_verify($password, $user['password'])) {
                // Set session untuk user
                $this->session->set_userdata('user_id', $user['user_id']);
                $this->session->set_userdata('username', $user['username']);
                log_message('info', 'Session user_id set: ' . $this->session->userdata('user_id'));

                redirect('journal'); // Ganti dengan controller dashboard
            } else {
                $this->session->set_flashdata('error', 'Username atau password salah.');
                redirect('auth');
            }
        }
    }

    // Proses Register
    public function register()
    {
        // Validasi input register
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|is_unique[users.username]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
        $this->form_validation->set_rules('password_confirm', 'Password Confirmation', 'required|matches[password]');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors('<div class="error-message">', '</div>'));
            redirect('auth');
        } else {
            $data = [
                'email' => $this->input->post('email'),
                'username' => $this->input->post('username'),
                'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
            ];
            print_r($data);

            if ($this->auth_model->register($data)) {
                $this->session->set_flashdata('success', 'Akun berhasil dibuat! Silakan login.');
                redirect('auth');
            } else {
                $this->session->set_flashdata('error', 'Terjadi kesalahan. Coba lagi.');
                redirect('auth');
            }
        }
    }

    // Logout
    // public function logout()
    // {
    //     $this->session->unset_userdata('user_id');
    //     $this->session->unset_userdata('username');
    //     $this->session->set_flashdata('success', 'Anda telah logout.');
    //     redirect('auth');
    // }
}
