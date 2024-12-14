<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('UserProvider');
		if (empty($this->session->userdata('username')) && ($this->uri->segment(2)!='index') && ($this->uri->segment(2)!='prosesLogin')) {
			$url=base_url('auth/index');
			redirect($url);
		}
	}

	public function index(){
		$nik=$this->session->userdata('username');
		$where = [
			'nik' => $nik
		];
		$x['user'] = $this->UserProvider->get_where($where)->row_array();
		// $x['data'] = $this->UserProvider->get_all()->result();
		$this->load->view('header');
		$this->load->view('user/index',$x);
		$this->load->view('footer');
	}
	private function get_total_all_records()
	{
		$total = $this->UserProvider->get_all()->num_rows();
		return $total;
	}
	public function fetch()
	{
		$nik=$this->session->userdata('username');
		$where = [
			'nik' => $nik
		];
		$user = $this->UserProvider->get_where($where)->row_array();
		if (isset($_POST)) {
			$query = '';
			$output = array();
			if(isset($_POST["search"]["value"]))
			{
				$cari = $_POST["search"]["value"];
				$this->db->like('nik', $cari);
				$this->db->or_like('nisn', $cari);
				$this->db->or_like('nama', $cari);
				$this->db->or_like('email', $cari);
				$this->db->or_like('kontak', $cari);
			}
			$column_order = ['id_user', 'nik', 'nisn', 'nama', 'email', 'kontak', 'level', 'status'];
			if(isset($_POST["order"]))
			{
				$order_column = $column_order[$_POST['order']['0']['column']];
				$order_dir = $_POST['order']['0']['dir'];
				$this->db->order_by($order_column, $order_dir);
			}
			else
			{
				$this->db->order_by('id_user ASC');
			}

			if($_POST["length"] != -1)
			{
				$this->db->limit($_POST['length'], $_POST['start']);
			}
			$statement = $this->UserProvider->get_all();
			$result = $statement->result_array();
			$data = array();
			$filtered_rows = $statement->num_rows();
			$no=1;
			foreach($result as $row)
			{
				$level = $row['level'];
				$status = $row['status'];
				$level_teks='User';$status_teks='Non Aktif';
				if ($level==1) {
					$level_teks='Admin';
				}
				if ($status==1) {
					$status_teks='Aktif';
				}
				$sub_array = array();

				$sub_array[] = $no;
				$sub_array[] = $row['nik'];
				$sub_array[] = $row['nisn'];
				$sub_array[] = $row['nama'];
				$sub_array[] = $row['email'];
				$sub_array[] = $row['kontak'];
				$sub_array[] = $level_teks;
				$sub_array[] = $status_teks;
				if ($user['level']>0) {
					$sub_array[] = '<a href="user/form_edit/'.$row['id_user'].'" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="Edit">
					<span class="fa fa-edit"></span>
				  </a>
				  <div data-toggle="tooltip" data-placement="top" title="Hapus" style="display:inline-block;width:32px;">
					<a href="#" class="btn btn-sm btn-danger" onclick="konfirmasi('.$row['id_user'].','.$row['nik'].')" data-toggle="modal" data-target="#modalHapus">
					  <span class="fa fa-trash-o"></span>
					</a>
				  </div>';
				}
				$data[] = $sub_array;
				$no++;
			}
			$output = array(
				"draw"              =>  intval($_POST["draw"]),
				"recordsTotal"      =>  $filtered_rows,
				"recordsFiltered"   =>  $this->get_total_all_records(),
				"data"              =>  $data
			);
			echo json_encode($output);
		}
	}
	public function form_add(){
		$this->load->view('header');
		$this->load->view('user/form-add');
		$this->load->view('footer');
	}
	public function add(){
		$password = $this->input->post('password');
		$konfirm_password = $this->input->post('password2');
		if ($password <> $konfirm_password) {
			$this->session->set_flashdata('error','Data Password dan Data Password Konfirmasi Tidak Sama!');
			redirect('user/form_add');
		}else{
			$data = [
				'password'  => md5($password),
				'nik'       => $this->input->post('nik'),
				'email'     => $this->input->post('email'),
				'nama'      => $this->input->post('nama'),
				'nisn'      => $this->input->post('nisn'),
				'kontak'    => $this->input->post('kontak'),
				'level'     => $this->input->post('level'),
				'status'    => $this->input->post('status')
			];
			$this->UserProvider->insert($data);
			$this->session->set_flashdata('info','Data Berhasil Ditambahkan!');
			redirect('user');
		}
	}
	public function form_edit($id_user=0){
		$data['edit'] = $this->UserProvider->get_where(['id_user'=>$id_user])->row_array();
		$this->load->view('header');
		$this->load->view('user/form-edit',$data);
		$this->load->view('footer');
	}
	public function edit(){
		$id_user = $this->input->post('id_user');
		$redirect = $this->input->post('redirect');
		$password = $this->input->post('password');
		$konfirm_password = $this->input->post('password2');
		$data = [
			'nik'       => $this->input->post('nik'),
			'email'     => $this->input->post('email'),
			'nama'      => $this->input->post('nama'),
			'nisn'      => $this->input->post('nisn'),
			'kontak'    => $this->input->post('kontak'),
			'level'     => $this->input->post('level'),
			'status'    => $this->input->post('status')
		];
		$where = [
			'id_user'   => $id_user
		];
		if (empty($password) && empty($konfirm_password)) {
			$this->UserProvider->update($data,$where);
			$this->session->set_flashdata('info','Data Berhasil Diubah!');
			if (!empty($redirect) && $redirect=='profil') {
				redirect();
			} else {
				redirect('user');
			}
		}elseif ($password <> $konfirm_password) {
			$this->session->set_flashdata('error','Data Password dan Data Password Konfirmasi Tidak Sama!');
			if (!empty($redirect) && $redirect=='profil') {
				redirect();
			} else {
				redirect('user/form_edit/'.$id_user);
			}
		}else{
			$data['password'] = md5($password);
			$this->UserProvider->update($data,$where);
			$this->session->set_flashdata('info','Data Berhasil Diubah!');
			if (!empty($redirect) && $redirect=='profil') {
				redirect();
			} else {
				redirect('user');
			}
		}
	}

	public function delete($id_user=0){
		$where = [
			'id_user' => $id_user
		];
		$data=$this->UserProvider->get_where($where);
		$q=$data->row_array();
		// $p=$q['pengguna_photo'];
		// $path=base_url().'assets/images/'.$p;
		// delete_files($path);
		if (!empty($q)) {
			$this->UserProvider->delete($id_user);
			$this->session->set_flashdata('info','Data Berhasil Dihapus!');
		}
		redirect('user');
	}

	public function reset_password($id_user=0){
		$where = [
			'id_user' => $id_user
		];
		$get=$this->UserProvider->get_where($where);
		if($get->num_rows()>0){
			$a=$get->row_array();
			$b=$a['nik'];
		}
		$pass=123456;
		$data = [
			'password' => md5($password)
		];
		$this->UserProvider->update($data,$where);
		$this->session->set_flashdata('info','Password Berhasil Direset!');
		$this->session->set_flashdata('uname',$b);
		$this->session->set_flashdata('upass',$pass);
		redirect('user');
	}
	public function uploadfoto()
	{
		$datenow = date('YmdHis');
		$nik=$this->session->userdata('username');
		$uploads_name = $this->do_upload('filefoto',$nik.'_'.$datenow);
		if (!empty($uploads_name)) {
			$data = ['gambar'=>$uploads_name];
			$where = ['nik' => $nik];
			$this->UserProvider->update($data,$where);
		}
		redirect();
	}
	public function do_upload($name=NULL, $fileName=NULL) {
		$this->load->library('upload');

		$config['upload_path'] = FCPATH . 'template/uploads/';

		/* create directory if not exist */
		if (!is_dir($config['upload_path'])) {
			mkdir($config['upload_path'], 0777, TRUE);
		}

		$config['allowed_types'] = 'jpeg|jpg|png|gif';
		$config['max_size'] = 8000;
		$config['file_name'] = $fileName;
		$this->upload->initialize($config);

		if (!$this->upload->do_upload($name)) {
			$this->session->set_flashdata('error', $this->upload->display_errors('', ''));
			redirect(uri_string());
		}
		$this->session->set_flashdata('info','Foto Berhasil Diupload!');

		$upload_data = $this->upload->data();

		return $upload_data['file_name'];
	}
}