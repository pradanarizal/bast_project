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

    public function software_save()
    {
        $tanggal = date("Y-m-d");
        $data = array(
            "no_tiket"       => $this->input->post('no_tiket'),
            "no_aset"        => $this->input->post('no_asset'),
            "nik"            => $this->input->post('inputnik'),
            "keluhan"        => $this->input->post('description'),
            "tipe_pengajuan" => "software",
            "status"         => "pending",
            "tanggal_request" => $tanggal
        );

        $this->db->insert('request', $data);

        $data2 = array(
            "nik" => $this->input->post('inputnik'),
            "nama" => $this->input->post('inputnama'),
            "bagian" => $this->input->post('inputdivisi'),
            "jabatan" => $this->input->post('position')
        );

        $cek = $this->db->query("SELECT * FROM employee where nik='" .$this->input->post('inputnik') . "'");
        if($cek->num_rows() >= 1) {
            echo '<script>
            window.location.href="' . base_url('admin/subsoftware') . '";
            alert("Pengajuan Berhasil"); 
            </script>';
        }else{
            $this->db->insert('employee', $data2);
        }
    }

    public function hardware_save()
    {
        $tanggal_request = date("Y-m-d");
        $data = array(
            "keluhan" => $this->input->post('keluhan'),
            "no_tiket" => $this->input->post('noticket'),
            "no_aset" => $this->input->post('no_asset'),
            "tipe_pengajuan" => "hardware",
            "status" => "pending",
            "nik" => $this->input->post('inputnik'),
            "id_category" => "5",
            "tanggal_request" => $tanggal_request
        );
        $this->db->insert('request', $data);

        $data2 = array(
            "nik" => $this->input->post('inputnik'),
            "inputnama" => $this->input->post('inputnama'),
            "bagian" => $this->input->post('inputdivisi'),
            "jabatan" => $this->input->post('position')
        );

        $cek = $this->db->query("SELECT * FROM employee where nik='" . $this->input->post('inputnik') . "'");
        if ($cek->num_rows() >= 1) {
            echo '<script>
            window.location.href="' . base_url('admin/subhardware') . '";
            alert("Pengajuan Berhasil"); 
            </script>';
        } else {
            $this->db->insert('employee', $data2);
        }
    }

    function caridata_employee($inputnik)
    {
        $hsl = $this->db->query("SELECT * FROM employee WHERE nik='$inputnik'");
        if ($hsl->num_rows() > 0) {
            foreach ($hsl->result() as $data) {
                $hasil = array(
                    'inputnik' => $data->nik,
                    'inputnama' => $data->nama,
                    'inputdivisi' =>$data->bagian,
                    'position' =>$data->jabatan,
                );
            }
        }
        return $hasil;
    }
}

