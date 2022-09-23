<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_Login extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    function cekLogin($nip, $pass)
    {
        $this->db->select('nip, password');
        $this->db->from('user');
        $this->db->where('nip', $nip, TRUE);
        $this->db->where('password', $pass, FALSE);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return false;
        } else {
            return true;
        }
    }
    function getDataforsession($user, $pass)
    {
        $this->db->select('nip,nama,role');
        $this->db->from('user');
        $this->db->where('nip', $user, TRUE);
        $this->db->where('password', $pass, FALSE);
        $query = $this->db->get();
        $row = $query->result_array();
        return $row[0];
    }
}
