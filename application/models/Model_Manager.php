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
        $data = $this->db->query("SELECT * FROM ((request INNER JOIN employee ON request.nik= employee.nik) INNER JOIN category ON request.id_category = category.id_category)");
        $row = $data->result_array();
        return $row;
    }
    public function getRequestorById($id)
    {
        $data = $this->db->query("SELECT * FROM ((request INNER JOIN employee ON request.nik= employee.nik) INNER JOIN category ON request.id_category = category.id_category) WHERE id_request = $id");
        $row = $data->result_array();
        return $row;
    }
    public function getSoftwareById($id)
    {
        $data = $this->db->query("SELECT * FROM software WHERE id_request = $id");
        $row = $data->result_array();
        return $row;
    }
    public function changeStatus($id, $notes, $status, $tanggal)
    {
        $data = $this->db->query("UPDATE `request` SET `tanggal_approval` = '$tanggal', `status` = '$status', `approval_notes` = '$notes' WHERE `request`.`id_request` = $id;");
        return $data;
    }
}
