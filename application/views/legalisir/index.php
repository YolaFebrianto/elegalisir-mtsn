<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Data Legalisir
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url('/'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="<?php echo base_url('legalisir'); ?>">Legalisir</a></li>
    <li class="active">Data Legalisir</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <a href="<?=base_url('legalisir/form_add');?>" class="btn btn-success btn-flat">
            <span class="fa fa-plus"></span> Tambah Legalisir
          </a> 
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table class="table no-margin" id="legalisirTable">
              <thead>
                <tr>
                  <th>No</th>
                  <th>NIK</th>
                  <th>NISN</th>
                  <th>No. Ijazah</th>
                  <th>Tahun Lulus</th>
                  <th>Jumlah</th>
                  <th>Status</th>
                  <th>File</th>
                  <th>File Legalisir</th>
                  <th width="100px">Aksi</th>
                </tr>
              </thead>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<div class="modal fade bd-example-modal-sm" id="modalHapus" tabindex="-1" role="dialog" aria-labelledby="modalHapusLabel" aria-hidden="true">
  <div class="vertical-alignment-helper">
    <div class="modal-dialog modal-sm vertical-align-center" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="modalHapusLabel" style="text-align:center;">
            Hapus Legalisir
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </h4>
        </div>
        <div class="modal-body">
          <p style="text-align:center;font-weight:bold;">
            Apakah anda yakin akan MENGHAPUS data legalisir ini ?
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
  function konfirmasi(id){
    // ,nik
    // $('span#nip').html(nip);
    $('#hapusYes').attr('href','<?=base_url();?>legalisir/delete/'+id);
  }
  $(document).ready(function(){
    var dataTable = $('#legalisirTable').DataTable({
      "paging":true,
      "processing":true,
      "serverSide":true,
      "order": [],
      "info":true,
      "ajax":{
          url:"<?php echo base_url('legalisir/fetch');?>",
          type:"POST"
      },
      "columnDefs":[
         {
          targets:[0,6,7,8],
          orderable:false,
         },
      ],
    });
  });
</script>