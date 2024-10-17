<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Legalisir
      <small></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Legalisir</a></li>
      <li class="active">Upload</li>
    </ol>
  </section>
  <?php
      $u=$user->row_array();
  ?>

  <!-- Main content -->
  <section class="content">

    <!-- SELECT2 EXAMPLE -->
    <div class="box box-default">
      <div class="box-header with-border">
        <h3 class="box-title">Upload Legalisir</h3>
      </div>

	<form action="<?php echo base_url().'admin/tulisan/simpan_tulisan'?>" method="post" enctype="multipart/form-data">

      <!-- /.box-header -->
      <div class="box-body">
        <div class="row" style="margin-bottom: 10px;">
          <div class="col-md-12">
            <input type="text" name="xnisn" class="form-control" placeholder="NISN" required value="<?php echo @$u['pengguna_nisn']; ?>" />
          </div>
        </div>
        <div class="row" style="margin-bottom: 10px;">
          <div class="col-md-8">
            <input type="text" name="xno_ijazah" class="form-control" placeholder="No. Ijazah" required value="<?php echo @$u['pengguna_no_ijazah']; ?>" />
          </div>
          <div class="col-md-4">
            <input type="number" name="xtahun_lulus" min="0" max="9999" class="form-control" placeholder="Tahun Lulus" required value="<?php echo @$u['pengguna_tahun_lulus']; ?>" />
          </div>
        </div>
        <div class="row">
          <div class="col-md-10">
            <input type="file" name="filefoto" style="width: 100%;" required class="form-control">
          </div>
          <!-- /.col -->
          <div class="col-md-2">
            <div class="form-group">
              <button type="submit" class="btn btn-primary btn-flat pull-right"><span class="fa fa-pencil"></span> Publish</button>
            <!-- /.form-group -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.box-body -->
    </div>
  </form>
  </div>
    <!-- /.box -->

    <!-- <div class="row">
      <div class="col-md-12">
        <div class="box box-danger">
          <div class="box-header">
            <h3 class="box-title">Legalisir</h3>
          </div>
          <div class="box-body">

          </div>
        </div>
      </div>
    </div> -->
    <!-- /.row -->

  </section>
  <!-- /.content -->
</div>
<script src="<?php echo base_url().'assets/plugins/jQuery/jquery-2.2.3.min.js'?>"></script>
<script src="<?php echo base_url().'assets/ckeditor/ckeditor.js'?>"></script>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.

    CKEDITOR.replace('ckeditor');


  });
</script>