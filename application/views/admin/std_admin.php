<div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">BERANDA</h1>
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
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($requestor as $data) {
                                        ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $data['no_tiket']; ?></td>
                                                <td><?php echo $data['nama_barang']; ?></td>
                                                <td><?php echo $data['nama']; ?></td>
                                                <td><?php echo $data['bagian']; ?></td>
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