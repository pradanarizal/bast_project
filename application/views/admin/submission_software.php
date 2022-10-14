<div class="mr-4 ml-4">
    <!-- Content Row -->
    <div class="row">

        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h2 class="h3 mb-0 text-gray-800">Software Installation Submission</h2>
            </div>

            <div class="card shadow mb-4">
                <div class="card-body">
                    <!-- data table -->
                    <div class="float-left">
                        <button class="btn btn-md btn-success  mb-3" data-toggle="modal" data-target="#tambahBarang"><i class="fas fa-plus fa-sm mr-2"></i>Add New Submission</button>
                    </div>
                    <table id="myTable" class="display">
                        <thead>
                            <tr>
                                <th>No.Ticket</th>
                                <th>NIK/NIP</th>
                                <th>Name</th>
                                <th>Unit/Division</th>
                                <th>Description</th>
                                <th>Create Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($requestor as $data) {
                                $nik = $data->nik;
                                if ($data->tipe_pengajuan == "software") {
                                    if ($data->status != "process" && $data->status != "rejected") {
                            ?>
                                        <tr>
                                            <td><?php echo $data->no_tiket; ?></td>
                                            <td><?php echo $data->nik; ?></td>
                                            <td><?php echo $data->nama; ?></td>
                                            <td><?php echo $data->jabatan; ?></td>
                                            <td><?php echo $data->keluhan; ?></td>
                                            <td><?php echo date("d-m-Y",  strtotime($data->tanggal_request)); ?></td>
                                            <td>

                                                <button class="tombol bg-warning text-white" data-toggle="modal" data-target="#editRequest<?php echo $data->id_request; ?>" title="Edit/Review">
                                                    <font style="font-weight: bold;">
                                                        <i class="fa fa-edit"></i>
                                                    </font>
                                                </button>

                                                <a href="<?php echo base_url('admin/addSoftware') . "?idRequest=" . $data->id_request . "&noTiket=" . $data->no_tiket; ?>">
                                                    <button class="tombol bg-primary text-white" title="Add Software">
                                                        <font style="font-weight: bold;">
                                                            <i class="fa fa-plus"></i>
                                                        </font>
                                                    </button>
                                                </a>

                                                <!-- <button class="tombol bg-success text-white" data-toggle="modal" data-target="#modalAcc" title="Forward to Manager">
                                                <font style="font-weight: bold;">
                                                    <i class="fa fa-forward"></i>
                                                </font>
                                            </button> -->

                                                <button class="tombol bg-danger text-white" data-toggle="modal" data-target="#deleteRequest<?php echo $data->id_request; ?>" title="Delete">
                                                    <font style="font-weight: bold;">
                                                        <i class="fa fa-trash"></i>
                                                    </font>
                                                </button>

                                            </td>
                                        </tr>
                            <?php
                                    }
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>



        </div>
    </div>
</div>
<!-- /.container-fluid -->

<!-- End of Main Content -->
</div>