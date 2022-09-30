<div class="mr-4 ml-4">
    <!-- Content Row -->
    <div class="row">

        <div class="container-fluid">
            <div class="card shadow mb-4">
                <div class="card-body">

                    <?php
                    $no = 1;
                    if ($requestor) {
                    ?>
                        <!-- dropdown -->
                        <div class="dropdown1">
                            <form action="<?php echo base_url('admin/pengajuan_software') ?>">
                                <button>
                                    <a>Add Form</a>
                                </button>
                            </form>
                        </div>
                        <!-- data table -->
                        <table id="myTable" class="display">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No.Ticket</th>
                                    <th>NIK/NIP</th>
                                    <th>Category</th>
                                    <th>Description</th>
                                    <th>Unit/Division</th>
                                    <th>Create Date</th>
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
                                        <td><?php echo $data['nik']; ?></td>
                                        <td><?php echo $data['tipe_pengajuan']; ?></td>
                                        <td><?php echo $data['keluhan']; ?></td>
                                        <td><?php echo $data['jabatan']; ?></td>
                                        <!-- tanggal belum sinkron -->
                                        <td><?php echo $data['nama']; ?></td>
                                        <td>
                                            <button class="tombol bg-warning text-white" data-toggle="modal">
                                                <font style="font-weight: bold;">
                                                    <i class="fa fa-eye"></i>
                                                </font>
                                            </button>
                                            <button class="tombol bg-primary text-white" data-toggle="modal" data-target="#modalAcc">
                                                <font style="font-weight: bold;">
                                                    <i class="fa fa-edit"></i>
                                                </font>
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

            <button class="btn btn-md btn-primary mb-3" data-toggle="modal" data-target="#tambahBarang"><i class="fas fa-plus fa-sm mr-2"></i>Tambah Barang</button>

        </div>

        <!-- Modal -->
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

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">No Ticket</label>
                                    <input type="email" class="form-control" id="inputEmail4" placeholder="input no ticket">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">No Request</label>
                                    <input type="password" class="form-control" id="inputPassword4" placeholder="input no request">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">Tanggal</label>
                                    <input type="password" class="form-control" id="inputdate" placeholder="input tanggal">
                                </div>
                            </div>

                            <div class="request">
                                <h5 class="text-dark mt-3 text-center font-weight-bold">Requestor</h5>
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
                                    <!-- <input type="text" name="kategori" class="form-control"> -->
                                </div>
                                <div class="form-grup mt-3">
                                    <label for="">UNIT DIVISION</label>
                                    <input type="text" name="stok" class="form-control">
                                </div>
                                <div class="form-grup mt-3">
                                    <label for="">No Asset/Inventaris/Serial Number</label>
                                    <input type="text" name="stok" class="form-control">
                                </div>
                                <div class="form-grup mt-3">
                                    <label for="">Description of Needs</label>
                                    <input type="text" name="stok" class="form-control">
                                </div>
                                <div class="form-grup  mt-3">
                                    <label for="">TTD</label>
                                    <input type="file" name="gambar" class="form-control">
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

    </div>
</div>
<!-- /.container-fluid -->
<!-- End of Main Content -->
</div>