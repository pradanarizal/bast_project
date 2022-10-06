<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sadmin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->database();
        $this->load->model('Model_Sadmin');
    }
    public function index()
    {
        if ($this->session->userdata('status') != "login") {
            $this->backToLogin();
        }
        if ($this->session->userdata('role') != "sadmin") {
            $this->backToLogin();
        }
        $data['requestor'] = $this->Model_Sadmin->getRequestor();
        $this->load->view('head', $data);
        $this->load->view('sadmin/sidebar_sadmin', $data);
        $this->load->view('navbar', $data);
        $this->load->view('sadmin/dashboard_sadmin', $data);
        $this->load->view('footer', $data);
    }
    public function backToLogin()
    {
        redirect(base_url());
    }
}
