<?php
class M_tulisan extends CI_Model{
	function get_all_tulisan(){
		$hsl=$this->db->query("SELECT t.*,DATE_FORMAT(t.tulisan_dibuat_pada,'%d/%m/%Y') AS tanggal,p.pengguna_nama
			FROM tbl_tulisan AS t
			LEFT JOIN tbl_pengguna AS p ON p.pengguna_id=t.tulisan_pengguna_id
			ORDER BY t.tulisan_id DESC");
		return $hsl;
	}
	function simpan_tulisan($nisn,$no_ijazah,$tahun_lulus,$user_id,$file){
		$hsl=$this->db->query("INSERT INTO tbl_tulisan(tulisan_nisn,tulisan_no_ijazah,tulisan_tahun_lulus,tulisan_pengguna_id,tulisan_file,tulisan_status) VALUES ('$nisn','$no_ijazah','$tahun_lulus','$user_id','$file',0)");
		return $hsl;
	}
	function get_tulisan_by_kode($kode){
		$hsl=$this->db->query("SELECT tbl_tulisan.*,DATE_FORMAT(tulisan_dibuat_pada,'%d/%m/%Y') AS tanggal FROM tbl_tulisan WHERE tulisan_id='$kode'");
		return $hsl;
	}
	function update_tulisan($tulisan_id=0,$file='',$status=0){
		$hsl='';
		if (!empty($file)) {
			$hsl=$this->db->query("UPDATE tbl_tulisan SET tulisan_file_legal='$file',tulisan_status='$status' WHERE tulisan_id='$tulisan_id'");
		} else {
			$hsl=$this->db->query("UPDATE tbl_tulisan SET tulisan_status='$status' WHERE tulisan_id='$tulisan_id'");
		}
		return $hsl;
	}
	function update_tulisan_old($tulisan_id,$nisn,$no_ijazah,$tahun_lulus,$user_id,$file,$status){
		$hsl=$this->db->query("UPDATE tbl_tulisan SET tulisan_nisn='$nisn',tulisan_no_ijazah='$no_ijazah',tulisan_tahun_lulus='$tahun_lulus',tulisan_pengguna_id='$user_id',tulisan_file='$file',tulisan_status='$status' WHERE tulisan_id='$tulisan_id'");
		return $hsl;
	}
	function update_tulisan_tanpa_img_old($tulisan_id,$nisn,$no_ijazah,$tahun_lulus,$user_id,$status){
		$hsl=$this->db->query("UPDATE tbl_tulisan SET tulisan_nisn='$nisn',tulisan_no_ijazah='$no_ijazah',tulisan_tahun_lulus='$tahun_lulus',tulisan_pengguna_id='$user_id',tulisan_status='$status' WHERE tulisan_id='$tulisan_id'");
		return $hsl;
	}
	function hapus_tulisan($kode){
		$hsl=$this->db->query("DELETE FROM tbl_tulisan WHERE tulisan_id='$kode'");
		return $hsl;
	}

	//Front-End
	function get_berita_slider(){
		$hsl=$this->db->query("SELECT tbl_tulisan.*,DATE_FORMAT(tulisan_dibuat_pada,'%d/%m/%Y') AS tanggal FROM tbl_tulisan WHERE tulisan_img_slider='1' ORDER BY tulisan_id DESC");
		return $hsl;
	}
	function get_berita_home($limit=4){
		$hsl=$this->db->query("SELECT tbl_tulisan.*,DATE_FORMAT(tulisan_dibuat_pada,'%d/%m/%Y') AS tanggal FROM tbl_tulisan ORDER BY tulisan_id DESC LIMIT ".$limit);
		return $hsl;
	}

	function berita_perpage($offset,$limit){
		$hsl=$this->db->query("SELECT tbl_tulisan.*,DATE_FORMAT(tulisan_dibuat_pada,'%d/%m/%Y') AS tanggal FROM tbl_tulisan ORDER BY tulisan_id DESC LIMIT $offset,$limit");
		return $hsl;
	}

	function berita(){
		$hsl=$this->db->query("SELECT tbl_tulisan.*,DATE_FORMAT(tulisan_dibuat_pada,'%d/%m/%Y') AS tanggal FROM tbl_tulisan ORDER BY tulisan_id DESC");
		return $hsl;
	}
	function get_berita_by_kode($kode){
		$hsl=$this->db->query("SELECT tbl_tulisan.*,DATE_FORMAT(tulisan_dibuat_pada,'%d/%m/%Y') AS tanggal FROM tbl_tulisan where tulisan_id='$kode'");
		return $hsl;
	}
	function get_berita_by_user($user_id){
		$hsl=$this->db->query("SELECT t.*,DATE_FORMAT(t.tulisan_dibuat_pada,'%d/%m/%Y') AS tanggal,p.pengguna_nama
			FROM tbl_tulisan AS t
			LEFT JOIN tbl_pengguna AS p ON p.pengguna_id=t.tulisan_pengguna_id
			WHERE t.tulisan_pengguna_id='$user_id'");
		return $hsl;
	}

	function cari_berita($nisn){
		$hsl=$this->db->query("SELECT tbl_tulisan.*,DATE_FORMAT(tulisan_dibuat_pada,'%d/%m/%Y') AS tanggal FROM tbl_tulisan WHERE tulisan_nisn='$nisn'");
		return $hsl;
	}


}
