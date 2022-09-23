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
	public function loginSubmit()
	{
		if ($this->input->post('login')) {
			$nip = $this->input->post('nip');
			$password = $this->input->post('password');
			if ($this->Model_Login->cekLogin($nip, $password)) {
				$data = $this->Model_Login->getDataforsession($nip, $password);
				$data = array('nip' => $data['nip'], 'nama' => $data['nama'], 'role' => $data['role'], 'status' => 'login');
				$this->session->set_userdata($data);
				$this->dashboard($data['role']);
			} else {
				$data['error'] = "<script>alert('Username atau Password salah!');</script>";
				$this->load->view('login', $data);
			}
		} else {
			echo "<script>alert('No Login!');</script>";
			redirect(base_url('index.php/Controller_Login/'));
		}
	}
	public function logout()
	{
		echo "<script>alert('Anda Sudah Logout!');</script>";
		session_destroy();
		$this->index();
	}
	public function dashboard($role)
	{
		if ($role == "noc") {
			$this->load->view('noc/head');
			$this->load->view('noc/sidebar_noc');
			$this->load->view('noc/navbar_noc');
			$this->load->view('noc/konten');
			$this->load->view('noc/footer');
		} elseif ($role == "user") {
			$this->load->view('user/dashboard_user');
		}
	}
}
