<?php
$software = 0;
$aSoft = 0;
$pSoft = 0;
$rSoft = 0;
$hardware = 0;
$aHard = 0;
$pHard = 0;
$rHard = 0;
$all = 0;
$aAll = 0;
$pAll = 0;
$rAll = 0;
foreach ($request as $data) {
    if ($data['tipe_pengajuan'] == 'software') {
        $software++;
        if ($data['status'] == "approved") {
            $aSoft++;
        } elseif ($data['status'] == "process") {
            $pSoft++;
        } elseif ($data['status'] == "rejected") {
            $rSoft++;
        }
    } else {
        $hardware++;
        if ($data['status'] == "approved") {
            $aHard++;
        } elseif ($data['status'] == "process") {
            $pHard++;
        } elseif ($data['status'] == "rejected") {
            $rHard++;
        }
    }
    $all = $software + $hardware;
    $aAll = $aSoft + $aHard;
    $pAll = $pSoft + $pHard;
    $rAll = $rSoft + $rHard;
}
?>
<!-- Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h2 class="h3 mb-0 text-gray-800">Dashboard</h2>
    </div>

    <div class="mb-4">

        <!-- Content Row -->
        <div class="row_admin">
            <div class="card_admin first bg-success">
                <div class="card_content_admin">
                    <p>Software Installation Submission</p>
                    <h2><?php echo $software; ?></h2>
                </div>
                <div class="items">
                    <div class="item_admin">
                        Approved
                        <div class="hasil"><?php echo $aSoft; ?></div>
                    </div>
                    <div class="item_admin">
                        Process
                        <div class="hasil"><?php echo $aSoft; ?></div>
                    </div>
                    <div class="item_admin">
                        Rejected
                        <div class="hasil"><?php echo $aSoft; ?></div>
                    </div>
                </div>
            </div>
            <div class="card_admin second bg-primary">
                <div class="card_content_admin">
                    <p>Hardware Check Submission</p>
                    <h2><?php echo $hardware; ?></h2>
                </div>
                <div class="items">
                    <div class="item_admin">
                        Approved
                        <div class="hasil"><?php echo $aHard; ?></div>
                    </div>
                    <div class="item_admin">
                        Process
                        <div class="hasil"><?php echo $aHard; ?></div>
                    </div>
                    <div class="item_admin">
                        Rejected
                        <div class="hasil"><?php echo $aHard; ?></div>
                    </div>
                </div>
            </div>
            <div class="card_admin three bg-warning">
                <div class="card_content_admin">
                    <p>All Submission</p>
                    <h2><?php echo $all; ?></h2>
                </div>
                <div class="items">
                    <div class="item_admin">
                        Approved
                        <div class="hasil"><?php echo $aAll; ?></div>
                    </div>
                    <div class="item_admin">
                        Process
                        <div class="hasil"><?php echo $aAll; ?></div>
                    </div>
                    <div class="item_admin">
                        Rejected
                        <div class="hasil"><?php echo $aAll; ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->