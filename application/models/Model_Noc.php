<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_Noc extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    function getRequestor()
    {

        $this->db->select('request.*, employee.nik AS nik, employee.nama, employee.jabatan');
        $this->db->join('employee', 'request.nik = employee.nik');
        $this->db->from('request');
        $query = $this->db->get();
        return $query->result();
    }

    public function hardware_save()
    {
        $tanggal_request = date("Y-m-d");
        $data = array(
            "keluhan" => $this->input->post('keluhan'),
            "no_tiket" => $this->input->post('noticket'),
            "no_aset" => $this->input->post('no_asset'),
            "tipe_pengajuan" => "hardware",
            "status" => "pending",
            "nik" => $this->input->post('inputnik'),
            "id_category" => "5",
            "tanggal_request" => $tanggal_request
        );
        $this->db->insert('request', $data);

        $data2 = array(
            "nik" => $this->input->post('inputnik'),
            "nama" => $this->input->post('inputnama'),
            "bagian" => $this->input->post('inputdivisi'),
            "jabatan" => $this->input->post('position')
        );

        $cek = $this->db->query("SELECT * FROM employee where nik='" . $this->input->post('inputnik') . "'");
        if ($cek->num_rows() >= 1) {
            echo '<script>
            window.location.href="' . base_url('admin/subhardware') . '";
            alert("Pengajuan Berhasil"); 
            </script>';
        } else {
            $this->db->insert('employee', $data2);
        }
    }
}
