<div class="mr-4 ml-4">
    <div class="row">
        <div class="container-fluid" id="signature-pad">
            <?php
            foreach ($receipt as $data) { ?>
                <div>
                    Receiver data with :
                    <li>Ticket Number = <b><?php echo $data['no_tiket']; ?></b></li>
                </div>
            <?php } ?>

            <div class="card shadow mb-4" id="signature-pad">
                <div class="card-body">
                    <?php
                    if ($nik_admin != 0) {
                        foreach ($noc_admin as $data) {
                    ?>
                            <form method="post" action="<?php echo site_url('admin/update_receipt_receiver') ?>">
                                <div class="form-grup mt-3">
                                    <label for="itemName" class="text-dark font-weight-bold">NIK/NIP</label>
                                    <input readonly type="text" id="nik" class="form-control" name="nik_receiver" minlength="4" maxlength="16" required onkeypress="return event.charCode >= 48 && event.charCode <=57" value="<?php echo $data['nik_admin'] ?>" required>
                                </div>
                                <div class="form-grup mt-3">
                                    <label for="itemID" class="text-dark font-weight-bold">Nama</label>
                                    <input readonly type="text" class="form-control" name="nama_receiver" value="<?php echo $data['nama_admin'] ?>" required>
                                </div>
                                <div class="form-grup mt-3">
                                    <label for="inputNama" class="text-dark font-weight-bold">Position</label>
                                    <input readonly type="text" id="position" name="position_receiver" class="form-control" value="<?php echo $data['position_admin'] ?>" required>
                                </div>
                                <div class="form-grup mt-3">
                                    <label for="inputNik" class="text-dark font-weight-bold">Unit Division</label>
                                    <input readonly type="text" id="unit_division" name="division_receiver" class="form-control" value="<?php echo $data['division_admin'] ?>" required>
                                </div>
                                <div class="form-grup  mt-3">
                                    <label for="">Signature</label>
                                    <p class="form-ttd"><img src="<?php echo base_url('assets/signature/' . $data['nik_admin'] . '.png'); ?>"></p>
                                    <p style="color: red;">*Receiver data can't be edited</p>
                                </div>
                                <div class="simpan-receipt">
                                    <button href="<?php echo base_url('admin/receipt') ?>" class="btn btn-danger tombol-receipt">Back
                                    </button>
                                    <button type="submit" id="save_btn" class="btn btn-primary tombol-receipt" data-action="save-png">Save</button>
                                </div>
                            </form>




                        <?php
                        }
                    } else {
                        ?>
                        <div class="d-sm-flex align-items-center justify-content-between mb-4 judul-submission">
                            <div class="mb-0 text-gray-800">Add Receiver</div>
                        </div>
                        <form method="post" action="<?php echo site_url('admin/simpan_receipt_receiver') ?>">
                            <div class="form-grup mt-3">
                                <label for="itemName" class="text-dark font-weight-bold">NIK/NIP</label>
                                <input type="text" id="nik_receiver" class="form-control" name="nik_receiver" minlength="4" maxlength="16" required onkeypress="return event.charCode >= 48 && event.charCode <=57">
                            </div>
                            <div class="form-grup mt-3">
                                <label for="itemID" class="text-dark font-weight-bold">Nama</label>
                                <input type="text" class="form-control" name="nama_receiver" required>
                            </div>
                            <div class="form-grup mt-3">
                                <label for="inputNama" class="text-dark font-weight-bold">Position</label>
                                <input type="text" id="position" name="position_receiver" class="form-control" required>
                            </div>
                            <div class="form-grup mt-3">
                                <label for="inputNik" class="text-dark font-weight-bold">Unit Division</label>
                                <input type="text" id="unit_division" name="division_receiver" class="form-control" required>
                            </div>

                            <div class="form-grup mt-3">
                                <label for="">Signature</label>
                                <div class="form-ttd">
                                    <div id="note" onmouseover="my_function();">The signature should be inside box</div>
                                    <canvas id="the_canvas" class="isi-ttd" height="100px"></canvas>
                                </div>
                                <div style="margin:10px;">
                                    <input type="hidden" id="signature" name="signature">
                                    <button type="button" id="clear_btn" class="btn btn-danger" data-action="clear">Clear</button>
                                </div>
                                <p style="color: red;">*Receiver data can't be edited after saving</p>
                            </div>

                            <div class="simpan-receipt">
                                <a class="btn btn-danger tombol-receipt" href="<?php echo base_url('admin/receipt') ?>">Back</a>
                                <button type="submit" id="save_btn" class="btn btn-primary tombol-receipt" data-action="save-png">Save</button>
                            </div>
                        </form>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>