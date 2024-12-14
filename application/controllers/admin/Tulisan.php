<?php
class Tulisan extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('M_tulisan');
		$this->load->model('M_pengguna');
		$this->load->library('upload');
	}


	function index(){
		$iduser=$this->session->userdata('idadmin');
		$x['data'] = $this->M_tulisan->get_berita_by_user($iduser);
        if ($this->session->userdata('akses')=='1') {
            $x['data']=$this->M_tulisan->get_all_tulisan();
        }
		$this->load->view('admin/v_header');
		$this->load->view('admin/v_tulisan',$x);
		$this->load->view('admin/v_footer');
	}
	function add_tulisan(){
		$kode=$this->session->userdata('idadmin');
		$x['user']=$this->M_pengguna->get_pengguna_login($kode);
		$this->load->view('admin/v_header');
		$this->load->view('admin/v_add_tulisan',$x);
		$this->load->view('admin/v_footer');
	}
	function get_edit(){
		$kode=$this->uri->segment(4);
		$x['data']=$this->M_tulisan->get_tulisan_by_kode($kode);
		$this->load->view('admin/v_header');
		$this->load->view('admin/v_edit_tulisan',$x);
		$this->load->view('admin/v_footer');
	}
	function get_edit_tolak(){
		try {
			$tulisan_id=$this->uri->segment(4);
			$this->M_tulisan->update_tulisan($tulisan_id,'',2);
			echo $this->session->set_flashdata('success','Status Berhasil Diupdate!');
		} catch (Exception $e) {
			echo $this->session->set_flashdata('error',$e->getMessage());
		}
		redirect('admin/tulisan');
	}
	function simpan_tulisan(){
		$config['upload_path'] = './assets/images/'; //path folder
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; //type yang dapat diakses bisa anda sesuaikan
		// $config['encrypt_name'] = TRUE;
		//nama yang terupload nantinya
		$config['file_name'] = date('ymdHis').rand(0,99);

		$this->upload->initialize($config);
		if(!empty($_FILES['filefoto']['name']))
		{
			if ($this->upload->do_upload('filefoto'))
			{
				$gbr = $this->upload->data();
				//Compress Image
				$config['image_library']='gd2';
				$config['source_image']='./assets/images/'.$gbr['file_name'];
				$config['create_thumb']= FALSE;
				$config['maintain_ratio']= FALSE;
				$config['quality']= '60%';
				$config['width']= 710;
				$config['height']= 460;
				$config['new_image']= './assets/images/'.$gbr['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();

				$file=$gbr['file_name'];
				$nisn=strip_tags($this->input->post('xnisn'));
				$no_ijazah=$this->input->post('xno_ijazah');
				# $string   = preg_replace('/[^a-zA-Z0-9 \&%|{.}=,?!*()"-_+$@;<>\']/', '', $nisn);
				// $trim     = trim($string);
				// $slug     = strtolower(str_replace(" ", "-", $trim));
				//$imgslider=$this->input->post('ximgslider');
				$tahun_lulus=$this->input->post('xtahun_lulus');
				$kode=$this->session->userdata('idadmin');
				$user=$this->M_pengguna->get_pengguna_login($kode);
				$p=$user->row_array();
				$user_id=$p['pengguna_id'];
				$user_nama=$p['pengguna_nama'];
				$this->M_tulisan->simpan_tulisan($nisn,$no_ijazah,$tahun_lulus,$user_id,$file);
				echo $this->session->set_flashdata('success','Data Berhasil Ditambahkan!');
				redirect('admin/tulisan');
			}else{
				echo $this->session->set_flashdata('error','Gagal Upload Dokumen!');
				redirect('admin/tulisan');
			}

		} else {
			redirect('admin/tulisan');
		}
	}
	function update_tulisan(){
		$config['upload_path'] = './assets/images/'; //path folder
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; //type yang dapat diakses bisa anda sesuaikan
		// $config['encrypt_name'] = TRUE;
		//nama yang terupload nantinya
		$config['file_name'] = date('ymdHis').rand(0,99).'_legal';

		$this->upload->initialize($config);
		if(!empty($_FILES['filefoto']['name']))
		{
			if ($this->upload->do_upload('filefoto'))
			{
				$gbr = $this->upload->data();
				//Compress Image
				$config['image_library']='gd2';
				$config['source_image']='./assets/images/'.$gbr['file_name'];
				$config['create_thumb']= FALSE;
				$config['maintain_ratio']= FALSE;
				$config['quality']= '60%';
				$config['width']= 710;
				$config['height']= 460;
				$config['new_image']= './assets/images/'.$gbr['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();

				$file=$gbr['file_name'];
				$tulisan_id=$this->input->post('kode');
				$kode=$this->session->userdata('idadmin');
				$this->M_tulisan->update_tulisan($tulisan_id,$file,1);
				echo $this->session->set_flashdata('success','Data Berhasil Disimpan!');
				redirect('admin/tulisan');
			}else{
				echo $this->session->set_flashdata('error','Gagal Upload Dokumen!');
				redirect('admin/pengguna');
			}
		}
	}

	function hapus_tulisan(){
		$kode=$this->input->post('kode');
		$gambar=$this->input->post('gambar');
		$path='./assets/images/'.$gambar;
		unlink($path);
		$this->M_tulisan->hapus_tulisan($kode);
		echo $this->session->set_flashdata('success','Data Berhasil Dihapus!');
		redirect('admin/tulisan');
	}

}
