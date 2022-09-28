<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manager extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->database();
        $this->load->model('Model_Manager');
    }
    public function index()
    {
        if ($this->session->userdata('status') != "login") {
            $this->backToLogin();
        }
        if ($this->session->userdata('role') != "manager") {
            $this->backToLogin();
        }
        $data['requestor'] = $this->Model_Manager->getRequestor();
        $this->load->view('head', $data);
        $this->load->view('manager/sidebar_manager', $data);
        $this->load->view('navbar', $data);
        $this->load->view('manager/konten_manager', $data);
        $this->load->view('footer', $data);
    }
    public function backToLogin()
    {
        redirect(base_url());
    }
}
