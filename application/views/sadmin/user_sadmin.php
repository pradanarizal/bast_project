<!-- Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h2 class="h3 mb-0 text-gray-800">User</h2>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <?php
            $count = 0;
            foreach ($user as $data) {
                $count = $count + 1;
            } ?>

            <div class="float-left">
                <button class="btn btn-md btn-success  mb-3" data-toggle="modal" data-target="#modalAdd<?php echo $data->nip ?>"><i class="fas fa-plus fa-sm mr-2"></i>Add New User</button>
            </div>

            <table id="myTable" class="display">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIP</th>
                        <th>Nama</th>
                        <th>Role</th>
                        <th>Password</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $count = 0;
                    foreach ($user as $data) {
                        $count = $count + 1;
                    ?>
                        <tr>
                            <td><?php echo $count ?></td>
                            <td><?php echo $data->nip ?></td>
                            <td><?php echo $data->nama ?></td>
                            <td><?php echo $data->role ?></td>
                            <td><?php echo md5($data->password) ?></td>
                            <td>
                                <button class="tombol bg-warning text-white" data-toggle="modal" title="Edit" data-target="#modalEdit<?php echo $data->nip ?>">
                                    <i class="fa fa-edit"></i>
                                </button>
                                <button class="tombol bg-danger text-white pl-2 pr-2" data-toggle="modal" title="Delete" data-target="#deleteModal<?php echo $data->nip ?>">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

        </div>
    </div>

</div>
<!-- /Content -->
</div>
<!-- End Main Content -->

<!-- Modal Delete-->
<?php
foreach ($user as $data) {
    $nip = $data->nip;
    $nama = $data->nama;
    $role = $data->role;
    $password = $data->password;
?>
    <div class="modal fade" id="deleteModal<?php echo $data->nip ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Data</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure delete data?
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="<?php echo base_url() ?>sadmin/deleteData/<?php echo $data->nip ?>">Delete</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<!-- Modal Edit -->
<?php
foreach ($user as $data) {
    $nip = $data->nip;
    $nama = $data->nama;
    $role = $data->role;
    $password = $data->password;
?>
    <div class="modal fade" id="modalEdit<?php echo $data->nip ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Change User</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="<?php echo base_url('sadmin/changeData') ?>" method="POST">
                        <div class="request">
                            <div class="card">
                                <div class="form-grup mt-3">
                                    <label for="nip">NIP</label>
                                    <input type="text" value="<?php echo $data->nip; ?>" name="nip" class="form-control" disabled>
                                    <input type="hidden" value="<?php echo $data->nip; ?>" name="nip">
                                </div>

                                <div class="form-grup mt-3">
                                    <label for="nama">Nama</label>
                                    <input type="text" value="<?php echo $data->nama; ?>" name="nama" class="form-control">
                                </div>
                                <div class="form-grup mt-3">
                                    <label for="role">Role</label>
                                    <select id="role" name="role" class="form-control" required>
                                        <option value="admin" <?php if ($data->role == 'admin') {
                                                                    echo "selected";
                                                                } ?>>Admin</option>
                                        <option value="sadmin" <?php if ($data->role == 'sadmin') {
                                                                    echo "selected";
                                                                } ?>>Super Admin</option>
                                        <option value="manager" <?php if ($data->role == 'manager') {
                                                                    echo "selected";
                                                                } ?>>Manager</option>
                                    </select>
                                </div>
                                <div class="form-grup mt-3">
                                    <label for="password">Password</label>
                                    <input type="password" value="<?php echo $data->password; ?>" name="password" class="form-control">
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <input class="btn btn-primary" type="submit" name="submit" value="Save">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<!-- Modal Tambah Data -->
<?php
foreach ($user as $data) {
    $nip = $data->nip;
    $nama = $data->nama;
    $role = $data->role;
    $password = $data->password;
?>
    <div class="modal fade" id="modalAdd<?php echo $nip ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="<?php echo base_url('sadmin/InsertData') ?>" method="POST">
                        <div class="request">
                            <div class="card">
                                <div class="form-grup mt-3">
                                    <label for="">NIP</label>
                                    <input type="text" id="nip" name="nip" class="form-control" required minlength="4" maxlength="10" onkeypress="return event.charCode >= 48 && event.charCode <=57">
                                </div>

                                <div class="form-grup mt-3">
                                    <label for="">Nama</label>
                                    <input type="text" id="nama" name="nama" class="form-control" required>
                                </div>
                                <div class="form-grup mt-3">
                                    <label for="">Role</label>
                                    <!-- <input type="text" id="role" name="role" class="form-control" required> -->
                                    <select id="role" name="role" class="form-control" required>
                                        <option value="admin">Admin</option>
                                        <option value="sadmin">Super Admin</option>
                                        <option value="manager">Manager</option>
                                    </select>
                                </div>
                                <div class="form-grup mt-3">
                                    <label for="">Password</label>
                                    <input type="text" id="password" name="password" class="form-control" required>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <input class="btn btn-primary" type="submit" name="submit" value="Save">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php } ?>