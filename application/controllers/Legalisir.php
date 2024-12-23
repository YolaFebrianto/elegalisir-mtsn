<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Legalisir extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('UserProvider');
		$this->load->model('LegalisirProvider');
		if (empty($this->session->userdata('username')) && ($this->uri->segment(2)!='index') && ($this->uri->segment(2)!='prosesLogin')) {
			$url=base_url('auth/index');
			redirect($url);
		}
	}

	public function index(){
		$this->load->view('header');
		$this->load->view('legalisir/index');
		$this->load->view('footer');
	}
	private function get_total_all_records()
	{
		$total = $this->LegalisirProvider->get_all()->num_rows();
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
			if(isset($_POST["search"]["value"]) && !empty($_POST["search"]["value"]))
			{
				$cari = $_POST["search"]["value"];
				// Level 1: Bebas mencari tanpa filter nik
				if (@$user['level'] == 1) {
					$this->db->group_start();
					$this->db->like('nik', $cari);
					$this->db->or_like('nisn', $cari);
					$this->db->or_like('no_ijazah', $cari);
					$this->db->or_like('tahun_lulus', $cari);
					$this->db->or_like('jumlah_legalisir', $cari);
					$this->db->group_end();
				}
				// Level 0: Tetap filter berdasarkan nip
				else if (@$user['level'] == 0) {
					$this->db->group_start(); // Mulai grouping untuk `or_like`
					$this->db->like('nik', $cari);
					$this->db->or_like('nisn', $cari);
					$this->db->or_like('no_ijazah', $cari);
					$this->db->or_like('tahun_lulus', $cari);
					$this->db->or_like('jumlah_legalisir', $cari);
					$this->db->group_end(); // Akhiri grouping
					$this->db->where('nik', $nik); // Pastikan `nip` tetap digunakan
				}
			} else if (!empty($user)) {
				if (@$user['level']==0) {
					$this->db->where(['nik'=>$nik]);
				}
			}
			$column_order = ['id_legal', 'nik', 'nisn', 'no_ijazah', 'tahun_lulus', 'jumlah_legalisir','status'];
			if(isset($_POST["order"]))
			{
				$order_column = $column_order[$_POST['order']['0']['column']];
				$order_dir = $_POST['order']['0']['dir'];
				$this->db->order_by($order_column, $order_dir);
			}
			else
			{
				$this->db->order_by('id_legal ASC');
			}

			if($_POST["length"] != -1)
			{
				$this->db->limit($_POST['length'], $_POST['start']);
			}
			$data = array();
			$result = array();
			$filtered_rows=0;
			$statement = $this->LegalisirProvider->get_all();
			$result = $statement->result_array();
			$filtered_rows = $statement->num_rows();
			$no=1;
			if (!empty($result)) {
				foreach($result as $row)
				{
					$pengambilan = $row['pengambilan'];
					$status = @$row['status'];
					$status_teks = 'Diproses';
					if ($status==1) {
						$status_teks = 'Disetujui';
					} else if ($status==2) {
						$status_teks = 'Ditolak';
					} else if ($status==3) {
						$status_teks = 'Selesai';
					}
					$file = $row['file'];
					$file_link = '-';
					if (!empty(@$file)) {
						$file_link = '<a href="'.base_url().'template/uploads/legalisir/'.@$row['file'].'" class="btn btn-sm btn-link" title="Unduh" target="_blank">File</a>';
					}
					$filelegal = $row['file_legal'];
					$filelegal_link='-';
					if ($pengambilan>0) {
						if (!empty(@$filelegal) && $status==1) {
							$filelegal_link='<a href="'.base_url().'template/uploads/legalisir/'.@$row['file_legal'].'" class="btn btn-sm btn-link" title="Unduh" target="_blank">File</a>';
						} else {
							$filelegal_link='-';
						}
					} else if ($pengambilan==0) {
						if ($status==1) {
							$filelegal_link='Ambil Sendiri';
						} else {
							$filelegal_link='-';
						}
					}
					$sub_array = array();

					$sub_array[] = $no;
					$sub_array[] = $row['nik'];
					$sub_array[] = $row['nisn'];
					$sub_array[] = $row['no_ijazah'];
					$sub_array[] = $row['tahun_lulus'];
					$sub_array[] = $row['jumlah_legalisir'];
					$sub_array[] = $status_teks;
					$sub_array[] = $file_link;
					$sub_array[] = $filelegal_link;
					if (@$user['level']==1) {
						// ACTION UNTUK ADMIN
						$disetujui_link='';
						if ($pengambilan==1) {
							// JIKA DOWNLOAD SOFT FILE NYA SAJA
							$disetujui_link = base_url().'legalisir/form_filelegal/'.@$row['id_legal'];
						} else {
							// JIKA DIAMBIL SENDIRI
							$disetujui_link = base_url().'legalisir/edit_status/'.@$row['id_legal'].'/1';
						}
						if ($status==0) {
							$sub_array[] = '<a href="'.$disetujui_link.'" class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="top" title="Disetujui">
								<span class="fa fa-check"></span>
							</a>
							<a href="'.base_url().'legalisir/edit_status/'.@$row['id_legal'].'/2" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Ditolak">
								<span class="fa fa-times"></span>
							</a>';
						} else if ($status==1) {
							$sub_array[] = '<a href="'.base_url().'legalisir/edit_status/'.@$row['id_legal'].'/3" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Selesai">
								<span class="fa fa-eject"></span>
							</a>';
						} else if ($status==2) {
							$sub_array[] = '<a href="'.$disetujui_link.'" class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="top" title="Disetujui">
								<span class="fa fa-check"></span>
							</a>
							<a href="'.base_url().'legalisir/edit_status/'.@$row['id_legal'].'/3" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Selesai">
								<span class="fa fa-eject"></span>
							</a>';
						} else if ($status==3) {
							$sub_array[] = '<div data-toggle="tooltip" data-placement="top" title="Hapus" style="display:inline-block;width:32px;">
								<a href="#" class="btn btn-sm btn-danger" onclick="konfirmasi('.@$row['id_legal'].')" data-toggle="modal" data-target="#modalHapus">
									<span class="fa fa-trash-o"></span>
								</a>
							</div>';
						}
					}else {
						// ACTION UNTUK USER
						if ($status==1) {
							$sub_array[] = '<a href="'.base_url().'legalisir/edit_status/'.@$row['id_legal'].'/3" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Selesai">
								<span class="fa fa-eject"></span>
							</a>
							<a href="legalisir/form_edit/'.@$row['id_legal'].'" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="Edit">
								<span class="fa fa-edit"></span>
							</a>
							<div data-toggle="tooltip" data-placement="top" title="Hapus" style="display:inline-block;width:32px;">
								<a href="#" class="btn btn-sm btn-danger" onclick="konfirmasi('.@$row['id_legal'].')" data-toggle="modal" data-target="#modalHapus">
									<span class="fa fa-trash-o"></span>
								</a>
							</div>';
						} else if ($status==3) {
							$sub_array[] = '-';
						} else {
							$sub_array[] = '<a href="legalisir/form_edit/'.@$row['id_legal'].'" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="Edit">
								<span class="fa fa-edit"></span>
							</a>
							<div data-toggle="tooltip" data-placement="top" title="Hapus" style="display:inline-block;width:32px;">
								<a href="#" class="btn btn-sm btn-danger" onclick="konfirmasi('.@$row['id_legal'].')" data-toggle="modal" data-target="#modalHapus">
									<span class="fa fa-trash-o"></span>
								</a>
							</div>';
						}
					}
					// if ($user['level']>0) {
					// }
					$data[] = $sub_array;
					$no++;
				}
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
		$nik = $this->session->userdata('username');
		$data['user'] = $this->UserProvider->get_where(['nik'=>$nik])->row_array();
		$this->load->view('header');
		$this->load->view('legalisir/form-add',$data);
		$this->load->view('footer');
	}
	public function add(){
		$datenow = date('YmdHis');
		$nik = $this->input->post('nik');
		$data = [
			'nik'           => $nik,
			'nisn'          => $this->input->post('nisn'),
			'no_ijazah'     => $this->input->post('no_ijazah'),
			'tahun_lulus'   => $this->input->post('tahun_lulus'),
			'status'        => 0,
			'pengambilan'   => $this->input->post('pengambilan'),
			'jumlah_legalisir'=> $this->input->post('jumlah_legalisir'),
			'alasan'		=> $this->input->post('alasan')
		];
		if (!empty(@$_FILES['filelegal']['name'])) {
			$uploads_name = $this->do_upload('filelegal',$nik.'_'.$datenow);
			if (!empty($uploads_name)) {
				$data['file'] = $uploads_name;
			}
		}
		// else {
		// 	$this->session->set_flashdata('error','Harap upload file yang akan di legalisir!');
		// 	redirect('legalisir/form_add');
		// }
		try {
			$this->LegalisirProvider->insert($data);
			$this->session->set_flashdata('info','Data Berhasil Ditambahkan!');
		} catch (Exception $e) {
			$this->session->set_flashdata('error','Data Gagal Ditambahkan!');
		}
		redirect('legalisir');
	}
	public function form_edit($id_legal=0){
		$nik = $this->session->userdata('username');
		$data['user'] = $this->UserProvider->get_where(['nik'=>$nik])->row_array();
		$data['edit'] = $this->LegalisirProvider->get_where(['id_legal'=>$id_legal])->row_array();
		$this->load->view('header');
		$this->load->view('legalisir/form-edit',$data);
		$this->load->view('footer');
	}
	public function edit(){
		$datenow = date('YmdHis');
		$id_legal = $this->input->post('id_legal');
		$nik = $this->input->post('nik');
		$data = [
			'nik'           => $nik,
			'nisn'          => $this->input->post('nisn'),
			'no_ijazah'     => $this->input->post('no_ijazah'),
			'tahun_lulus'   => $this->input->post('tahun_lulus'),
			'pengambilan'   => $this->input->post('pengambilan'),
			'jumlah_legalisir'=> $this->input->post('jumlah_legalisir'),
			'alasan'		=> $this->input->post('alasan')
		];
		if (!empty(@$_FILES['filelegal']['name'])) {
			$uploads_name = $this->do_upload('filelegal',$nik.'_'.$datenow);
			if (!empty($uploads_name)) {
				$data['file'] = $uploads_name;
			}
		}
		try {
			$where = ['id_legal'=>$id_legal];
			$this->LegalisirProvider->update($data,$where);
			$this->session->set_flashdata('info','Data Berhasil Diubah!');
		} catch (Exception $e) {
			$this->session->set_flashdata('error','Data Gagal Diubah!');
		}
		redirect('legalisir');
	}
	public function edit_status($id_legal=0,$status=0)
	{
		try {
			$this->LegalisirProvider->update(['status'=>$status],['id_legal'=>$id_legal]);
			$this->session->set_flashdata('info','Status Berhasil Diubah!');
		} catch (Exception $e) {
			$this->session->set_flashdata('error','Status Gagal Diubah!');
		}
		redirect('legalisir');
	}
	public function form_filelegal($id_legal=0)
	{
		$data['edit'] = $this->LegalisirProvider->get_where(['id_legal'=>$id_legal])->row_array();
		$this->load->view('header');
		$this->load->view('legalisir/form-upload-filelegal',$data);
		$this->load->view('footer');
	}
	public function upload_filelegal()
	{
		$datenow = date('YmdHis');
		$id_legal = $this->input->post('id_legal');
		$nik = $this->input->post('nik');
		$data=array();
		try {
			if (!empty(@$_FILES['filelegal']['name'])) {
				$uploads_name = $this->do_upload('filelegal',$nik.'_'.$datenow.'_legal');
				if (!empty($uploads_name)) {
					$data['file_legal'] = $uploads_name;
					$data['status'] = 1;
					$this->LegalisirProvider->update($data,['id_legal'=>$id_legal]);
					$this->session->set_flashdata('info','Status Berhasil Diubah!');
				} else {
					$this->session->set_flashdata('error','File Legalisir Gagal Diupload!');
				}
			} else {
				$this->session->set_flashdata('error','File Legalisir Kosong!');
			}
		} catch (Exception $e) {
			$this->session->set_flashdata('error','Status Gagal Diubah!');
		}
		redirect('legalisir');
	}

	public function delete($id_legal=0){
		$where = [
			'id_legal' => $id_legal
		];
		$data=$this->LegalisirProvider->get_where($where);
		$q=$data->row_array();
		$p=$q['file'];
		$p2=$q['file_legal'];
		if (!empty($p)) {
			$path=base_url().'template/uploads/legalisir/'.$p;
			delete_files($path);
		}
		if (!empty($p2)) {
			$path2=base_url().'template/uploads/legalisir/'.$p2;
			delete_files($path2);
		}
		if (!empty($q)) {
			$this->LegalisirProvider->delete($id_legal);
			$this->session->set_flashdata('info','Data Berhasil Dihapus!');
		}
		redirect('legalisir');
	}
	public function do_upload($name=NULL, $fileName=NULL) {
		$this->load->library('upload');

		$config['upload_path'] = FCPATH . 'template/uploads/legalisir/';

		/* create directory if not exist */
		if (!is_dir($config['upload_path'])) {
			mkdir($config['upload_path'], 0777, TRUE);
		}

		$config['allowed_types'] = 'jpeg|jpg';
		$config['max_size'] = 8192;
		$config['file_name'] = $fileName;
		$this->upload->initialize($config);

		if (!$this->upload->do_upload($name)) {
			$this->session->set_flashdata('error', $this->upload->display_errors('', ''));
			redirect('legalisir');
		}
		$this->session->set_flashdata('info','File Berhasil Diupload!');

		$upload_data = $this->upload->data();

		return $upload_data['file_name'];
	}
}