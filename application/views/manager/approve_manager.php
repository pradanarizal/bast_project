<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Confirm Approve Submission </h1>
    </div>
    <form action="<?php echo base_url('manager/approve'); ?>" method="POST">
        <div class="card shadow mb-4">
            <div class="card-body" id="signature-pad">
                <h4></h4>
                <input type="text" name="id" value="<?php echo $id; ?>" hidden>
                <div class="form-group mt-3">
                    <label for="nik">Ticket Number</label>
                    <input class="form-control" type="text" value="<?php echo $tiket; ?>" disabled>
                </div>
                <div class="form-group mt-3">
                    <label for="nik">Requestor</label>
                    <input class="form-control" type="text" value="<?php echo $requestor; ?>" disabled>
                </div>
                <div class="form-group mt-3">
                    <label for="nik">Needs</label>
                    <input class="form-control" type="text" value="<?php echo $needs; ?>" disabled>
                </div>
                <div class="form-grup  mt-3">
                    <p>Notes</p>
                    <textarea class="form-control" type="text" name="notes" id="notes" placeholder="Notes..." required></textarea>
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
                <div class="modal-footer  mt-3">
                    <button type="button" class="btn btn-danger" onclick="history.go(-1);">Back</button>
                    <button type="submit" id="save_btn" class="btn btn-primary" data-action="save-png">Approve Submission</button>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- /Content -->