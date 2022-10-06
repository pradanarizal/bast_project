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
        $tanggal = date("Y-m-d");
        $data = array(
            "keluhan" => $this->input->post('keluhan'),
            "no_tiket" => $this->input->post('noticket'),
            "no_aset" => $this->input->post('no_asset'),
            "tipe_pengajuan" => "hardware",
            "status" => "pending",
            "nik" => $this->input->post('inputnik'),
            "id_category" => "5",
            "tanggal" => $tanggal
        );
        $this->db->insert('request', $data);

        $data2 = array(
            "nik" => $this->input->post('inputnik'),
            "nama" => $this->input->post('inputnama'),
            "bagian" => $this->input->post('no_asset'),
            "jabatan" => $this->input->post('position')
        );

        $cek = $this->db->query("SELECT * FROM employee where nik='" . $this->input->post('inputnik') . "'");
        if ($cek->num_rows() >= 1) {
           
        } else {
            $this->db->insert('employee', $data2);
        }
    }

    public function simpan()
    {
        $tanggal = date("Y-m-d H:i:s");
        $data = array(
            "no_pengajuan" => $this->input->post('no_pengajuan'),
            "nik" => $this->input->post('nik'),
            "jns_pengajuan" => $this->input->post('jns_pengajuan'),
            "tanggal_pengajuan" => $tanggal,
            "sts_pengajuan" => 1,
            "validasi_rt" => 1,
            "validasi_rw" => 1
        );
        $this->db->insert('pengajuan_surat', $data);
    }
}
