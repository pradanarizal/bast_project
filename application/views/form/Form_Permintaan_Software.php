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
    foreach ($requestor as $data) {
    ?>
        <div style="padding-left: 10px;">Nomor Request : <?php echo $data['id_request']; ?><br>
            Tanggal Request : <?php echo $tanggal; ?>(dd/mm/yyyy)</div>
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
                    <td>Category</td>
                    <td>:</td>
                    <td colspan="5">
                        <input style="margin-left: 1px;" type="checkbox" name="category1" id="category1" value="1" <?php if ($data['id_category'] == 1) echo 'checked'; ?> disabled>
                        <label style="margin-right: 1px;" for="category1">Operating System</label>
                        <input type="checkbox" name="category2" id="category2" value="2" <?php if ($data['id_category'] == 2) echo 'checked'; ?> disabled>
                        <label style="margin-right: 1px;" for="category2">Microsoft Office</label>
                        <input type="checkbox" name="category3" id="category3" value="3" <?php if ($data['id_category'] == 3) echo 'checked'; ?> disabled>
                        <label style="margin-right: 1px;" for="category3">Software Design</label>
                        <input type="checkbox" name="category4" id="category4" value="4" <?php if ($data['id_category'] == 4) echo 'checked'; ?> disabled>
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
                            <tr>
                                <td>Nama/Tanda Tangan :</td>
                                <td rowspan="7">
                                    <div class="ttd" style="padding: 20px 90px 20px 90px;"></div>
                                </td>
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
                            <tr>
                                <td></td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td colspan="7" class="header">ADMIN</td>
                </tr>
                <tr>
                    <td align="center">Selection</td>
                    <td colspan="2">Software</td>
                    <td colspan="2">Version</td>
                    <td colspan="2">Notes</td>
                </tr>
                <tr class="form-software">
                    <?php
                    foreach ($software as $soft) {
                        if ($soft['nama_software'] == "Microsoft Windows") {
                            $nama_software = $soft['nama_software'];
                            $version = $soft['version'];
                            $notes = $soft['notes'];
                    ?>
                            <td align="center"><input type="checkbox" name="mwn" id="mwn" value="Microsoft Windows" <?php if ($nama_software == "Microsoft Windows") echo "checked"; ?>></td>
                            <td colspan="2"><label for="mwn">Microsoft Windows</label></td>
                            <td colspan="2">
                                <?php
                                if ($version != "") {
                                    echo $version;
                                } else {
                                    echo "______________________";
                                }
                                ?>
                            </td>
                            <td colspan="2">
                                <?php
                                if ($notes != "") {
                                    echo $notes;
                                } else {
                                    echo "______________________";
                                } ?>
                            </td>
                    <?php
                            break;
                        }
                    }
                    ?>
                </tr>
                <tr>
                    <td align="center"><input type="checkbox" name="mos" id="mos" value="Microsoft Office Standar"></td>
                    <td colspan="2"><label for="mos">Microsoft Office Standar</label></td>
                    <td colspan="2">
                        ______________________
                    </td>
                    <td colspan="2">
                        ______________________
                    </td>
                </tr>
                <tr>
                    <td align="center"><input type="checkbox" name="mvs" id="mvs" value="Microsoft Visio"></td>
                    <td colspan="2"><label for="mvs">Microsoft Visio</label></td>
                    <td colspan="2">
                        ______________________
                    </td>
                    <td colspan="2">
                        ______________________
                    </td>
                </tr>
                <tr>
                    <td align="center"><input type="checkbox" name="mpr" id="mpr" value="Microsoft Project"></td>
                    <td colspan="2"><label for="mpr">Microsoft Project</label></td>
                    <td colspan="2">
                        ______________________
                    </td>
                    <td colspan="2">
                        ______________________
                    </td>
                </tr>
                <tr>
                    <td align="center"><input type="checkbox" name="aut" id="aut" value="Autocad"></td>
                    <td colspan="2"><label for="aut">Autocad</label></td>
                    <td colspan="2">
                        ______________________
                    </td>
                    <td colspan="2">
                        ______________________
                    </td>
                </tr>
                <tr>
                    <td align="center"><input type="checkbox" name="cdr" id="cdr" value="Corel Draw"></td>
                    <td colspan="2"><label for="cdr">Corel Draw</label></td>
                    <td colspan="2">
                        ______________________
                    </td>
                    <td colspan="2">
                        ______________________
                    </td>
                </tr>
                <tr>
                    <td align="center"><input type="checkbox" name="aph" id="aph" value="Adobe Photoshop"></td>
                    <td colspan="2"><label for="aph">Adobe Photoshop</label></td>
                    <td colspan="2">
                        ______________________
                    </td>
                    <td colspan="2">
                        ______________________
                    </td>
                </tr>
                <tr>
                    <td align="center"><input type="checkbox" name="apr" id="apr" value="Adobe Premiere"></td>
                    <td colspan="2"><label for="apr">Adobe Premiere</label></td>
                    <td colspan="2">
                        ______________________
                    </td>
                    <td colspan="2">
                        ______________________
                    </td>
                </tr>
                <tr>
                    <td align="center"><input type="checkbox" name="ail" id="ail" value="Adobe Ilustrator"></td>
                    <td colspan="2"><label for="ail">Adobe Ilustrator</label></td>
                    <td colspan="2">
                        ______________________
                    </td>
                    <td colspan="2">
                        ______________________
                    </td>
                </tr>
                <tr>
                    <td align="center"><input type="checkbox" name="aae" id="aae" value="Adobe After Effect"></td>
                    <td colspan="2"><label for="aae">Adobe After Effect</label></td>
                    <td colspan="2">
                        ______________________
                    </td>
                    <td colspan="2">
                        ______________________
                    </td>
                </tr>
                <tr>
                    <td align="center"><input type="checkbox" name="atv" id="atv" value="Antivirus"></td>
                    <td colspan="2"><label for="atv">Antivirus</label></td>
                    <td colspan="2">
                        ______________________
                    </td>
                    <td colspan="2">
                        ______________________
                    </td>
                </tr>
                <tr>
                    <td align="center"><input type="checkbox" name="sup" id="sup" value="Sketch Up Pro"></td>
                    <td colspan="2"><label for="sup">Sketch Up Pro</label></td>
                    <td colspan="2">
                        ______________________
                    </td>
                    <td colspan="2">
                        ______________________
                    </td>
                </tr>
                <tr>
                    <td align="center"><input type="checkbox" name="vfs" id="vfs" value="Vray Fr Sketchup"></td>
                    <td colspan="2"><label for="vfs">Vray Fr Sketchup</label></td>
                    <td colspan="2">
                        ______________________
                    </td>
                    <td colspan="2">
                        ______________________
                    </td>
                </tr>
                <tr>
                    <td align="center"><input type="checkbox" name="npp" id="npp" value="Nitro PDF Pro"></td>
                    <td colspan="2"><label for="npp">Nitro PDF Pro</label></td>
                    <td colspan="2">
                        ______________________
                    </td>
                    <td colspan="2">
                        ______________________
                    </td>
                </tr>
                <tr>
                    <?php
                    foreach ($software as $soft) {
                        if ($soft['nama_software'] == "Linux OS") {
                            $nama_software = $soft['nama_software'];
                            $version = $soft['version'];
                            $notes = $soft['notes'];
                    ?>
                            <td align="center"><input type="checkbox" name="los" id="los" value="Linux OS" <?php if ($nama_software == "Linux OS") echo "checked"; ?>></td>
                            <td colspan="2"><label for="mwn">Linux OS</label></td>
                            <td colspan="2">
                                <?php
                                if ($version != "") {
                                    echo $version;
                                } else {
                                    echo "______________________";
                                }
                                ?>
                            </td>
                            <td colspan="2">
                                <?php
                                if ($notes != "") {
                                    echo $notes;
                                } else {
                                    echo "______________________";
                                } ?>
                            </td>
                        <?php
                            break;
                        } else {
                        ?>
                            <td align="center"><input type="checkbox" name="los" id="los" value="Linux OS"></td>
                            <td colspan="2"><label for="mwn">Linux OS</label></td>
                            <td colspan="2">
                                ______________________
                            </td>
                            <td colspan="2">
                                ______________________
                            </td>
                    <?php
                        }
                    }
                    ?>
                </tr>
                <tr>
                    <td align="center"><input type="checkbox" name="oof" id="oof" value="Open Office"></td>
                    <td colspan="2"><label for="oof">Open Office</label></td>
                    <td colspan="2">
                        ______________________
                    </td>
                    <td colspan="2">
                        ______________________
                    </td>
                </tr>
                <tr>
                    <td align="center"><input type="checkbox" name="mac" id="mac" value="Mac OS"></td>
                    <td colspan="2"><label for="mac">Mac OS</label></td>
                    <td colspan="2">
                        ______________________
                    </td>
                    <td colspan="2">
                        ______________________
                    </td>
                </tr>
                <tr>
                    <td align="center"><input type="checkbox" name="mom" id="mom" value="Microsoft Office for Mac"></td>
                    <td colspan="2"><label for="mom">Microsoft Office for Mac</label></td>
                    <td colspan="2">
                        ______________________
                    </td>
                    <td colspan="2">
                        ______________________
                    </td>
                </tr>
                <tr>
                    <td align="center"><input type="checkbox" name="sap" id="sap" value="SAP"></td>
                    <td colspan="2"><label for="sap">SAP</label></td>
                    <td colspan="2">
                        ______________________
                    </td>
                    <td colspan="2">
                        ______________________
                    </td>
                </tr>
                <tr>
                    <td align="center"><input type="checkbox" name="sln" id="sln" value="Software Lainnya"></td>
                    <td colspan="2"><label for="sln">Software Lainnya...</label></td>
                    <td colspan="2">
                        ______________________
                    </td>
                    <td colspan="2">
                        ______________________
                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="padding-left:50px;">
                        <div class="ttd" style="padding: 0px 30px 40px 10px;">Request Owner</div>
                    </td>
                    <td colspan="4" align="right" style="margin: 0;">
                        <table border="0" cellspacing="7" style="margin-bottom: 10px;">
                            <tr>
                                <td>Nama/Tanda Tangan :</td>
                                <td rowspan="7">
                                    <div class="ttd" style="padding: 20px 90px 20px 90px;"></div>
                                </td>
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
                    <td colspan="7" align="right">
                        <table border="0" width="">
                            <tr>
                                <td>Otorisasi Persetujuan</td>
                                <td>:</td>
                                <td>
                                    <div class="ttd" style="padding:4px; font-weight:bold;" align="center">A</div>
                                </td>
                                <td>(A) Approved, (R) Rejected, (N) Needed Revision</td>
                            </tr>
                            <tr>
                                <td>Catatan</td>
                                <td>:</td>
                                <td>
                                    -
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4">IT Manager</td>
                            </tr>
                            <tr>
                                <td colspan="2">Nama/Tanda Tangan</td>
                                <td colspan="2" align="right">Jakarta, __/__/____(dd/mm/yyyy)</td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <div class="ttd" style="padding:20px 30px; font-weight:bold;"></div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <!-- <tr>
                <td colspan="7" align="right">
                    <table border="0" width="600px;">
                        <td align="">Catatan</td>
                        <td>:</td>
                        <td>
                            <div class="ttd" style="padding:10px; font-weight:bold;" align="center">A</div>
                        </td>
                        <td>(A) Approved, (R) Rejected, (N) Needed Revision</td>
                    </table>
                </td>
            </tr> -->
            </table>
        <?php
    }
        ?>
        </div>
</body>

</html>