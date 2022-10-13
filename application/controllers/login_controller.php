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
				$data['message'] = "<script>alert('Username or Password incorect!');</script>";
				$this->login($data);
			}
		} else {
			echo "<script>alert('No Login!');</script>";
			redirect(base_url('Controller_Login/index'));
		}
	}
	public function auth($data)
	{
		if ($data == "admin") {
			$this->dashboardNOC();
		} elseif ($data == "manager") {
			$this->dashboardUser();
		} elseif ($data == "sadmin") {
			$this->dashboardSadmin();
		}
	}
	public function logout()
	{
		$data['message'] = "<script>alert('You are Logout!');</script>";
		session_destroy();
		$this->login($data);
	}
	public function login($message)
	{
		$this->load->view('login', $message);
	}
	public function dashboardUser()
	{
		redirect(base_url('manager'));
	}
	public function dashboardNOC()
	{
		redirect(base_url('admin'));
	}
	public function dashboardSadmin()
	{
		redirect(base_url('sadmin'));
	}
}
