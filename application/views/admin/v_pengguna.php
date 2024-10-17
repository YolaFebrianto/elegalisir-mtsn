<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Data Pengguna
      <small></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Pengguna</a></li>
      <li class="active">Data Pengguna</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <?php echo flashdata_alert(); ?>
        <div class="box">
          <div class="box-header">
            <a class="btn btn-success btn-flat" data-toggle="modal" data-target="#myModal"><span class="fa fa-user-plus"></span> Add Pengguna</a>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-striped" style="font-size:13px;">
              <thead>
              <tr>
				<th>Photo</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Jenis Kelamin</th>
                  <th>Password</th>
                  <th>Kontak</th>
                  <th>Level</th>
                  <th style="text-align:center;">Aksi</th>
              </tr>
              </thead>
              <tbody>
			<?php foreach ($data->result_array() as $i) :
                     $pengguna_id=$i['pengguna_id'];
                     $pengguna_nama=$i['pengguna_nama'];
                     $pengguna_jenkel=$i['pengguna_jenkel'];
                     $pengguna_email=$i['pengguna_email'];
                     $pengguna_username=$i['pengguna_username'];
                     $pengguna_password=$i['pengguna_password'];
                     $pengguna_nohp=$i['pengguna_nohp'];
                     $pengguna_level=$i['pengguna_level'];
                     $pengguna_photo=$i['pengguna_photo'];
              if($pengguna_id>1):
                  ?>
              <tr>
                <td><img width="40" height="40" class="img-circle" src="<?php echo base_url().'assets/images/'.$pengguna_photo;?>"></td>
                <td><?php echo $pengguna_nama;?></td>
                <td><?php echo $pengguna_email;?></td>
                <?php if($pengguna_jenkel=='L'):?>
                      <td>Laki-Laki</td>
                <?php else:?>
                      <td>Perempuan</td>
                <?php endif;?>
                <td><?php echo $pengguna_password;?></td>
                <td><?php echo $pengguna_nohp;?></td>
                <?php if($pengguna_level=='1'):?>
                      <td>Administrator</td>
                <?php else:?>
                      <td>User</td>
                <?php endif;?>
                <td style="text-align:right;">
                      <a class="btn" data-toggle="modal" data-target="#ModalEdit<?php echo $pengguna_id;?>"><span class="fa fa-pencil"></span></a>
                      <a class="btn" href="<?php echo base_url().'admin/pengguna/reset_password/'.$pengguna_id;?>"><span class="fa fa-refresh"></span></a>
                      <a class="btn" data-toggle="modal" data-target="#ModalHapus<?php echo $pengguna_id;?>"><span class="fa fa-trash"></span></a>
                </td>
              </tr>
			<?php 
              endif;
            endforeach;?>
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

<!--Modal Add Pengguna-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                <h4 class="modal-title" id="myModalLabel">Add Pengguna</h4>
            </div>
            <form class="form-horizontal" action="<?php echo base_url().'admin/pengguna/simpan_pengguna'?>" method="post" enctype="multipart/form-data">
            <div class="modal-body">

                            <div class="form-group">
                                <label for="inputNisn" class="col-sm-4 control-label">NISN</label>
                                <div class="col-sm-7">
                                    <input type="text" name="xnisn" class="form-control" id="inputNisn" placeholder="NISN" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputTahunLulus" class="col-sm-4 control-label">Tahun Lulus</label>
                                <div class="col-sm-7">
                                    <input type="number" min="1" max="9999" name="xtahunlulus" class="form-control" id="inputTahunLulus" placeholder="Tahun Lulus">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputNoIjazah" class="col-sm-4 control-label">No. Ijazah</label>
                                <div class="col-sm-7">
                                    <input type="text" name="xnoijazah" class="form-control" id="inputNoIjazah" placeholder="No. Ijazah">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputUserName" class="col-sm-4 control-label">Nama</label>
                                <div class="col-sm-7">
                                    <input type="text" name="xnama" class="form-control" id="inputUserName" placeholder="Nama Lengkap" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label">Email</label>
                                <div class="col-sm-7">
                                    <input type="email" name="xemail" class="form-control" id="inputEmail3" placeholder="Email" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputUserName" class="col-sm-4 control-label">Jenis Kelamin</label>
                                <div class="col-sm-7">
                                   <div class="radio radio-info radio-inline">
                                        <input type="radio" id="inlineRadio1" value="L" name="xjenkel" checked>
                                        <label for="inlineRadio1"> Laki-Laki </label>
                                    </div>
                                    <div class="radio radio-info radio-inline">
                                        <input type="radio" id="inlineRadio1" value="P" name="xjenkel">
                                        <label for="inlineRadio2"> Perempuan </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputUserName" class="col-sm-4 control-label">Username</label>
                                <div class="col-sm-7">
                                    <input type="text" name="xusername" class="form-control" id="inputUserName" placeholder="Username" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-4 control-label">Password</label>
                                <div class="col-sm-7">
                                    <input type="password" name="xpassword" class="form-control" id="inputPassword3" placeholder="Password" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword4" class="col-sm-4 control-label">Ulangi Password</label>
                                <div class="col-sm-7">
                                    <input type="password" name="xpassword2" class="form-control" id="inputPassword4" placeholder="Ulangi Password" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputUserName" class="col-sm-4 control-label">Kontak Person</label>
                                <div class="col-sm-7">
                                    <input type="text" name="xkontak" class="form-control" id="inputUserName" placeholder="Kontak Person" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputUserName" class="col-sm-4 control-label">Level</label>
                                <div class="col-sm-7">
                                    <select class="form-control" name="xlevel" required>
                                        <option value="1">Administrator</option>
                                        <option value="2">User</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputUserName" class="col-sm-4 control-label">Photo</label>
                                <div class="col-sm-7">
                                    <input type="file" name="filefoto" required/>
                                </div>
                            </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-flat" id="simpan">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>


<?php foreach ($data->result_array() as $i) :
              $pengguna_id=$i['pengguna_id'];
              $pengguna_nisn=$i['pengguna_nisn'];
              $pengguna_no_ijazah=$i['pengguna_no_ijazah'];
              $pengguna_tahun_lulus=$i['pengguna_tahun_lulus'];
              $pengguna_nama=$i['pengguna_nama'];
              $pengguna_jenkel=$i['pengguna_jenkel'];
              $pengguna_email=$i['pengguna_email'];
              $pengguna_username=$i['pengguna_username'];
              $pengguna_password=$i['pengguna_password'];
              $pengguna_nohp=$i['pengguna_nohp'];
              $pengguna_level=$i['pengguna_level'];
              $pengguna_photo=$i['pengguna_photo'];
            ?>
<!--Modal Edit Pengguna-->
<div class="modal fade" id="ModalEdit<?php echo $pengguna_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                <h4 class="modal-title" id="myModalLabel">Edit Pengguna</h4>
            </div>
            <form class="form-horizontal" action="<?php echo base_url().'admin/pengguna/update_pengguna'?>" method="post" enctype="multipart/form-data">
            <div class="modal-body">

                            <div class="form-group">
                                <label for="inputNisn" class="col-sm-4 control-label">NISN</label>
                                <div class="col-sm-7">
                                    <input type="text" name="xnisn" class="form-control" id="inputNisn" value="<?php echo $pengguna_nisn;?>" placeholder="NISN" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputTahunLulus" class="col-sm-4 control-label">Tahun Lulus</label>
                                <div class="col-sm-7">
                                    <input type="number" min="1" max="9999" name="xtahunlulus" class="form-control" id="inputTahunLulus" value="<?php echo $pengguna_tahun_lulus;?>" placeholder="Tahun Lulus">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputNoIjazah" class="col-sm-4 control-label">No. Ijazah</label>
                                <div class="col-sm-7">
                                    <input type="text" name="xnoijazah" class="form-control" id="inputNoIjazah" value="<?php echo $pengguna_no_ijazah;?>" placeholder="No. Ijazah">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputUserName" class="col-sm-4 control-label">Nama</label>
                                <div class="col-sm-7">
							<input type="hidden" name="kode" value="<?php echo $pengguna_id;?>"/>
                                    <input type="text" name="xnama" class="form-control" id="inputUserName" value="<?php echo $pengguna_nama;?>" placeholder="Nama Lengkap" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label">Email</label>
                                <div class="col-sm-7">
                                    <input type="email" name="xemail" class="form-control" value="<?php echo $pengguna_email;?>" id="inputEmail3" placeholder="Email" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputUserName" class="col-sm-4 control-label">Jenis Kelamin</label>
                                <div class="col-sm-7">
						<?php if($pengguna_jenkel=='L'):?>
                                   <div class="radio radio-info radio-inline">
                                        <input type="radio" id="inlineRadio1" value="L" name="xjenkel" checked>
                                        <label for="inlineRadio1"> Laki-Laki </label>
                                    </div>
                                    <div class="radio radio-info radio-inline">
                                        <input type="radio" id="inlineRadio1" value="P" name="xjenkel">
                                        <label for="inlineRadio2"> Perempuan </label>
                                    </div>
						<?php else:?>
							<div class="radio radio-info radio-inline">
                                        <input type="radio" id="inlineRadio1" value="L" name="xjenkel">
                                        <label for="inlineRadio1"> Laki-Laki </label>
                                    </div>
                                    <div class="radio radio-info radio-inline">
                                        <input type="radio" id="inlineRadio1" value="P" name="xjenkel" checked>
                                        <label for="inlineRadio2"> Perempuan </label>
                                    </div>
						<?php endif;?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputUserName" class="col-sm-4 control-label">Username</label>
                                <div class="col-sm-7">
                                    <input type="text" name="xusername" class="form-control" value="<?php echo $pengguna_username;?>" id="inputUserName" placeholder="Username" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-4 control-label">Password</label>
                                <div class="col-sm-7">
                                    <input type="password" name="xpassword" class="form-control" id="inputPassword3" placeholder="Password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword4" class="col-sm-4 control-label">Ulangi Password</label>
                                <div class="col-sm-7">
                                    <input type="password" name="xpassword2" class="form-control" id="inputPassword4" placeholder="Ulangi Password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputUserName" class="col-sm-4 control-label">Kontak Person</label>
                                <div class="col-sm-7">
                                    <input type="text" name="xkontak" class="form-control" value="<?php echo $pengguna_nohp;?>" id="inputUserName" placeholder="Kontak Person" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputUserName" class="col-sm-4 control-label">Level</label>
                                <div class="col-sm-7">
                                    <select class="form-control" name="xlevel" required>
							<?php if($pengguna_level=='1'):?>
                                        <option value="1" selected>Administrator</option>
                                        <option value="2">User</option>
							<?php else:?>
								<option value="1">Administrator</option>
                                        <option value="2" selected>User</option>
							<?php endif;?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputUserName" class="col-sm-4 control-label">Photo</label>
                                <div class="col-sm-7">
                                    <input type="file" name="filefoto"/>
                                </div>
                            </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-flat" id="simpan">Update</button>
            </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach;?>

<?php foreach ($data->result_array() as $i) :
              $pengguna_id=$i['pengguna_id'];
              $pengguna_nama=$i['pengguna_nama'];
              $pengguna_jenkel=$i['pengguna_jenkel'];
              $pengguna_email=$i['pengguna_email'];
              $pengguna_username=$i['pengguna_username'];
              $pengguna_password=$i['pengguna_password'];
              $pengguna_nohp=$i['pengguna_nohp'];
              $pengguna_level=$i['pengguna_level'];
              $pengguna_photo=$i['pengguna_photo'];
            ?>
<!--Modal Hapus Pengguna-->
<div class="modal fade" id="ModalHapus<?php echo $pengguna_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                <h4 class="modal-title" id="myModalLabel">Hapus Pengguna</h4>
            </div>
            <form class="form-horizontal" action="<?php echo base_url().'admin/pengguna/hapus_pengguna'?>" method="post" enctype="multipart/form-data">
            <div class="modal-body">
			<input type="hidden" name="kode" value="<?php echo $pengguna_id;?>"/>
                    <p>Apakah Anda yakin mau menghapus Pengguna <b><?php echo $pengguna_nama;?></b> ?</p>

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
  get_admin_js();
?>