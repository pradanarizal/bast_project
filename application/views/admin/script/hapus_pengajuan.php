<!-- Modal Delete -->
<?php
foreach ($requestor as $data) {
?>
    <form action="<?php echo site_url('admin/deleteRequestSoftware') ?>?idRequest=<?php echo $data->id_request; ?>&tipe_pengajuan=<?php echo $data->tipe_pengajuan; ?>" method="POST" enctype="multipart/form-data">
        <div class="modal fade" id="deleteRequest<?php echo $data->id_request ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-danger">
                        <h5 class="modal-title text-white" id="exampleModalLabel">Delete Request</h5>
                        <button type="button red" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        Delete Request with ticket number <?php echo $data->no_tiket; ?> ?
                    </div>
                    <div class="modal-footer mt-3 posisi-tombol-hapus">
                        <button type="button" class="btn btn-outline-secondary all-tombol-hapus" data-dismiss="modal">No</button>
                        <button type="SUBMIT" class="btn btn-outline-danger all-tombol-hapus">Yes</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
<?php } ?>