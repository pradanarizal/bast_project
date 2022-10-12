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
        $data['user'] = $this->Model_Sadmin->getUser();
        $this->load->view('head', $data);
        $this->load->view('sadmin/sidebar_sadmin');
        $this->load->view('navbar');
        $this->load->view('sadmin/dashboard_sadmin');
        $this->load->view('footer');
    }
    public function backToLogin()
    {
        redirect(base_url());
    }
    public function user()
    {
        $data['user'] = $this->Model_Sadmin->getUser();
        // $data['employee'] = $this->Model_Sadmin->getEmployee();
        $this->load->view('head', $data);
        $this->load->view('sadmin/sidebar_sadmin');
        $this->load->view('navbar');
        $this->load->view('sadmin/user_sadmin');
        $this->load->view('footer');
    }
    public function InsertData()
    {
        $nip = $this->input->post('nip');
        $nama = $this->input->post('nama');
        $role = $this->input->post('role');
        $password = $this->input->post('password');
        $dataInsert = array(
            'nip' => $nip,
            'nama' => $nama,
            'role' => $role,
            'password' => $password,
        );
        $this->Model_Sadmin->InsertData($dataInsert);
        redirect(base_url('sadmin/user'));
    }
    public function changeData()
    {
        $nip = $this->input->post('nip');
        $nama = $this->input->post('nama');
        $role = $this->input->post('role');
        $password = $this->input->post('password');
        $dataUpdate = array(
            'nip' => $nip,
            'nama' => $nama,
            'role' => $role,
            'password' => $password,
        );
        $this->db->where('nip', $nip);
        $this->db->update('user', $dataUpdate);
        redirect(base_url('sadmin/user'));
    }
    public function deleteData($nip)
    {
        $this->Model_Sadmin->deleteData($nip);
        redirect(base_url('sadmin/user'));
    }
    // public function deleteData()
    // {
    //     $nip = $this->input->post('nip');
    //     $nama = $this->input->post('nama');
    //     $role = $this->input->post('role');
    //     $password = $this->input->post('password');
    //     // $dataDelete = array(
    //     //     'nip' => $nip,
    //     //     'nama' => $nama,
    //     //     'role' => $role,
    //     //     'password' => $password,
    //     // );
    //     $this->db->where('nip', $nip);
    //     $this->db->delete('user');
    //     redirect(base_url('sadmin/user'));
    // }
    // public function deleteData($nip)
    // {
    //     $where = array('nip' => $nip);
    //     $this->Model_Sadmin->deleteData($where, 'user');
    //     redirect(base_url('sadmin/user'));
    // }
}
