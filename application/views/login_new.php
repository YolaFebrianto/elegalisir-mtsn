<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="<?=base_url();?>template/dist/img/logo_mini.png">
  <link rel="shortcut icon" href="<?=base_url();?>template/dist/img/logo_mini.png">
  <title>
  SILO | Log in
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="<?=base_url();?>template/login/css/nucleo-icons.css" rel="stylesheet" />
  <link href="<?=base_url();?>template/login/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="<?=base_url();?>template/login/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="<?=base_url();?>template/login/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
  <style>
    .bg::before {
        content: '';
        background-image: url('./template/dist/img/background.jpg');
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

<body class="bg">
  <main class="main-content mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
              <div class="card card-plain">
                <div class="card-header pb-0 text-start">
                  <p class="mb-0">Sistem Informasi Legalisir Online</p>
                  <h4 class="font-weight-bolder">MTsN 1 Sidoarjo</h4>
                  <p class="mb-0">Silahkan login menggunakan akun Anda</p>
                  <?php if ($this->session->flashdata('error')) { ?>
                  <p class="mb-0" style="color:red;"><i class="fa fa-close"></i> <?= $this->session->flashdata('error'); ?></p>
                  <?php  }  ?>
                </div>
                <div class="card-body">
                  <?php echo form_open('auth/prosesLogin', array('class'=>'login100-form validate-form','role'=>'form')); ?>
                    <div class="mb-3">
                      <input type="text" name="nip" class="form-control form-control-lg" placeholder="Masukkan NIP" aria-label="NIP" min="1" value="<?php echo @$this->session->flashdata('user_login'); ?>">
                    </div>
                    <div class="mb-3">
                      <input type="password" name="password" class="form-control form-control-lg" placeholder="Masukkan Password" aria-label="Password">
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-lg btn-info btn-lg w-100 mt-4 mb-0">Login</button>
                    </div>
                  <?php echo form_close(); ?>
                </div>
              </div>
            </div>
            <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
              <div class="position-relative bg-gradient-success h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden" style="background-image: url('./template/login/img/bg.jpg');
          background-size: cover;">
                <span class="mask bg-gradient-success opacity-6"></span>
                <h4 class="mt-5 text-white font-weight-bolder position-relative">SILO</h4>
                <p class="text-white position-relative">Sistem Informasi Legalisir Online</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <!--   Core JS Files   -->
  <script src="<?=base_url();?>template/login/js/core/popper.min.js"></script>
  <script src="<?=base_url();?>template/login/js/core/bootstrap.min.js"></script>
  <script src="<?=base_url();?>template/login/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="<?=base_url();?>template/login/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?=base_url();?>template/login/js/argon-dashboard.min.js?v=2.0.4"></script>
</body>

</html>