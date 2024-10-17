<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ADMIN | Register</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="shortcut icon" type="image/jpg" href="<?php echo base_url().'assets/dist/img/logo.jpg'?>">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/bootstrap/css/bootstrap.min.css'?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/font-awesome/css/font-awesome.min.css'?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/dist/css/AdminLTE.min.css'?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/iCheck/square/blue.css'?>">


</head>
<body class="hold-transition login-page">
<div class="login-box">
  <?php echo flashdata_alert(); ?>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg"> <img width="100%" src="<?php echo base_url().'assets/dist/img/logo.jpg'?>"></p><hr/>

    <form action="<?php echo site_url().'admin/login/simpan_data_register'?>" method="post">
      <div class="form-group has-feedback">
        <input type="text" name="xusername" class="form-control" placeholder="Username" required="" value="<?php echo $this->session->flashdata('username_register'); ?>">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="xpassword" class="form-control" placeholder="Password" required="">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="xpassword2" class="form-control" placeholder="Ulangi Password" required="">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" name="xnama" class="form-control" placeholder="Nama" required="" value="<?php echo $this->session->flashdata('nama_register'); ?>">
        <span class="glyphicon glyphicon-tags form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" name="xnisn" class="form-control" placeholder="NISN" required="" value="<?php echo $this->session->flashdata('nisn_register'); ?>">
        <span class="glyphicon glyphicon-qrcode form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="email" name="xemail" class="form-control" placeholder="E-mail" required="" value="<?php echo $this->session->flashdata('email_register'); ?>">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" name="xkontak" class="form-control" placeholder="No. HP" required="" value="<?php echo $this->session->flashdata('kontak_register'); ?>">
        <span class="glyphicon glyphicon-phone form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    <hr/>
    <!-- /.social-auth-links -->
    <!-- <p class="mb-1 text-center">
      <a href="forgot-password.html">I forgot my password</a>
    </p> -->
    <a href="<?php echo site_url().'admin/login'?>" class="mb-0 text-center" style="display: block;line-height: 1.5;">
      Sign In
    </a><br>
    <p><center>Copyright <?php echo date('Y');?> <br/> All Right Reserved</center></p>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url().'assets/plugins/jQuery/jquery-2.2.3.min.js'?>"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url().'assets/bootstrap/js/bootstrap.min.js'?>"></script>
<!-- iCheck -->
<script src="<?php echo base_url().'assets/plugins/iCheck/icheck.min.js'?>"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
