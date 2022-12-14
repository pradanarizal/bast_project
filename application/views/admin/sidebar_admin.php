<title><?php echo $title ?></title>

<body id="page-top">

	<!-- Page Wrapper -->
	<div id="wrapper">

		<!-- Sidebar -->
		<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion toggled" id="accordionSidebar">
			<script>
				var externalContent = $('#page-top'),
					execOnResize = function() {
						if (window.innerWidth >= 992) {
							externalContent.addClass('show');
						} else {
							externalContent.removeClass('show');
						}
					};
				// the next line was only addded for jsfiddle       
				execOnResize();

				window.onresize = function(event) {
					execOnResize();
				};

				window.addEventListener('load', function() {
					execOnResize();
				})
			</script>
			<!-- Sidebar - Brand -->
			<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url('admin') ?>">
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
			<li class="nav-item <?= $this->uri->segment(2) == 'subsoftware' | $this->uri->segment(2) == 'subhardware' ? "active" : '' ?>">
				<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
					<i class="fas fa-fw fa-pen"></i>
					<span>Submission</span>
				</a>
				<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
					<div class="collapse-inner bg-gradient-primary rounded pt-1 pb-1">
						<a class="collapse-item" href="<?php echo base_url('admin/subsoftware') ?>">Software Installation</a>
						<a class="collapse-item" href="<?php echo base_url('admin/subhardware') ?>">Hardware Check</a>
					</div>
				</div>
			</li>

			<!-- Nav Item - Utilities Collapse Menu -->
			<li class="nav-item <?= $this->uri->segment(2) == 'receipt' ? "active" : '' ?>">
				<a class="nav-link" href="<?php echo base_url('admin/receipt') ?>">
					<i class="fas fa-fw fa-folder"></i>
					<span>BAST</span>
				</a>
				<div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">

				</div>
			</li>

			<!-- Nav Item - Pages Collapse Menu -->
			<li class="nav-item">
				<a class="nav-link" data-toggle="modal" href="#logoutModal">
					<i class="fas fa-fw fa-cog"></i>
					<span>Logout</span>
				</a>
			</li>
			<!-- Sidebar Toggler (Sidebar) -->
			<div class="text-center d-none d-md-inline">
				<button class="rounded-circle border-0" id="sidebarToggle"></button>
			</div>
		</ul>
		<!-- End of Sidebar -->
