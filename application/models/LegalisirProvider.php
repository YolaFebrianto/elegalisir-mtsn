<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class LegalisirProvider extends CI_Model{
		public function get_all()
		{
			return $this->db->get('tbl_legalisir');
		}

		public function get_where($where)
		{
			return $this->db->get_where('tbl_legalisir',$where);
		}

		public function delete($id_legal)
		{
			return $this->db->delete('tbl_legalisir',['id_legal'=>$id_legal]);
		}

		public function update($data,$where)
		{
			$this->db->where($where);
			return $this->db->update('tbl_legalisir',$data);
		}

		public function insert($data)
		{
			return $this->db->insert('tbl_legalisir',$data);
		}
	}