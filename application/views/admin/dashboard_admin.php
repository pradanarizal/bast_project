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
<div class="mr-4 ml-4">
    <!-- Content Row -->
    <div class="row">
        <!-- Total Permintaan Instalasi Software -->
        <div class="col-xl-5 col-md-6 mb-4 pl-4 pr-4">
            <div class="card bg-success">
                <div class="card-body">
                    <div class="text">
                        Software Installation Submission
                    </div>

                    <div class="font">
                        <?php echo $software; ?>
                    </div>
                    <div class="container-box">
                        <div class="boxs">
                            Approved
                            <div class="hasil"><?php echo $aSoft; ?></div>
                        </div>
                        <div class="boxs">Process
                            <div class="hasil"><?php echo $pSoft; ?></div>
                        </div>
                        <div class="boxs">Rejected
                            <div class="hasil"><?php echo $rSoft; ?></div>
                        </div>
                    </div>

                    <!-- <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Total Permintaan Instalasi Software
                            </div>
                            <div class="align-items-center">
                                <div class="h1 mb-0 mr-3 font-weight-bold text-gray-800">11</div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>


        <!-- Total Permintaan Instalasi Software -->
        <div class="col-xl-5 col-md-6 mb-4 pl-4 pr-4">
            <div class="card bg-primary">
                <div class="card-body">
                    <div class="text">
                        Hardware Check Submission
                    </div>

                    <div class="font">
                        <?php echo $hardware; ?>
                    </div>
                    <div class="container-box">
                        <div class="boxs">
                            Approved
                            <div class="hasil"><?php echo $aHard; ?></div>
                        </div>
                        <div class="boxs">Process
                            <div class="hasil"><?php echo $pHard; ?></div>
                        </div>
                        <div class="boxs">Rejected
                            <div class="hasil"><?php echo $rHard; ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Permintaan Instalasi Software -->
        <div class="col-xl-5 col-md-6 mb-4 pl-4 pr-4">
            <div class="card bg-warning">
                <div class="card-body">
                    <div class="text">
                        All Submission
                    </div>

                    <div class="font">
                        <?php echo $all; ?>
                    </div>
                    <div class="container-box">
                        <div class="boxs">
                            Approved
                            <div class="hasil"><?php echo $aAll; ?></div>
                        </div>
                        <div class="boxs">Process
                            <div class="hasil"><?php echo $pAll; ?></div>
                        </div>
                        <div class="boxs">Rejected
                            <div class="hasil"><?php echo $rAll; ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- /.container-fluid -->


<!-- End of Main Content -->
</div>