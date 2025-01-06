<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_psikolog extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Auth_model');
        $this->load->library('form_validation');
        $this->load->library('upload');
    }
    public function index()
    {
        $this->load->view('auth/login_register_psikolog'); // Kirim data ke view
    }

    public function login()
    {
        // Validasi input login
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors('<div class="error-message">', '</div>'));
            redirect('auth_psikolog');
        } else {
            $this->load->library('session');
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $user = $this->Auth_model->login($email, true);

            if ($user && password_verify($password, $user['password'])) {
                // Set session untuk user
                $this->session->set_userdata('psikolog_id', $user['id']);
                $this->session->set_userdata('psikolog_email', $user['email']);
                log_message('info', 'Session psikolog_id set: ' . $this->session->userdata('psikolog_id'));

                redirect('psikolog'); // Ganti dengan controller dashboard
            } else {
                $this->session->set_flashdata('error', 'Username atau password salah.');
                redirect('auth_psikolog');
            }
        }
    }

    public function register()
    {
        // Validasi form input
        $this->form_validation->set_rules('full_name', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('birth_date', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('gender', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('clinic_location', 'Alamat Klinik', 'required|min_length[12]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');

        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('error', validation_errors('<div class="error-message">', '</div>'));
            log_message('info', 'register gagal');
            redirect('auth_psikolog');
        } else {
            log_message('info', 'this line executed');
            // Proses upload foto dan sertifikat profesi
            $config['upload_path'] = './uploads';
            $config['allowed_types'] = 'jpg|jpeg|png|pdf';
            $config['file_name'] = time() . '_' . $_FILES['photo']['name'];

            $this->upload->initialize($config);

            log_message('info', 'Upload path: ' . $config['upload_path']);

            // Upload foto
            if (!$this->upload->do_upload('photo')) {
                $error = $this->upload->display_errors();
                error_log('Upload photo failed: ' . $error); // Log error
                return;
            }
            $photo = $this->upload->data('file_name');

            // Inisialisasi ulang upload untuk sertifikat
            $config['file_name'] = time() . '_' . $_FILES['certificate']['name']; // Ubah nama file untuk sertifikat
            $this->upload->initialize($config); // Re-initialize the upload config

            // Upload sertifikat
            if (!$this->upload->do_upload('certificate')) {
                $error = $this->upload->display_errors();
                error_log('Upload file failed: ' . $error); // Log error
                return;
            }
            $certificate = $this->upload->data('file_name');

            // Menyimpan data psikolog ke database
            $psikolog_data = [
                'email' => $this->input->post('email'),
                'full_name' => $this->input->post('full_name'),
                'dob' => $this->input->post('birth_date'),
                'gender' => $this->input->post('gender'),
                'clinic_location' => $this->input->post('clinic_location'),
                'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                'photo' => $photo,
                'certificate' => $certificate
            ];

            log_message('info', 'Data psikolog: ' . print_r($psikolog_data, true));

            if ($this->Auth_model->register($psikolog_data, true)) {
                $this->session->set_flashdata('success', 'Akun berhasil dibuat! Silakan login.');
                redirect('auth_psikolog');
            } else {
                $this->session->set_flashdata('error', 'Terjadi kesalahan. Coba lagi.');
                redirect('auth_psikolog');
            }
        }
    }

    // Logout
    public function logout()
    {
        $this->session->unset_userdata('psikolog_id');
        $this->session->set_flashdata('success', 'Anda telah logout.');
        redirect('auth_psikolog');
    }
}
