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

    <div class="mb-4">

        <!-- Content Row -->
        <div class="row_sadmin">
            <div class="card_sadmin first bg-success">
                <div class="card_content_sadmin">
                    <i class="fa fa-user fa-3x"></i>
                    <p>Total User Super Admin</p>
                    <h2><?php echo $sadmin; ?></h2>
                </div>
            </div>
            <div class="card_sadmin second bg-primary">
                <div class="card_content_sadmin">
                    <i class="fa fa-user fa-3x"></i>
                    <p>Total User Admin</p>
                    <h2><?php echo $admin; ?></h2>
                </div>
            </div>
            <div class="card_sadmin three bg-warning">
                <div class="card_content_sadmin">
                    <i class="fa fa-user fa-3x"></i>
                    <p>Total User Manager</p>
                    <h2><?php echo $manager; ?></h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Content -->

</div>
<!-- End Main Content -->