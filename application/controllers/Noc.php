<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Noc extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->database();
        $this->load->model('Model_Noc');
    }
    public function index()
    {
        if ($this->session->userdata('status') != "login") {
            $this->backToLogin();
        }
        if ($this->session->userdata('role') != "noc") {
            $this->backToLogin();
        }
        $this->load->view('noc/head');
        $this->load->view('noc/sidebar_noc');
        $this->load->view('noc/navbar_noc');
        $this->load->view('noc/konten');
        $this->load->view('noc/footer');
    }
    public function backToLogin()
    {
        redirect(base_url());
    }
}
