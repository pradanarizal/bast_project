<div class="mr-4 ml-4">
    <!-- Content Row -->
    <div class="row">

        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h2 class="h3 mb-0 text-gray-800">Hardware Check Submission</h2>
            </div>
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="float-left">
                        <button class="btn btn-md btn-success  mb-3" data-toggle="modal" data-target="#tambahHardware"><i class="fas fa-plus fa-sm mr-2"></i>Add New Submission</button>
                    </div>
                    <!-- data table -->
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
                                if ($data->tipe_pengajuan == "hardware") {
                            ?>
                                    <tr>
                                        <td><?php echo $data->no_tiket; ?></td>
                                        <td><?php echo $data->nik; ?></td>
                                        <td><?php echo $data->nama; ?></td>
                                        <td><?php echo $data->keluhan; ?></td>
                                        <td><?php echo $data->status; ?></td>
                                        <td><?php echo date("d-m-Y",  strtotime($data->tanggal_request)); ?></td>

                                        <?php
                                        if ($data->status == "finish") { ?>
                                            <!-- tombol view data dengan status = finish -->
                                            <td>
                                                <button class="tombol bg-primary text-white" title="Print" onClick="newWindow = window.open('<?php echo base_url('admin/reviewReq?idRequest=' . $data->id_request . '&noTiket=' . $data->no_tiket . '&nik_admin=' . $data->nik_admin); ?>');newWindow.print();">
                                                    <font style="font-weight: bold;">
                                                        <i class="fa fa-print"></i>
                                                    </font>
                                                </button>

                                                <button class="tombol bg-warning text-white" data-toggle="modal" data-target="#cancel_request<?php echo $data->id_request; ?>" title="Cancel finished submission">
                                                    <font style="font-weight: bold;">
                                                        <i class="fa fa-ban"></i>
                                                    </font>
                                                </button>

                                                <button class="tombol bg-danger text-white" data-toggle="modal" data-target="#deleteRequest<?php echo $data->id_request; ?>" title="Delete">
                                                    <font style="font-weight: bold;">
                                                        <i class="fa fa-trash"></i>
                                                    </font>
                                                </button>
                                            </td>
                                        <?php

                                        } else {
                                        ?>
                                            <td>
                                                <!-- tombol view data dengan status = pending && process -->

                                                <button class="tombol bg-primary text-white" data-toggle="modal" data-target="#editRequest<?php echo $data->id_request; ?>" title="Edit/Review">
                                                    <font style="font-weight: bold;">
                                                        <i class="fa fa-edit"></i>
                                                    </font>
                                                </button>

                                                <a href="<?php echo base_url('admin/hardware_check') . "?idRequest=" . $data->id_request . "&noTiket=" . $data->no_tiket; ?>">
                                                    <button class="tombol bg-warning text-white" title="Check Component">
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

                            <?php }
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


<!-- Modal Delete -->
<?php
foreach ($requestor as $data) {
?>
    <form action="<?php echo site_url('admin/cancel_request') ?>?idRequest=<?php echo $data->id_request; ?>&tipe_pengajuan=<?php echo $data->tipe_pengajuan; ?>" method="POST" enctype="multipart/form-data">

        <div class="modal fade" id="cancel_request<?php echo $data->id_request ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title text-white" id="exampleModalLabel">Cancel Finished Request</h5>
                        <button type="button red" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        Cancel Finished Request with ticket number <?php echo $data->no_tiket; ?> ?
                    </div>
                    <div class="modal-footer  mt-3">
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">No</button>
                        <button type="SUBMIT" class="btn btn-outline-primary">Yes</button>
                    </div>
                </div>
            </div>
        </div>

    </form>
<?php } ?>