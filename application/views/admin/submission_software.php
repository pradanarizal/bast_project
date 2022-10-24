<div class="mr-4 ml-4">
    <!-- Content Row -->
    <div class="row">

        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4 judul-submission">
                <div class="mb-0 text-gray-800">Software Installation Submission</div>
            </div>

            <div class="card shadow mb-4">
                <div class="card-body">
                    <!-- data table -->
                    <div class="tombol-pengajuan">
                        <button class="btn btn-md btn-success mb-3" data-toggle="modal" data-target="#tambahBarang"><i class="fas fa-plus fa-sm mr-2"></i>Add New Submission</button>
                    </div>
                    <table id="myTable" class="display">
                        <thead>
                            <tr>
                                <th>No.Ticket</th>
                                <th>NIK/NIP</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Create Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($requestor as $data) {
                                $nik = $data->nik;
                                if ($data->tipe_pengajuan == "software") {
                                    if ($data->status == "pending" || $data->status == "revision" || $data->status == "approved" || $data->status == "rejected" || $data->status == "revision") {
                            ?>
                                        <tr>
                                            <td><?php echo $data->no_tiket; ?></td>
                                            <td><?php echo $data->nik; ?></td>
                                            <td><?php echo $data->nama; ?></td>
                                            <td><?php echo $data->keluhan; ?></td>
                                            <td><?php echo $data->status; ?></td>
                                            <td><?php echo date("d-m-Y",  strtotime($data->tanggal_request)); ?></td>
                                            <td align="center">

                                                <?php
                                                if ($data->status == "approved") { ?>
                                                    <!-- tombol view data dengan status = approved -->

                                                    <button class="tombol bg-warning text-white" title="Review" onClick="newWindow = window.open('<?php echo base_url('admin/reviewReq_software?idRequest=' . $data->id_request . '&noTiket=' . $data->no_tiket); ?>');newWindow.print();">
                                                        <font style="font-weight: bold;">
                                                            <i class="fa fa-eye"></i>
                                                        </font>
                                                    </button>

                                                <?php
                                                } else { ?>

                                                    <button class="tombol bg-primary text-white" data-toggle="modal" data-target="#editRequest<?php echo $data->id_request; ?>" title="Edit/Review">
                                                        <font style="font-weight: bold;">
                                                            <i class="fa fa-edit"></i>
                                                        </font>
                                                    </button>
                                                    <a href="<?php echo base_url('admin/addSoftware') . "?idRequest=" . $data->id_request . "&noTiket=" . $data->no_tiket; ?>">
                                                        <button class="tombol bg-warning text-white" title="Add Software">
                                                            <font style="font-weight: bold;">
                                                                <i class="fa fa-plus"></i>
                                                            </font>
                                                        </button>
                                                    </a>
                                                    <button class="tombol bg-danger text-white" data-toggle="modal" data-target="#deleteRequest<?php echo $data->id_request; ?>" title="Delete">
                                                        <font style="font-weight: bold;">
                                                            <i class="fa fa-trash"></i>
                                                        </font>
                                                    </button>
                                            </td>
                                        <?php
                                                }
                                        ?>
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