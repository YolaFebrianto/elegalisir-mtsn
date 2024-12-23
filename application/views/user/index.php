<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Data User
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url('/'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="<?php echo base_url('user'); ?>">User</a></li>
    <li class="active">Data User</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <a href="<?=base_url('user/form_add');?>" class="btn btn-success btn-flat">
            <span class="fa fa-plus"></span> Tambah User
          </a> 
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table class="table no-margin" id="userTable">
              <thead>
                <tr>
                  <th>No</th>
                  <th>NIK</th>
                  <th>NISN</th>
                  <th>Nama</th>
                  <th>E-mail</th>
                  <th>Kontak</th>
                  <th>Level</th>
                  <th>Status</th>
                  <?php if ($user['level']>0) { ?>
                  <th width="100px">Aksi</th>
                  <?php } ?>
                </tr>
              </thead>
            </table>
          </div>
          <!-- /.table-responsive -->
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

<!-- MODAL -->
<div class="modal fade bd-example-modal-sm" id="modalHapus" tabindex="-1" role="dialog" aria-labelledby="modalHapusLabel" aria-hidden="true">
  <div class="vertical-alignment-helper">
    <div class="modal-dialog modal-sm vertical-align-center" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="modalHapusLabel" style="text-align:center;">
            Hapus User
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </h4>
        </div>
        <div class="modal-body">
          <p style="text-align:center;font-weight:bold;">
            Apakah anda yakin akan MENGHAPUS data user dengan NIP <span id="nip"></span> ?
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">
            <span class="fa fa-times"></span> Tidak
          </button>
          <a href="#" class="btn btn-primary" id="hapusYes">
            <span class="fa fa-check"></span> Ya
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- DataTables -->
<link rel="stylesheet" type="text/css" href="<?=base_url();?>template/plugins/datatables/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="<?=base_url();?>template/plugins/datatables/dataTables.bootstrap.css">
<script src="<?=base_url();?>template/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="<?=base_url();?>template/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=base_url();?>template/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
  function konfirmasi(id,nip){
    $('span#nip').html(nip);
    $('#hapusYes').attr('href','<?=base_url();?>user/delete/'+id);
  }
  $(document).ready(function(){
    var dataTable = $('#userTable').DataTable({
      "paging":true,
      "processing":true,
      "serverSide":true,
      "order": [],
      "info":true,
      "ajax":{
          url:"<?php echo base_url('user/fetch');?>",
          type:"POST"
      },
      "columnDefs":[
         {
          targets:[0,7],
          orderable:false,
         },
      ],
    });
  });
</script>

<!--Modal Reset Password-->
<div class="modal fade" id="ModalResetPassword" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                <h4 class="modal-title" id="myModalLabel">Reset Password</h4>
            </div>

            <div class="modal-body">

                    <table>
                        <tr>
                            <th style="width:120px;">Username</th>
                            <th>:</th>
                            <th><?php echo $this->session->flashdata('uname');?></th>
                        </tr>
                        <tr>
                            <th style="width:120px;">Password Baru</th>
                            <th>:</th>
                            <th><?php echo $this->session->flashdata('upass');?></th>
                        </tr>
                    </table>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
<?php
  // get_admin_js();
?>