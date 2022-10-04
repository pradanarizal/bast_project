<!-- Modal Hardware -->
<form action="<?php echo site_url('admin/simpan_hardware') ?>" method="POST" enctype="multipart/form-data">
    <div class="modal fade" id="tambahHardware" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Form Pengajuan Hardware</h5>
                    <button type="button red" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="<?php echo site_url() . 'admin/simpan_hardware'; ?>" method="post" enctype="multipart/form-data">
                        <h5 class="text-dark mt-3 text-center font-weight-bold">Formulir Pengecekan PC/Laptop</h5>
                        <div class="card">
                            <div class="form-row">
                                <div class="form-group mt-3">
                                    <label for="noticket">No Ticket</label>
                                    <input type="text" class="form-control" name="noticket" id="noticket" placeholder="Input No. Ticket" required>
                                </div>

                                <div class="form-group mt-3">
                                    <label for="norequest">No Request</label>
                                    <input type="text" class="form-control" name="norequest" id="norequest" placeholder="Input No. Request" required>
                                </div>
                            </div>

                            <div class="form-grup mt-3">
                                <label for="requestdate">Request Date</label>
                                <input type="date" id="requestdate" name="requestdate" class="form-control">
                            </div>
                        </div>

                        <div class="request">
                            <h5 class="text-dark mt-3 text-center font-weight-bold">Requestor</h5>
                            <div class="card">

                                <div class="form-grup mt-3">
                                    <label for="inputnama">Name</label>
                                    <input type="text" id="inputnama" name="inputnama" class="form-control" required>
                                </div>
                                <div class="form-grup mt-3">
                                    <label for="inputnik">NIK/NIP</label>
                                    <input type="text" id="inputnik" name="inputnik" class="form-control" required>
                                </div>

                                <div class="form-grup mt-3">
                                    <label for="inputdivisi">Unit / Division</label>
                                    <input type="text" id="inputdivisi" name="inputdivisi" class="form-control" required>
                                </div>
                                <div class="form-grup mt-3">
                                    <label for="position">Position</label>
                                    <input type="text" id="position" name="position" class="form-control" required>
                                </div>
                                <div class="form-grup mt-3">
                                    <label for="no_asset">No Asset / Inventaris / Serial Number</label>
                                    <input type="text" id="no_asset" name="no_asset" class="form-control" required>
                                </div>
                                <div class="form-grup mt-3">
                                    <label for="keluhan">Description of Complains</label>
                                    <textarea name="keluhan" id="keluhan" class="form-control" cols="30" rows="10"></textarea>
                                </div>
                                <div class="form-grup  mt-3">
                                    <label for="ttd">Signature</label>
                                    <!-- <input type="file" name="ttd" id="ttd" class="form-control-file"> -->
                                    <form method="post" action="process.php" enctype="multipart/form-data">
                                        <div id="signature-pad">
                                            <div style="border:solid 1px teal; width:360px;height:110px;padding:3px;position:relative;">
                                                <div id="note" onmouseover="my_function();">The signature should be inside box</div>
                                                <canvas id="the_canvas" width="350px" height="100px"></canvas>
                                            </div>
                                            <div style="margin:10px;">
                                                <input type="hidden" id="signature" name="signature">
                                                <button type="button" id="clear_btn" class="btn btn-danger" data-action="clear">Clear</button>
                                                <button type="submit" id="save_btn" class="btn btn-success" data-action="save-png">Save</button>
                                            </div>
                                        </div>
                                        <form>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer  mt-3">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="SUBMIT" class="btn btn-primary">Save changes</button>
                        </div>
                </div>
</form>
</div>
</div>
</div>

<!-- End of modal software -->

<!-- Modal Software -->
<div class="modal fade" id="tambahBarang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="exampleModalLabel">Form Pengajuan Software</h5>
                <button type="button red" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="<?php echo base_url() . 'admin/data_barang/tambah_aksi'; ?>" method="post" enctype="multipart/form-data">
                    <h5 class="text-dark mt-3 text-center font-weight-bold">Formulir Permintaan Instalasi Software</h5>
                    <div class="card">
                        <div class="form-row">
                            <div class="form-group mt-3">
                                <label for="inputEmail4">No Ticket</label>
                                <input type="email" class="form-control" id="inputEmail4" placeholder="input no ticket">
                            </div>
                            <div class="form-group mt-3">
                                <label for="inputPassword4">No Request</label>
                                <input type="password" class="form-control" id="inputPassword4" placeholder="input no request">
                            </div>
                        </div>

                        <div class="form-grup mt-3">
                            <label for="inputNama">Request Date</label>
                            <input type="date" id="inputNama" name="nama_brg" class="form-control">
                        </div>
                    </div>

                    <div class="request">
                        <h5 class="text-dark mt-3 text-center font-weight-bold">Requestor</h5>
                        <div class="card">

                            <div class="form-grup mt-3">
                                <label for="inputNama">Name</label>
                                <input type="text" id="inputNama" name="nama_brg" class="form-control">
                            </div>
                            <div class="form-grup mt-3">
                                <label for="inputNik">NIK/NIP</label>
                                <input type="text" id="inputNik" name="keterangan" class="form-control">
                            </div>

                            <div class="form-grup mt-3">
                                <label for="">Category</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                    <label class="form-check-label" for="inlineCheckbox1">Operating System</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                    <label class="form-check-label" for="inlineCheckbox2">Microsoft Office</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3">
                                    <label class="form-check-label" for="inlineCheckbox3">Software Design</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3">
                                    <label class="form-check-label" for="inlineCheckbox3">Lainnya</label>
                                </div>

                            </div>

                            <div class="form-grup mt-3">
                                <label for="">Unit / Division</label>
                                <input type="text" name="stok" class="form-control">
                            </div>
                            <div class="form-grup mt-3">
                                <label for="">Position</label>
                                <input type="text" name="stok" class="form-control">
                            </div>
                            <div class="form-grup mt-3">
                                <label for="">No Asset / Inventaris / Serial Number</label>
                                <input type="text" name="stok" class="form-control">
                            </div>
                            <div class="form-grup mt-3">
                                <label for="">Description of Needs</label>
                                <textarea name="" class="form-control" cols="30" rows="10"></textarea>
                            </div>
                            <div class="form-grup  mt-3">
                                <label for="">Signature</label>
                                <!-- <input type="file" name="gambar" class="form-control"> -->
                                <form method="post" action="process.php" enctype="multipart/form-data">
                                    <div id="signature-pad">
                                        <div style="border:solid 1px teal; width:360px;height:110px;padding:3px;position:relative;">
                                            <div id="note" onmouseover="my_function();">The signature should be inside box</div>
                                            <canvas id="the_canvas" width="350px" height="100px"></canvas>
                                        </div>
                                        <div style="margin:10px;">
                                            <input type="hidden" id="signature" name="signature">
                                            <button type="button" id="clear_btn" class="btn btn-danger" data-action="clear">Clear</button>
                                            <button type="submit" id="save_btn" class="btn btn-success" data-action="save-png">Save</button>
                                        </div>
                                    </div>
                                    <form>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer  mt-3">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="SUBMIT" class="btn btn-primary">Save changes</button>
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>
<script>
    var wrapper = document.getElementById("signature-pad");
    var clearButton = wrapper.querySelector("[data-action=clear]");
    var savePNGButton = wrapper.querySelector("[data-action=save-png]");
    var canvas = wrapper.querySelector("canvas");
    var el_note = document.getElementById("note");
    var signaturePad;
    signaturePad = new SignaturePad(canvas);
    clearButton.addEventListener("click", function(event) {
        document.getElementById("note").innerHTML = "The signature should be inside box";
        signaturePad.clear();
    });
    savePNGButton.addEventListener("click", function(event) {
        if (signaturePad.isEmpty()) {
            alert("Please provide signature first.");
            event.preventDefault();
        } else {
            var canvas = document.getElementById("the_canvas");
            var dataUrl = canvas.toDataURL();
            document.getElementById("signature").value = dataUrl;
        }
    });

    function my_function() {
        document.getElementById("note").innerHTML = "";
    }
</script>
</body>

</html>