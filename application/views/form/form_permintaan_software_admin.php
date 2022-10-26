<?php
$soft = array(
    "count" => 0,
    "notes" => "-",
    "version" => "-"
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
        font-size: 13px;
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
            <td rowspan="5">
                <img src="<?php echo base_url(); ?>assets/img/logo.png" alt="logo_kci" width="100px" height="auto">
            </td>
            <td rowspan="2">PT. KERETA COMMUTER INDONESIA</td>
            <td>No. Dokumen : FR.KCI.0480</td>
        </tr>
        <tr>
            <td>Tanggal Terbit : 12-Mar-20</td>
        </tr>
        <tr>
            <td rowspan="3">FORMULIR PERMINTAAN INSTALASI SOFTWARE</td>
        </tr>
        <tr>
            <td>Status Revisi : -</td>
        </tr>
        <tr>
            <td>Halaman : 1 dari 1</td>
        </tr>
    </table>
    <?php
    $nik;
    $nama;
    $nik_admin;
    $nama_admin;
    foreach ($requestor as $data) {
        $nik = $data['nik'];
        $nama = $data['nama'];
        $nik_admin = $data['nik_admin'];
        $nama_admin = $data['nama_admin'];
    ?>
        <div style="padding-left: 10px;">Nomor Request : <?php echo $data['id_request']; ?><br>
            Tanggal Request : <?php echo date("d/m/Y",  strtotime($data['tanggal_request'])); ?>(dd/mm/yyyy)</div>
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
                    <td width="1px">:</td>
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
                    <td>Category</td>
                    <td>:</td>
                    <td colspan="5">
                        <input style="margin-left: 1px;" type="checkbox" name="category1" id="category1" value="1" <?php if ($data['operating_system'] == 1) echo 'checked'; ?> disabled>
                        <label style="margin-right: 1px;" for="category1">Operating System</label>
                        <input type="checkbox" name="category2" id="category2" value="2" <?php if ($data['microsoft_office'] == 1) echo 'checked'; ?> disabled>
                        <label style="margin-right: 1px;" for="category2">Microsoft Office</label>
                        <input type="checkbox" name="category3" id="category3" value="3" <?php if ($data['software_design'] == 1) echo 'checked'; ?> disabled>
                        <label style="margin-right: 1px;" for="category3">Software Design</label>
                        <input type="checkbox" name="category4" id="category4" value="4" <?php if ($data['software_lainnya'] == 1) echo 'checked'; ?> disabled>
                        <label for="category4">Software Lainnya</label>
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
                        <!-- <hr style="width: 30%; margin-left: 34%;"> -->
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
                                        <div class="ttd">
                                            <img src="<?php echo base_url("assets/signature/" . $data['nik'] . ".png"); ?>" width="145" height="auto">
                                            <div style="position: absolute;top: 28%;left: 81%;"><?php echo $data['nama']; ?></div>
                                        </div>
                                    </td>
                                </tr>
                            <?php
                            } else {
                            ?>
                                <tr>
                                    <td>Nama/Tanda Tangan :</td>
                                    <td rowspan="7">
                                        <div class="ttd" style="padding: 20px 90px 20px 90px;"></div>
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
                <td colspan="7" class="header">ADMIN</td>
            </tr>
            <tr>
                <td align="center">Selection</td>
                <td colspan="2">Software</td>
                <td colspan="2">Version</td>
                <td colspan="2">Notes</td>
            </tr>
            <!-- software loop -->
            <?php
            foreach ($softwares as $softName) {
                foreach ($software as $data) {
                    if ($data['nama_software'] == $softName) {
                        $soft['count'] = 1;
                        $soft['version'] = $data['version'];
                        $soft['notes'] = $data['notes'];
                    }
                }
                if ($soft['count'] > 0) {
            ?>
                    <tr class="form-software">

                        <td align="center"><input type="checkbox" name="<?php echo $softName; ?>" id="<?php echo $softName; ?>" value="<?php echo $softName; ?>" checked disabled></td>

                        <td colspan="2"><label for="<?php echo $softName; ?>"><?php echo $softName; ?></label></td>
                        <td colspan="2">
                            <?php
                            if ($soft['version'] != "-") {
                                echo $soft['version'];
                            } else {
                                echo "______________________";
                            }
                            ?>
                        </td>
                        <td colspan="2">
                            <?php
                            if ($soft['notes'] != "-") {
                                echo $soft['notes'];
                            } else {
                                echo "______________________";
                            }
                            ?>
                        </td>
                    </tr>
                <?php
                    $soft['count'] = 0;
                    $soft['version'] = "-";
                    $soft['notes'] = "-";
                } else { ?>
                    <tr class="form-software">
                        <td align="center"><input type="checkbox" name="<?php echo $softName; ?>" id="<?php echo $softName; ?>" value="<?php echo $softName; ?>" disabled></td>
                        <td colspan="2"><label for="<?php echo $softName; ?>"><?php echo $softName; ?></label></td>
                        <td colspan="2">
                            ______________________
                        </td>
                        <td colspan="2">
                            ______________________
                        </td>
                    </tr>
            <?php }
            } ?>
            <tr>
                <?php
                if (file_exists("assets/signature/" . $nik . ".png")) {
                ?>
                    <td colspan="3">
                        <div style="padding-left: 90px;margin-right:25%;">
                            <div class="ttd">
                                <img src="<?php echo base_url("assets/signature/" . $nik . ".png"); ?>" width="145" height="auto">
                                <div style="position: absolute;top: 81.5%;left: 18%;"><?php echo $nama; ?></div>
                                <div style="position: absolute;top: 78%;left: 15%;">Request Owner</div>
                            </div>
                        </div>
                    </td>
                <?php
                } else {
                ?>
                    <td colspan="3" style="padding-left:50px;">
                        <div class="ttd" style="padding: 0px 30px 40px 10px;">Request Owner</div>
                    </td>
                <?php } ?>
                <td colspan="5" align="right" style="margin: 0;">
                    <table border="0" cellspacing="7" style="margin-bottom: 10px;">
                        <?php
                        if (file_exists("assets/signature/" . $nik_admin . ".png")) {
                        ?>
                            <tr style="position: relative;text-align: center;">
                                <td>Nama/Tanda Tangan :</td>
                                <td rowspan="7">
                                    <div class="ttd">
                                        <img src="<?php echo base_url("assets/signature/" . $nik_admin . ".png"); ?>" width="145" height="auto">
                                        <div style="position: absolute;top: 81%;left: 80%;"><?php echo $nama_admin; ?></div>
                                    </div>
                                </td>
                            </tr>
                        <?php
                        } else {
                        ?>
                            <tr>
                                <td>Nama/Tanda Tangan :</td>
                                <td rowspan="7">
                                    <div class="ttd" style="padding: 20px 90px 20px 90px;"></div>
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
            <tr>
                <td colspan="7" class="header">APPROVALS</td>
            </tr>
            <tr>
                <?php
                foreach ($requestor as $data) {
                    $nip = $data['nip'];
                    $nama = $data['nama'];
                    $otorisasi = "-";
                    if ($data['status'] == "approved") {
                        $otorisasi = "A";
                    } elseif ($data['status'] == "rejected") {
                        $otorisasi = "R";
                    } elseif ($data['status'] == "revision") {
                        $otorisasi = "N";
                    }
                    $tanggal = "__/__/____";
                    if ($data['tanggal_approval'] != "0000-00-00") {
                        $tanggal = date("d/m/Y",  strtotime($data['tanggal_request']));
                    }

                ?>
                    <td colspan="7" align="right">
                        <table border="0" width="">
                            <tr>
                                <td>Otorisasi Persetujuan</td>
                                <td>:</td>
                                <td>
                                    <div class="ttd" style="padding:4px; font-weight:bold;" align="center"><?php echo $otorisasi; ?></div>
                                </td>
                                <td>(A) Approved, (R) Rejected, (N) Needed Revision</td>
                            </tr>
                            <tr>
                                <td>Catatan</td>
                                <td>:</td>
                                <td colspan="2">
                                    <?php
                                    if ($data['approval_notes'] != "") {
                                        echo $data['approval_notes'];
                                    } else {
                                        echo "-";
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4">IT Manager</td>
                            </tr>
                            <tr>
                                <td colspan="2">Nama/Tanda Tangan</td>
                                <td colspan="2" align="right">Jakarta, <?php echo $tanggal; ?>(dd/mm/yyyy)</td>
                            </tr>
                            <?php
                            if (file_exists("assets/signature/" . $nip . ".png")) {
                            ?>
                                <tr style="position: relative;text-align: center;">
                                    <td rowspan="7">
                                        <div class="ttd">
                                            <img src="<?php echo base_url("assets/signature/" . $nip . ".png"); ?>" width="130" height="auto">
                                            <div style="position: absolute;top: 97.8%;left: 43%;"><?php echo $nama; ?></div>
                                        </div>
                                    </td>
                                </tr>
                            <?php
                            } else {
                            ?>
                                <tr>
                                    <td colspan="3">
                                        <div class="ttd" style="padding:20px 30px; font-weight:bold;"></div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </table>
                    </td>
                <?php } ?>
            </tr>
    
            </table>
        </div>
</body>

</html>