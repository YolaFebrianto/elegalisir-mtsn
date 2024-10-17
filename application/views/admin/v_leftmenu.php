<!--Counter Inbox-->
<?php
    $setting=$this->db->query("SELECT * FROM tbl_setting WHERE id='1'")->row_array();
?>
<header class="main-header">

    <!-- Logo -->
    <a href="<?php echo base_url().'admin/dashboard'?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><?php echo @$setting['nama']; ?></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><?php echo @$setting['nama']; ?></span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <?php
              $id_admin=$this->session->userdata('idadmin');
              $q=$this->db->query("SELECT * FROM tbl_pengguna WHERE pengguna_id='$id_admin'");
              $c=$q->row_array();

              $pengguna_photo = $c['pengguna_photo'];
              if (empty($pengguna_photo)) {
                $pengguna_photo = 'default-userphoto.png';
              }
          ?>
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url().'assets/images/'.$pengguna_photo;?>" class="user-image" alt="">
              <span class="hidden-xs"><?php echo $c['pengguna_nama'];?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url().'assets/images/'.$pengguna_photo;?>" class="img-circle" alt="">

                <p>
                  <?php echo $c['pengguna_nama'];?>
                  <?php if($c['pengguna_level']=='1'):?>
                    <small>Administrator</small>
                  <?php else:?>
                    <small>User</small>
                  <?php endif;?>
                </p>
              </li>
              <!-- Menu Body -->

              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a class="btn btn-default btn-flat" data-toggle="modal" data-target="#ModalEdit">Ubah Profil</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url().'admin/login/logout'?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="<?php echo base_url().''?>" target="_blank" title="Lihat Website"><i class="fa fa-globe"></i></a>
          </li>
        </ul>
      </div>

    </nav>
</header>

<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">

  <!-- /.search form -->
  <!-- sidebar menu: : style can be found in sidebar.less -->
  <?php
    $uri2 = $this->uri->segment(2);
  ?>
  <ul class="sidebar-menu">
    <li class="header">Menu Utama</li>
    <li class="<?php echo ($uri2=='dashboard')?'active':''; ?>">
      <a href="<?php echo base_url().'admin/dashboard'?>">
        <i class="fa fa-home"></i> <span>Dashboard</span>
        <span class="pull-right-container">
          <small class="label pull-right"></small>
        </span>
      </a>
    </li>
    <li class="<?php echo ($uri2=='tulisan')?'active':''; ?>">
      <a href="<?php echo base_url().'admin/tulisan'?>">
        <i class="fa fa-file"></i> <span>Legalisir</span>
        <span class="pull-right-container">
          <small class="label pull-right"></small>
        </span>
      </a>
    </li>
    <?php if($c['pengguna_level']=='1'):?>
    <li  class="<?php echo ($uri2=='pengguna')?'active':''; ?>">
      <a href="<?php echo base_url().'admin/pengguna'?>">
        <i class="fa fa-users"></i> <span>Pengguna</span>
        <span class="pull-right-container">
          <small class="label pull-right"></small>
        </span>
      </a>
    </li>
    <li class="<?php echo ($uri2=='setting')?'active':''; ?>">
      <a href="<?php echo base_url().'admin/setting'?>">
        <i class="fa fa-cogs"></i> <span>Setting</span>
        <span class="pull-right-container">
          <small class="label pull-right"></small>
        </span>
      </a>
    </li>
    <?php endif; ?>
     <li>
      <a href="<?php echo base_url().'administrator/logout'?>">
        <i class="fa fa-sign-out"></i> <span>Sign Out</span>
        <span class="pull-right-container">
          <small class="label pull-right"></small>
        </span>
      </a>
    </li>


  </ul>
</section>
<!-- /.sidebar -->
</aside>

<!-- MODAL UBAH PROFIL -->
<?php
  $pengguna_id=$c['pengguna_id'];
  $pengguna_nisn=$c['pengguna_nisn'];
  $pengguna_no_ijazah=$c['pengguna_no_ijazah'];
  $pengguna_tahun_lulus=$c['pengguna_tahun_lulus'];
  $pengguna_nama=$c['pengguna_nama'];
  $pengguna_jenkel=$c['pengguna_jenkel'];
  $pengguna_email=$c['pengguna_email'];
  $pengguna_username=$c['pengguna_username'];
  $pengguna_password=$c['pengguna_password'];
  $pengguna_nohp=$c['pengguna_nohp'];
  $pengguna_level=$c['pengguna_level'];
  $pengguna_photo=$c['pengguna_photo'];
?>
<!--Modal Edit Pengguna-->
<div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                <h4 class="modal-title" id="myModalLabel">Ubah Profil</h4>
            </div>
            <form class="form-horizontal" action="<?php echo base_url().'admin/pengguna/update_pengguna'?>" method="post" enctype="multipart/form-data">
            <div class="modal-body">

              <div class="form-group">
                  <label for="inputNisn" class="col-sm-4 control-label">NISN</label>
                  <div class="col-sm-7">
                      <input type="text" name="xnisn" class="form-control" id="inputNisn" value="<?php echo $pengguna_nisn;?>" placeholder="NISN" required>
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputTahunLulus" class="col-sm-4 control-label">Tahun Lulus</label>
                  <div class="col-sm-7">
                      <input type="number" min="1" max="9999" name="xtahunlulus" class="form-control" id="inputTahunLulus" value="<?php echo $pengguna_tahun_lulus;?>" placeholder="Tahun Lulus">
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputNoIjazah" class="col-sm-4 control-label">No. Ijazah</label>
                  <div class="col-sm-7">
                      <input type="text" name="xnoijazah" class="form-control" id="inputNoIjazah" value="<?php echo $pengguna_no_ijazah;?>" placeholder="No. Ijazah">
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">Nama</label>
                  <div class="col-sm-7">
                      <input type="hidden" name="kode" value="<?php echo $pengguna_id;?>"/>
                      <input type="text" name="xnama" class="form-control" id="inputUserName" value="<?php echo $pengguna_nama;?>" placeholder="Nama Lengkap" required>
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label">Email</label>
                  <div class="col-sm-7">
                      <input type="email" name="xemail" class="form-control" value="<?php echo $pengguna_email;?>" id="inputEmail3" placeholder="Email" required>
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">Jenis Kelamin</label>
                  <div class="col-sm-7">
                    <?php if($pengguna_jenkel=='L'):?>
                      <div class="radio radio-info radio-inline">
                          <input type="radio" id="inlineRadio1" value="L" name="xjenkel" checked>
                          <label for="inlineRadio1"> Laki-Laki </label>
                      </div>
                      <div class="radio radio-info radio-inline">
                          <input type="radio" id="inlineRadio1" value="P" name="xjenkel">
                          <label for="inlineRadio2"> Perempuan </label>
                      </div>
                    <?php else:?>
                      <div class="radio radio-info radio-inline">
                          <input type="radio" id="inlineRadio1" value="L" name="xjenkel">
                          <label for="inlineRadio1"> Laki-Laki </label>
                      </div>
                      <div class="radio radio-info radio-inline">
                          <input type="radio" id="inlineRadio1" value="P" name="xjenkel" checked>
                          <label for="inlineRadio2"> Perempuan </label>
                      </div>
                    <?php endif;?>
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">Username</label>
                  <div class="col-sm-7">
                      <input type="text" name="xusername" class="form-control" value="<?php echo $pengguna_username;?>" id="inputUserName" placeholder="Username" required>
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputPassword3" class="col-sm-4 control-label">Password</label>
                  <div class="col-sm-7">
                      <input type="password" name="xpassword" class="form-control" id="inputPassword3" placeholder="Password">
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputPassword4" class="col-sm-4 control-label">Ulangi Password</label>
                  <div class="col-sm-7">
                      <input type="password" name="xpassword2" class="form-control" id="inputPassword4" placeholder="Ulangi Password">
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">Kontak Person</label>
                  <div class="col-sm-7">
                      <input type="text" name="xkontak" class="form-control" value="<?php echo $pengguna_nohp;?>" id="inputUserName" placeholder="Kontak Person" required>
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">Level</label>
                  <div class="col-sm-7">
                      <select class="form-control" name="xlevel" required>
                          <?php if($pengguna_level=='1'):?>
                          <option value="1" selected>Administrator</option>
                          <option value="2">User</option>
                          <?php else:?>
                          <option value="1">Administrator</option>
                          <option value="2" selected>User</option>
                          <?php endif;?>
                      </select>
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">Photo</label>
                  <div class="col-sm-7">
                      <input type="file" name="filefoto"/>
                  </div>
              </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-flat" id="simpan">Update</button>
            </div>
            </form>
        </div>
    </div>
</div>