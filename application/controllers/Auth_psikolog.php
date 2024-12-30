<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_psikolog extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }
    public function index()
    {
        $this->load->view('auth/login_register_psikolog'); // Kirim data ke view
    }
}
