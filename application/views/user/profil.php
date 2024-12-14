<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Dashboard
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Dashboard</li>
	</ol>
</section>
<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-4">
			<!-- Profile Image -->
			<div class="box box-success">
				<div class="box-body box-profile">
					<?php if (!empty($profil['gambar'])) { ?>
					<img src="<?=base_url().'template/uploads/'.@$profil['gambar'];?>" class="profile-user-img img-responsive img-circle" alt="User Image">
					<?php } else { ?>
					<img src="<?=base_url();?>template/dist/img/user2-160x160.jpg" class="profile-user-img img-responsive img-circle" alt="User Image">
					<?php } ?>
					<h3 class="profile-username text-center"><?php echo @$profil['nama'] ?></h3>
					<p class="text-muted text-center"><?php echo @$profil['nik'] ?></p>
					<br>
					<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modalFoto"><b>Edit Foto</b></a>
					<a href="#" class="btn btn-default" data-toggle="modal" data-target="#modalEdit"><b>Edit Profil</b></a>
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->
		</div>
		<div class="col-md-8">
			<!-- About Me Box -->
			<div class="box box-success">
				<!-- /.box-header -->
				<div class="box-body">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-sm-3">
									<strong>NIK</strong>
								</div>
								<div class="col-sm-9">: <?php echo @$profil['nik']; ?></div>
							</div>
							<hr>
							<div class="row">
								<div class="col-sm-3">
									<strong>NISN</strong>
								</div>
								<div class="col-sm-9">: <?php echo @$profil['nisn']; ?></div>
							</div>
							<hr>
							<div class="row">
								<div class="col-sm-3">
									<strong>Nama</strong>
								</div>
								<div class="col-sm-9">: <?php echo @$profil['nama']; ?></div>
							</div>
							<hr>
							<div class="row">
								<div class="col-sm-3">
									<strong>E-mail</strong>
								</div>
								<div class="col-sm-9">: <?php echo @$profil['email']; ?></div>
							</div>
							<hr>
							<div class="row">
								<div class="col-sm-3">
									<strong>No. HP</strong>
								</div>
								<div class="col-sm-9">: <?php echo @$profil['kontak']; ?></div>
							</div>
							<hr>
							<div class="row">
								<div class="col-sm-3">
									<strong>Level</strong>
								</div>
								<div class="col-sm-9">: <?php
									$level = @$profil['level'];
									$level_teks = 'User';
									if ($level==1) {
										$level_teks = 'Admin';
									}
									echo $level_teks;
								?></div>
							</div>
							<hr>
							<div class="row">
								<div class="col-sm-3">
									<strong>Status</strong>
								</div>
								<div class="col-sm-9">: <?php
									$status = @$profil['status'];
									$status_teks = 'Non Aktif';
									if ($status==1) {
										$status_teks = 'Aktif';
									}
									echo $status_teks;
								?></div>
							</div>
							<hr>
						</div>
					</div>
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->
		</div>
	</div>
</section>
<style type="text/css">
	hr{
		margin:10px 0;
	}
</style>
<!--Modal Edit Pengguna-->
<div class="modal fade" id="modalFoto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                <h4 class="modal-title" id="myModalLabel">Edit Foto</h4>
            </div>
            <?= form_open_multipart('user/uploadfoto'); ?>
            <div class="modal-body">
				<div class="form-group">
					<label>Foto :</label>
					<input type="file" name="filefoto" class="form-control" />
				</div>
				<input type="submit" name="update" value="Simpan" class="btn btn-success" id="btnSubmit">
                <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
            </div>
			<?= form_close(); ?>
        </div>
    </div>
</div>
<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                <h4 class="modal-title" id="myModalLabel">Edit Profil</h4>
            </div>
            <?= form_open('user/edit'); ?>
            <div class="modal-body">
				<input type="hidden" name="status" value="<?=@$profil['status'];?>">
				<input type="hidden" name="level" value="<?=@$profil['level'];?>">
				<input type="hidden" name="id_user" value="<?=@$profil['id_user'];?>">
				<input type="hidden" name="redirect" value="profil">
				<div class="form-group">
					<label>NIK :</label>
					<input type="text" name="nik" class="form-control" required value="<?=@$profil['nik'];?>">
				</div>
				<div class="form-group">
					<label>Password :</label>
					<input type="password" name="password" class="form-control">
				<span class="help-block text-muted">Kosongkan jika tidak ingin mengubah password.</span>
				</div>
				<div class="form-group">
					<label>Konfirmasi Password :</label>
					<input type="password" name="password2" class="form-control">
				<span class="help-block text-muted">Kosongkan jika tidak ingin mengubah password.</span>
				</div>
				<div class="form-group">
					<label>NISN :</label>
					<input type="text" name="nisn" class="form-control" value="<?=@$profil['nisn'];?>">
				</div>
				<div class="form-group">
					<label>Nama :</label>
					<input type="text" name="nama" class="form-control" required value="<?=@$profil['nama'];?>">
				</div>
				<div class="form-group">
					<label>E-mail :</label>
					<input type="email" name="email" class="form-control" required value="<?=@$profil['email'];?>">
				</div>
				<div class="form-group">
					<label>No. HP :</label>
					<input type="text" name="kontak" class="form-control" required value="<?=@$profil['kontak'];?>">
				</div>
				<input type="submit" name="update" value="Simpan" class="btn btn-success" id="btnSubmit">
                <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
            </div>
			<?= form_close(); ?>
        </div>
    </div>
</div>