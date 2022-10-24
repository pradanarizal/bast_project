<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Hardware Signature</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <table id="myTable" class="display">
                <thead>
                    <tr>
                        <th>Ticket Number</th>
                        <th>Recommendation</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($requestor as $data) {
                        if ($data['approval_notes'] != "" && $data['status'] == "finish" && $data['nip'] == "" && $data['approval_notes'] != "-") {
                            $id = $data['id_request'];
                    ?>
                            <tr>
                                <td><?php echo $data['no_tiket']; ?></td>
                                <td><?php echo $data['approval_notes']; ?></td>
                                <td>
                                    <a href="<?php echo base_url('manager/actionSignature?id=' . $id); ?>">
                                        <button class="tombol bg-success text-white" title="Review">
                                            <font style="font-weight: bold;">
                                                Signature
                                            </font>
                                        </button>
                                    </a>
                                </td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>