<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class UserProvider extends CI_Model{
		public function get_all()
		{
			return $this->db->get('tbl_user');
		}

		public function get_where($where)
		{
			return $this->db->get_where('tbl_user',$where);
		}

		public function delete($id_user)
		{
			return $this->db->delete('tbl_user',['id_user'=>$id_user]);
		}

		public function update($data,$where)
		{
			$this->db->where($where);
			return $this->db->update('tbl_user',$data);
		}

		public function insert($data)
		{
			return $this->db->insert('tbl_user',$data);
		}
	}