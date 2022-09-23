<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		// $this->load->library('session');
		// $this->load->database();
		// $this->load->model('Model_DataUser');
	}
	public function index()
	{
		$this->load->view('login');
	}

	public function toNocDashboard()
	{
		$this->load->view('dashboard_noc/head');
		$this->load->view('dashboard_noc/sidebar_noc');
		$this->load->view('dashboard_noc/navbar_noc');
		$this->load->view('dashboard_noc/konten');
		$this->load->view('dashboard_noc/footer');
		
	
	
	
	}
	
}
