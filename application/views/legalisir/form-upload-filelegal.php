<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Upload File Legalisir
	</h1>
	<ol class="breadcrumb">
		<li><a href="<?php echo base_url('/');?>"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="<?=base_url('legalisir/index');?>"> Legalisir </a></li>
		<li><a href="#"><?=@$edit['id_level'];?></a></li>
		<li class="active">Upload File</li>
	</ol>
</section>

<section class="content">
	<div class="box box-primary">
		<div class="box-body">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
				<?= form_open_multipart('legalisir/upload_filelegal'); ?>
					<input type="hidden" name="id_legal" value="<?=$edit['id_legal'];?>">
					<input type="hidden" name="nik" value="<?=$edit['nik'];?>">
					<div class="form-group">
						<label>File : </label><br>
						<?php
							if (!empty(@$edit['file'])) {
								echo '<a href="'.base_url().'template/uploads/legalisir/'.@$edit['file'].'" class="btn btn-default" target="_blank">Lihat</a>';
							}
						?>
					</div>
					<div class="form-group">
						<label>File Legalisir : </label>
						<input type="file" name="filelegal" class="form-control" required />
					</div>
					<a href="#" class="btn btn-success" data-toggle="modal" data-target="#modal">
						Simpan
					</a>
					<input type="submit" name="update" value="Simpan" class="btn btn-success" id="btnSubmit" style="display: none;">
				<?= form_close(); ?>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Modal -->
<div class="modal fade bd-example-modal-sm" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalEditLabel" aria-hidden="true">
	<div class="vertical-alignment-helper">
		<div class="modal-dialog modal-sm vertical-align-center" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="modalEditLabel" style="text-align:center;">
						Upload File Legalisir
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</h4>
				</div>
				<div class="modal-body">
					<p style="text-align:center;font-weight:bold;">
					Apakah anda yakin akan mengupload file hasil legalisir ini ?
					</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">
						<span class="fa fa-times"></span> Tidak
					</button>
					<button type="button" class="btn btn-primary" onclick="kirim()">
						<span class="fa fa-check"></span> Ya
					</button>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	function kirim(){
		$('#btnSubmit').click();
	}
</script>