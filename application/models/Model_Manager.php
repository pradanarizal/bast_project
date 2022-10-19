<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_Manager extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function getRequestor()
    {
        $data = $this->db->query("SELECT * FROM request INNER JOIN employee ON request.nik= employee.nik");
        $row = $data->result_array();
        return $row;
    }
    public function getRequestorById($id)
    {
        $data = $this->db->query("SELECT * FROM request JOIN employee ON request.nik= employee.nik JOIN category ON request.id_category= category.id_category JOIN noc_admin ON request.nik_admin = noc_admin.nik_admin WHERE id_request = $id");
        $row = $data->result_array();
        return $row;
    }
    public function getSoftwareByTiket($tiket)
    {
        $data = $this->db->query("SELECT * FROM software WHERE no_tiket = $tiket");
        $row = $data->result_array();
        return $row;
    }
    
    public function changeStatus($id, $notes, $status, $tanggal, $nip)
    {
        $data = $this->db->query("UPDATE `request` SET `tanggal_approval` = '$tanggal', `status` = '$status', `approval_notes` = '$notes', `nip` = '$nip'  WHERE `id_request` = $id;");
        return $data;
    }

    public function cancelStatus($id, $notes, $status, $tanggal)
    {
        $data = $this->db->query("UPDATE `request` SET `tanggal_approval` = '$tanggal', `status` = '$status', `approval_notes` = '$notes'  WHERE `id_request` = $id;");
        return $data;
    }

}
