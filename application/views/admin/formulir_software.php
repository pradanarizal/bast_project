<div id="layoutSidenav_content">

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- <div class="card card-register mx-auto mt-1"></div> -->
        <a href="<?php echo site_url('#') ?>"></a>

        <form action="<?php echo site_url('') ?>" method="POST" enctype="multipart/form-data">

            <!-- Form Pengajuan -->
            <h1 class="h3 font-weight-bold text-black" align="center">Formulir Permintaan Instalasi Software</h1>
            <div class="card">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="no_pengajuan">No. Ticket</label>
                        <input type="text" name="no_pengajuan" value="" class="form-control" readonly>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="no_pengajuan">No. Request</label>
                        <input type="text" name="no_pengajuan" value="" class="form-control" readonly>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="tgl_pengajuan">Request Date</label>
                        <input type="text" id="tgl_pengajuan" name="tgl_pengajuan" class=" form-control" value="<?= date("d-m-Y H:i:s"); ?>" readonly required>
                    </div>
                </div>
            </div>
            <h1 class="h3 font-weight-bold text-black" align="center">Requestor</h1>
            <!-- <form> -->
            <div class="card">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="kd_jns">Name</label>
                        <input type="text" id="no_sppbj" name="no_sppbj" class="form-control" placeholder="" required oninvalid="this.setCustomValidity('Kolom Harus Diisi..')" oninput="setCustomValidity('')">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="no_sppbj">NIK/NPP</label>
                        <input type="text" id="no_sppbj" name="no_sppbj" class="form-control" placeholder="" required oninvalid="this.setCustomValidity('Kolom Harus Diisi..')" oninput="setCustomValidity('')">
                    </div>
                </div>


                <div class="form-row">
                    <label for="no_sppbj">Category</label>
                </div>

                <div class="form-row">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Default checkbox
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                        <label class="form-check-label" for="flexCheckChecked">
                            Checked checkbox
                        </label>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Default checkbox
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                        <label class="form-check-label" for="flexCheckChecked">
                            Checked checkbox
                        </label>
                    </div>
                </div>
                <!-- </form> -->

                <div class="form-group col-md-4">
                    <label for="nilai_sppbj">Unit/Division</label>
                    <input type="text" id="nilai_sppbj" name="nilai_sppbj" class="form-control" placeholder="Nilai (Tanpa PPN)" required oninvalid="this.setCustomValidity('Kolom Harus Diisi..')" oninput="setCustomValidity('')" number_format(number,decimals,decimal_separator,thousands_separator)>
                </div>

                <div class="form-group col-md-4">
                    <label for="nilai_sppbj">Position</label>
                    <input type="text" id="nilai_sppbj" name="nilai_sppbj" class="form-control" placeholder="Nilai (Tanpa PPN)" required oninvalid="this.setCustomValidity('Kolom Harus Diisi..')" oninput="setCustomValidity('')" number_format(number,decimals,decimal_separator,thousands_separator)>
                </div>

                <div class="form-group col-md-4">
                    <label for="no_pr">No Asset / Inventaris / Serial Number</label>
                    <input type="text" id="no_pr" name="no_pr" class="form-control" placeholder="" required oninvalid="this.setCustomValidity('Kolom Harus Diisi..')" oninput="setCustomValidity('')">
                </div>

                <div class="form-group col-md-4">
                    <label for="perihal">Description of Needs</label>
                    <textarea type="text" id="perihal" name="perihal" class="form-control" placeholder="" required oninvalid="this.setCustomValidity('Kolom Harus Diisi..')" oninput="setCustomValidity('')"></textarea>
                </div>

            </div>

            <button class="btn-form btn-danger" type="reset" value="Batal" float="right">Batal</button>
            <button class="btn-form btn-success" type="submit" value="Ajukan" float="right">Ajukan</button>

        </form>

    </div>

</div>
</div>