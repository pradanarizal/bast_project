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

    function tampilstatus()
    {

        $this->db->select('pengajuan_pengadaan.*, divisi.kode_divisi AS kode_divisi, divisi.nama_divisi, pengadaan.no_sppbj AS no_sppbj, pengadaan.perihal,nilai_sppbj,no_pr,file');
        $this->db->join('divisi', 'pengajuan_pengadaan.kode_divisi = divisi.kode_divisi');
        $this->db->join('pengadaan', 'pengajuan_pengadaan.no_sppbj = pengadaan.no_sppbj');
        $query = $this->db->get('pengajuan_pengadaan');

        return $query->result();
    }

    // public function getRequestor()
    // {
    //     $this->db->select('*');
    //     $this->db->from('request');
    //     $data = $this->db->get();
    //     $row = $data->result_array();
    //     return $row;
    // }

    // public function getEmployee()
    // {
    //     $this->db->select('*');
    //     $this->db->from('employee');
    //     $data = $this->db->get();
    //     $row = $data->result_array();
    //     return $row;
    // }

    public function hardware_save()
    {
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
