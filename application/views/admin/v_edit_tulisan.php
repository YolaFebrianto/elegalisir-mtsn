<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Berita
      <small></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Berita</a></li>
      <li class="active">Update Berita</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- SELECT2 EXAMPLE -->
    <div class="box box-default">
      <div class="box-header with-border">
        <h3 class="box-title">Update Berita</h3>
      </div>
	<?php
      $b=$data->row_array();
  ?>
	<form action="<?php echo base_url().'admin/tulisan/update_tulisan'?>" method="post" enctype="multipart/form-data">

      <!-- /.box-header -->
      <div class="box-body">
        <div class="row">
          <div class="col-md-10">
            <input type="hidden" name="kode" value="<?php echo $b['tulisan_id'];?>">
            <input type="file" name="filefoto" style="width: 100%;" class="form-control">
          </div>
          <!-- /.col -->
          <div class="col-md-2">
            <div class="form-group">
              <button type="submit" class="btn btn-primary btn-flat pull-right"><span class="fa fa-pencil"></span> Update</button>
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

    <div class="row">
      <div class="col-md-12">

        <div class="box box-danger">
          <div class="box-header">
            <h3 class="box-title">Berita</h3>
          </div>
          <div class="box-body">

          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->

      </div>
      <!-- /.col (left) -->
      <!-- /.col (right) -->
    </div>
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