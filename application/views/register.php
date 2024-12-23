<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>SI Legalisir Online | Daftar</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="shortcut icon" href="<?=base_url();?>template/dist/img/logo_mini.png">
	<!-- Bootstrap 3.3.6 -->
	<link rel="stylesheet" href="<?=base_url();?>template/bootstrap/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?=base_url();?>template/bootstrap/css/font-awesome.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?=base_url();?>template/dist/css/AdminLTE.min.css">
	<!-- iCheck -->
	<link rel="stylesheet" href="<?=base_url();?>template/plugins/iCheck/square/blue.css">
	<style type="text/css">
		#notif{
			background-color:#dd4b39;
			color:#fff;
			padding:6px 12px;
			font-size:14px;
		}
		/*.login-page{
			background: #D0FED0;
		}*/
        .bg::before {
            content: '';
            background-image: url("<?=base_url();?>template/dist/img/background.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
            position: absolute;
            z-index: -1;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            opacity: 0.15;
            filter:alpha(opacity=15);
            height:150%;
            width:100%;
        }
	</style>
</head>
<body class="hold-transition login-page bg">
	<div class="login-box">
		<div class="login-logo">
			<img src="<?=base_url();?>template/dist/img/logo.png" height="135px">
			<div><a href="#"><b>Daftar</b></a></div>
		</div>

		<div class="login-box-body">
			<?= form_open('auth/prosesRegister',['style'=>'margin-bottom:-15px;']) ?>
				<div class="form-group has-feedback">
					<input type="text" name="nik" class="form-control" placeholder="NIK" required="" value="<?php echo $this->session->flashdata('nik_register'); ?>">
					<span class="glyphicon glyphicon-user form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback">
					<input type="password" name="password" class="form-control" placeholder="Password">
					<span class="glyphicon glyphicon-lock form-control-feedback"></span>
					<span class="help-block text-muted">Jika dikosongi, passwordnya 12345</span>
				</div>
				<div class="form-group has-feedback">
					<input type="password" name="password2" class="form-control" placeholder="Ulangi Password">
					<span class="glyphicon glyphicon-lock form-control-feedback"></span>
					<span class="help-block text-muted">Jika dikosongi, passwordnya 12345</span>
				</div>
				<div class="form-group has-feedback">
					<input type="text" name="nama" class="form-control" placeholder="Nama" required="" value="<?php echo $this->session->flashdata('nama_register'); ?>">
					<span class="glyphicon glyphicon-tags form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback">
					<input type="text" name="nisn" class="form-control" placeholder="NISN (*Optional)" value="<?php echo $this->session->flashdata('nisn_register'); ?>">
					<span class="glyphicon glyphicon-qrcode form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback">
					<input type="email" name="email" class="form-control" placeholder="E-mail" required="" value="<?php echo $this->session->flashdata('email_register'); ?>">
					<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback">
					<input type="text" name="kontak" class="form-control" placeholder="No. HP" required="" value="<?php echo $this->session->flashdata('kontak_register'); ?>">
					<span class="glyphicon glyphicon-phone form-control-feedback"></span>
				</div>
				<input type="submit" name="btnregister" class="btn btn-success btn-block btn-flat" value="DAFTAR">
			<?= form_close(); ?>	
			<br>
			<div class="social-auth-links text-center">
				<?php if($this->session->flashdata('error') != ''): ?>
				<p id="notif">
					<?= $this->session->flashdata('error'); ?>
				</p>
				<?php endif; ?>
			</div>
			<a href="<?php echo base_url('auth/login'); ?>" class="btn btn-primary btn-block btn-flat" style="display: block;">
				LOGIN
			</a>
			<br>
			<p><center>Copyright <?php echo date('Y');?> <br/> All Right Reserved</center></p>
		</div>	
	</div>

	<!-- jQuery 2.2.3 -->
	<script src="<?=base_url();?>template/plugins/jQuery/jquery-2.2.3.min.js"></script>
	<!-- Bootstrap 3.3.6 -->
	<script src="<?=base_url();?>template/bootstrap/js/bootstrap.min.js"></script>
	<!-- iCheck -->
	<script src="<?=base_url();?>template/plugins/iCheck/icheck.min.js"></script>
</body>
</html>