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
        $data['request'] = $this->Model_Noc->getRequest();
        $data['title'] = 'BAST-Dashboard';
        $this->load->view('head', $data);
        $this->load->view('admin/sidebar_admin');
        $this->load->view('navbar');
        $this->load->view('admin/dashboard_admin', $data);
        $this->load->view('footer');
    }

    public function backToLogin()
    {
        redirect(base_url());
    }

    public function subsoftware()
    {
        $data['requestor'] = $this->Model_Noc->getRequestor();
        $data['title'] = 'Software-Submission';
        $this->load->view('head', $data);
        $this->load->view('admin/sidebar_admin', $data);
        $this->load->view('navbar', $data);
        $this->load->view('admin/submission_software', $data);
        $this->load->view('admin/modal_pengajuansoftware', $data);
        $this->load->view('admin/caridata_employee', $data);
        $this->load->view('admin/tandatangan', $data);
        $this->load->view('admin/modal_edit_request', $data);
        $this->load->view('footer', $data);
    }

    public function addSoftware()
    {
        $data['software'] = array(
            "Microsoft Windows",
            "Microsoft Office Standart",
            "Microsoft Visio",
            "Microsoft Project",
            "Autocad",
            "Corel Draw",
            "Adobe Photoshop",
            "Adobe Premiere",
            "Adobe Ilustrator",
            "Adobe After Effect",
            "Antivirus",
            "Sketch Up Pro",
            "Vray Fr Sketchup",
            "Nitro PDF Pro",
            "Linux OS",
            "Open Office",
            "Mac OS",
            "Microsoft Office For Mac",
            "SAP",
            "Software Lainnya"
        );
        $id_request = $this->input->get('idRequest');
        $no_tiket = $this->input->get('noTiket');
        $data['softwares'] = $this->Model_Noc->getSoftwareByNoTiket($no_tiket);
        // $data['executor'] = $this->Model_Noc->getAllExecutor();
        $data['requestor'] = $this->Model_Noc->getRequestorById($id_request);
        $data['title'] = 'Add Software';
        $this->load->view('head', $data);
        $this->load->view('admin/sidebar_admin', $data);
        $this->load->view('navbar', $data);
        $this->load->view('admin/list_software', $data);
        $this->load->view('admin/tandatangan', $data);
        $this->load->view('footer', $data);
    }

    public function insertSoftware()
    {
        $software = $this->input->post("software");
        $version = $this->input->post("version");
        $notes = $this->input->post("notes");
        $tiket = $this->input->post("tiket");
        $this->Model_Noc->insertSoftware($software, $version, $notes, $tiket);
    }

    public function deleteRequestSoftware()
    {
        $id_request = $this->input->get('idRequest');
        $this->Model_Noc->deleteRequest($id_request);
        redirect(base_url('admin/subsoftware'));
    }

    public function SoftwareRequestUpdate()
    {
        $this->Model_Noc->software_request_update($this->input->post('id_request'));
        redirect(base_url('admin/subsoftware'));
    }

    public function hardwareRequestUpdate()
    {
        $this->Model_Noc->hardware_request_update($this->input->post('id_request'));
        redirect(base_url('admin/subsoftware'));
    }

    public function subhardware()
    {
        $data['requestor'] = $this->Model_Noc->getRequestor();
        $data['title'] = 'Hardware-Submission';
        
        $data['detail'] = $this->Model_Noc->datapengajuan();

        $this->load->view('head', $data);
        $this->load->view('admin/sidebar_admin', $data);
        $this->load->view('navbar', $data);
        $this->load->view('admin/submission_hardware', $data);
        $this->load->view('admin/modal_pengajuanhardware', $data);
        $this->load->view('admin/modal_view', $data);
        $this->load->view('admin/modal_edithardware', $data);
        $this->load->view('admin/caridata_employee', $data);
        $this->load->view('admin/tandatangan', $data);
        $this->load->view('footer', $data);
    }

    public function simpan_software()
    {
        $this->Model_Noc->software_save();
        redirect(base_url('admin/subsoftware'));
    }

    public function executor_hardware($id)
    {
        $where = array('id_request' => $id);
        $data ['requestor'] = $this->Model_Noc->executor_soft($where,
        'request')->result();
        $this->load->view('head', $data);
        $this->load->view('admin/sidebar_admin', $data);
        $this->load->view('navbar', $data);
        $this->load->view('admin/edit_software', $data);
        $this->load->view('admin/modal', $data);
        $this->load->view('footer', $data);
    }
    public function simpan_hardware()
    {
        $this->Model_Noc->hardware_save();
        redirect(base_url('admin/subhardware'));
    }

    public function receipt()
    {
        $data['receipt'] = $this->Model_Noc->getReceipt();
        $data['title'] = 'Receipt';
        $this->load->view('head', $data);
        $this->load->view('admin/sidebar_admin', $data);
        $this->load->view('navbar', $data);
        $this->load->view('admin/receipt', $data);
        $this->load->view('admin/modal_receipt', $data);
        $this->load->view('admin/modal_edit_receipt', $data);
        $this->load->view('admin/tandatangan', $data);
        $this->load->view('footer', $data);
    }

    public function simpan_receipt()
    {
        $this->Model_Noc->receipt_save();
        redirect(base_url('admin/receipt'));
    }

    public function edit_receipt()
    {
        $this->Model_Noc->receipt_update($this->input->post('id_receipt'));
        //$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Berhasil diupdate</div>');
        redirect(base_url('admin/receipt'));
    }

    function get_employee()
    {
        $inputnik = $this->input->post('inputnik');
        $data = $this->Model_Noc->caridata_employee($inputnik);
        echo json_encode($data);
    }

    public function print_receipt()
    {   
        $id = $this->input->get('id_receipt');
        $data['title'] = "Data Receipt";
        $data['receipt'] = $this->Model_Noc->getReceipt($id);
        $this->load->view('admin/cetak_tandaterima', $data);
    }
}
