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
        $this->load->view('admin/script/tandatangan');
        $this->load->view('footer', $data);
    }

    public function confirmApprove()
    {
        $data['requestor'] = $this->Model_Manager->getRequestor();
        $data['id'] = $this->input->get('id');
        $data['tiket'] = $this->input->get('tiket');
        $data['requestor'] = $this->input->get('requestor');
        $data['needs'] = $this->input->get('needs');
        $this->load->view('head', $data);
        $this->load->view('manager/sidebar_manager', $data);
        $this->load->view('navbar', $data);
        $this->load->view('manager/approve_manager', $data);
        $this->load->view('admin/script/tandatangan');
        $this->load->view('footer', $data);
    }

    public function backToLogin()
    {
        redirect(base_url());
    }
    public function liatForm()
    {
        $this->load->view('form/form_permintaan_hardware');
    }

    public function reviewReq()
    {
        $data['softwares'] = array(
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
        $id = $this->input->get('id');
        $tiket = $this->input->get('tiket');
        $data['manager_name'] = $this->session->userdata('nama');
        $data['manager_nip'] = $this->session->userdata('nip');
        $data['requestor'] = $this->Model_Manager->getRequestorById($id);
        $data['software'] = $this->Model_Manager->getSoftwareByTiket($tiket);
        $data['tanggal'] = date("d/m/Y");
        $this->load->view('form/form_permintaan_software', $data);
    }
    public function dashboard()
    {
        echo '<script>
            window.location.href="' . base_url("manager") . '";
            </script>';
    }
    public function approve()
    {
        $id = $this->input->post('id');
        $notes = $this->input->post('notes');
        $tanggal = date('Y-m-d');
        $status = "approved";
        $nip = $this->session->userdata('nip');

        $status = $this->Model_Manager->changeStatus($id, $notes, $status, $tanggal, $nip);
        $this->generateSignature($this->session->userdata('nip'), $this->input->post('signature'));
        if ($status) {
            echo "<script>alert('Submission has been Approved!')</script>";
        }
        $this->dashboard();
    }
    public function revision()
    {
        $id = $this->input->post('id');
        $notes = $this->input->post('notes');
        $tanggal = $this->input->post('tanggal');
        $status = "revision";
        $status = $this->Model_Manager->cancelStatus($id, $notes, $status, $tanggal);
        if ($status) {
            echo "<script>alert('Status changed to Need Revision!')</script>";
        }
        $this->dashboard();
    }
    public function cancel()
    {
        $id = $this->input->post('id');
        $status = "process";
        $notes = "Cancelled";
        $tanggal = date("Y-m-d");
        $status = $this->Model_Manager->cancelStatus($id, $notes, $status, $tanggal);
        if ($status) {
            echo "<script>alert('Status changed to cancelled!')</script>";
        }
        $this->dashboard();
    }
    public function reject()
    {
        $id = $this->input->post('id');
        $status = "rejected";
        $notes = "Rejected";
        $tanggal = date("Y-m-d");
        $status = $this->Model_Manager->cancelStatus($id, $notes, $status, $tanggal);
        if ($status) {
            echo "<script>alert('Submission has been Rejected!')</script>";
        }
        $this->dashboard();
    }

    public function generateSignature($nip, $signature)
    {
        $nama_file = "assets/signature/" . $nip . ".png";
        file_put_contents($nama_file, file_get_contents($signature));
    }

    public function hardwareSignature()
    {
        $data['requestor'] = $this->Model_Manager->getHardwareRequest();
        $this->load->view('head', $data);
        $this->load->view('manager/sidebar_manager', $data);
        $this->load->view('navbar', $data);
        $this->load->view('manager/hardware_signature', $data);
        $this->load->view('admin/script/tandatangan');
        $this->load->view('footer', $data);
    }

    public function actionSignature()
    {
        $id = $this->input->get("id");
        $data['requestor'] = $this->Model_Manager->getHardwareRequestById($id);
        $data['id'] = $id;
        $this->load->view('head', $data);
        $this->load->view('manager/sidebar_manager', $data);
        $this->load->view('navbar', $data);
        $this->load->view('manager/signature_action', $data);
        $this->load->view('admin/script/tandatangan');
        $this->load->view('footer', $data);
    }

    public function signRecommendation()
    {
        $id_request = $this->input->post('id');
        $nip = $this->session->userdata('nip');
        $signature = $this->input->post('signature');
        $sign = $this->generateSignature($nip, $signature);
        $this->Model_Manager->updateNipRequest($id_request, $nip);
        if ($sign) {
            echo '<script>
            window.location.href="' . base_url("manager/hardwareSignature") . '";
            alert("Sign Recommendation Success!"); 
            </script>';
        } else {
            echo '<script>
            window.location.href="' . base_url("manager/hardwareSignature") . '";
            alert("Sign Recommendation Failed!"); 
            </script>';
        }
    }
}
