        <!-- Modal Software -->

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
                                        <label for="inputNama">NAMA</label>
                                        <input type="text" id="inputNama" name="nama_brg" class="form-control">
                                    </div>
                                    <div class="form-grup mt-3">
                                        <label for="inputNik">NIK/NIP</label>
                                        <input type="text" id="inputNik" name="keterangan" class="form-control">
                                    </div>

                                    <div class="form-grup mt-3">
                                        <label for="">CATEGORY</label><br>
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
                                        <label for="">TTD</label>
                                        <input type="file" name="gambar" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer  mt-3">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
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
                                        <label for="inputNama">NAMA</label>
                                        <input type="text" id="inputNama" name="nama_brg" class="form-control">
                                    </div>
                                    <div class="form-grup mt-3">
                                        <label for="inputNik">NIK/NIP</label>
                                        <input type="text" id="inputNik" name="keterangan" class="form-control">
                                    </div>

                                    <div class="form-grup mt-3">
                                        <label for="">CATEGORY</label><br>
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
                                        <label for="">TTD</label>
                                        <input type="file" name="gambar" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer  mt-3">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                <button type="SUBMIT" class="btn btn-primary">Save changes</button>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>