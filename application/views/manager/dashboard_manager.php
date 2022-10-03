                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">BERANDA</h1>
                    </div>

                    <div class="mb-4">
                        <table class="tabel" border="0" cellpadding="10px">
                            <tr>
                                <td>
                                    <div class=" box bg-primary shadow">
                                        <i class="fa fa-edit fa-2x"></i>
                                        <p>Total Permintaan Approve</p>
                                        <h3>30</h3>
                                    </div>
                                </td>
                                <td>
                                    <div class="card box bg-danger shadow">
                                        <i class="fa fa-edit fa-2x mb-2"></i>
                                        <p>Total Permintaan Ditolak</p>
                                        <h3>30</h3>
                                    </div>
                                </td>
                                <td>
                                    <div class="card box bg-success shadow">
                                        <i class="fa fa-edit fa-2x mb-2"></i>
                                        <p>Total Permintaan Diterima</p>
                                        <h3>30</h3>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Riwayat Pengajuan</h6>
                        </div>
                        <div class="card-body">

                            <?php
                            $no = 1;
                            if ($requestor) {
                            ?>
                                <table id="myTable" class="display">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No.Tiket</th>
                                            <th>Nama Barang</th>
                                            <th>Requestor</th>
                                            <th>Bagian</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($requestor as $data) {
                                            $nik = $data['nik']
                                        ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $data['no_tiket']; ?></td>
                                                <td><?php echo $data['nama_barang']; ?></td>
                                                <td><?php echo $data['nama']; ?></td>
                                                <td><?php echo $data['bagian']; ?></td>
                                                <td>
                                                    <button class="tombol bg-warning text-white" data-toggle="modal" data-target="#modalReview<?php echo $data['nik']; ?>">
                                                        <font style="font-weight: bold;">
                                                            <i class="fa fa-eye"></i>
                                                        </font>
                                                    </button>
                                                    <button class="tombol bg-success text-white" data-toggle="modal" data-target="#modalAcc">
                                                        <font style="font-weight: bold;">
                                                            <i class="fa fa-check"></i>
                                                        </font>
                                                    </button>
                                                    <button class="tombol bg-danger text-white pl-2 pr-2" data-toggle="modal" data-target="#modalReject">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            <?php
                            } else {
                                echo "<h1>Riwayat Kosong!</h1>";
                            }
                            ?>
                        </div>
                    </div>
                </div>


                <?php
                foreach ($requestor as $data) {
                    $nik = $data['nik'];
                    $nama = $data['nama'];
                ?>
                    <div id="modalReview<?php echo $nik ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tolak Pengajuan</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <form class="form-horizontal" method="post" action="<?php //echo base_url().'admin/suplier/edit_suplier'
                                                                                    ?>">
                                    <div class="modal-body">
                                        <input name="kode" type="hidden" value="<?php echo $nik; ?>">
                                        <div class="form-group">
                                            <label class="control-label col-xs-3">Nama Suplier</label>
                                            <div class="col-xs-9">
                                                <input name="nama" class="form-control" type="text" placeholder="Nama Suplier..." value="<?php echo $nik; ?>" style="width:280px;" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-xs-3">Alamat</label>
                                            <div class="col-xs-9">
                                                <input name="alamat" class="form-control" type="text" placeholder="Alamat..." value="<?php echo $nama; ?>" style="width:280px;" required>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                                        <button type="submit" class="btn btn-info">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>


                <!-- modal reject -->
                <div class="modal fade" id="modalReject" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tolak Pengajuan</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">Tolak Pengajuan ini?</div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                <a class="btn btn-primary" href="#">Tolak</a>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <!-- /.container-fluid -->

                <!-- Modal Acc -->
                <div class="modal fade" id="modalAcc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Terima</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Tanggal Request</p>
                                <form action="#" method="POST">
                                    <input class="form-control" type="date" name="tglRequest" id="tglRequest" placeholder="dd/mm/yyyy">
                                </form>

                                <br>

                                <p>Catatan</p>
                                <form action="#" method="POST">
                                    <textarea class="form-control" type="text" name="tglRequest" id="tglRequest" placeholder="Masukkan Catatan"></textarea>
                                </form>
                                <br>
                                <p>Approval Authorization</p>
                                <form action="#" method="POST">
                                    <input type="radio" name="jeniskelamin" value="Laki-Laki" id="laki-laki" />
                                    <label for="laki-laki">(A) Approved</label> <br>
                                    <input type="radio" name="jeniskelamin" value="Perempuan" id="perempuan" />
                                    <label for="perempuan">(R) Rejected</label><br>
                                    <input type="radio" name="jeniskelamin" value="Perempuan" id="perempuan" />
                                    <label for="perempuan">(N) Revision Needed</label>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                <a class="btn btn-primary" href="">Simpan</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Main Content -->