<?php
class InstansiProvider extends CI_Model{
	public function get(){
		return $this->db->get_where('tbl_instansi',['id_instansi'=>1]);
	}
	public function update($data)
	{
		$this->db->where(['id_instansi'=>1]);
		return $this->db->update('tbl_instansi',$data);
	}
}