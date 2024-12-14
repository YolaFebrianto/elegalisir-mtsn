<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Tambah Legalisir
	</h1>
	<ol class="breadcrumb">
		<li><a href="<?php echo base_url('/');?>"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="<?=base_url('legalisir/index');?>"> Legalisir </a></li>
		<li class="active">Tambah</li>
	</ol>
</section>

<section class="content">
	<div class="box box-primary">
		<div class="box-body">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
				<?= form_open_multipart('legalisir/add'); ?>
					<div class="form-group">
						<label>NIK :</label>
						<input type="text" name="nik" class="form-control" value="<?php echo @$user['nik']; ?>" required readonly="">
					</div>
					<div class="form-group">
						<label>NISN :</label>
						<input type="text" name="nisn" class="form-control" value="<?php echo @$user['nisn']; ?>">
					</div>
					<div class="form-group">
						<label>No. Ijazah :</label>
						<input type="text" name="no_ijazah" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Tahun Lulus :</label>
						<input type="number" name="tahun_lulus" class="form-control" required min="0">
					</div>
					<div class="form-group">
						<label>Pengambilan :</label>
						<select name="pengambilan" class="form-control">
							<option value="0" selected="">Ambil Sendiri</option>
							<option value="1">Soft File</option>
						</select>
					</div>
					<div class="form-group">
						<label>File :</label>
						<input type="file" name="filelegal" class="form-control" required="" />
					</div>
					<a href="#" class="btn btn-success" data-toggle="modal" data-target="#modal">
						Simpan
					</a>
					<input type="submit" name="tambah" value="Simpan" class="btn btn-success" id="btnSubmit" style="display: none;">
				<?= form_close(); ?>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Modal -->
<div class="modal fade bd-example-modal-sm" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalTambahLabel" aria-hidden="true">
	<div class="vertical-alignment-helper">
		<div class="modal-dialog modal-sm vertical-align-center" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="modalTambahLabel" style="text-align:center;">
					Tambah Legalisir
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					</h4>
				</div>
				<div class="modal-body">
					<p style="text-align:center;font-weight:bold;">
					Apakah anda yakin akan menyimpan data legalisir ?
					</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">
						<span class="fa fa-times"></span> Batal
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