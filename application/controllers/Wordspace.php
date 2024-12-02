<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Wordspace extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Wordspace_model');
    }

    public function index()
    {
        $data['messages'] = $this->Wordspace_model->get_all_messages();
        $this->load->view('user/wordspace', $data);
    }

    public function create()
    {
        $color = $this->input->post('color') ?: '#ffffff'; // Default ke warna putih
        $user_id = $this->session->userdata('user_id');
        $content = $this->input->post('content');

        $data = [
            'user_id' => $user_id, // Replace with the logged-in user ID
            'content' => $content,
            'color'   => $color,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $this->Wordspace_model->save_message($data);
        redirect('wordspace');
    }
}
