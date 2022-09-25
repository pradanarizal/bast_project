<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->database();
		$this->load->model('Model_Login');
	}
	public function index()
	{
		if ($this->session->userdata('status') == "login") {
			$this->auth($this->session->userdata('role'));
		}
		$this->load->view('login');
	}

	public function toNocDashboard()
	{
		$this->load->view('noc/head');
		$this->load->view('noc/sidebar_noc');
		$this->load->view('noc/navbar_noc');
		$this->load->view('noc/konten');
		$this->load->view('noc/footer');
	}
	public function dashboard()
	{
		if ($this->input->post('login')) {
			$nip = $this->input->post('nip');
			$password = $this->input->post('password');
			if ($this->Model_Login->cekLogin($nip, $password)) {
				$data = $this->Model_Login->getDataforsession($nip, $password);
				$data = array('nip' => $data['nip'], 'nama' => $data['nama'], 'role' => $data['role'], 'status' => 'login');
				$this->session->set_userdata($data);
				$this->auth($data['role']);
			} else {
				$data['message'] = "<script>alert('Username atau Password salah!');</script>";
				$this->login($data);
			}
		} else {
			echo "<script>alert('No Login!');</script>";
			redirect(base_url('Controller_Login/index'));
		}
	}
	public function auth($data)
	{
		if ($data == "noc") {
			$this->dashboardNOC();
		} elseif ($data == "user") {
			$this->dashboardUser();
		}
	}
	public function logout()
	{
		$data['message'] = "<script>alert('Anda Sudah Logout!');</script>";
		session_destroy();
		$this->login($data);
	}
	public function login($message)
	{
		$this->load->view('login', $message);
	}
	public function dashboardUser()
	{
		redirect(base_url('user'));
	}
	public function dashboardNOC()
	{
		redirect(base_url('noc'));
	}
}
