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
        $data['requestor'] = $this->Model_Noc->getRequestor_software();
        $data['title'] = 'Software-Submission';
        $this->load->view('head', $data);
        $this->load->view('admin/sidebar_admin', $data);
        $this->load->view('navbar', $data);
        $this->load->view('admin/submission_software', $data);
        $this->load->view('admin/modal_pengajuansoftware', $data);
        $this->load->view('admin/modal_editsoftware', $data);
        $this->load->view('admin/script/hapus_pengajuan', $data);
        $this->load->view('admin/script/caridata_employee', $data);
        $this->load->view('admin/script/tandatangan', $data);
        $this->load->view('footer', $data);
    }

    public function subhardware()
    {
        $data['requestor'] = $this->Model_Noc->getRequestor_hardware();
        $data['title'] = 'Hardware-Submission';
        $this->load->view('head', $data);
        $this->load->view('admin/sidebar_admin', $data);
        $this->load->view('navbar', $data);
        $this->load->view('admin/submission_hardware', $data);
        $this->load->view('admin/modal_pengajuanhardware', $data);
        $this->load->view('admin/modal_edithardware', $data);
        $this->load->view('admin/script/hapus_pengajuan', $data);
        $this->load->view('admin/script/caridata_employee', $data);
        $this->load->view('admin/script/tandatangan', $data);
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
        $data['requestor'] = $this->Model_Noc->getRequestorById($id_request);
        $data['title'] = 'Add Software';
        $data['tiket'] = $no_tiket;
        $data['id_request'] = $id_request;
        $this->load->view('head', $data);
        $this->load->view('admin/sidebar_admin', $data);
        $this->load->view('navbar', $data);
        $this->load->view('admin/script/caridata_executor', $data);
        $this->load->view('admin/list_software', $data);
        $this->load->view('footer', $data);
    }

    public function insertSoftware()
    {
        $software = $this->input->post("software");
        $version = $this->input->post("version");
        $notes = $this->input->post("notes");
        $tiket = $this->input->post("tiket");
        $id_request = $this->input->post("idRequest");
        $this->Model_Noc->insertSoftware($software, $version, $notes, $tiket, $id_request);
    }

    public function deleteSoftware()
    {
        $software = $this->input->get("software");
        $tiket = $this->input->get("noTiket");
        $id_request = $this->input->get("idRequest");
        $delete = $this->Model_Noc->deleteSoftware($tiket, $software);
        if ($delete) {
            echo '<script>
            window.location.href="' . base_url("admin/addSoftware?idRequest=$id_request&noTiket=$tiket") . '";
            alert("Delete Software Success...!"); 
            </script>';
        } else {
            echo '<script>
            window.location.href="' . base_url("admin/addSoftware?idRequest=$id_request&noTiket=$tiket") . '";
            alert("Delete Software Failed...!"); 
            </script>';
        }
    }

    public function forwardToManager()
    {
        $softwareCount = $this->input->post("softwareCount");
        $id_request = $this->input->get("idRequest");
        $tiket = $this->input->get("noTiket");
        $noc_nik = $this->input->post("nik");
        $noc_name = $this->input->post("name");
        $noc_position = $this->input->post("position");
        $noc_division = $this->input->post("division");
        $status = "process";

        if ($softwareCount == 0) {
            echo '<script>
            window.location.href="' . base_url("admin/addSoftware?idRequest=$id_request&noTiket=$tiket") . '";
            alert("At Least Add 1 Software"); 
            </script>';
        } else {
            $this->Model_Noc->changeStatusRequest($id_request, $status);
            $this->Model_Noc->addOrUpdateNOCAdmin($noc_name, $noc_nik, $noc_position, $noc_division);
            echo '<script>
            window.location.href="' . base_url("admin/subsoftware") . '";
            alert("Successfully forwarded to manager!"); 
            </script>';
        }
    }

    public function hardware_check()
    {
        $data['component'] = array(
            "Hardisk",
            "Memory",
            "Monitor",
            "Keyboard",
            "Mouse",
            "Software",
            "Adaptor/Power Supply",
            "Processor",
            "Fan/Heatsink",
            "Lainnya"
        );
        $id_request = $this->input->get('idRequest');
        $no_tiket = $this->input->get('noTiket');
        $data['komponen'] = $this->Model_Noc->gethardware_byNoTiket($no_tiket);
        $data['requestor'] = $this->Model_Noc->getRequestorById_2($id_request);

        $data['title'] = 'Add ';
        $data['tiket'] = $no_tiket;
        $data['id_request'] = $id_request;
        $this->load->view('head', $data);
        $this->load->view('admin/sidebar_admin', $data);
        $this->load->view('navbar', $data);
        $this->load->view('admin/script/caridata_executor', $data);
        $this->load->view('admin/list_component', $data);
        $this->load->view('footer', $data);
    }

    public function component_check()
    {
        $component = $this->input->post("component");
        $status_component = $this->input->post("status_komponen");
        $problem = $this->input->post("problem");
        $tiket = $this->input->post("tiket");
        $id_request = $this->input->post("idRequest");
        $status = "process";
        $this->Model_Noc->insert_component($component, $status_component, $problem, $tiket, $id_request);
        $this->Model_Noc->changeStatusRequest($id_request, $status);
    }

    public function delete_component()
    {
        $hardware = $this->input->get("hardware");
        $tiket = $this->input->get("noTiket");
        $id_request = $this->input->get("idRequest");
        $delete = $this->Model_Noc->deleteHardware($tiket, $hardware);
        if ($delete) {
            echo '<script>
            window.location.href="' . base_url("admin/hardware_check?idRequest=$id_request&noTiket=$tiket") . '";
            alert("Delete Component Success...!"); 
            </script>';
        } else {
            echo '<script>
            window.location.href="' . base_url("admin/hardware_check?idRequest=$id_request&noTiket=$tiket") . '";
            alert("Delete Component Failed...!"); 
            </script>';
        }
    }

    public function add_executor()
    {
        $component_count = $this->input->post("component_count");
        $id_request = $this->input->get("idRequest");
        $tiket = $this->input->get("noTiket");
        $noc_nik = $this->input->post("nik");
        $noc_name = $this->input->post("name");
        $noc_position = $this->input->post("position");
        $noc_division = $this->input->post("division");
        $status = "finish";

        if ($component_count == 0) {
            echo '<script>
            window.location.href="' . base_url("admin/hardware_check?idRequest=$id_request&noTiket=$tiket") . '";
            alert("Please check the hardware components first...!"); 
            </script>';
        } else {
            $this->Model_Noc->changeStatusRequest($id_request, $status);
            $this->Model_Noc->addOrUpdateNOCAdmin($noc_name, $noc_nik, $noc_position, $noc_division);
            echo '<script>
            window.location.href="' . base_url("admin/subhardware") . '";
            alert("The hardware components has been checked and the status is complete...!"); 
            </script>';
        }
    }


    public function deleteRequestSoftware()
    {
        $id_request = $this->input->get('idRequest');
        $this->Model_Noc->deleteRequest($id_request);
        $cek = $this->input->get('tipe_pengajuan');

        if ($cek == "hardware") {
            redirect(base_url('admin/subhardware'));
        } else {
            redirect(base_url('admin/subsoftware'));
        }
    }

    public function SoftwareRequestUpdate()
    {
        $this->Model_Noc->software_request_update($this->input->post('id_request'));
        redirect(base_url('admin/subsoftware'));
    }

    public function hardwareRequestUpdate()
    {
        $this->Model_Noc->hardware_request_update($this->input->post('id_request'));
        redirect(base_url('admin/subhardware'));
    }

    public function simpan_software()
    {
        $this->Model_Noc->software_save();
    }

    public function executor_hardware($id)
    {
        $where = array('id_request' => $id);
        $data['requestor'] = $this->Model_Noc->executor_soft(
            $where,
            'request'
        )->result();
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
        $this->load->view('admin/script/tandatangan', $data);
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
        redirect(base_url('admin/receipt'));
    }

    function get_employee()
    {
        $inputnik = $this->input->post('inputnik');
        $data = $this->Model_Noc->caridata_employee($inputnik);
        echo json_encode($data);
    }

    function get_executor()
    {
        $nikadmin = $this->input->post('nik');
        $data = $this->Model_Noc->caridata_executor($nikadmin);
        echo json_encode($data);
    }

    public function print_receipt()
    {
        $id = $this->input->get('id_receipt');
        $data['title'] = "Data Receipt";
        $data['tanggal'] = date("d/m/Y");
        $data['receipt'] = $this->Model_Noc->getReceiptPrint($id);
        $this->load->view('admin/cetak_tandaterima', $data);
    }
}
