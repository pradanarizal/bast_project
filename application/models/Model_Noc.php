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
        $this->db->from('request');
        $data = $this->db->get();
        $row = $data->result_array();
        return $row;
    }

    public function getEmployee()
    {
        $this->db->select('*');
        $this->db->from('employee');
        $data = $this->db->get();
        $row = $data->result_array();
        return $row;
    }

}
