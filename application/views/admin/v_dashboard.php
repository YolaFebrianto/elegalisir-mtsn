<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Dashboard
      <small></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Info boxes -->
    <div class="row">
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-green"><i class="fa fa-money"></i></span>
            <?php
              $saldo=0;
            ?>
          <div class="info-box-content">
            <span class="info-box-text">Saldo</span>
            <span class="info-box-number">Rp. <?php echo @$saldo;?></span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->

      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-aqua"><i class="fa fa-newspaper-o"></i></span>
            <?php
                  $query=$this->db->query("SELECT * FROM tbl_tulisan");
                  $jml=$query->num_rows();
            ?>
          <div class="info-box-content">
            <span class="info-box-text">Berita</span>
            <span class="info-box-number"><?php echo $jml;?></span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <!-- fix for small devices only -->
      <div class="clearfix visible-sm-block"></div>

      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-red"><i class="fa fa-comments"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Komentar</span>
            <span class="info-box-number">4</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-yellow"><i class="fa fa-users"></i></span>
          <?php
                  $query=$this->db->query("SELECT * FROM tbl_pengguna");
                  $jml=$query->num_rows();
            ?>
          <div class="info-box-content">
            <span class="info-box-text">Pengguna</span>
            <span class="info-box-number"><?php echo $jml;?></span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->