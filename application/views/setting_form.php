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
      <form action="<?php echo base_url().'setting/update'?>" method="post" enctype="multipart/form-data">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Institusi</label>
              <input type="text" name="institusi" class="form-control" value="<?php echo $b['institusi'];?>" placeholder="Institusi" required/>
            </div>
            <div class="form-group">
              <label>Nama</label>
              <input type="text" name="nama" class="form-control" value="<?php echo $b['nama'];?>" placeholder="Nama" required/>
            </div>
            <div class="form-group">
              <label>Status</label>
              <input type="text" name="status" class="form-control" value="<?php echo $b['status'];?>" placeholder="Status" required/>
            </div>
            <div class="form-group">
              <label>Kepala Sekolah</label>
              <input type="text" name="kepsek" class="form-control" value="<?php echo $b['kepsek'];?>" placeholder="Kepala Sekolah" required/>
            </div>
            <div class="form-group">
              <label>NIP Kepsek</label>
              <input type="text" name="nip" class="form-control" value="<?php echo $b['nip'];?>" placeholder="NIP" required/>
            </div>
            <!-- /.form group -->
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Alamat</label>
              <input type="text" name="alamat" class="form-control" value="<?php echo $b['alamat'];?>" placeholder="Alamat"/>
            </div>
            <div class="form-group">
              <label>E-mail</label>
              <input type="text" name="email" class="form-control" value="<?php echo $b['email'];?>" placeholder="E-mail"/>
            </div>
            <div class="form-group">
              <label>Website</label>
              <input type="text" name="website" class="form-control" value="<?php echo $b['website'];?>" placeholder="Website"/>
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