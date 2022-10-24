<div class="container-fluid bg-white p-2" style="width: 80%;" id="signature-pad">
    <h3 class="p-2">Hardware Recommendation Signature</h3>
    <div class="body-content" id="signature-pad">
        <?php
        foreach ($requestor as $data) {
        ?>
            <form method="post" action="<?php echo site_url('manager/signRecommendation') ?>">
                <div class="form-grup mt-3">
                    <label for="itemName" class="text-dark font-weight-bold">Ticket Number</label>
                    <input type="text" name="id" id="id" value="<?php echo $id; ?>" hidden>
                    <input type="text" id="nik" class="form-control" name="" minlength="4" maxlength="16" value="<?php echo $data['no_tiket'] ?>" disabled>
                </div>
                <div class="form-grup mt-3">
                    <label for="itemName" class="text-dark font-weight-bold">NIK/NIP</label>
                    <input type="text" name="nip" value="<?php echo $data['nik_admin']; ?>" hidden>
                    <input type="text" id="nik" class="form-control" name="nip" minlength="4" maxlength="16" value="<?php echo $data['nik_admin']; ?>" disabled>
                </div>
                <div class="form-grup mt-3">
                    <label for="itemID" class="text-dark font-weight-bold">Nama</label>
                    <input type="text" class="form-control" name="" value="<?php echo $data['nama']; ?>" disabled>
                </div>
                <div class="form-grup mt-3">
                    <label for="inputNama" class="text-dark font-weight-bold">Description</label>
                    <input type="text" id="position" name="" class="form-control" value="<?php echo $data['keluhan']; ?>" disabled>
                </div>
                <div class="form-grup mt-3">
                    <label for="inputNik" class="text-dark font-weight-bold">Recommendation From Admin</label>
                    <textarea class="form-control" type="text" name="notes" id="notes" placeholder="Notes..." disabled> <?php echo $data['approval_notes']; ?></textarea>
                </div>
                <div class="form-grup  mt-3">
                    <label for="">Signature</label>
                    <!-- <input type="file" name="gambar" class="form-control"> -->
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
                    <button type="button" class="btn btn-danger" onclick="history.go(-1);">Back</button>
                    <button type="submit" id="save_btn" class="btn btn-primary" data-action="save-png">Sign Recommendation</button>
                </div>
            </form>

        <?php
        }
        ?>
    </div>
</div>
</div>