<!-- modal-edit -->
<?php  foreach ( $receipt as $data) { 
?>
<form action="<?php echo base_url() . 'admin/edit_receipt'; ?>" method="POST" enctype="multipart/form-data">
    <div class="modal fade" id="editReceipt_modal<?php echo $data->id_receipt ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary justify-content-center">
                    <h4 class="modal-title text-white text-justify" id="exampleModalLabel">Formulir Tanda Terima</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-light">&times;</span>
                    </button>
                </div>
            
                <div class="modal-body">
                    <div class="content">
                        <div class="card mb-3">
                            <div class="form-group mt-3">
                                <label for="inputEmail4">No Ticket</label>
                                <input type="text" name="id_receipt" class="form-control" value="<?php echo $data->id_receipt; ?>" hidden>
                                <input type="text" name="no_tiket" class="form-control" id="inputEmail4" placeholder="input no ticket" value="<?php echo $data->no_tiket ?>"
                                >
                            </div>
                        </div>

                        <div class="card giver-content">
                            <div class="tittle bg-primary">
                                <h5 class="text-light mt-3 text-center font-weight-bold">GIVER</h5>
                            </div>
                            <div class="form-grup mt-3">
                                <label for="inputNama" class="text-dark font-weight-bold">Giver Name</label>
                                <input type="text" id="inputNama" 
                                        name="inputNama" 
                                        class="form-control"
                                        value="<?php echo $data->nama ?>">
                            </div>
                            <div class="form-grup mt-3">
                                <label for="inputNik" class="text-dark font-weight-bold">NIK/NIP</label>
                                <input type="text" id="inputNik" name="inputNik" class="form-control"
                                    minlength="4" maxlength="16" required onkeypress="return event.charCode >= 48 && event.charCode <=57"
                                    value="<?php echo $data->nik ?>"
                                >
                            </div>
                            <div class="form-check-inline row">
                                <div class="form-grup mt-3 col-sm">
                                    <label for="position" class="text-dark font-weight-bold">Position</label>
                                    <input type="text" id="position" 
                                        name="position" 
                                        class="form-control"
                                        value="<?php echo $data->jabatan ?>" required >
                                </div>
                                <div class="form-grup mt-3 col-sm">
                                    <label for="inputNik" class="text-dark font-weight-bold">Unit Division</label>
                                    <input type="text" id="unit_division" 
                                        name="unit_division" 
                                        class="form-control"
                                        value="<?php echo $data->bagian ?>" required >
                                </div>
                            </div>

                            <div class="form-check-inline row">
                                <div class="form-grup mt-3 col-sm">
                                    <label for="itemName" class="text-dark font-weight-bold">Item Name</label>
                                    <input type="text" id="itemName" 
                                        name="itemName" 
                                        class="form-control"
                                        value="<?php echo $data->item ?>" required >
                                </div>
                                <div class="form-grup mt-3 col-sm">
                                    <label for="itemID" class="text-dark font-weight-bold">Item ID</label>
                                    <input type="text" 
                                        name="itemID" 
                                        class="form-control"
                                        value="<?php echo $data->item_id ?>" required >
                                </div>
                            </div>
                            <div class="form-grup mt-3">
                                <label for="description" class="text-dark font-weight-bold">Description</label>
                                <textarea id="description" 
                                    name="description" class="form-control" cols="30" rows="10"><?php echo $data->description ?></textarea>
                            </div>
                        </div>

                        <div class="form-grup mt-3">
                            <label for="" class="text-dark font-weight-bold">Used For</label>
                            <select name="kategori" class="form-control" value="<?php echo $data->kategori ?>">
                                <option>Surat Serah Terima</option>
                                <option>Peminjaman</option>
                            </select>
                        </div>

                        <div class="form-grup  mt-3">
                            <label for="">Signature</label>
                            <p style="border:solid 1px teal;width:355px;height:110px;"><img src="<?php echo base_url('assets/signature/' . $data->nik . '.png'); ?>"></p>
                            <p style="color: red;">*if you want to edit signature, you must delete the submission</p>
                        </div>
                        <div class="modal-footer  mt-3">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="SUBMIT" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<?php } ?>
