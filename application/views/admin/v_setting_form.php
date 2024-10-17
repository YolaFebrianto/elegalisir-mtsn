<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Setting
      <small></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Setting</a></li>
      <li class="active">Ubah Setting</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- SELECT2 EXAMPLE -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Ubah Setting</h3>
      </div>
	<?php
      $b=$setting->row_array();
  ?>
      <div class="box-body">
        <?php echo flashdata_alert(); ?>
        <form action="<?php echo base_url().'admin/setting/update'?>" method="post" enctype="multipart/form-data">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Nama Web</label>
                <input type="text" name="nama" class="form-control" value="<?php echo $b['nama'];?>" placeholder="Nama Web" required/>
              </div>
              <!-- /.form group -->
              <div class="form-group">
                <label>E-mail</label>
                <input type="text" name="email" class="form-control" value="<?php echo $b['email'];?>" placeholder="E-mail"/>
              </div>
              <div class="form-group">
                <label>No. Telp.</label>
                <input type="text" name="telepon" class="form-control" value="<?php echo $b['telepon'];?>" placeholder="No. Telp."/>
              </div>
              <div class="form-group">
                <label>No. Rekening</label>
                <input type="text" name="norek" class="form-control" value="<?php echo $b['norek'];?>" placeholder="No. Rekening"/>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Alamat</label>
                <input type="text" name="alamat" class="form-control" value="<?php echo $b['alamat'];?>" placeholder="Alamat"/>
              </div>
              <div class="form-group">
                <label>Kabupaten</label>
                <input type="text" name="kabupaten" class="form-control" value="<?php echo $b['kabupaten'];?>" placeholder="Kabupaten"/>
              </div>
              <div class="form-group">
                <label>Propinsi</label>
                <input type="text" name="propinsi" class="form-control" value="<?php echo $b['propinsi'];?>" placeholder="Propinsi"/>
              </div>
              <div class="form-group">
                <label>Kode Pos</label>
                <input type="text" name="kodepos" class="form-control" value="<?php echo $b['kodepos'];?>" placeholder="Kode Pos"/>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-flat pull-right"><span class="fa fa-pencil"></span> Simpan</button>
              </div>
            </div>
          </div>
        </form>
      </div>
  </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>