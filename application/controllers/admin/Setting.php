<?php
class Setting extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
        if ($this->session->userdata('akses')!='1') {
            $url=base_url('admin/dashboard');
            redirect($url);
        }
		$this->load->model('M_setting');
	}
	function index(){
		$data['setting'] = $this->M_setting->get();
		$this->load->view('admin/v_header');
		$this->load->view('admin/v_setting_form',$data);
		$this->load->view('admin/v_footer');
	}
	function update(){
		$nama=$this->input->post('nama');
		$email=$this->input->post('email');
		$telepon=$this->input->post('telepon');
		$norek=$this->input->post('norek');
		$alamat=$this->input->post('alamat');
		$kabupaten=$this->input->post('kabupaten');
		$propinsi=$this->input->post('propinsi');
		$kodepos=$this->input->post('kodepos');
		try {
			$this->M_setting->update($nama,$email,$telepon,$norek,$alamat,$kabupaten,$propinsi,$kodepos);
			$this->session->set_flashdata('success','Update Setting Berhasil!');
		} catch (Exception $e) {
			$this->session->set_flashdata('danger',$e->getMessage());
		}
		redirect('admin/setting');
	}
	
}