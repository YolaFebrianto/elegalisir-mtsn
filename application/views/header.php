<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>SI Legalisir Online</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="shortcut icon" href="<?=base_url();?>template/dist/img/logo_mini.png">
	<!-- bootstrap 3.3.6 -->
	<link rel="stylesheet" href="<?=base_url();?>template/bootstrap/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?=base_url();?>template/bootstrap/css/font-awesome.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?=base_url();?>template/dist/css/AdminLTE.min.css">
	<!-- AdminLTE Skins. Choose a skin from the css/skins
	folder instead of downloading all of them to reduce the load. -->
	<link rel="stylesheet" href="<?=base_url();?>template/dist/css/skins/_all-skins.min.css">
	<!-- iCheck -->
	<link rel="stylesheet" href="<?=base_url();?>template/plugins/iCheck/flat/blue.css">
	<!-- Morris chart -->
	<link rel="stylesheet" href="<?=base_url();?>template/plugins/morris/morris.css">
	<!-- jvectormap -->
	<link rel="stylesheet" href="<?=base_url();?>template/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
	<!-- Date Picker -->
	<link rel="stylesheet" href="<?=base_url();?>template/plugins/datepicker/datepicker3.css">
	<!-- Daterange picker -->
	<link rel="stylesheet" href="<?=base_url();?>template/plugins/daterangepicker/daterangepicker.css">
	<!-- bootstrap wysihtml5 - text editor -->
	<link rel="stylesheet" href="<?=base_url();?>template/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
	<style type="text/css">
		@media screen and (min-width: 1080px){
			.table-responsive {
				overflow-x: hidden;
			}
		}
		/*.skin-blue .main-header .navbar{
			background: #32642D;
		}
		.skin-blue .main-header .logo{
			background: #224820;
		}
		.content-wrapper, .right-side{
			background: #D0FED0;
		}
		.skin-blue .sidebar-menu>li.header{
			background: #224820;
			color: white;
		}
		.skin-blue .wrapper, 
		.skin-blue .main-sidebar, 
		.skin-blue .left-side{
			background: #224820;
		}
		.skin-blue .sidebar-menu>li:hover>a, 
		.skin-blue .sidebar-menu>li.active>a{
			background: #32642D;
			border-left-color: white;
		}
		.box.box-info,.box.box-primary{
			border-top-color: green;
		}
		.skin-blue .main-header .navbar .sidebar-toggle:hover{
			background: #224820;
		}
		.skin-blue .main-header .logo:hover{
			background: #32642D;
		}*/
		.pagination>.active>a, 
		.pagination>.active>a:focus, 
		.pagination>.active>a:hover, 
		.pagination>.active>span, 
		.pagination>.active>span:focus, 
		.pagination>.active>span:hover{
			background: green;
			border-color: green;
		}
		.dataTables_wrapper .dataTables_paginate .paginate_button{
			padding: 0 !important;
		}
		/* MODAL VERTICAL CENTER */
		.vertical-alignment-helper {
			display:table;
			height: 100%;
			width: 100%;
			pointer-events:none; /* This makes sure that we can still click outside of the modal to close it */
		}
		.vertical-align-center {
			/* To center vertically */
			display: table-cell;
			vertical-align: middle;
			pointer-events:none;
		}
		.modal-content {
			/* Bootstrap sets the size of the modal in the modal-dialog class, we need to inherit it */
			width:inherit;
			max-width:inherit; /* For Bootstrap 4 - to avoid the modal window stretching full width */
			height:inherit;
			/* To center horizontally */
			margin: 0 auto;
			pointer-events: all;
		}
	</style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<?php
	$dataUser=[];
	if ($this->session->userdata('username') != '') {
		$where = [
			'nik' => $this->session->userdata('username'),
		];
		$dataUser = $this->db->get_where('tbl_user',$where)->row_array();
	}
?>
<div class="wrapper">
	<header class="main-header">
		<!-- Logo -->
		<a href="<?php echo base_url(); ?>" class="logo">
			<!-- mini logo for sidebar mini 50x50 pixels -->
			<span class="logo-mini"><b>SILO</b></span>
			<!-- logo for regular state and mobile devices -->
			<span class="logo-lg"><b>SI</b>LO</span>
		</a>
		<!-- Header Navbar: style can be found in header.less -->
		<nav class="navbar navbar-static-top">
			<!-- Sidebar toggle button-->
			<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
				<span class="sr-only">Toggle navigation</span>
			</a>

			<div class="navbar-custom-menu">
				<ul class="nav navbar-nav">
					<li>
						<a href="<?php echo base_url('/'); ?>"><?php echo @$dataUser['nik']; ?></a>
					</li>
					<li>
						<a href="#" data-toggle="modal" data-target="#modalLogout"><span class="fa fa-sign-in"></span> Logout</a>
					</li>
				</ul>
			</div>
		</nav>
	</header>
	<!-- Left side column. contains the logo and sidebar -->
	<aside class="main-sidebar">
		<!-- sidebar: style can be found in sidebar.less -->
		<section class="sidebar">
			<!-- Sidebar user panel -->
			<div class="user-panel">
				<div class="pull-left image">
					<?php if (!empty($dataUser['gambar'])) { ?>
					<img src="<?=base_url().'template/uploads/'.@$dataUser['gambar'];?>" class="img-circle" alt="User Image">
					<?php } else { ?>
					<img src="<?=base_url();?>template/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
					<?php } ?>
				</div>
				<div class="pull-left info">
					<p><?php echo @$dataUser['nik']; ?></p>
					<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
				</div>
			</div>
			<!-- sidebar menu: : style can be found in sidebar.less -->
			<?php
				$uri1 = $this->uri->segment(1);
			?>
			<ul class="sidebar-menu">
				<li class="header">MAIN NAVIGATION</li>
				<li <?php echo ($uri1=='dashboard' OR empty($uri1))?'class="active"':''; ?>>
					<a href="<?php echo base_url('/'); ?>">
						<i class="fa fa-home"></i> <span>Beranda</span>
					</a>
				</li>
				<li <?php echo($uri1=='legalisir')?'class="active"':'';?>>
					<a href="<?php echo base_url('legalisir'); ?>">
						<i class="fa fa-file-text-o"></i> <span>Legalisir</span>
					</a>
				</li>
				<?php
					if(@$dataUser['level']==1){
				?>
				<li <?php echo($uri1=='user')?'class="active"':'';?>>
					<a href="<?php echo base_url('user'); ?>">
						<i class="fa fa-user"></i> <span>Data User</span>
					</a>
				</li>
				<li <?php echo($uri1=='setting')?'class="active"':'';?>>
					<a href="<?php echo base_url('setting'); ?>">
						<i class="fa fa-cogs"></i> <span>Data Setting</span>
					</a>
				</li>
				<?php
					}
				?>
				<li>
					<a href="#" data-toggle="modal" data-target="#modalLogout">
						<i class="fa fa-sign-in"></i> <span>Logout</span>
					</a>
				</li>
			</ul>
		</section>
		<!-- /.sidebar -->
	</aside>
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<section class="content" style="min-height:0;padding-top:0;padding-bottom:0;">
			<div class="row">
				<div class="col-md-12">
					<?php if($this->session->flashdata('info') != null): ?>
					<div class="alert alert-success alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-info"></i> Success!</h4>
						<?=$this->session->flashdata('info');?>
					</div>
					<?php endif; ?>	
					<?php if($this->session->flashdata('error') != null): ?>
					<div class="alert alert-danger alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-ban"></i> Error!</h4>
						<?=$this->session->flashdata('error');?>
					</div>
					<?php endif; ?>
				</div>
			</div>
		</section>
<!-- Modal -->
<div class="modal fade bd-example-modal-sm" id="modalLogout" tabindex="-1" role="dialog" aria-labelledby="modalLogoutLabel" aria-hidden="true">
	<div class="vertical-alignment-helper">
		<div class="modal-dialog modal-sm vertical-align-center" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="modalLogoutLabel" style="text-align:center;">
						Peringatan !!!
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</h4>
				</div>
				<div class="modal-body">
					<p style="text-align:center;font-weight:bold;">
						Apakah anda yakin akan logout ?
					</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">
						<span class="fa fa-times"></span> Tidak
					</button>
					<a href="<?php echo base_url('auth/logout'); ?>" class="btn btn-primary">
						<span class="fa fa-check"></span> Ya
					</a>
				</div>
			</div>
		</div>
	</div>
</div>