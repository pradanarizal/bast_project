<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_Sadmin extends CI_Model
{
    public function getUser()
    {
        $this->db->select('*');
        $this->db->from('user');
        $query = $this->db->get();
        return $query->result();
    }
    public function getEmployee()
    {
        $this->db->select('*');
        $this->db->from('employee');
        $query = $this->db->get();
        return $query->result();
    }
    public function InsertData($data)
    {
        $this->db->insert('user', $data);
    }
    public function deleteData($nip)
    {
        $this->db->where('nip', $nip);
        $this->db->delete('user');
    }
    // // Action Edit
    // public function ChangeData($dataUpdate, $nip)
    // {
    //     $this->db->where('nip', $nip);
    //     $this->db->update('user', $dataUpdate);
    // }
    // public function getDataDetail($nip)
    // {
    //     $this->db->where('nip', $nip);
    //     $query = $this->db->get('user');
    //     return $query->row();
    // }
}
