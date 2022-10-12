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
        font-family: calibri;
        padding: 2px;
    }

    #halaman {
        color: black;
        font-family: calibri;
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
    <table class= "tabel3" width="50%" border="0" align="left">
    <tr>
      <td width="1">Nama Lengkap</td>
      <td width="1">:</td>
    </tr>
    <tr>
      <td width="1">NIK/NIPP</td>
      <td>:</td>
    </tr>
    <tr>
      <td width="1">Jabatan</td>
      <td>:</td>
    </tr>
    <tr>
      <td width="1">Unit/Bagian</td>
      <td>:</td>
    </tr>
    <tr>    
    <td>Menyerahkan sebagai berikut</td>
    <td>:</td>
    </tr>
    </table>
    
    
    
   
    <table class="tabel4" width="100%" border="1" align="left">
        <tr>
            <td>NO</td>
            <td>NAMA BARANG</td>
            <td>ID BARANG</td>
            <td>URAIAN</td>
        </tr>
    </table>

    <br>
    <table class= "tabel5" width="50%" border="0" align="left">
        <br><br>
    <tr>
      <td width="1">Kepada :</td>
    </tr>
    <tr>
      <td width="1">Nama Lengkap</td>
      <td width="1">:</td>
    </tr>
    <tr>
      <td width="1">NIK/NIPP</td>
      <td width="1">:</td>
    </tr>
    <tr>
      <td width="1">Jabatan</td>
      <td width="1">:</td>
    </tr>
    <tr>
      <td width="1">Unit/Bagian</td>
      <td width="1">:</td>
    </tr>
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