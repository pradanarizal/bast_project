<?php
$hard = array(
    "count" => 0,
    "problem" => "-",
    "status_hardware" => "-"
);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    .tabel tr td {
        text-align: center;
        font-size: 15px;
    }

    .container {
        border: solid 1px black;
    }

    .ttd {
        border: solid 1px black;
    }

    .header {
        background-color: lightgray;
        font-weight: bold;
        text-align: center;
    }
</style>

<body style="font-size: 12px;">
    <table class="tabel" border="1" width="100%" cellpadding="0" align="center" cellspacing="0">
        <tr>
            <td rowspan="6">
                <img src="<?php echo base_url(); ?>assets/img/logo.png" alt="logo_kci" width="100px" height="auto">
            </td>
            <td rowspan="2">PT. KERETA COMMUTER INDONESIA</td>
            <td>No. Dokumen : FR.KCI.0480</td>
        </tr>
        <tr>
            <td>Tanggal Terbit : 12-Mar-20</td>
        </tr>
        <tr>
            <td rowspan="4">FORMULIR PENGECEKAN PC/LAPTOP</td>
        </tr>
        <tr>
            <td>Revisi : -</td>
        </tr>
        <tr>
            <td>Tanggal Revisi : -</td>
        </tr>
        <tr>
            <td>Halaman : 1 dari 1</td>
        </tr>
    </table>
    <?php
    $nik_admin;
    $nama_admin;
    $recommendation;
    foreach ($requestor as $data) {
        $nik_admin = $data['nik_admin'];
        $recommendation = $data['approval_notes'];
    ?>


        <div style="padding-left: 10px;">Tanggal Request : <?php echo date("d/m/Y",  strtotime($data['tanggal_request'])); ?>(dd/mm/yyyy)</div>
        <div class="container">
            <table border="0" width="100%" cellpadding="0">
                <tr>
                    <td colspan="7" style="font-size: 12px;">HARAP DITULIS DENGAN HURUF CETAK *DIISI SETELAH PENGECEKAN SELESAI DILAKUKAN</td>
                </tr>
                <tr>
                    <td colspan="7" class="header">REQUESTOR</td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td>
                        <?php echo $data['nama']; ?>
                    </td>

                    <td></td>
                    <td align="right">Unit/Bagian</td>
                    <td>:</td>
                    <td>
                        <?php echo $data['bagian']; ?>
                    </td>
                </tr>
                <tr>
                    <td>NIK/NIPP</td>
                    <td>:</td>
                    <td>
                        <?php echo $data['nik']; ?>
                    </td>
                    <td></td>
                    <td align="right">Jabatan</td>
                    <td>:</td>
                    <td>
                        <?php echo $data['jabatan']; ?>
                    </td>
                </tr>

                <tr>
                    <td>Uraian Kebutuhan</td>
                    <td>:</td>
                    <td colspan=" 7">
                        <?php echo $data['keluhan']; ?>
                    </td>
                </tr>
                <tr>
                    <td>No.Tiket</td>
                    <td>:</td>
                    <td colspan="7">
                        <?php echo $data['no_tiket']; ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="7">
                        No. Aset/Inventaris/Serial Number : <?php echo $data['no_aset']; ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="7" align="right" style="margin: 0;">
                        <table border="0" cellspacing="0" style="margin-bottom: 10px;">
                            <?php
                            if (file_exists("assets/signature/" . $data['nik'] . ".png")) {
                            ?>
                                <tr style="position: relative;text-align: center;">
                                    <td>Nama/Tanda Tangan :</td>
                                    <td rowspan="8">
                                        <div class="ttd" style="padding: 0.5rem;">
                                            <img src="<?php echo base_url("assets/signature/" . $data['nik'] . ".png"); ?>" width="145" height="auto">
                                            <div><?php echo $data['nama']; ?></div>
                                        </div>
                                    </td>
                                    <td></td>
                                </tr>
                            <?php } ?>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            <?php } ?>
            <tr>
                <td colspan="7" class="header">EXECUTOR</td>
            </tr>
            <tr>
                <td align="center" colspan="1">Component</td>
                <td colspan="2">Status</td>
                <td colspan="2">Problem</td>
            </tr>
            <!-- software loop -->
            <?php
            foreach ($component as $hardname) {
                foreach ($komponen as $data) {
                    if ($data['komponen'] == $hardname) {
                        $hard['count'] = 1;
                        $hard['problem'] = $data['problem'];
                        $hard['status_hardware'] = $data['status_hardware'];
                    }
                }
                if ($hard['count'] > 0) {

            ?>
                    <tr class="form-software">
                        <!-- nama komponen hardware -->
                        <td colspan="2"><label for="<?php echo $hardname; ?>"><?php echo $hardname; ?></label></td>

                        <?php
                        if ($hard['status_hardware'] == "OK") {
                            echo '<td align="center"><input type="checkbox" name="" id="" value="" checked disabled></td>
                                <td align="center"><input type="checkbox" name="" id="" value="" disabled></td>';
                        } else if ($hard['status_hardware'] == "NOK") {
                            echo '<td align="center"><input type="checkbox" name="" id="" value="" disabled></td>
                                <td align="center"><input type="checkbox" name="" id="" value="" checked disabled></td>';
                        } else {
                            echo '<td align="center"><input type="checkbox" name="" id="" value="" disabled></td>
                                <td align="center"><input type="checkbox" name="" id="" value="" disabled></td>';
                        }
                        ?>
                        <!-- Status komponen NOK -->

                        <!-- Problem -->
                        <td colspan="2">
                            <?php
                            if ($hard['problem'] != "-") {
                                echo $hard['problem'];
                            } else {
                                echo "______________________";
                            }
                            ?>
                        </td>
                    </tr>
                <?php
                    $hard['count'] = 0;
                    $hard['problem'] = "-";
                    $hard['status_hardware'] = "-";
                } else { ?>
                    <tr class="form-software">

                        <!-- Nama komponen -->
                        <td colspan="2"><label for="<?php echo $hardname; ?>"><?php echo $hardname; ?></label></td>

                        <td align="center"><input type="checkbox" name="" id="" value="" disabled></td>
                        <td align="center"><input type="checkbox" name="" id="" value="" disabled></td>

                        <!-- problem -->
                        <td colspan="2">
                            ______________________
                        </td>
                    </tr>
            <?php }
            } ?>


            <tr>
                <td colspan="7" align="right">
                    <table border="0" style="margin-bottom: 10px;">
                        <?php
                        foreach ($nocAdmin as $admin) {
                            if (file_exists("assets/signature/" . $admin['nik_admin'] . ".png")) {
                        ?>
                                <tr style="position: relative;text-align: center;">
                                    <td>Nama/Tanda Tangan :</td>
                                    <td rowspan="8">
                                        <div class="ttd" style="padding: 0.5rem;">
                                            <img src="<?php echo base_url("assets/signature/" . $admin['nik_admin'] . ".png"); ?>" width="145" height="auto">
                                            <div><?php echo $admin['nama_admin']; ?></div>
                                        </div>
                                    </td>
                                    <td></td>
                                </tr>
                        <?php }
                        } ?>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="7" class="header">RECOMMENDATIONS</td>
            </tr>
            <tr>
                <td colspan="7">
                    <div class="ttd" style="padding: 20px 0;">Comment : <?php echo $recommendation; ?></div>
                </td>
            </tr>
            <tr>
                <td colspan="7" align="right">
                    <table border="0" style="margin-bottom: 10px;">
                        <tr>
                            <td>Nama/Tanda Tangan :</td>
                            <td rowspan="7">
                                <div class="ttd" style="padding: 20px 90px 20px 90px;"></div>
                            </td>
                            <td></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="7" class="header">DUAL CONTROL CHECKLIST</td>
            </tr>
            <tr>
                <td width="10px">Status</td>
                <td width="10px" align="center"><input type="checkbox" name="<sds" id="sds" value="dsfd"></td>
                <td width="10px">OK</td>
                <td width="10px" align="center"><input type="checkbox" name="<sds" id="sds" value="dsfd"></td>
                <td width="10px">NOT OK</td>
                <td colspan="2"></td>
            </tr>
            <tr>
                <td colspan="7">
                    <div class="ttd" style="padding: 20px 0;">Comment :</div>
                </td>
            </tr>
            <tr>
                <td>Control Executor</td>
                <td>:</td>
                <td></td>
                <td>Date</td>
                <td>:</td>
                <td colspan="2"></td>
            </tr>
            <tr>
                <td>Signature</td>
                <td></td>
                <td>Name & Employee ID</td>
                <td colspan="4"></td>
            </tr>
            </table>
        </div>
</body>

</html>