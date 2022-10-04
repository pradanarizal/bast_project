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
        // BELUM FIX
        // $tanggal = date("Y-m-d");
        $data = array(
            "no_tiket" => $this->input->post('noticket'),
            "keluhan" => $this->input->post('keluhan'),
            "no_aset" => $this->input->post('no_asset'),
            "nik" => $this->input->post('inputnik'),
            "tanggal" => $this->input->post('requestdate'),
            "tipe_pengajuan" => "hardware",
            "status" => "pending",
            "id_category" => "5"
        );
        $this->db->insert('request', $data);
    }
}
