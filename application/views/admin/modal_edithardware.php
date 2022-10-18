<!-- Modal Software -->
<?php
foreach ($requestor as $data) {
?>
    <form action="<?php echo site_url('admin/hardwareRequestUpdate') ?>" method="POST" enctype="multipart/form-data">
        <div class="modal fade" id="editRequest<?php echo $data->id_request; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title text-white" id="exampleModalLabel">Form Pengajuan Hardware</h5>
                        <button type="button red" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <h5 class="text-dark mt-3 text-center font-weight-bold">Formulir Pengecekan PC/Laptop</h5>
                        <div class="card">
                            <div class="form-group mt-3">
                                <label for="no_tiket">No Ticket</label>
                                <input type="text" name="id_request" class="form-control" value="<?php echo $data->id_request; ?>" hidden>
                                <input type="text" name="no_tiket" class="form-control" placeholder="Input No. Ticket" value="<?php echo $data->no_tiket; ?>" minlength="10" maxlength="10" required onkeypress="return event.charCode >= 48 && event.charCode <=57">
                            </div>
                        </div>

                        <div class="request">
                            <h5 class="text-dark mt-3 text-center font-weight-bold">Requestor</h5>
                            <div class="card">
                                <div class="form-grup mt-3">
                                    <label for="inputnik">NIK/NIP</label>
                                    <input type="text" id="inputnik" name="inputnik" class="form-control" minlength="16" value="<?php echo $data->nik; ?>" required onkeypress="return event.charCode >= 48 && event.charCode <=57">
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
                                    <label for="">No Asset / Inventaris / Serial Number</label>
                                    <input type="text" name="no_asset" class="form-control" value="<?php echo $data->no_aset; ?>" required>
                                </div>
                                <div class="form-grup mt-3">
                                    <label for="">Description of Needs</label>
                                    <textarea name="description" class="form-control" cols="30" rows="10"><?php echo $data->keluhan; ?></textarea>
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
<!-- End of Modal Hardware -->