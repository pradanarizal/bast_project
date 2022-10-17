<!-- Modal Software -->
<?php
foreach ($requestor as $data) {
?>
    <form action="<?php echo site_url('admin/SoftwareRequestUpdate') ?>" method="POST" enctype="multipart/form-data">
        <div class="modal fade" id="editRequest<?php echo $data->id_request; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title text-white" id="exampleModalLabel">Form Pengajuan Software</h5>
                        <button type="button red" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <h5 class="text-dark mt-3 text-center font-weight-bold">Formulir Permintaan Instalasi Software</h5>
                        <div class="card">
                            <div class="form-group mt-3">
                                <label for="no_tiket">No Ticket</label>
                                <input type="text" name="id_request" class="form-control" value="<?php echo $data->id_request; ?>" hidden>
                                <input type="text" name="no_tiket" class="form-control" placeholder="Input No. Ticket" value="<?php echo $data->no_tiket; ?>" maxlength="10" required onkeypress="return event.charCode >= 48 && event.charCode <=57">
                            </div>
                        </div>

                        <div class="request">
                            <h5 class="text-dark mt-3 text-center font-weight-bold">Requestor</h5>
                            <div class="card">
                                <div class="form-grup mt-3">
                                    <label for="inputnik">NIK/NIP</label>
                                    <input type="text" id="inputnik" name="inputnik" class="form-control" minlength="4" value="<?php echo $data->nik; ?>" required onkeypress="return event.charCode >= 48 && event.charCode <=57">
                                </div>

                                <div class="form-grup mt-3">
                                    <label for="inputnama">Name</label>
                                    <input type="text" id="inputnama" name="inputnama" class="form-control" value="<?php echo $data->nama; ?>" required>
                                </div>
                                <div class="form-grup mt-3">
                                    <label for="">Unit / Division</label>
                                    <input type="text" id="inputdivisi" name="inputdivisi" class="form-control" value="<?php echo $data->jabatan; ?>" required>
                                </div>
                                <div class="form-grup mt-3">
                                    <label for="position">Position</label>
                                    <input type="text" id="position" name="position" class="form-control" value="<?php echo $data->bagian; ?>" required>
                                </div>

                                <div class="form-grup mt-3">
                                    <label for="">Category</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="os" type="checkbox" id="os<?php echo $data->id_request; ?>" value="1" <?php if ($data->operating_system == 1) {
                                                                                                                                                        echo "checked";
                                                                                                                                                    } ?>>
                                        <label class="form-check-label" for="os<?php echo $data->id_request; ?>">Operating System</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="mo" type="checkbox" id="mo<?php echo $data->id_request; ?>" value="1" <?php if ($data->microsoft_office == 1) {
                                                                                                                                                        echo "checked";
                                                                                                                                                    } ?>>
                                        <label class="form-check-label" for="mo<?php echo $data->id_request; ?>">Microsoft Office</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="sd" type="checkbox" id="sd<?php echo $data->id_request; ?>" value="1" <?php if ($data->software_design == 1) {
                                                                                                                                                        echo "checked";
                                                                                                                                                    } ?>>
                                        <label class="form-check-label" for="sd<?php echo $data->id_request; ?>">Software Design</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="sl" type="checkbox" id="sl<?php echo $data->id_request; ?>" value="1" <?php if ($data->software_lainnya == 1) {
                                                                                                                                                        echo "checked";
                                                                                                                                                    } ?>>
                                        <label class="form-check-label" for="sl<?php echo $data->id_request; ?>">Software Lainnya</label>
                                    </div>

                                </div>

                                <div class="form-grup mt-3">
                                    <label for="">No Asset / Inventaris / Serial Number</label>
                                    <input type="text" name="no_asset" class="form-control" value="<?php echo $data->no_aset; ?>" required>
                                </div>
                                <div class="form-grup mt-3">
                                    <label for="">Description of Needs</label>
                                    <textarea name="description" class="form-control" cols="30" rows="10"><?php echo $data->keluhan; ?></textarea>
                                </div>
                                <div class="form-grup mt-3">
                                    <label for="">Signature</label>
                                    <p style="border:solid 1px teal;width:355px;height:110px;"><img src="<?php echo base_url('assets/signature/' . $data->nik . '.png'); ?>"></p>
                                    <p style="color: red;">*if you want to edit signature, you must delete the submission</p>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer  mt-3">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="SUBMIT" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
<?php } ?>
<!-- End of Modal Software -->