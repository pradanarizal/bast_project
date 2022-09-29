<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-body">

            <?php
            $no = 1;
            if ($requestor) {
            ?>
                <!-- dropdown -->
                <div class="dropdown1">
                    <form action="/admin/dashboard_admin.php">
                        <select class="formulir" id="formulir" name="formulir">
                            <option value="software">Formulir Permintaan Installasi Software</option>
                            <option value="hardware">Formulir Pengecekan PC/Laptop</option>
                        </select>
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
</div>

</div>