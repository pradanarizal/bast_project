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
                <a class="nav-link" href="<?php echo base_url('manager') ?>">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Dashboard</span></a>
            </li>



            <!-- Nav Item - Tables -->
            <li class="nav-item <?= $this->uri->segment(2) == 'hardwareSignature' ? "active" : '' ?>">
                <a class="nav-link" href="<?php echo base_url('manager/hardwareSignature') ?>">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Hardware Signature</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-toggle="modal" href="#logoutModal">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Logout</span></a>
            </li>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center tombol-sidebar">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>

        <!-- End of Sidebar -->