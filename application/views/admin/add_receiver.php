<div class="container-fluid bg-white p-5" style="width: 80%;" id="signature-pad">

    <div class="modal-header bg-primary mb-2 justify-content-center">
        <h4 class="text-white font-weight-bold">ADD RECEIVER</h4>
    </div>
    <div class="body-content" id="signature-pad">
        <?php
        if ($nik_admin != 0) {
            foreach ($noc_admin as $data) {
        ?>
                <form method="post" action="<?php echo site_url('admin/update_receipt_receiver') ?>">
                    <div class="form-grup mt-3">
                        <label for="itemName" class="text-dark font-weight-bold">NIK/NIP</label>
                        <input type="text" id="nik" class="form-control" name="nik_receiver" minlength="4" maxlength="16" required onkeypress="return event.charCode >= 48 && event.charCode <=57" value="<?php echo $data['nik_admin'] ?>" required>
                    </div>
                    <div class="form-grup mt-3">
                        <label for="itemID" class="text-dark font-weight-bold">Nama</label>
                        <input type="text" class="form-control" name="nama_receiver" value="<?php echo $data['nama_admin'] ?>" required>
                    </div>
                    <div class="form-grup mt-3">
                        <label for="inputNama" class="text-dark font-weight-bold">Position</label>
                        <input type="text" id="position" name="position_receiver" class="form-control" value="<?php echo $data['position_admin'] ?>" required>
                    </div>
                    <div class="form-grup mt-3">
                        <label for="inputNik" class="text-dark font-weight-bold">Unit Division</label>
                        <input type="text" id="unit_division" name="division_receiver" class="form-control" value="<?php echo $data['division_admin'] ?>" required>
                    </div>
                    <div class="form-grup  mt-3">
                        <label for="">Signature</label>
                        <p style="border:solid 1px teal;width:355px;height:110px;"><img src="<?php echo base_url('assets/signature/' . $data['nik_admin'] . '.png'); ?>"></p>
                        <p style="color: red;">*if you want to edit signature, you must delete the submission</p>
                    </div>
                    <div class="float-right">
                        <button type="submit" id="save_btn" class="btn btn-primary" data-action="save-png">Save changes</button>
                    </div>
                </form>

            <?php
            }
        } else {
            ?>

            <form method="post" action="<?php echo site_url('admin/simpan_receipt_receiver') ?>">
                <div class="form-grup mt-3">
                    <label for="itemName" class="text-dark font-weight-bold">NIK/NIP</label>
                    <input type="text" id="nik_receiver" class="form-control" name="nik_receiver" minlength="10" maxlength="16" required onkeypress="return event.charCode >= 48 && event.charCode <=57">
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
                    <div style="border:solid 1px teal; width:360px;height:110px;padding:3px;position:relative;">
                        <div id="note" onmouseover="my_function();">The signature should be inside box</div>
                        <canvas id="the_canvas" width="350px" height="100px"></canvas>
                    </div>
                    <div style="margin:10px;">
                        <input type="hidden" id="signature" name="signature">
                        <button type="button" id="clear_btn" class="btn btn-danger" data-action="clear">Clear</button>
                    </div>
                </div>

                <div class="float-right">
                    <button type="submit" id="save_btn" class="btn btn-primary" data-action="save-png">Save changes</button>
                </div>
            </form>
        <?php } ?>
    </div>
</div>
</div>