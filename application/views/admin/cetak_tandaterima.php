<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<style>
  * {
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
  }

  .tabel tr td {
    text-align: center;
    font-size: 15px;
    color: black;
    font-family: calibri;
  }

  .container {
    border: solid 1px black;
  }

  .header {
    background-color: lightgray;
    font-weight: bold;
    text-align: center;
  }

  .tabel2 tr td {
    color: black;
    padding: 2px;
  }

  .tabel2 {
    border-collapse: collapse;
  }

  .tabel4 {
    border-collapse: collapse;
    margin: 5px;
  }

  .title-content {
    font-family: sans-serif;
    font-weight: bold;
  }

  .tabel6 {
    border-collapse: collapse;
  }

  .content-ttd {
    position: relative;
    width: 80%;
    padding-left: 2rem;
  }

  #halaman {
    width: auto;
    height: auto;
    position: absolute;
    padding-top: 30px;
    padding-left: 30px;
    padding-right: 30px;
    padding-bottom: 80px;

  }

  .tabel4 {
    color: black;
  }

  .tabel3 td {
    color: black;
    padding: 2px;
    font-family: calibri;
  }

  .tabel5 {
    color: black;
    padding: 2px;
    font-family: calibri;
  }
</style>

<body style="font-size: 12px;">
  <div>
    <table class="tabel" border="1" width="100%" cellpadding="0" align="center" cellspacing="0">
      <tr>
        <td rowspan="5">
          <img src="<?php echo base_url(); ?>assets/img/logo.png" alt="logo_kci" width="100px" height="auto">
        </td>
        <td rowspan="2"><b>PT. KERETA COMMUTER INDONESIA</b></td>
        <td>No. Dokumen : FR.KCI.---</td>
      </tr>
      <tr>
        <td>Tanggal Terbit : 12-Mar-20</td>
      </tr>
      <tr>
        <td rowspan="3"><b>FORMULIR BERITA ACARA SERAH TERIMA</b></td>
      </tr>
      <tr>
        <td>Status Revisi : -</td>
      </tr>
      <tr>
        <td>Halaman : 1 dari 1</td>
      </tr>
    </table>
    <?php

    $name;
    $nama_admin;
    foreach ($receipt as $data) {
      $name = $data->nama;
      $nama_admin = $data->nama_admin;
    ?>

      <br>
      <table class="tabel2" border="1" width="25%" align="left">
        <thead>
          <tr>
            <td style="width: 30%;">No. Tiket</td>
            <td style="width: 50%;"><?php echo $data->no_tiket; ?></td>
          </tr>
          <tr>
            <td style="width: 30%;">Tanggal</td>
            <td style="width: 50%;"><?php echo $data->date; ?></td>
          </tr>
        </thead>
      </table>
      <br><br>
      <div id="halaman">

        <p>Pada hari ini, tanggal <span><?php echo date("d/m/Y",  strtotime($data->date)); ?></span></p>
        <table class="tabel3" width="70%" align="left">

          <tr>
            <td style="width: 50%;">Nama Lengkap</td>
            <td style="width: 5%;">:</td>
            <td style="width: 50%;"><?php echo $data->nama; ?></td>
          </tr>
          <tr>
            <td style="width: 50%;">NIK/NIPP</td>
            <td style="width: 5%;">:</td>
            <td style="width: 50%;"><?php echo $data->nik ?></td>
          </tr>
          <tr>
            <td style="width: 50%;">Jabatan</td>
            <td style="width: 5%;">:</td>
            <td style="width: 50%;"><?php echo $data->jabatan ?></td>
          </tr>
          <tr>
            <td style="width: 50%; vertical-align: top;">Unit/Bagian</td>
            <td style="width: 5%; vertical-align: top;">:</td>
            <td style="width: 50%;"><?php echo $data->bagian ?></td>
          </tr>
        </table>

        <table class="tabel4" width="100%" border="1" align="left">
          <thead>
            <tr>
              <td class="title-content">NO TIKET</td>
              <td class="title-content">NAMA BARANG</td>
              <td class="title-content">ID BARANG</td>
              <td class="title-content">URAIAN</td>
            </tr>
          </thead>

          <tbody>
            <tr>
              <td><?php echo $data->no_tiket; ?></td>
              <td><?php echo $data->item; ?></td>
              <td><?php echo $data->item_id; ?></td>
              <td><?php echo $data->description; ?></td>
            </tr>
          </tbody>
        </table>

        <br>
        <table class="tabel5" width="70%" border="0" align="left">
          <tr>
            <td width="1">Kepada :</td>
          </tr>
          <div>
            <tr>
              <td style="width: 50%;">Nama Lengkap</td>
              <td style="width: 5%;">:</td>
              <td style="width: 50%;"><?php echo $data->nama_admin; ?></td>
            </tr>
            <tr>
              <td style="width: 50%;">NIK/NIPP</td>
              <td style="width: 5%;">:</td>
              <td style="width: 50%;"><?php echo $data->nik_admin; ?></td>
            </tr>
            <tr>
              <td style="width: 50%;">Jabatan</td>
              <td style="width: 5%;">:</td>
              <td style="width: 50%;"><?php echo $data->position_admin; ?></td>
            </tr>
            <tr>
              <td style="width: 50%; vertical-align: top;">Unit/Bagian</td>
              <td style="width: 5%; vertical-align: top;">:</td>
              <td style="width: 50%;"><?php echo $data->division_admin; ?></td>
            </tr>
          </div>
        </table>

        <table width="100%">
          <tr>
            <td>Menyerahkan sebagai berikut :</td>
          </tr>
          <tr>
            <td><p align="justify">Dipergunakan untuk <?php echo $data->description; ?> yang menjadi tanggung jawab penerima sepenuhnya untuk sebagaimana mestinya.</p>
            </td>
          </tr>
        </table>

        <table class="tabel6" width="100%">
          <tr>
            <td>
              <div style="width: 50%; float:left;">
                <p style=" text-align: center; ">Yang Menyerahkan</p>
                <p style=" text-align: center; ">Pihak Pertama</p>

                <!-- <div style="width: 50%; text-align: center; float: left;">Pihak Pertama,</div> -->

                <?php
                if (file_exists("assets/signature/" . $nik . ".png")) {
                ?>
                  <div class="content-ttd">
                    <img class="ttd" src="<?php echo base_url("assets/signature/" . $nik . ".png"); ?>" width="130" height="auto">
                  </div>
                  <p style=" text-align: center; ">NIPP: <?php echo $data->nik ?></p>
                  <p style=" text-align: center; "><?php echo $name ?></p>
              </div>
            <?php
                } else {
            ?>
              <div class="ttd"></div>

            <?php } ?>

            </td>

            <td>
              <div style="width: 50%; float:right;">
                <p style=" text-align: center; ">Yang Menerima</p>
                <p style=" text-align: center; ">Pihak Kedua</p>

                <!-- <div style="width: 50%; text-align: center; float: left;">Pihak Pertama,</div> -->

                <?php
                if (file_exists("assets/signature/" . $nik_admin . ".png")) {
                ?>
                  <div class="content-ttd ">
                    <img class="ttd" src="<?php echo base_url("assets/signature/" . $nik_admin . ".png"); ?>" width="130" height="auto">
                  </div>
                  <p style=" text-align: center; ">NIPP: <?php echo $nik_admin ?></p>
                  <p style=" text-align: center; "><?php echo $nama_admin ?></p>
              </div>
            <?php
                } else {
            ?>
              <div class="ttd"></div>

            <?php } ?>

            </td>
          </tr>
        </table>
      <?php  } ?>
  </div>
</body>