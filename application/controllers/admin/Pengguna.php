<?php
class Pengguna extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('M_pengguna');
		$this->load->library('upload');
	}


	function index(){
        if ($this->session->userdata('akses')!='1') {
            $url=base_url('admin/dashboard');
            redirect($url);
        }
		$kode=$this->session->userdata('idadmin');
		$x['user']=$this->M_pengguna->get_pengguna_login($kode);
		$x['data']=$this->M_pengguna->get_all_pengguna();
		$this->load->view('admin/v_header');
		$this->load->view('admin/v_pengguna',$x);
		$this->load->view('admin/v_footer');
	}

	function simpan_pengguna(){
		$config['upload_path'] = './assets/images/'; //path folder
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
		$config['encrypt_name'] = TRUE; //nama yang terupload nantinya

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
			    $config['width']= 300;
			    $config['height']= 300;
			    $config['new_image']= './assets/images/'.$gbr['file_name'];
			    $this->load->library('image_lib', $config);
			    $this->image_lib->resize();

			    $gambar=$gbr['file_name'];
			    $nisn=$this->input->post('xnisn');
			    $no_ijazah=$this->input->post('xnoijazah');
			    $tahun_lulus=$this->input->post('xtahunlulus');
			    $nama=$this->input->post('xnama');
			    $jenkel=$this->input->post('xjenkel');
			    $username=$this->input->post('xusername');
			    $password=$this->input->post('xpassword');
			    $konfirm_password=$this->input->post('xpassword2');
			    $email=$this->input->post('xemail');
			    $nohp=$this->input->post('xkontak');
				$level=$this->input->post('xlevel');
				if ($password <> $konfirm_password) {
					echo $this->session->set_flashdata('error','Password dan Password Konfirmasi Tidak Sama!');
					redirect('admin/pengguna');
				}else{
					$this->M_pengguna->simpan_pengguna($nama,$jenkel,$username,$password,$email,$nohp,$level,$gambar,$nisn,$no_ijazah,$tahun_lulus);
					echo $this->session->set_flashdata('success','Data Pengguna Berhasil Ditambahkan!');
					redirect('admin/pengguna');
					
				}
			    
			}else{
			    echo $this->session->set_flashdata('error','Foto Gagal Diupload!');
			    redirect('admin/pengguna');
			}
		 
		}else{
			$nisn=$this->input->post('xnisn');
			$no_ijazah=$this->input->post('xnoijazah');
			$tahun_lulus=$this->input->post('xtahunlulus');
			$nama=$this->input->post('xnama');
			$jenkel=$this->input->post('xjenkel');
			$username=$this->input->post('xusername');
			$password=$this->input->post('xpassword');
			$konfirm_password=$this->input->post('xpassword2');
			$email=$this->input->post('xemail');
			$nohp=$this->input->post('xkontak');
			$level=$this->input->post('xlevel');
			if ($password <> $konfirm_password) {
				echo $this->session->set_flashdata('error','Password dan Password Konfirmasi Tidak Sama!');
				redirect('admin/pengguna');
			}else{
				$this->M_pengguna->simpan_pengguna_tanpa_gambar($nama,$jenkel,$username,$password,$email,$nohp,$level,$nisn,$no_ijazah,$tahun_lulus);
				echo $this->session->set_flashdata('success','Data Pengguna Berhasil Ditambahkan!');
				redirect('admin/pengguna');
			}
		} 

	}

	function update_pengguna(){		
		$config['upload_path'] = './assets/images/'; //path folder
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
		$config['encrypt_name'] = TRUE; //nama yang terupload nantinya

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
		        $config['width']= 300;
		        $config['height']= 300;
		        $config['new_image']= './assets/images/'.$gbr['file_name'];
		        $this->load->library('image_lib', $config);
		        $this->image_lib->resize();

		        $gambar=$gbr['file_name'];
		        $kode=$this->input->post('kode');
		        $nisn=$this->input->post('xnisn');
		        $no_ijazah=$this->input->post('xnoijazah');
		        $tahun_lulus=$this->input->post('xtahunlulus');
		        $nama=$this->input->post('xnama');
				$jenkel=$this->input->post('xjenkel');
				$username=$this->input->post('xusername');
				$password=$this->input->post('xpassword');
				$konfirm_password=$this->input->post('xpassword2');
				$email=$this->input->post('xemail');
				$nohp=$this->input->post('xkontak');
				$level=$this->input->post('xlevel');
		        if (empty($password) && empty($konfirm_password)) {
		        	$this->M_pengguna->update_pengguna_tanpa_pass($kode,$nama,$jenkel,$username,$password,$email,$nohp,$level,$gambar,$nisn,$no_ijazah,$tahun_lulus);
		    		echo $this->session->set_flashdata('success','Data Pengguna Berhasil Diubah!');
						redirect('admin/pengguna');
				}elseif ($password <> $konfirm_password) {
					echo $this->session->set_flashdata('error','Password dan Password Konfirmasi Tidak Sama!');
					redirect('admin/pengguna');
				}else{
					$this->M_pengguna->update_pengguna($kode,$nama,$jenkel,$username,$password,$email,$nohp,$level,$gambar,$nisn,$no_ijazah,$tahun_lulus);
	    			echo $this->session->set_flashdata('success','Data Pengguna Berhasil Diubah!');
					redirect('admin/pengguna');
				}
		        
		    }else{
		        echo $this->session->set_flashdata('error','Foto Gagal Diupload!');
		        redirect('admin/pengguna');
		    }
		    
		}else{
			$kode=$this->input->post('kode');
			$nisn=$this->input->post('xnisn');
			$no_ijazah=$this->input->post('xnoijazah');
			$tahun_lulus=$this->input->post('xtahunlulus');
			$nama=$this->input->post('xnama');
		    $jenkel=$this->input->post('xjenkel');
		    $username=$this->input->post('xusername');
		    $password=$this->input->post('xpassword');
		    $konfirm_password=$this->input->post('xpassword2');
		    $email=$this->input->post('xemail');
		    $nohp=$this->input->post('xkontak');
			$level=$this->input->post('xlevel');
			if (empty($password) && empty($konfirm_password)) {
		       	$this->M_pengguna->update_pengguna_tanpa_pass_dan_gambar($kode,$nama,$jenkel,$username,$password,$email,$nohp,$level,$nisn,$no_ijazah,$tahun_lulus);
		        echo $this->session->set_flashdata('success','Data Pengguna Berhasil Diubah!');
		   		redirect('admin/pengguna');
			}elseif ($password <> $konfirm_password) {
				echo $this->session->set_flashdata('error','Password dan Password Konfirmasi Tidak Sama!');
	   			redirect('admin/pengguna');
			}else{
		   		$this->M_pengguna->update_pengguna_tanpa_gambar($kode,$nama,$jenkel,$username,$password,$email,$nohp,$level,$nisn,$no_ijazah,$tahun_lulus);
		        echo $this->session->set_flashdata('success','Data Pengguna Berhasil Diubah!');
		   		redirect('admin/pengguna');
		   	}
		}
	}

	function hapus_pengguna(){
        if ($this->session->userdata('akses')!='1') {
            $url=base_url('admin/dashboard');
            redirect($url);
        }
		$kode=$this->input->post('kode');
		$data=$this->M_pengguna->get_pengguna_login($kode);
		$q=$data->row_array();
		$p=$q['pengguna_photo'];
		$path=base_url().'assets/images/'.$p;
		delete_files($path);
		$this->M_pengguna->hapus_pengguna($kode);
	    echo $this->session->set_flashdata('success','Data Pengguna Berhasil Dihapus!');
	    redirect('admin/pengguna');
	}

	function reset_password(){
        $id=$this->uri->segment(4);
        $get=$this->M_pengguna->getusername($id);
        if($get->num_rows()>0){
            $a=$get->row_array();
            $b=$a['pengguna_username'];
        }
        $pass = 'admin';
        // $pass=rand(123456,999999);
        $this->M_pengguna->resetpass($id,$pass);
        echo $this->session->set_flashdata('success',"Password Berhasil Direset Menjadi 'admin'!");
        // echo $this->session->set_flashdata('uname',$b);
        // echo $this->session->set_flashdata('upass',$pass);
	    redirect('admin/pengguna');
   
    }
}