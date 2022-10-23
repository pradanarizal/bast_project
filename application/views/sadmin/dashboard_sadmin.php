<?php
$admin = 0;
$sadmin = 0;
$manager = 0;
foreach ($user as $data) {
    if ($data->role == "admin") {
        $admin++;
    } elseif ($data->role == "manager") {
        $manager++;
    } else {
        $sadmin++;
    }
}
// }
?>

<!-- Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h2 class="h3 mb-0 text-gray-800">Dashboard</h2>
    </div>



    <!-- content -->

    <div class="mb-4 wrap-jumlah-pengajuan">
        <div class="row_admin">

            <div class="box bg-primary jumlah-user">
                <i class="fa fa-user fa-3x"></i>
                <p>Amount of Super Admin</p>
                <h3><?php echo $sadmin; ?></h3>
            </div>

            <div class="card box bg-danger jumlah-user">
                <i class="fa fa-user fa-3x"></i>
                <p>Amount of Admin</p>
                <h3><?php echo $admin; ?></h3>
            </div>

            <div class="card box bg-success jumlah-user">
                <i class="fa fa-user fa-3x"></i>
                <p>Amount of Manager</p>
                <h3><?php echo $manager; ?></h3>
            </div>

        </div>
    </div>

    <!-- end of content -->

</div>
<!-- /Content -->

</div>
<!-- End Main Content -->