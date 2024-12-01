<?php
defined('BASEPATH') or exit('No direct script access allowed');

class My_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->check_login();
    }

    protected function check_login()
    {
        $this->load->library('session');
        if (!$this->session->userdata('user_id')) {
            redirect('auth');
        }
    }
}
