<div class="mr-2 ml-2">
    <!-- Content Row -->
    <div class="row">
        <div class="card-header">
            <h3 class=" font-weight-bold text-dark">Receipt</h3>
        </div>
        <div class="container-fluid">
            <div class="card shadow mb-2">
                <div class="card-body">
                    <div class="float-left">
                        <button class="btn btn-md btn-success mb-3" data-toggle="modal" data-target="#addReceipt"><i class="fas fa-plus fa-sm mr-2"></i>Add New Receipt</button>
                    </div>
                    <table id="myTable" class="display">
                        <thead>
                            <tr>
                                <th>No.Ticket</th>
                                <th>Giver Name</th>
                                <th>NIK/NIP</th>
                                <th>Item Name</th>
                                <th>Use For</th>
                                <th>Description</th>
                                <th>Create Date</th>
                                <th width="15%">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            foreach ($receipt as $data) {
                                $id = $data->id_receipt;
                                $nik = $data->nik;
                                $nik_admin = $data->nik_admin;
                            ?>
                                <tr>
                                    <td><?php echo $data->no_tiket; ?></td>
                                    <td><?php echo $data->nama; ?></td>
                                    <td><?php echo $data->nik ?></td>
                                    <td><?php echo $data->item ?></td>
                                    <td><?php echo $data->kategori ?></td>
                                    <td><?php echo $data->description ?></td>
                                    <td><?php echo $data->date ?></td>
                                    <td>
                                        <button class="tombol bg-primary text-white" data-toggle="modal" data-target="#editReceipt_modal<?php echo $data->id_receipt ?>">
                                            <div style="font-weight: bold;">
                                                <i class="fa fa-edit text-white"></i>
                                            </div>
                                        </button>
                                        <button class="tombol bg-success text-white"> <?php echo anchor(
                                                                                            'admin/add_receiver?idReceipt=' . $data->id_receipt . '&nikAdmin=' . $data->nik_admin,
                                                                                            '<i class="fa fa-plus text-white"></i>'
                                                                                        ) ?>
                                        </button>
                                        <?php if ($data->nik_admin != "") { ?>
                                            <button class="tombol bg-warning text-white" onClick="newWindow = window.open('<?php echo base_url('admin/print_receipt?id=' . $id . '&nik=' . $nik . '&nikAdmin=' . $nik_admin); ?>');newWindow.print();">
                                                <i class="fa fa-print text-white"></i>
                                            </button>
                                        <?php } ?>
                                        <button class="tombol bg-danger text-white" data-toggle="modal" data-target="#deleteReceipt<?php echo $data->id_receipt; ?>">
                                            <div style="font-weight: bold;">
                                                <i class="fa fa-trash text-white"></i>
                                            </div>
                                        </button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
</div>