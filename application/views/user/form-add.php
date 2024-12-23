<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Tambah User
	</h1>
	<ol class="breadcrumb">
		<li><a href="<?php echo base_url('/');?>"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="<?=base_url('user/index');?>"> User </a></li>
		<li class="active">Tambah</li>
	</ol>
</section>

<section class="content">
	<div class="box box-primary">
		<div class="box-body">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
				<?= form_open_multipart('user/add'); ?>
					<div class="form-group">
						<label>NIK :</label>
						<input type="text" name="nik" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Password :</label>
						<input type="password" name="password" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Konfirmasi Password :</label>
						<input type="password" name="password2" class="form-control" required>
					</div>
					<div class="form-group">
						<label>NISN :</label>
						<input type="text" name="nisn" class="form-control">
					</div>
					<div class="form-group">
						<label>Nama :</label>
						<input type="text" name="nama" class="form-control" required>
					</div>
					<div class="form-group">
						<label>E-mail :</label>
						<input type="email" name="email" class="form-control" required>
					</div>
					<div class="form-group">
						<label>No. HP :</label>
						<input type="text" name="kontak" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Level :</label>
						<select name="level" class="form-control">
							<option value="0" selected="">User</option>
							<option value="1">Admin</option>
						</select>
					</div>
					<div class="form-group">
						<label>Status :</label>
						<select name="status" class="form-control">
							<option value="0">Non Aktif</option>
							<option value="1" selected="">Aktif</option>
						</select>
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
					Tambah User
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					</h4>
				</div>
				<div class="modal-body">
					<p style="text-align:center;font-weight:bold;">
					Apakah anda yakin akan menyimpan data user ?
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