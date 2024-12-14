<?php
class M_setting extends CI_Model{
	function get(){
		$hsl=$this->db->query("SELECT * FROM tbl_setting WHERE id=1");
		return $hsl;
	}
	function update($nama,$email,$telepon,$norek,$alamat,$kabupaten,$propinsi,$kodepos){
		$hsl=$this->db->query("UPDATE tbl_setting SET nama='$nama',email='$email',telepon='$telepon',norek='$norek',alamat='$alamat',kabupaten='$kabupaten',propinsi='$propinsi',kodepos='$kodepos' WHERE id='1'");
	}
}
