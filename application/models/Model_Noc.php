<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_Noc extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getRequest()
    {
        $this->db->select('id_request, tipe_pengajuan, status');
        $this->db->from('request');
        $query = $this->db->get();
        return $query->result_array();
    }

    function getRequestor()
    {

        $this->db->select('request.*, employee.*, category.*');
        $this->db->join('employee', 'request.nik = employee.nik');
        $this->db->join('category', 'request.id_category = category.id_category');
        $this->db->from('request');
        $query = $this->db->get();
        return $query->result();
    }

    function getRequestorById($id_request)
    {

        $this->db->select('request.*, employee.*, category.*');
        $this->db->join('employee', 'request.nik = employee.nik');
        $this->db->join('category', 'request.id_category = category.id_category');
        $this->db->from('request');
        $this->db->where('id_request', $id_request);
        $query = $this->db->get();
        // $query = $this->db->query('SELECT * FROM ((request INNER JOIN employee ON request.nik= employee.nik) INNER JOIN category ON request.id_category = category.id_category) WHERE id_request = ' . $id_request);
        return $query->result_array();
    }

    public function getSoftwareByNoTiket($no_tiket)
    {
        $this->db->select('*');
        $this->db->from('software');
        $this->db->where('no_tiket', $no_tiket);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function deleteRequest($id_request)
    {
        $this->db->query("DELETE FROM `request` WHERE id_request = '$id_request'");
    }

    // public function getAllExecutor()
    // {
    //     $this->db->select('*');
    //     $this->db->from('executor');
    //     $query = $this->db->get();
    //     return $query->result_array();
    // }

    // public function editSoftwareExecutor($id_request, $nip)
    // {
    //     $data = $this->getRequestorById($id_request);
    //     foreach ($data as $d) {
    //         $this->category_update($d['id_category']);
    //     }
    // }


    public function software_request_update($id_request)
    {
        $data = $this->getRequestorById($id_request);
        foreach ($data as $d) {
            $this->category_update($d['id_category']);
            $this->employee_update($d['nik'], $this->input->post('inputnik'), $id_request);
            $this->request_update($id_request);
        }
    }

    public function hardware_request_update($id_request)
    {
        $data = $this->getRequestorById($id_request);
        foreach ($data as $d) {
            // $this->category_update($d['id_category']);
            $this->employee_update($d['nik'], $this->input->post('inputnik'), $id_request);
            $this->request_update($id_request);
        }
    }

    public function request_update($id_request)
    {
        $data = array(
            "keluhan" => $this->input->post('description'),
            "no_aset" => $this->input->post('no_asset')
        );
        $this->db->where('id_request', $id_request);
        $this->db->update('request', $data);
    }

    public function employee_update($nik, $newNik, $id_request)
    {
        if ($nik != $newNik) {
            $data = array(
                "nik" => $newNik,
                "nama" => $this->input->post('inputnama'),
                "bagian" => $this->input->post('position'),
                "jabatan" => $this->input->post('inputdivisi')
            );
            $cek = $this->db->query("SELECT * FROM employee where nik='" . $newNik . "'");
            if ($cek->num_rows() <= 1) {
                $this->db->insert('employee', $data);
                $update = array(
                    "nik" => $newNik
                );
                $this->db->where('id_request', $id_request);
                $this->db->update('request', $update);
            } else {
                $update = array(
                    "nik" => $newNik
                );
                $this->db->where('id_request', $id_request);
                $this->db->update('request', $update);
            }
        } else {
            $data = array(
                "nama" => $this->input->post('inputnama'),
                "bagian" => $this->input->post('position'),
                "jabatan" => $this->input->post('inputdivisi')
            );
            $this->db->where('nik', $nik);
            $this->db->update('employee', $data);
        }
    }

    public function category_update($id_cat)
    {
        $os = 0;
        $mo = 0;
        $sd = 0;
        $sl = 0;
        if ($this->input->post('os') != null) {
            $os++;
        }
        if ($this->input->post('mo') != null) {
            $mo++;
        }
        if ($this->input->post('sd') != null) {
            $sd++;
        }
        if ($this->input->post('sl') != null) {
            $sl++;
        }
        $data3 = array(
            "operating_system" => $os,
            "microsoft_office" => $mo,
            "software_design" => $sd,
            "software_lainnya" => $sl
        );
        $this->db->where('id_category', $id_cat);
        $this->db->update('category', $data3);
    }

    public function software_save()
    {
        $os = 0;
        $mo = 0;
        $sd = 0;
        $sl = 0;
        if ($this->input->post('os') != null) {
            $os++;
        }
        if ($this->input->post('mo') != null) {
            $mo++;
        }
        if ($this->input->post('sd') != null) {
            $sd++;
        }
        if ($this->input->post('sl') != null) {
            $sl++;
        }
        $data3 = array(
            "operating_system" => $os,
            "microsoft_office" => $mo,
            "software_design" => $sd,
            "software_lainnya" => $sl
        );
        $this->db->insert('category', $data3);

        $cekCat = $this->db->query("SELECT id_category FROM category ORDER BY id_category DESC LIMIT 1");
        $getCat = $cekCat->result_array();
        $tanggal = date("Y-m-d");
        foreach ($getCat as $id_cat) {
            $data = array(
                "no_tiket"       => $this->input->post('no_tiket'),
                "no_aset"        => $this->input->post('no_asset'),
                "nik"            => $this->input->post('inputnik'),
                "id_category"    => $id_cat['id_category'],
                "keluhan"        => $this->input->post('description'),
                "tipe_pengajuan" => "software",
                "status"         => "pending",
                "tanggal_request" => $tanggal
            );
        }
        $this->db->insert('request', $data);

        $data2 = array(
            "nik" => $this->input->post('inputnik'),
            "nama" => $this->input->post('inputnama'),
            "bagian" => $this->input->post('position'),
            "jabatan" => $this->input->post('inputdivisi')
        );

        $cek = $this->db->query("SELECT * FROM employee where nik='" . $this->input->post('inputnik') . "'");
        if ($cek->num_rows() >= 1) {
            echo '<script>
            window.location.href="' . base_url('admin/subsoftware') . '";
            alert("Pengajuan Berhasil"); 
            </script>';
        } else {
            $this->db->insert('employee', $data2);
        }
    }


    // Hardware function

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
            "bagian" => $this->input->post('position'),
            "jabatan" => $this->input->post('inputdivisi')
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
                    'inputdivisi' => $data->bagian,
                    'position' => $data->jabatan,
                );
            }
        }
        return $hasil;
    }

    function datapengajuan()
    {
        // return $this->db->get('request')->result();
        $this->db->select('request.*, employee.nik AS nik, employee.nama, employee.jabatan, employee.bagian');
        $this->db->join('employee', 'request.nik = employee.nik');
        $this->db->from('request');
        $query = $this->db->get();
        return $query->result();
    }

    function edit_datahardware($where, $table)
    {
        return $this->db->get_where($table, $where);
    }
}
