<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
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
        if ($this->session->userdata('role') != "admin") {
            $this->backToLogin();
        }
        $this->load->view('head');
        $this->load->view('admin/sidebar_admin');
        $this->load->view('navbar');
        $this->load->view('admin/dashboard_admin');
        $this->load->view('footer');
    }
    public function backToLogin()
    {
        redirect(base_url());
    }
    public function submission()
    {
        $data['requestor'] = $this->Model_Noc->getRequestor();
        $this->load->view('head', $data);
        $this->load->view('admin/sidebar_admin', $data);
        $this->load->view('navbar', $data);
        $this->load->view('admin/submission_admin', $data);
        $this->load->view('footer', $data);
    }
}
