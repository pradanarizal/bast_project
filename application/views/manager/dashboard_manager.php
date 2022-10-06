                <?php
                $approved = 0;
                $process = 0;
                $pending = 0;
                $revision = 0;
                $rejected = 0;
                foreach ($requestor as $data) {
                    if ($data['tipe_pengajuan'] == "software") {
                        if ($data['status'] == "approved") {
                            $approved++;
                        } elseif ($data['status'] == "pending") {
                            $pending++;
                        } elseif ($data['status'] == "process") {
                            $process++;
                        } elseif ($data['status'] == "revision") {
                            $revision++;
                        } else {
                            $rejected++;
                        }
                    }
                }
                ?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">DASHBOARD</h1>
                    </div>

                    <div class="mb-4">
                        <table class="tabel" border="0" cellpadding="10px">
                            <tr>
                                <td>
                                    <div class=" box bg-primary shadow">
                                        <i class="fa fa-edit fa-2x"></i>
                                        <p>Pending Submission</p>
                                        <h3><?php echo $process; ?></h3>
                                    </div>
                                </td>
                                <td>
                                    <div class="card box bg-danger shadow">
                                        <i class="fa fa-edit fa-2x mb-2"></i>
                                        <p>Revision Submission</p>
                                        <h3><?php echo $revision; ?></h3>
                                    </div>
                                </td>
                                <td>
                                    <div class="card box bg-success shadow">
                                        <i class="fa fa-edit fa-2x mb-2"></i>
                                        <p>Approved Submission</p>
                                        <h3><?php echo $approved; ?></h3>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Submission</h6>
                        </div>
                        <div class="card-body">
                            <table id="myTable" class="display">
                                <thead>
                                    <tr>
                                        <th>No.Tiket</th>
                                        <th>Requestor</th>
                                        <th>Needs</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($requestor as $data) {
                                        if ($data['tipe_pengajuan'] == "software") {
                                            if ($data['status'] != "pending") {
                                                $id = $data['id_request'];
                                    ?>
                                                <tr>
                                                    <td><?php echo $data['no_tiket']; ?></td>
                                                    <td><?php echo $data['nama']; ?></td>
                                                    <td><?php echo $data['keluhan']; ?></td>
                                                    <td><?php echo $data['status']; ?></td>
                                                    <?php
                                                    if ($data['status'] == "process") {
                                                    ?>
                                                        <td>
                                                            <button class="tombol bg-warning text-white" onClick="newWindow = window.open('<?php echo base_url('manager/reviewReq?id=' . $id); ?>');newWindow.print();">
                                                                <font style="font-weight: bold;">
                                                                    <i class="fa fa-eye"></i>
                                                                </font>
                                                            </button>
                                                            <button class="tombol bg-success text-white" data-toggle="modal" data-target="#modalAcc<?php echo $data['id_request']; ?>">
                                                                <font style="font-weight: bold;">
                                                                    <i class="fa fa-check"></i>
                                                                </font>
                                                            </button>
                                                            <button class="tombol bg-primary text-white" data-toggle="modal" data-target="#modalRevision<?php echo $data['id_request']; ?>">
                                                                <font style="font-weight: bold;">
                                                                    <i class="fa fa-sync-alt"></i>
                                                                </font>
                                                            </button>
                                                            <button class="tombol bg-danger text-white pl-2 pr-2" data-toggle="modal" data-target="#modalReject<?php echo $data['id_request']; ?>">
                                                                <i class="fa fa-times"></i>
                                                            </button>
                                                        </td>
                                                    <?php

                                                    } else {
                                                    ?>
                                                        <td>
                                                            <button class="tombol bg-warning text-white" onClick="newWindow = window.open('<?php echo base_url('manager/reviewReq?id=' . $id); ?>');newWindow.print();">
                                                                <font style="font-weight: bold;">
                                                                    <i class="fa fa-eye"></i>
                                                                </font>
                                                            </button>
                                                            <button class="tombol bg-danger text-white" data-toggle="modal" data-target="#modalCancel<?php echo $data['id_request']; ?>">
                                                                <font style="font-weight: bold;">
                                                                    Cancel
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

                <!-- ========================= Modal Review ============================== -->
                <!-- tambah kode di samping buat modal -> data-toggle="modal" data-target="#modalReview<?php //echo $data['nik']; 
                                                                                                        ?>" -->
                <?php
                // foreach ($requestor as $data) {
                //     $nik = $data['nik'];
                //     $nama = $data['nama'];
                ?>
                <!-- <div id="modalReview<?php //echo $nik 
                                            ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
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
                                        <input name="kode" type="hidden" value="<?php //echo $nik; 
                                                                                ?>">
                                        <div class="form-group">
                                            <label class="control-label col-xs-3">Nama Suplier</label>
                                            <div class="col-xs-9">
                                                <input name="nama" class="form-control" type="text" placeholder="Nama Suplier..." value="<?php //echo $nik; 
                                                                                                                                            ?>" style="width:280px;" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-xs-3">Alamat</label>
                                            <div class="col-xs-9">
                                                <input name="alamat" class="form-control" type="text" placeholder="Alamat..." value="<?php //echo $nama; 
                                                                                                                                        ?>" style="width:280px;" required>
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
                    </div> -->
                <?php
                // }
                ?>


                <!-- modal reject -->
                <?php
                foreach ($requestor as $data) {
                    $id = $data['id_request'];
                    $nama = $data['nama'];
                    $tiket = $data['no_tiket'];
                ?>
                    <div class="modal fade" id="modalReject<?php echo $id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Submission Reject</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">this action will reject the submission with tiket number <?php echo $tiket; ?>? do you want to continue?</div>
                                <form action="<?php echo base_url('manager/reject'); ?>" method="POST">
                                    <input type="text" name="id" value="<?php echo $id; ?>" hidden>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                        <input class="btn btn-primary" type="submit" name="submit" value="Reject">
                                </form>
                            </div>
                        </div>
                    </div>
                    </div>
                <?php } ?>
                <!-- /.container-fluid -->

                <!-- modal revision -->
                <?php
                foreach ($requestor as $data) {
                    $id = $data['id_request'];
                    $nama = $data['nama'];
                    $tiket = $data['no_tiket'];
                ?>
                    <div class="modal fade" id="modalRevision<?php echo $id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Submission Revision</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    To revise <?php echo $nama; ?> submission with ticket number <?php echo $tiket; ?>, you must fill in the following notes <br><br>
                                    <form action="<?php echo base_url('manager/revision'); ?>" method="POST">
                                        <input type="text" name="id" value="<?php echo $id; ?>" hidden>
                                        <textarea class="form-control" type="text" name="notes" id="notes" placeholder="Notes..." required></textarea>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                    <input class="btn btn-primary" type="submit" name="submit" value="Revision">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <!-- /.container-fluid -->


                <!-- modal cancel -->
                <?php
                foreach ($requestor as $data) {
                    $id = $data['id_request'];
                    $nama = $data['nama'];
                    $tiket = $data['no_tiket'];
                ?>
                    <div class="modal fade" id="modalCancel<?php echo $id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Submission Revision</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    This action will cancel the approval of ticket number <?php echo $tiket; ?>? are you sure you want to continue? <br><br>
                                    <form action="<?php echo base_url('manager/cancel'); ?>" method="POST">
                                        <input type="text" name="id" value="<?php echo $id; ?>" hidden>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                    <input class="btn btn-primary" type="submit" name="submit" value="Cancel Submission">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <!-- Modal Acc -->
                <?php
                foreach ($requestor as $data) {
                    $id = $data['id_request'];
                    $nama = $data['nama'];
                    $tiket = $data['no_tiket'];
                ?>
                    <div class="modal fade" id="modalAcc<?php echo $id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Approve</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Ticket Number : <?php echo $tiket; ?></p>
                                    <p>Requestor : <?php echo $nama; ?></p>
                                    <!-- <p>Date : <?php //echo date("d/m/Y"); 
                                                    ?></p> -->
                                    <p>Notes</p>
                                    <form action="<?php echo base_url('manager/approve'); ?>" method="POST">
                                        <input name="id" type="hidden" value="<?php echo $id; ?>">
                                        <input name="tanggal" type="hidden" value="<?php echo date("Y-m-d"); ?>">
                                        <textarea class="form-control" type="text" name="notes" id="notes" placeholder="Notes..."></textarea>

                                        <!-- <br>
                                        <p>Approval Authorization</p>
                                        <input type="radio" name="approval" value="approved" id="approved" checked />
                                        <label for="approved">(A) Approved</label> <br>
                                        <input type="radio" name="approval" value="rejected" id="rejected" />
                                        <label for="rejected">(R) Rejected</label><br>
                                        <input type="radio" name="approval" value="revision" id="revision" />
                                        <label for="revision">(N) Revision Needed</label> -->
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                    <input class="btn btn-primary" type="submit" name="submit" value="Save">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <!-- End of Main Content -->