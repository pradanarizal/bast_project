@@ -0,0 +1,176 @@
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    *{
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

    .ttd {
        border: solid 1px black;
    }

    .header {
        background-color: lightgray;
        font-weight: bold;
        text-align: center;
    }

    .tabel2 tr td{
        color: black;
        padding: 2px;
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

    .tabel3 td{
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

    <br>
    <table class="tabel2" border="1" width="25%"  align="left" >
        <tr>
            <td>No. Tiket :</td>
        </tr>
        <tr>
            <td>Tanggal :</td>
        </tr>
    </table>

    <br><br>
    <div id="halaman">

    <p>Pada hari ini, tanggal bulan tahun</p>
    
    <table class= "tabel3" width="70%" border="0" align="left">
      <tr>
          <td style="width: 50%;">Nama Lengkap</td>
          <td style="width: 5%;">:</td>
          <td style="width: 50%;">Bandoro Abdul Jamal Muhammad</td>
      </tr>
      <tr>
          <td style="width: 50%;">NIK/NIPP</td>
          <td style="width: 5%;">:</td>
          <td style="width: 50%;">1199273223267</td>
      </tr>
      <tr>
        <td style="width: 50%;">Jabatan</td>
        <td style="width: 5%;">:</td>
        <td style="width: 50%;">IT Operasional</td>
      </tr>
      <tr>
          <td style="width: 50%; vertical-align: top;">Unit/Bagian</td>
          <td style="width: 5%; vertical-align: top;">:</td>
          <td style="width: 90%;">Stasiun Juanda</td>
      </tr>
    </table>
    
    
    
   
    <table class="tabel4" width="100%" border="1" align="left">
      <thead>
        <tr>
          <td>NO</td>
          <td>NAMA BARANG</td>
          <td>ID BARANG</td>
          <td>URAIAN</td>
        </tr>
      </thead>
      
      <tbody>
        <?php 
            foreach ($receipt as $data) :
        ?>
            <tr>
                <td><?php echo $data->no_tiket ;?></td>
                <td><?php echo $data->item ?></td>
                <td><?php echo $data->item_id ?></td>
                <td><?php echo $data->description ?></td>
            </tr>
            <?php endforeach ; ?>
      </tbody>  
    </table>

    <br>
    <table class= "tabel5" width="70%" border="0" align="left">
      <tr>
        <td width="1">Kepada :</td>
      </tr>
      <div>
        <tr>
          <td style="width: 50%;">Nama Lengkap</td>
          <td style="width: 5%;">:</td>
          <td style="width: 50%;">Bandoro Abdul Jamal Muhammad</td>
        </tr>
        <tr>
            <td style="width: 50%;">NIK/NIPP</td>
            <td style="width: 5%;">:</td>
            <td style="width: 50%;">1199273223267</td>
        </tr>
        <tr>
          <td style="width: 50%;">Jabatan</td>
          <td style="width: 5%;">:</td>
          <td style="width: 50%;">IT Operasional</td>
        </tr>
        <tr>
            <td style="width: 50%; vertical-align: top;">Unit/Bagian</td>
            <td style="width: 5%; vertical-align: top;">:</td>
            <td style="width: 90%;">Stasiun Juanda</td>
        </tr>
      </div>
      <tr>
        <td>Menyerahkan sebagai berikut :</td>
      </tr>
    <!-- <tr>
    <p>Dipergunakan untuk ______ yang menjadi tagggung jawab penerima sepenuhnya </p>
    <p>untuk sebagaimana mestinya</p>
    </tr> -->
    </table>
    <!-- <br><br><br>
    
    <p>Dipergunakan untuk ______ yang menjadi tagggung jawab penerima sepenuhnya </p>
    <p>untuk sebagaimana mestinya</p> -->
    </div>
</body>


<!-- <style>
    table {
      border-collapse: collapse;
    }

    thead>tr {
      background-color: #0070C0;
      color: #f1f1f1;
    }

    thead>tr>th {
      background-color: #0070C0;
      color: #fff;
      padding: 10px;
      border-color: #fff;
    }

    th,
    td {
      padding: 2px;
    }

    th {
      color: #222;
    }

    body {
      font-family: Calibri;
      color: #000000;
    }
  </style>


<body onload="">
  <?php $this->load->view('form/kop_lap'); ?>
  <h4 align="center" style="margin-top:0px;"><u>SURAT TANDA TERIMA</u></h4>
  

  <center>
    <table width="90%" border="1">
      <tr align="center">
        <th>NO</th>
        <th>NAMA BARANG</th>
        <th width="100">QTY</th>
        <th>PERIHAL</th>
      </tr>
      <tr>
        <td style="padding-left:10px;" align="center">1</td>
        
        <td style="padding-left:10px;">ini adalah isi</td>
        
        <td style="padding-left:10px;">ini adalah isi</td>
        
        <td style="padding-left:10px;">ini adalah isi</td>
        
      </tr>
    </table>
  </center>
  <br>

  <div style="float:right;margin-right:100px;">
    <table>
      <tr>
        <td>
        <u>YANG MENERIMA</u><br>
          <br><br><br><br>
          (.............................................)
        </td>
        <br>
        <td colspan="3" align="center">
        </td>
      </tr>
    </table>
      NIK/NIPP:
  </div> -->