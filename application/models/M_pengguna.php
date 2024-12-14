<?php
class M_pengguna extends CI_Model{
	function get_all_pengguna(){
		$hsl=$this->db->query("SELECT tbl_pengguna.*,IF(pengguna_jenkel='L','Laki-Laki','Perempuan') AS jenkel FROM tbl_pengguna");
		return $hsl;	
	}

	function simpan_pengguna($nama='',$jenkel='',$username='',$password='',$email='',$nohp='',$level='',$gambar='',$nisn='',$no_ijazah='',$tahun_lulus=''){
		$hsl=$this->db->query("INSERT INTO tbl_pengguna (pengguna_nama,pengguna_jenkel,pengguna_username,pengguna_password,pengguna_email,pengguna_nohp,pengguna_level,pengguna_photo,pengguna_nisn,pengguna_no_ijazah,pengguna_tahun_lulus) VALUES ('$nama','$jenkel','$username',md5('$password'),'$email','$nohp','$level','$gambar','$nisn','$no_ijazah','$tahun_lulus')");
		return $hsl;
	}

	function simpan_pengguna_tanpa_gambar($nama='',$jenkel='',$username='',$password='',$email='',$nohp='',$level='',$nisn='',$no_ijazah='',$tahun_lulus=''){
		$hsl=$this->db->query("INSERT INTO tbl_pengguna (pengguna_nama,pengguna_jenkel,pengguna_username,pengguna_password,pengguna_email,pengguna_nohp,pengguna_level,pengguna_nisn,pengguna_no_ijazah,pengguna_tahun_lulus) VALUES ('$nama','$jenkel','$username',md5('$password'),'$email','$nohp','$level','$nisn','$no_ijazah','$tahun_lulus')");
		return $hsl;
	}

	//UPDATE PENGGUNA //
	function update_pengguna_tanpa_pass($kode='',$nama='',$jenkel='',$username='',$password='',$email='',$nohp='',$level=2,$gambar='',$nisn='',$no_ijazah='',$tahun_lulus=''){
		$hsl=$this->db->query("UPDATE tbl_pengguna SET pengguna_nisn='$nisn',pengguna_no_ijazah='$no_ijazah',pengguna_tahun_lulus='$tahun_lulus', pengguna_nama='$nama',pengguna_jenkel='$jenkel',pengguna_username='$username',pengguna_email='$email',pengguna_nohp='$nohp',pengguna_level='$level',pengguna_photo='$gambar' WHERE pengguna_id='$kode'");
		return $hsl;
	}
	function update_pengguna($kode='',$nama='',$jenkel='',$username='',$password='',$email='',$nohp='',$level=2,$gambar='',$nisn='',$no_ijazah='',$tahun_lulus=''){
		$hsl=$this->db->query("UPDATE tbl_pengguna SET pengguna_nisn='$nisn',pengguna_no_ijazah='$no_ijazah',pengguna_tahun_lulus='$tahun_lulus',pengguna_nama='$nama',pengguna_jenkel='$jenkel',pengguna_username='$username',pengguna_password='$password',pengguna_email='$email',pengguna_nohp='$nohp',pengguna_level='$level',pengguna_photo='$gambar' WHERE pengguna_id='$kode'");
		return $hsl;
	}

	function update_pengguna_tanpa_pass_dan_gambar($kode='',$nama='',$jenkel='',$username='',$password='',$email='',$nohp='',$level=2,$nisn='',$no_ijazah='',$tahun_lulus=''){
		$hsl=$this->db->query("UPDATE tbl_pengguna SET pengguna_nisn='$nisn',pengguna_no_ijazah='$no_ijazah',pengguna_tahun_lulus='$tahun_lulus',pengguna_nama='$nama',pengguna_jenkel='$jenkel',pengguna_username='$username',pengguna_email='$email',pengguna_nohp='$nohp',pengguna_level='$level' WHERE pengguna_id='$kode'");
		return $hsl;
	}
	function update_pengguna_tanpa_gambar($kode='',$nama='',$jenkel='',$username='',$password='',$email='',$nohp='',$level=2,$nisn='',$no_ijazah='',$tahun_lulus=''){
		$hsl=$this->db->query("UPDATE tbl_pengguna SET pengguna_nisn='$nisn',pengguna_no_ijazah='$no_ijazah',pengguna_tahun_lulus='$tahun_lulus',pengguna_nama='$nama',pengguna_jenkel='$jenkel',pengguna_username='$username',pengguna_password='$password',pengguna_email='$email',pengguna_nohp='$nohp',pengguna_level='$level' WHERE pengguna_id='$kode'");
		return $hsl;
	}
	//END UPDATE PENGGUNA//

	function hapus_pengguna($kode){
		$hsl=$this->db->query("DELETE FROM tbl_pengguna WHERE pengguna_id='$kode'");
		return $hsl;
	}
	function getusername($id){
		$hsl=$this->db->query("SELECT * FROM tbl_pengguna WHERE pengguna_id='$id'");
		return $hsl;
	}
	function resetpass($id,$pass){
		$hsl=$this->db->query("UPDATE tbl_pengguna SET pengguna_password=md5('$pass') WHERE pengguna_id='$id'");
		return $hsl;
	}

	function get_pengguna_login($kode){
		$hsl=$this->db->query("SELECT * FROM tbl_pengguna WHERE pengguna_id='$kode'");
		return $hsl;
	}


}