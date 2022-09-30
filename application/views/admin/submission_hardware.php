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
                                    $nik = $data['nik'];
                                    if ($data['tipe_pengajuan'] == "hardware" ) {   
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
                                <?php } } ?>
                            </tbody>
                        </table>
                    <?php
                    } else {
                        echo "<h1>Riwayat Kosong!</h1>";
                    }
                    ?>
                </div>
            </div>

            <button class="btn btn-md btn-primary mb-3" data-toggle="modal" data-target="#tambahHardware"><i class="fas fa-plus fa-sm mr-2"></i>Tambah Barang</button>

        </div>
    </div>
</div>
<!-- /.container-fluid -->
<!-- End of Main Content -->
</div>