<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->database();
        $this->load->model('Model_User');
    }
    public function index()
    {
        if ($this->session->userdata('status') != "login") {
            $this->backToLogin();
        }
        if ($this->session->userdata('role') != "user") {
            $this->backToLogin();
        }
        $data['pengajuan'] = $this->Model_User->getPengajuan($this->session->userdata['nip']);
        $this->load->view('head', $data);
        $this->load->view('sidebar', $data);
        $this->load->view('navbar', $data);
        $this->load->view('manager/konten_manager', $data);
        $this->load->view('footer', $data);
        
    }
    public function backToLogin()
    {
        redirect(base_url());
    }
}
