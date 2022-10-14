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
        $this->load->view('manager/dashboard_manager', $data);
        $this->load->view('footer', $data);
    }
    public function backToLogin()
    {
        redirect(base_url());
    }
    public function liatForm()
    {
        $this->load->view('form/form_permintaan_software');
    }
    public function reviewReq()
    {
        $id = $this->input->get('id');
        $tiket = $this->input->get('tiket');
        $data['requestor'] = $this->Model_Manager->getRequestorById($id);
        $data['software'] = $this->Model_Manager->getSoftwareByTiket($tiket);
        $data['tanggal'] = date("d/m/Y");
        $this->load->view('form/form_permintaan_software', $data);
    }
    public function dashboard()
    {
        redirect(base_url());
    }
    public function approve()
    {
        $id = $this->input->post('id');
        $notes = $this->input->post('notes');
        $tanggal = $this->input->post('tanggal');
        $status = "approved";
        $status = $this->Model_Manager->changeStatus($id, $notes, $status, $tanggal);
        if ($status) {
            echo "<script>alert('Status Changed!')</script>";
        }
        $this->dashboard();
    }
    public function revision()
    {
        $id = $this->input->post('id');
        $notes = $this->input->post('notes');
        $tanggal = $this->input->post('tanggal');
        $status = "revision";
        $status = $this->Model_Manager->changeStatus($id, $notes, $status, $tanggal);
        if ($status) {
            echo "<script>alert('Status Changed!')</script>";
        }
        $this->dashboard();
    }
    public function cancel()
    {
        $id = $this->input->post('id');
        $status = "process";
        $notes = "Cancelled";
        $tanggal = date("Y-m-d");
        $status = $this->Model_Manager->changeStatus($id, $notes, $status, $tanggal);
        if ($status) {
            echo "<script>alert('Status Changed!')</script>";
        }
        $this->dashboard();
    }
    public function reject()
    {
        $id = $this->input->post('id');
        $status = "rejected";
        $notes = "Rejected";
        $tanggal = date("Y-m-d");
        $status = $this->Model_Manager->changeStatus($id, $notes, $status, $tanggal);
        if ($status) {
            echo "<script>alert('Status Changed!')</script>";
        }
        $this->dashboard();
    }
}
