<div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Surat Tanda Terima</h1>
                    </div>
<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Riwayat Surat Tanda Terima</h6>
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
                                                    <button class="tombol bg-warning text-white" data-toggle="modal">
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