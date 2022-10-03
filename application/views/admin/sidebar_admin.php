<title><?php echo $title?></title>
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <img class="img-sidebar" src="<?php echo base_url('assets/img/logo.png') ?>">
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Menu
            </div>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?= $this->uri->segment(2) == '' ? "active" : '' ?>">
                <a class="nav-link" href="<?php echo base_url('admin') ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item <?= $this->uri->segment(2) == 'submission' ? "active" : '' ?>">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-pen"></i>
                    <span>Submission</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="collapse-inner rounded">
                        <h6 class="collapse-header" >Select Submission :</h6>
                        <a class="collapse-item" href="<?php echo base_url('admin/submission') ?>">Software Instalation</a>
                        <a class="collapse-item" href="<?php echo base_url('admin/submission') ?>">Hardware Check</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu --> 
            <li class="nav-item">
                <a class="nav-link">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Recipt</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">

                </div>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link">
                    <!-- <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages"> -->
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Logout</span>
                </a>
                <!-- <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="collapse-inner rounded">
                        <h6 class="collapse-header">Login Screens :</h6>
                        <a class="collapse-item" href="#">Login</a>
                        <a class="collapse-item" href="#">Register</a>
                        <a class="collapse-item" href="#">Forgot Password</a>
                        <hr class="sidebar-divider">
                        <h6 class="collapse-header">Other Pages :</h6>
                        <a class="collapse-item" href="#">404 Page</a>
                        <a class="collapse-item" href="#">Blank Page</a>
                    </div>
                </div> -->
            </li>
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->