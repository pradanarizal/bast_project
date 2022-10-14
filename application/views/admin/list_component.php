<div class="mr-4 ml-4">
    <!-- Content Row -->
    <div class="row">
        <div class="container-fluid">
            <?php
            foreach ($requestor as $data) {
            ?>
                <h2>
                    Components Check
                    <br>Ticket Number : <?php echo $data['no_tiket']; ?>
                    <br>Requestor : <?php echo $data['nama']; ?>
                </h2>
            <?php } ?>
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="float-left">
                        <button class="btn btn-md btn-success  mb-3" data-toggle="modal" data-target="#check_component"><i class="fas fa-plus fa-sm mr-2"></i>Component Check</button>
                        <button class="btn btn-md btn-info  mb-3" data-toggle="modal" data-target="#forwardToManager"><i class="fas fa-forward fa-sm mr-2"></i>Executor</button>
                    </div>
                    <!-- data table -->
                    <table id="myTable" class="display">
                        <thead>
                            <tr>
                                <th>Component</th>
                                <th>Status</th>
                                <th>Problem</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($komponen as $data) {
                            ?>
                                <tr>
                                    <td><?php echo $data['komponen']; ?></td>
                                    <td><?php echo $data['status_hardware']; ?></td>
                                    <td><?php echo $data['problem']; ?></td>
                                    <td align="center">
                                        <button class="tombol bg-danger text-white" data-toggle="modal" data-target="#deletehardware<?php echo $data['id_hardware']; ?>" title="Delete">
                                            <font style="font-weight: bold;">
                                                <i class="fa fa-trash"></i>
                                            </font>
                                        </button>
                                    </td>
                                </tr>
                            <?php
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<!-- End of Main Content -->



<!-- Modal add component -->
<form action="<?php echo site_url('admin/component_check'); ?>" method="POST" enctype="multipart/form-data">
    <div class="modal fade" id="check_component" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Add Components to Check</h5>
                    <button type="button red" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="form-group mt-3">
                        <input type="text" name="tiket" value="<?php echo $tiket; ?>" hidden>
                        <input type="text" name="idRequest" value="<?php echo $id_request; ?>" hidden>
                        <label for="component">Component</label>
                        <select class="form-control" name="component" id="component" required>
                            <option value="" selected disabled>-- Choose Component --</option>
                            <?php
                            $num = 0;
                            while ($num <= count($component) - 1) {
                            ?>
                                <option value="<?php echo $component[$num]; ?>"><?php echo $component[$num]; ?></option>
                            <?php
                                $num++;
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group mt-3">

                        <div class="w-100">
                            <label for="status_hardware">Status</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status_komponen" id="status_komponen1" value="OK" checked>
                            <label class="form-check-label" for="status_komponen1">OK</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status_komponen" id="status_komponen2" value="NOK">
                            <label class="form-check-label" for="status_komponen2">NOK</label>
                        </div>

                    </div>

                    <div class="form-group mt-3">
                        <label for="version">Problem</label>
                        <textarea class="form-control" name="problem" id="problem" cols="30" rows="10"></textarea>
                    </div>

                    <div class="modal-footer  mt-3">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="SUBMIT" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- End of modal add component -->

<!-- Modal Delete -->
<?php
foreach ($komponen as $data) {
?>
    <form action="<?php echo site_url('admin/delete_component?hardware=' . $data['komponen'] . '&noTiket=' . $tiket . '&idRequest=' . $id_request); ?>" method="POST" enctype="multipart/form-data">
        <div class="modal fade" id="deletehardware<?php echo $data['id_hardware'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-danger">
                        <h5 class="modal-title text-white" id="exampleModalLabel">Delete Component</h5>
                        <button type="button red" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        Delete <?php echo $data['komponen']; ?> ?
                    </div>
                    <div class="modal-footer  mt-3">
                        <button type="button" class="btn" data-dismiss="modal">Close</button>
                        <button type="SUBMIT" class="btn btn-danger">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
<?php } ?>
<!-- End of modal delete -->

<!-- Modal add executor -->
<form action="<?php echo site_url('admin/add_executor?idRequest=' . $id_request . '&noTiket=' . $tiket); ?>" method="POST" enctype="multipart/form-data">

    <div class="modal fade" id="forwardToManager" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Forward to Manager</h5>
                    <button type="button red" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <h4>Input Executor who executes this submission</h4>
                    <div class="form-group mt-3">
                        <input class="form-control" type="text" name="component_count" value="<?php echo count($komponen); ?>" hidden>
                        <label for="nik">NIP/NIK</label>
                        <input class="form-control" type="text" name="nik" id="nik" required>
                    </div>
                    <div class="form-group mt-3">
                        <label for="name">Admin Name</label>
                        <input class="form-control" type="text" name="name" id="name" required>
                    </div>
                    <div class="form-group mt-3">
                        <label for="position">Position</label>
                        <input class="form-control" type="text" name="position" id="position" required>
                    </div>
                    <div class="form-group mt-3">
                        <label for="division">Division</label>
                        <input class="form-control" type="text" name="division" id="division" required>
                    </div>
                    <div class="modal-footer  mt-3">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="SUBMIT" class="btn btn-primary">Forward</button>
                    </div>
                </div>

            </div>

        </div>
    </div>
</form>

<!-- End of add executor -->