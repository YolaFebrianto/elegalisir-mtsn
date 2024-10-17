<?php
$id_admin=$this->session->userdata('idadmin');
$q=$this->db->query("SELECT * FROM tbl_pengguna WHERE pengguna_id='$id_admin'");
$c=$q->row_array();
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      List File Legalisir
      <small></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#"</a>Legalisir</li>
      <li class="active">List</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <?php echo flashdata_alert(); ?>
        <div class="box">
          <div class="box-header">
            <a class="btn btn-success btn-flat" href="<?php echo base_url().'admin/tulisan/add_tulisan'?>"><span class="fa fa-plus"></span> Tambah</a>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-striped" style="font-size:13px;">
              <thead>
              <tr>
              <th>NISN</th>
              <th>No. Ijazah</th>
              <th>Tahun Lulus</th>
    					<th>File</th>
              <th>Pengguna</th>
    					<th>Dibuat Pada</th>
              <th>Status</th>
                  <th style="text-align:right;">Aksi</th>
              </tr>
              </thead>
              <tbody>
        				<?php
        					$no=0;
        					foreach ($data->result_array() as $i) :
        					   $no++;
        					   $tulisan_id=$i['tulisan_id'];
        					   $tulisan_nisn=@$i['tulisan_nisn'];
        					   $tulisan_no_ijazah=@$i['tulisan_no_ijazah'];
        					   $tulisan_tahun_lulus=@$i['tulisan_tahun_lulus'];
        					   $tulisan_pengguna=@$i['pengguna_nama'];
        					   $tulisan_file=@$i['tulisan_file'];
                     $tulisan_file_legal=@$i['tulisan_file_legal'];
        					   $tulisan_dibuat_pada=@$i['tulisan_dibuat_pada'];
                     if (!empty($tulisan_dibuat_pada)) {
                       $tulisan_dibuat_pada = date('d-m-Y H:i:s',strtotime($tulisan_dibuat_pada));
                     }
                     $status = '<span class="badge bg-secondary">Blm diproses</span>';
                     $tulisan_status=$i['tulisan_status'];
                     if (!empty($tulisan_status)) {
                       if ($tulisan_status==1) {
                         $status = '<span class="badge bg-success">Disetujui</span><br><a href="../assets/images/'.$tulisan_file_legal.'" target="_blank">File</a>';
                       } else if ($tulisan_status==2) {
                         $status = '<span class="badge bg-danger">Ditolak</span>';
                       }
                     }
                  ?>
              <tr>
                <td><?php echo $tulisan_nisn;?></td>
                <td><?php echo $tulisan_no_ijazah;?></td>
      				  <td><?php echo $tulisan_tahun_lulus;?></td>
                <td>
                  <a href="<?php echo base_url().'assets/images/'.$tulisan_file;?>" target="_blank">File</a>
                </td>
      				  <td><?php echo $tulisan_pengguna;?></td>
      				  <td><?php echo $tulisan_dibuat_pada;?></td>
      				  <td><?php echo $status;?></td>
                <td style="text-align:right;">
                  <?php if($c['pengguna_level']=='1'):?>
                  <a class="btn" href="<?php echo base_url().'admin/tulisan/get_edit/'.$tulisan_id;?>" title="Setujui"><span class="fa fa-check"></span></a>
                  <a class="btn" href="<?php echo base_url().'admin/tulisan/get_edit_tolak/'.$tulisan_id;?>" title="Tolak"><span class="fa fa-times"></span></a>
                  <?php endif; ?>
                  <a class="btn" data-toggle="modal" data-target="#ModalHapus<?php echo $tulisan_id;?>" title="Hapus"><span class="fa fa-trash"></span></a>
                </td>
              </tr>
			<?php endforeach;?>
              </tbody>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->



<?php foreach ($data->result_array() as $i) :
            $tulisan_id=$i['tulisan_id'];
            $tulisan_nisn=$i['tulisan_nisn'];
            $tulisan_file=$i['tulisan_file'];
          ?>
<!--Modal Hapus Pengguna-->
<div class="modal fade" id="ModalHapus<?php echo $tulisan_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                <h4 class="modal-title" id="myModalLabel">Hapus Berita</h4>
            </div>
            <form class="form-horizontal" action="<?php echo base_url().'admin/tulisan/hapus_tulisan'?>" method="post" enctype="multipart/form-data">
            <div class="modal-body">
			       <input type="hidden" name="kode" value="<?php echo $tulisan_id;?>"/>
             <input type="hidden" value="<?php echo $tulisan_file;?>" name="gambar">
                    <p>Apakah Anda yakin mau menghapus Posting <b><?php echo $tulisan_nisn;?></b> ?</p>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-flat" id="simpan">Hapus</button>
            </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach;?>
<?php
  get_admin_js();
?>