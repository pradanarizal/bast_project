<form action="<?php echo site_url('admin/simpan_receipt') ?>" method="POST" enctype="multipart/form-data">

    <div class="modal fade" id="addReceipt" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary justify-content-center">
                    <h4 class="modal-title text-white text-justify" id="exampleModalLabel">Formulir Tanda Terima</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-light">&times;</span>
                    </button>
                </div>

                <div class="modal-body" id="signature-pad">

                    <form action="<?php echo site_url() . 'admin/receipt_save'; ?>" method="post" enctype="multipart/form-data">
                        <div class="card mb-3">
                            <div class="form-group mt-3">
                                <label for="inputEmail4">No Ticket</label>
                                <input type="text" name="no_tiket" class="form-control" id="inputEmail4" placeholder="input no ticket" minlength="4" required onkeypress="return event.charCode >= 48 && event.charCode <=57">
                            </div>
                        </div>

                        <div class="card giver-content">
                            <div class="tittle bg-primary">
                                <h5 class="text-light mt-3 text-center font-weight-bold">GIVER</h5>
                            </div>
                            <div class="form-grup mt-3">
                                <label for="inputNama" class="text-dark font-weight-bold">Receiver Name</label>
                                <input type="text" id="inputNama" name="inputNama" class="form-control" required>
                            </div>
                            <div class="form-grup mt-3">
                                <label for="inputNik" class="text-dark font-weight-bold">NIK/NIP</label>
                                <input type="text" id="inputNik" minlength="4" maxlength="16" name="inputNik" class="form-control" required minlength="10" maxlength="16" required onkeypress="return event.charCode >= 48 && event.charCode <=57">
                            </div>
                            <div class="form-check-inline row">
                                <div class="form-grup mt-3 col-sm">
                                    <label for="position" class="text-dark font-weight-bold">Position</label>
                                    <input type="text" id="position" name="position" class="form-control" required>
                                </div>
                                <div class="form-grup mt-3 col-sm">
                                    <label for="unit_division" class="text-dark font-weight-bold">Unit Division</label>
                                    <input type="text" id="unit_division" name="unit_division" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-check-inline row">
                                <div class="form-grup mt-3 col-sm">
                                    <label for="itemName" class="text-dark font-weight-bold">Item Name</label>
                                    <input type="text" id="itemName" name="itemName" class="form-control" required>
                                </div>
                                <div class="form-grup mt-3 col-sm">
                                    <label for="itemID" class="text-dark font-weight-bold">Item ID</label>
                                    <input type="text" name="itemID" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-grup mt-3">
                                <label for="description" class="text-dark font-weight-bold">Description</label>
                                <textarea id="description" name="description" class="form-control" cols="30" rows="10"><?php // echo $data->description 
                                                                                                                        ?></textarea>
                            </div>
                            <div class="form-grup mt-3">
                                <label for="" class="text-dark font-weight-bold">Used For</label>
                                <select name="kategori" class="form-control">
                                    <option>Surat Serah Terima</option>
                                    <option>Peminjaman</option>
                                </select>
                            </div>

                            <div class="form-grup mt-3">
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
                        </div>

                        <!-- <div class="card mt-3 receipt-content">
                        <div class="tittle bg-primary">
                            <h5 class="text-light mt-3 text-center font-weight-bold">RECEIVER</h5>
                        </div>
                        <div class="form-check-inline row">
                            <div class="form-grup mt-3 col-sm">
                                <label for="itemName" class="text-dark font-weight-bold">NIK/NIP</label>
                                <input type="text" id="nik"  class="form-control"
                                    name="nik_receiver"
                                    >
                            </div>
                            <div class="form-grup mt-3 col-sm">
                                <label for="itemID" class="text-dark font-weight-bold">Nama</label>
                                <input type="text" class="form-control"
                                    name="nama_receiver" 
                                    >
                            </div>
                        </div>
                        <div class="form-check-inline row" style="width=100%;">
                            <div class="form-grup mt-3 col-sm">
                                <label for="inputNama" class="text-dark font-weight-bold">Position</label>
                                <input type="text" id="position" 
                                    name="position_receiver" 
                                    class="form-control"
                                    >
                            </div>
                            <div class="form-grup mt-3 col-sm">
                                <label for="inputNik" class="text-dark font-weight-bold">Unit Division</label>
                                <input type="text" id="unit_division" 
                                    name="division_receiver" 
                                    class="form-control"
                                    >
                            </div>
                        </div>
                    </div>

                    <div class="form-grup mt-3">
                        <label for="" class="text-dark font-weight-bold">Used For</label>
                        <select name="kategori" class="form-control">
                            <option>Surat Serah Terima</option>
                            <option>Peminjaman</option>
                        </select>
                    </div> -->

                        <!-- <div class="form-grup mt-3" id="signature-pad1">
                        <label for="">Signature</label>
                        <div style="border:solid 1px teal; width:360px;height:110px;padding:3px;position:relative;">
                            <div id="note1" onmouseover="my_function();">The signature should be inside box</div>
                            <canvas id="the_canvas1" width="350px" height="100px"></canvas>
                        </div>
                        <div style="margin:10px;">
                            <input type="hidden" id="signature1" name="signature1">
                            <button type="button" id="clear_btn" class="btn btn-danger" data-action="clear1">Clear</button>
                        </div>
                    </div> -->

                        <div class="modal-footer  mt-3">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" id="save_btn" class="btn btn-primary" data-action="save-png">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</form>