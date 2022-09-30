<div id="layoutSidenav_content">

    <!-- Begin Page Content -->
    <div class="container-fluid">

        Page Heading
        <h1 class="h3 font-weight-bold text-black" align="center">Formulir Permintaan Instalasi Software</h1>

        <div class="card card-register mx-auto mt-1"></div>
        <a href="<?php echo site_url('#') ?>"></a>
        <div class="card-body">

            <form action="<?php echo site_url('') ?>" method="POST" enctype="multipart/form-data">

                <!-- Form Pengajuan -->
                <hr size="10px">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="no_pengajuan">Nomor Pengajuan</label>
                        <input type="text" name="no_pengajuan" value="" class="form-control" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="tgl_pengajuan">Tanggal
                            Pengajuan</label>
                        <input type="text" id="tgl_pengajuan" name="tgl_pengajuan" class=" form-control" value="<?= date("d-m-Y H:i:s"); ?>" readonly required>
                    </div>
                </div>


                <div class="form-row">
                    <!-- <form> -->
                    <div class="form-group col-md-4">
                        <label for="kd_jns">Nama Jenis</label>
                        <input type="text" id="no_sppbj" name="no_sppbj" class="form-control" placeholder="" required oninvalid="this.setCustomValidity('Kolom Harus Diisi..')" oninput="setCustomValidity('')">

                    </div>


                    <div class="form-group col-md-4">
                        <label>Nama Kelompok</label>
                        <select class="custom-select" id="kelompok" name="kelompok" required>
                            <option>Pilih Kelompok</option>
                        </select>
                    </div>
                    <!-- </form> -->

                    <div class="form-group col-md-4">
                        <label for="no_sppbj">Nomor SPPBJ</label>
                        <input type="text" id="no_sppbj" name="no_sppbj" class="form-control" placeholder="" required oninvalid="this.setCustomValidity('Kolom Harus Diisi..')" oninput="setCustomValidity('')">
                    </div>
                </div>


                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="tgl_sppbj">Tanggal
                            SPPBJ</label>
                        <input type="date" id="date-picker" name="tgl_sppbj" class="form-control" required oninvalid="this.setCustomValidity('Kolom Harus Diisi..')" oninput="setCustomValidity('')">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="perihal">Nama Pengadaan</label>
                        <textarea type="text" id="perihal" name="perihal" class="form-control" placeholder="" required oninvalid="this.setCustomValidity('Kolom Harus Diisi..')" oninput="setCustomValidity('')"></textarea>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="nilai_sppbj">Nilai
                            SPPBJ</label>
                        <input type="text" id="nilai_sppbj" name="nilai_sppbj" class="form-control" placeholder="Nilai (Tanpa PPN)" required oninvalid="this.setCustomValidity('Kolom Harus Diisi..')" oninput="setCustomValidity('')" number_format(number,decimals,decimal_separator,thousands_separator)>
                    </div>
                </div>


                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="no_pr">Purchase Requisition</label>
                        <input type="text" id="no_pr" name="no_pr" class="form-control" placeholder="" required oninvalid="this.setCustomValidity('Kolom Harus Diisi..')" oninput="setCustomValidity('')">
                    </div>

                    <div class="form-group col-md-4">
                        <label class="file-label" for="file">Lampiran Dokumen</label>
                        <input type="file" class="file-input" name="file" id="file" required oninvalid="this.setCustomValidity('Kolom Harus Diisi..')" oninput="setCustomValidity('')">

                    </div>
                </div>
                <button class="btn-form btn-danger" type="reset" value="Batal" float="right">Batal</button>
                <button class="btn-form btn-success" type="submit" value="Ajukan" float="right">Ajukan</button>

            </form>
        </div>

    </div>

</div>
</div>