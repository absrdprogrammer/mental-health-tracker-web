<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Journal extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->check_login();
        $this->load->model('Journal_model');
        $this->load->library('session');
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

    // Menyimpan jurnal
    public function create()
    {
        $color = $this->input->post('color') ?: '#ffffff'; // Default ke warna putih
        $user_id = $this->session->userdata('user_id');
        $content = $this->input->post('content');

        // Analisis sentimen
        $sentiment = 'Neutral';

        // Data untuk disimpan
        $data = [
            'user_id' => $user_id,
            'content' => $content,
            'color' => $color,
            'sentiment' => $sentiment,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        // Simpan data
        $this->Journal_model->save_journal($data);
        redirect('journal');
    }

    // Menampilkan jurnal pengguna
    public function index()
    {
        $user_id = $this->session->userdata('user_id');
        $data['journals'] = $this->Journal_model->get_journals_by_user($user_id);

        $this->load->view('user/journal', $data);
    }
}
