<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan_software extends CI_Controller{
   
    public function index() 
        {
            $data['software'] = $this->model_software->view_data()->result();
            $this->load->view('head');
            $this->load->view('admin/sidebar_admin');
            $this->load->view('navbar');
            $this->load->view('admin/software', $data);
            $this->load->view('footer');
        }
}