<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_Noc extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getRequestor()
    {
        $this->db->select('*');
        $this->db->from('requestor');
        $data = $this->db->get();
        $row = $data->result_array();
        return $row;
    }

    public function hardware_save()
    {
        $tanggal = date("Y-m-d H:i:s");
        $data = array(
            // "requestdate" => $this->input->post('requestdate'),
            "nik" => $this->input->post('inputnik'),
            "nama" => $this->input->post('inputnama'),
            "bagian" => $this->input->post('inputdivisi'),
            "keluhan" => $this->input->post('keluhan'),
            "no_tiket" => $this->input->post('noticket'),
            "no_aset" => $this->input->post('no_asset'),
            "jabatan" => $this->input->post('position'),
            // "ttd" => $this->input->post('ttd'),
            "tipe_pengajuan" => "hardware"

        );
        $this->db->insert('requestor', $data);
    }
}
