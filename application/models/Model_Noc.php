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

    // menampilkan data pengajuan hardware
    function getRequestor_hardware()
    {
        $this->db->select('request.*, employee.*');
        $this->db->join('employee', 'request.nik = employee.nik');
        $this->db->from('request');
        $query = $this->db->get();
        return $query->result();
    }

    // menampilkan data pengajuan software
    function getRequestor_software()
    {

        $this->db->select('request.*, employee.*, category.*');
        $this->db->join('employee', 'request.nik = employee.nik');
        $this->db->join('category', 'request.id_category = category.id_category');
        $this->db->from('request');
        $query = $this->db->get();
        return $query->result();
    }

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
        $data = $this->getRequestorById_2($id_request);
        foreach ($data as $d) {
            $this->employee_update($d['nik'], $this->input->post('inputnik'), $id_request);
            $this->request_update($id_request);
        }
    }

    //untuk get pengajuan software
    function getRequestorById($id_request)
    {

        $this->db->select('request.*, employee.*, category.*');
        $this->db->join('employee', 'request.nik = employee.nik');
        $this->db->join('category', 'request.id_category = category.id_category');
        $this->db->from('request');
        $this->db->where('id_request', $id_request);
        $query = $this->db->get();
        return $query->result_array();
    }

    // untuk get pengajuan hardware
    function getRequestorById_2($id_request)
    {
        $this->db->select('request.*, employee.*');
        $this->db->join('employee', 'request.nik = employee.nik');
        $this->db->from('request');
        $this->db->where('id_request', $id_request);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getNocAdminBynik($nik)
    {
        $this->db->select('*');
        $this->db->from('noc_admin');
        $this->db->where('nik_admin', $nik);
        $query = $this->db->get();
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

    public function gethardware_ByNoTiket($no_tiket)
    {
        $this->db->select('*');
        $this->db->from('hardware');
        $this->db->where('no_tiket', $no_tiket);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function deleteRequest($id_request)
    {
        $this->db->query("DELETE FROM `request` WHERE id_request = '$id_request'");
    }

    public function cancel_finished_request($id_request)
    {
        $update = array(
            "status" => "process"
        );
        $this->db->where('id_request', $id_request);
        $this->db->update('request', $update);
    }


    public function insertSoftware($software, $version, $notes, $tiket, $id_request)
    {
        $data = array(
            "no_tiket" => $tiket,
            "nama_software" => $software,
            "version" => $version,
            "notes" => $notes
        );
        $cek = $this->db->query("SELECT * FROM software where no_tiket='" . $tiket . "' AND nama_software='" . $software . "'");
        if ($cek->num_rows() == 0) {
            $this->db->insert('software', $data);
            echo '<script>
            window.location.href="' . base_url("admin/addSoftware?idRequest=$id_request&noTiket=$tiket") . '";
            alert("Input Software Success...!"); 
            </script>';
        } elseif ($cek->num_rows() == 1) {
            echo '<script>
            window.location.href="' . base_url("admin/addSoftware?idRequest=$id_request&noTiket=$tiket") . '";
            alert("Software already Added...!"); 
            </script>';
        } else {
            echo '<script>
            window.location.href="' . base_url("admin/addSoftware?idRequest=$id_request&noTiket=$tiket") . '";
            alert("Input Software Failed...!"); 
            </script>';
        }
    }

    public function insert_component($component, $status_component, $problem, $tiket, $id_request)
    {
        $cek_problem = $problem;

        if ($cek_problem == "") {
            $cek_problem = "-";
        } else {
            $cek_problem = $problem;
        }


        $data = array(
            "no_tiket" => $tiket,
            "komponen" => $component,
            "status_hardware" => $status_component,
            "problem" => $cek_problem
        );

        $cek = $this->db->query("SELECT * FROM hardware where no_tiket='" . $tiket . "' AND komponen='" . $component . "'");
        if ($cek->num_rows() == 0) {
            $this->db->insert('hardware', $data);
            echo '<script>
            window.location.href="' . base_url("admin/hardware_check?idRequest=$id_request&noTiket=$tiket") . '";
            alert("Input Component Success...!"); 
            </script>';
        } elseif ($cek->num_rows() == 1) {
            echo '<script>
            window.location.href="' . base_url("admin/hardware_check?idRequest=$id_request&noTiket=$tiket") . '";
            alert("Component already Checked...!"); 
            </script>';
        } else {
            echo '<script>
            window.location.href="' . base_url("admin/hardware_check?idRequest=$id_request&noTiket=$tiket") . '";
            alert("Input Component Failed...!"); 
            </script>';
        }
    }

    public function deleteHardware($tiket, $hardware)
    {
        $query = $this->db->query("DELETE FROM `hardware` WHERE no_tiket = '$tiket' AND komponen = '$hardware'");
        if ($query) {
            return true;
        } else {
            return false;
        }
    }


    public function deleteSoftware($tiket, $software)
    {
        $query = $this->db->query("DELETE FROM `software` WHERE no_tiket = '$tiket' AND nama_software = '$software'");
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function request_update($id_request)
    {
        $data = array(
            "no_tiket" => $this->input->post('no_tiket'),
            "keluhan" => $this->input->post('description'),
            "no_aset" => $this->input->post('no_asset')
        );
        $this->db->where('id_request', $id_request);
        $this->db->update('request', $data);
    }

    public function employee_update($nik, $newNik, $id_request)
    {
        if ($nik != $newNik) {

            $cek = $this->db->query("SELECT * FROM employee where nik='" . $newNik . "'");
            if ($cek->num_rows() >= 1) {
                $update = array(
                    "nama" => $this->input->post('inputnama'),
                    "bagian" => $this->input->post('position'),
                    "jabatan" => $this->input->post('inputdivisi')
                );
                $this->db->where('nik', $newNik);
                $this->db->update('employee', $update);
            } else {
                $data = array(
                    "nik" => $newNik,
                    "nama" => $this->input->post('inputnama'),
                    "bagian" => $this->input->post('position'),
                    "jabatan" => $this->input->post('inputdivisi')
                );
                $this->db->insert('employee', $data);
            }
            $updateRequest = array(
                "nik" => $newNik
            );
            $this->db->where('id_request', $id_request);
            $this->db->update('request', $updateRequest);
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
            alert("Your submission has been submitted...!"); 
            </script>';
        } else {
            $this->db->insert('employee', $data2);
            echo '<script>
            window.location.href="' . base_url('admin/subsoftware') . '";
            alert("Your submission has been submitted with new employee data...!"); 
            </script>';
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
            "nama" => $this->input->post('inputnama'),
            "bagian" => $this->input->post('position'),
            "jabatan" => $this->input->post('inputdivisi')
        );

        $cek = $this->db->query("SELECT * FROM employee where nik='" . $this->input->post('inputnik') . "'");
        if ($cek->num_rows() >= 1) {
            echo '<script>
            window.location.href="' . base_url('admin/subhardware') . '";
            alert("Your submission has been submitted...!"); 
            </script>';
        } else {
            $this->db->insert('employee', $data2);
            echo '<script>
            window.location.href="' . base_url('admin/subhardware') . '";
            alert("Your submission has been submitted with new employee data...!"); 
            </script>';
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

    function caridata_executor($nikadmin)
    {
        $hsl = $this->db->query("SELECT * FROM noc_admin WHERE nik_admin='$nikadmin'");
        if ($hsl->num_rows() > 0) {
            foreach ($hsl->result() as $data) {
                $hasil = array(
                    'nik' => $data->nik_admin,
                    'name' => $data->nama_admin,
                    'position' => $data->position_admin,
                    'division' => $data->division_admin,
                );
            }
        }
        return $hasil;
    }

    public function changeStatusRequest($id_request, $status)
    {
        $update = array(
            "status" => $status
        );
        $this->db->where('id_request', $id_request);
        $this->db->update('request', $update);
    }

    public function recommendation_request($id_request, $rekomendasi, $noc_nik)
    {
        $update = array(
            "approval_notes" => $rekomendasi,
            "nik_admin" => $noc_nik
        );
        $this->db->where('id_request', $id_request);
        $this->db->update('request', $update);
    }

    public function addOrUpdateNOCAdmin($noc_name, $noc_nik, $noc_position, $noc_division)
    {
        $cek = $this->db->query("SELECT * FROM noc_admin where nik_admin='" . $noc_nik . "'");
        if ($cek->num_rows() >= 1) {
            $insert = array(
                "nama_admin" => $noc_name,
                "position_admin" => $noc_position,
                "division_admin" => $noc_division
            );
            $this->db->where('nik_admin', $noc_nik);
            $this->db->update('noc_admin', $insert);
        } else {
            $insert = array(
                "nik_admin" => $noc_nik,
                "nama_admin" => $noc_name,
                "position_admin" => $noc_position,
                "division_admin" => $noc_division
            );
            $this->db->insert('noc_admin', $insert);
        }
    }

    public function updateNikAdmin($id_request, $nikAdmin)
    {
        $update = array(
            "nik_admin" => $nikAdmin
        );
        $this->db->where('id_request', $id_request);
        $this->db->update('request', $update);
    }

    //receipt function
    public function getReceipt()
    {
        $this->db->select('receipt.*, employee.*');
        $this->db->join('employee', 'receipt.nik = employee.nik');
        //$this->db->join('noc_admin', 'receipt.nik_admin = noc_admin.nik_admin');
        $this->db->from('receipt');
        $query = $this->db->get();
        return $query->result();
    }

    public function getReceiptById($id_receipt)
    {
        $this->db->select('receipt.*, employee.*, noc_admin.*');
        $this->db->join('employee', 'receipt.nik = employee.nik');
        $this->db->join('noc_admin', 'receipt.nik_admin = noc_admin.nik_admin');
        $this->db->from('receipt');
        $this->db->where('id_receipt', $id_receipt);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getNocAdminById($nik_admin)
    {
        $this->db->select('*');
        $this->db->from('noc_admin');
        $this->db->where('nik_admin', $nik_admin);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getReceiptByIdReceiver($id_receipt)
    {
        $this->db->select('*');
        $this->db->from('receipt');
        $this->db->where('id_receipt', $id_receipt);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getReceiptPrint($id)
    {
        $this->db->select('receipt.*, employee.*, noc_admin.*');
        $this->db->join('employee', 'receipt.nik = employee.nik');
        $this->db->join('noc_admin', 'receipt.nik_admin = noc_admin.nik_admin');
        $this->db->from('receipt');
        $this->db->where('id_receipt', $id);
        $query = $this->db->get_where();
        return $query->result();
    }

    public function receipt_save()
    {
        $date_receipt = date("Y-m-d");
        $data = array(
            "no_tiket"      => $this->input->post('no_tiket'),
            "nik"           => $this->input->post('inputNik'),
            //"nik_admin"     => $this->input->post('nik_receiver'),
            "item"          => $this->input->post('itemName'),
            "item_id"       => $this->input->post('itemID'),
            "kategori"      => $this->input->post('kategori'),
            "description"   => $this->input->post('description'),
            "date"          => $date_receipt
        );

        $this->db->insert('receipt', $data);

        $data2 = array(
            "nama"          => $this->input->post('inputNama'),
            "nik"           => $this->input->post('inputNik'),
            "jabatan"       => $this->input->post('position'),
            "bagian"        => $this->input->post('unit_division')
        );

        $cek_employee = $this->db->query("SELECT * FROM employee where nik='" . $this->input->post('inputNik') . "'");
        if ($cek_employee->num_rows() >= 1) {
        } else {
            $this->db->insert('employee', $data2);
        }
    }

    public function save_receipt_receiver($noc_nik, $noc_name, $noc_position, $noc_division)
    {
        $cek = $this->db->query("SELECT * FROM noc_admin where nik_admin='" . $noc_nik . "'");
        if ($cek->num_rows() >= 1) {
            $insert = array(
                "nama_admin" => $noc_name,
                "position_admin" => $noc_position,
                "division_admin" => $noc_division
            );
            $this->db->where('nik_admin', $noc_nik);
            $this->db->update('noc_admin', $insert);
        } else {
            $insert = array(
                "nik_admin" => $noc_nik,
                "nama_admin" => $noc_name,
                "position_admin" => $noc_position,
                "division_admin" => $noc_division
            );
            $this->db->insert('noc_admin', $insert);
        }
    }

    public function edit_nikadmin_receipt($id_receipt, $nik_noc)
    {   
        $updateNik = array(
            'nik_admin' => $nik_noc
        );

        $this->db->update('receipt', $updateNik);
        $this->db->where('id_receipt', $id_receipt);
    }

    public function receipt_update($id_receipt)
    {
        $data = $this->getReceiptById($id_receipt);
        foreach ($data as $d) {
            $this->update_data_employee($d['nik'], $this->input->post('inputNik'), $id_receipt);
            $this->update_data_receipt($id_receipt);
            //$this->update_data_noc($d['nik_admin'], $this->input->post('nik_receiver'), $id_receipt);
        }
    }

    public function update_data_receipt($id_receipt)
    {
        $data = array(
            "no_tiket"    => $this->input->post('no_tiket'),
            "item"        => $this->input->post('itemName'),
            "item_id"     => $this->input->post('itemID'),
            "description" => $this->input->post('description'),
            "kategori"    => $this->input->post('kategori')
        );

        $this->db->where('id_receipt', $id_receipt);
        $this->db->update('receipt', $data);
    }

    public function update_data_employee($nik, $newNik, $id_receipt)
    {
        if ($nik != $newNik) {

            $cek = $this->db->query("SELECT * FROM employee where nik='" . $newNik . "'");
            if ($cek->num_rows() >= 1) {
                $update = array(
                    "nama" => $this->input->post('inputNama'),
                    "bagian" => $this->input->post('unit_division'),
                    "jabatan" => $this->input->post('position')
                );
                $this->db->where('nik', $newNik);
                $this->db->update('employee', $update);
            } else {
                $data = array(
                    "nik" => $newNik,
                    "nama" => $this->input->post('inputNama'),
                    "bagian" => $this->input->post('unit_division'),
                    "jabatan" => $this->input->post('position')
                );
                $this->db->insert('employee', $data);
            }
            $updateReceipt = array(
                "nik" => $newNik
            );
            $this->db->where('id_receipt', $id_receipt);
            $this->db->update('receipt', $updateReceipt);
        } else {
            $data = array(
                "nama" => $this->input->post('inputNama'),
                "bagian" => $this->input->post('unit_division'),
                "jabatan" => $this->input->post('position')
            );
            $this->db->where('nik', $nik);
            $this->db->update('employee', $data);
        }
    }

    public function update_data_noc($nik, $newNik, $id_receipt)
    {
        $data = $this->getReceiptByIdReceiver($id_receipt);
        if ($nik != $newNik) {
            $cek = $this->db->query("SELECT * FROM noc_admin where nik_admin='" . $newNik . "'");
            if ($cek->num_rows() >= 1) {
                $update = array(
                    "nama_admin" => $this->input->post('nama_receiver'),
                    "position_admin" => $this->input->post('position_receiver'),
                    "division_admin" => $this->input->post('division_receiver')
                );
                $this->db->where('nik_admin', $newNik);
                $this->db->update('noc_admin', $update);
            } else {
                $data = array(
                    "nik_admin" => $newNik,
                    "nama_admin" => $this->input->post('nama_receiver'),
                    "position_admin" => $this->input->post('position_receiver'),
                    "division_admin" => $this->input->post('division_receiver')
                );
                $this->db->insert('noc_admin', $data);
            }
            $updateReceipt = array(
                "nik_admin" => $newNik
            );
            $this->db->where('id_receipt', $id_receipt);
            $this->db->update('receipt', $updateReceipt);
        } else {
            $data = array(
                "nama_admin" => $this->input->post('nama_receiver'),
                "position_admin" => $this->input->post('position_receiver'),
                "division_admin" => $this->input->post('division_receiver')
            );
            $this->db->where('nik_admin', $nik);
            $this->db->update('noc_admin', $data);
        }
    }

    public function deleteReceipt($id_receipt)
    {
        $this->db->query("DELETE FROM `receipt` WHERE id_receipt = '$id_receipt' ");
    }
}
