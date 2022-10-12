<?php $no = 0;
foreach ($detail as $pend) : $no++; ?>
    <div id="modal-show<?= $pend->no_tiket; ?>" class="modal fade">
        <div class="modal-dialog">
            <form>
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title text-white">Formulir Requestor Pengecekan PC/Laptop</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">

                        <table class="table">
                            <tr>
                                <td><label for="no_tiket">No. Document</label></td>
                                <td><input type="text" readonly value="" name="no_tiket" class="form-control" required=""></td>
                            </tr>

                            <tr>
                                <td><label for="TanggalTerbit">Tanggal Terbit</label></td>
                                <td><input type="text" readonly value="<?= $pend->tanggal_request; ?>" name="TanggalTerbit" class="form-control" required=""></td>
                            </tr>

                            <tr>
                                <td><label for="TanggalRequest">Tanggal Request</label></td>
                                <td><input type="text" readonly value="<?= $pend->tanggal_request; ?>" name="TanggalRequest" class="form-control" required=""></td>
                            </tr>

                            <tr>
                                <td><label for="nik">NIK / NIPP</label></td>
                                <td><input type="text" readonly value="<?= $pend->nik; ?>" name="nik" class="form-control" required=""></td>
                            </tr>

                            <tr>
                                <td><label for="nama">Nama</label></td>
                                <td><input type="text" readonly value="<?= $pend->nama; ?>" name="nama" class="form-control" required=""></td>
                            </tr>

                            <tr>
                                <td><label for="jabatan">Jabatan</label></td>
                                <td><input type="text" readonly value="<?= $pend->jabatan; ?>" name="jabatan" class="form-control" required=""></td>
                            </tr>

                            <tr>
                                <td><label for="bagian">Bagian</label></td>
                                <td><input type="text" readonly value="<?= $pend->bagian; ?>" name="bagian" class="form-control" required=""></td>
                            </tr>

                            <tr>
                                <td><label for="no_tiket">No. Ticket</label></td>
                                <td><input type="text" readonly value="<?= $pend->no_tiket; ?>" name="no_tiket" class="form-control" required=""></td>
                            </tr>

                            <tr>
                                <td><label for="no_aset">No. Asset</label></td>
                                <td><input type="text" readonly value="<?= $pend->no_aset; ?>" name="no_aset" class="form-control" required=""></td>
                            </tr>

                            <tr>
                                <td><label for="keluhan">Keluhan</label></td>
                                <td><textarea readonly id="keluhan" name="keluhan" class="form-control" cols="30" rows="10"> <?php echo $pend->keluhan;?></textarea></td>
                                
                            </tr>

                        </table>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Kembali</button>
                        </div>
                    </div>
                    <!-- akhir body-->
            </form>
        </div>
    </div>
    </div>
<?php endforeach; ?>