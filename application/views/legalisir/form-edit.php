<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Update Legalisir
	</h1>
	<ol class="breadcrumb">
		<li><a href="<?php echo base_url('/');?>"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="<?=base_url('legalisir/index');?>"> Legalisir </a></li>
		<li><a href="#"><?=@$edit['id_legal'];?></a></li>
		<li class="active">Update</li>
	</ol>
</section>

<section class="content">
	<div class="box box-primary">
		<div class="box-body">
			<div class="row">
				<div class="col-md-6">
				<?= form_open_multipart('legalisir/edit'); ?>
					<input type="hidden" name="id_legal" value="<?=$edit['id_legal'];?>">
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
						<input type="text" name="no_ijazah" class="form-control" value="<?=$edit['no_ijazah'];?>" required>
					</div>
					<div class="form-group">
						<label>Tahun Lulus :</label>
						<input type="number" name="tahun_lulus" class="form-control" value="<?=$edit['tahun_lulus'];?>" required min="0">
					</div>
					<div class="form-group">
						<label>Pengurusan :</label>
						<select name="pengambilan" class="form-control" id="input-pengambilan">
							<option value="0" <?=($edit['pengambilan']==0)?'selected':'';?>>Offline</option>
							<option value="1" <?=($edit['pengambilan']==1)?'selected':'';?>>Online</option>
						</select>
					</div>
					<div class="form-group">
						<label>Jumlah Lembar Legalisir :</label>
						<input type="number" min="1" name="jumlah_legalisir" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Alasan Kebutuhan Legalisir :</label>
						<textarea name="alasan" class="form-control" rows="3" required=""></textarea>
					</div>
					<div class="form-group" id="div-upload">
						<label>File :
						<?php
							if (!empty(@$edit['file'])) {
								echo '<a href="'.base_url().'template/uploads/legalisir/'.@$edit['file'].'" class="btn btn-link" target="_blank">Lihat</a>';
							}
						?>
						</label>
						<input type="file" name="filelegal" class="form-control" id="input-filelegal" />
					</div>
					<a href="#" class="btn btn-success" data-toggle="modal" data-target="#modal">
						Simpan
					</a>
					<input type="submit" name="update" value="Simpan" class="btn btn-success" id="btnSubmit" style="display: none;">
				<?= form_close(); ?>
				</div>
				<div class="col-md-6">
					<h2>Ketentuan Legalisir Ijazah</h2>
					<ol>
						<li>File yang akan diunggah dalam format file jpg/jpeg dengan kualitas baik</li>
						<li>Ukuran file tidak melebihi 8 megabyte dan disarankan menggunakan mesin scan.</li>
						<li>File ijazah di scan dalam bentuk landscape, posisi logo ada diatas.</li>
					</ol>
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
						Edit Legalisir
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</h4>
				</div>
				<div class="modal-body">
					<p style="text-align:center;font-weight:bold;">
					Apakah anda yakin akan menyimpan data legalisir ini ?
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
<!-- jQuery 2.2.3 -->
<script src="<?=base_url();?>template/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script type="text/javascript">
	function kirim(){
		$('#btnSubmit').click();
	}
	$(document).ready(function(){
		$('#div-upload').hide();
		<?php if ((@$edit['pengambilan']==1)): ?>
		$('#div-upload').show();
		<?php endif; ?>
		$('#input-pengambilan').change(function(){
			var isi = $(this).val();
			if (isi==1) {
				$('#div-upload').show();
			} else {
				$('#div-upload').hide();
			}
		});
	});
</script>