<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_User extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function getPengajuan($nip)
    {
        $this->db->select('*');
        $this->db->from('pengajuan');
        $this->db->where('nip', $nip);
        $data = $this->db->get();
        $row = $data->result_array();
        return $row;
    }
}
