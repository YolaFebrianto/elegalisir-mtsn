<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller{
	public function __construct(){
		date_default_timezone_set('Asia/Jakarta');
		parent::__construct();
		$this->load->model('UserProvider');
		$this->load->model('InstansiProvider');
		if (empty($this->session->userdata('username')) && ($this->uri->segment(2)!='index') && ($this->uri->segment(2)!='prosesLogin')) {
			$url=base_url('auth/index');
			redirect($url);
		}
	}
	public function index(){
		$data['setting'] = $this->InstansiProvider->get();
		$this->load->view('header');
		$this->load->view('setting_form',$data);
		$this->load->view('footer');
	}
	public function update(){
		$data = [
			'institusi' => $this->input->post('institusi'),
			'nama'		=> $this->input->post('nama'),
			'status'	=> $this->input->post('status'),
			'alamat'	=> $this->input->post('alamat'),
			'kepsek'	=> $this->input->post('kepsek'),
			'nip'		=> $this->input->post('nip'),
			'website'	=> $this->input->post('website'),
			'email'		=> $this->input->post('email'),
		];
		try {
			$cek = $this->InstansiProvider->update($data);
			if ($cek) {
				$this->session->set_flashdata('info','Update Setting Berhasil!');
			} else {
				$this->session->set_flashdata('error','Update Setting Gagal!');
			}
		} catch (Exception $e) {
			$this->session->set_flashdata('error',$e->getMessage());
		}
		redirect('setting');
	}
}