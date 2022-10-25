<!-- Modal Software -->
<form action="<?php echo site_url('admin/simpan_software') ?>" method="POST" enctype="multipart/form-data">
    <div class="modal fade" id="tambahBarang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Submission Software Form</h5>
                    <button type="button red" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body" id="signature-pad">
                    <h5 class="text-dark mt-3 text-center font-weight-bold">Software Installation Request Form</h5>
                    <div class="card">
                        <div class="form-group mt-3">
                            <label for="no_tiket">Ticket Number</label>
                            <input type="number" name="no_tiket" class="form-control" id="no_tiket"  required>
                        </div>
                    </div>

                    <div class="request">
                        <h5 class="text-dark mt-3 text-center font-weight-bold">Requestor</h5>
                        <div class="card">
                            <div class="form-grup mt-3">
                                <label for="inputnik">NIK/NIPP</label>
                                <input type="number" id="inputnik" name="inputnik" class="form-control"  maxlength="10" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required>
                            </div>

                            <div class="form-grup mt-3">
                                <label for="inputnama">Name</label>
                                <input type="text" id="inputnama" name="inputnama" class="form-control" required>
                            </div>
                            <div class="form-grup mt-3">
                                <label for="">Unit / Division</label>
                                <input type="text" id="inputdivisi" name="inputdivisi" class="form-control" required>
                            </div>
                            <div class="form-grup mt-3">
                                <label for="position">Position</label>
                                <input type="text" id="position" name="position" class="form-control" required>
                            </div>

                            <div class="form-grup mt-3">
                                <label for="">Category</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="os" type="checkbox" id="os" value="1">
                                    <label class="form-check-label" for="os">Operating System</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="mo" type="checkbox" id="mo" value="2">
                                    <label class="form-check-label" for="mo">Microsoft Office</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="sd" type="checkbox" id="sd" value="3">
                                    <label class="form-check-label" for="sd">Software Design</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="sl" type="checkbox" id="sl" value="4">
                                    <label class="form-check-label" for="sl">Lainnya</label>
                                </div>
                            </div>

                            <div class="form-grup mt-3">
                                <label for="">No Asset / Inventaris / Serial Number</label>
                                <input type="text" name="no_asset" class="form-control" required>
                            </div>
                            <div class="form-grup mt-3">
                                <label for="">Description of Needs</label>
                                <textarea name="description" class="form-control" cols="30" rows="10"></textarea>
                            </div>
                            <div class="form-grup  mt-3">
                                <label for="">Signature</label>
                                <!-- <input type="file" name="gambar" class="form-control"> -->
                                <div class="form-ttd">
                                    <div id="note" onmouseover="my_function();">The signature should be inside box</div>
                                    <canvas id="the_canvas" class="isi-ttd" height="100px"></canvas>
                                </div>
                                <div style="margin:10px;">
                                    <input type="hidden" id="signature" name="signature">
                                    <button type="button" id="clear_btn" class="btn btn-danger" data-action="clear">Clear</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer mt-3 posisi-tombol">
                        <button type="button" class="btn btn-danger all-tombol" data-dismiss="modal">Close</button>
                        <button type="submit" id="save_btn" class="btn btn-primary all-tombol" data-action="save-png">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>



<!-- End of Modal Software -->