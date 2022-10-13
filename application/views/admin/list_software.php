<div class="mr-4 ml-4">
    <!-- Content Row -->
    <div class="row">
        <div class="container-fluid">
            <?php
            foreach ($requestor as $data) {
            ?>
                <h2>
                    Add Software
                    <br>Ticket Number : <?php echo $data['no_tiket']; ?>
                    <br>Requestor : <?php echo $data['nama']; ?>
                    <!-- <br>Executor :
                    <?php
                    //$nipExe = "-";
                    //$namaExe = "-";
                    //foreach ($executor as $exe) {
                    //if ($data['nip_executor'] == $exe['nip_executor']) {
                    //$nipExe = $exe['nip_executor'];
                    //$namaExe = $exe['nama_executor'];
                    //}
                    //}
                    //echo "$namaExe ($nipExe)";
                    ?> -->
                </h2>
            <?php } ?>
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="float-left">
                        <button class="btn btn-md btn-success  mb-3" data-toggle="modal" data-target="#addSoftware"><i class="fas fa-plus fa-sm mr-2"></i>Add Software</button>
                    </div>
                    <!-- data table -->
                    <table id="myTable" class="display">
                        <thead>
                            <tr>
                                <th>Software</th>
                                <th>Version</th>
                                <th>Notes</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($softwares as $data) {
                            ?>
                                <tr>
                                    <td><?php echo $data['nama_software']; ?></td>
                                    <td><?php echo $data['version']; ?></td>
                                    <td><?php echo $data['notes']; ?></td>
                                    <td>
                                        <button class="tombol bg-danger text-white" data-toggle="modal" data-target="#deleteSoftware<?php echo $data['id_software']; ?>" title="Delete">
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
</div>

<!-- Modal add Software -->
<form action="<?php echo site_url('admin/insertSoftware'); ?>" method="POST" enctype="multipart/form-data">
    <div class="modal fade" id="addSoftware" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Add Software</h5>
                    <button type="button red" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="form-group mt-3">
                        <input type="text" name="tiket" value="<?php echo $tiket; ?>" hidden>
                        <input type="text" name="idRequest" value="<?php echo $id_request; ?>" hidden>
                        <label for="software">Software</label>
                        <select class="form-control" name="software" id="software">
                            <option selected disabled>-- Choose Software --</option>
                            <?php
                            $num = 0;
                            while ($num <= count($software) - 1) {
                            ?>
                                <option value="<?php echo $software[$num]; ?>"><?php echo $software[$num]; ?></option>
                            <?php
                                $num++;
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group mt-3">
                        <label for="version">Version</label>
                        <input class="form-control" type="text" name="version" id="version">
                    </div>
                    <div class="form-group mt-3">
                        <label for="version">Notes</label>
                        <textarea class="form-control" name="notes" id="notes" cols="30" rows="10"></textarea>
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

<!-- Modal Delete -->
<?php
foreach ($softwares as $data) {
?>
    <form action="<?php echo site_url('admin/deleteSoftware?software=' . $data['nama_software'] . '&tiket=' . $tiket . '&idRequest=' . $id_request); ?>" method="POST" enctype="multipart/form-data">
        <div class="modal fade" id="deleteSoftware<?php echo $data['id_software'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-danger">
                        <h5 class="modal-title text-white" id="exampleModalLabel">Delete Software</h5>
                        <button type="button red" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        Delete <?php echo $data['nama_software']; ?>?
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