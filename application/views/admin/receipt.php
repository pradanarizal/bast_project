<div class="mr-4 ml-4">
    <!-- Content Row -->
    <div class="row">
        <div class="card-header justify-content-start">
            <h3 class=" font-weight-bold text-dark">Surat Tanda Terima</h3>
        </div>
        <div class="container-fluid">
            <div class="card shadow mb-4">
                <div class="card-body">
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
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                        <?php 
                            foreach ($receipt as $data) :
                        ?>
                            <tr>
                                <td><?php echo $data->no_tiket ;?></td>
                                <td><?php echo $data->nama ;?></td>
                                <td><?php echo $data->nik ?></td>
                                <td><?php echo $data->item ?></td>
                                <td><?php echo $data->kategori ?></td>
                                <td><?php echo $data->description ?></td>
                                <td><?php echo $data->date ?></td>
                                <td>
                                    <button class="tombol bg-primary text-white"
                                        data-toggle="modal" 
                                        data-target="#editReceipt_modal<?php echo $data->id_receipt ?>">
                                        <div style="font-weight: bold;">
                                            <i class="fa fa-edit text-white"></i>
                                        </div>
                                    </button>
                                    <button class="tombol bg-danger text-white" data-toggle="modal"> 
                                        <?php // echo base_url('admin/print_receipt') ?>
                                            <i class="fa fa-print"></i>
                                    </button>
                                    
                                </td>
                            </tr>
                            <?php endforeach ; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            
            <div class="float-right">
                <button class="btn btn-md btn-success mt-3 mb-3" data-toggle="modal" data-target="#addReceipt"><i class="fas fa-plus fa-sm mr-2"></i>Add New Receipt</button>
            </div>
        </div>
    </div>
</div>