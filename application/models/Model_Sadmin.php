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

    public function input_data_user()
    {
        $data = array(
            'nip' => $this->input->post('nip'),
            'nama' => $this->input->post('nama'),
            'role' => $this->input->post('role'),
            'password' => $this->input->post('password')
        );

        $cek = $this->db->query("SELECT * FROM user where nip='" . $this->input->post('nip') . "'");
        if ($cek->num_rows() >= 1) {
            echo '<script>
            window.location.href="' . base_url('sadmin/user') . '";
            alert("NIP already used...!"); 
            </script>';
        } else {
            $this->db->insert('user', $data);
            echo '<script>
            window.location.href="' . base_url('sadmin/user') . '";
            alert("New user has been submitted...!"); 
            </script>';
        }
    }

    public function deleteData($nip)
    {
        $this->db->where('nip', $nip);
        $this->db->delete('user');
    }
}
