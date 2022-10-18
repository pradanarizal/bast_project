<!-- Modal add executor -->
<form action="<?php echo site_url('admin/add_executor?idRequest=' . $id_request . '&noTiket=' . $tiket); ?>" method="POST" enctype="multipart/form-data" id="signature-pad">

    <div class="modal fade" id="finish_this_submission" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Finish this check</h5>
                    <button type="button red" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body" id="signature-pad">

                    <h4>Input Executor who finished this submission</h4>

                    <div class="form-group mt-3">
                        <input class="form-control" type="text" name="component_count" value="<?php echo count($komponen); ?>" hidden>

                        <label for="nik">NIP/NIK</label>
                        <input class="form-control" type="text" name="nik" id="nik" required>
                    </div>

                    <div class="form-group mt-3">
                        <label for="name">Admin Name</label>
                        <input class="form-control" type="text" name="name" id="name" required>
                    </div>

                    <div class="form-group mt-3">
                        <label for="position">Position</label>
                        <input class="form-control" type="text" name="position" id="position" required>
                    </div>

                    <div class="form-group mt-3">
                        <label for="division">Division</label>
                        <input class="form-control" type="text" name="division" id="division" required>
                    </div>

                    <div class="form-group mt-3">
                        <label for="rekomendasi">Recommendation</label>
                        <div>
                            <textarea class="form-control" name="rekomendasi" id="rekomendasi"></textarea>

                        </div>
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

                    <div class="modal-footer  mt-3">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="SUBMIT" id="save_btn" class="btn btn-primary" data-action="save-png">Finish</button>
                    </div>
                </div>

            </div>

        </div>
    </div>
</form>

<!-- End of add executor -->