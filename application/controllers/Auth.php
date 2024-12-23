<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function __construct()
	{
		date_default_timezone_set('Asia/Jakarta');
		parent::__construct();
		$this->load->model('UserProvider');
	}
	public function index()
	{
		// // JIKA SESSION USERNAME ADA/ SDH LOGIN
		// // HLM AWAL
		if ($this->session->userdata('username') != '') {
			$nik=$this->session->userdata('username');
			$data['profil'] = $this->UserProvider->get_where(['nik'=>$nik])->row_array();
			$this->load->view('header');
			$this->load->view('user/profil',$data);
			$this->load->view('footer');
		} else {
			// JIKA SESSION USERNAME BLM ADA/ BLM LOGIN
			// HLM LOGIN
			$this->load->view('login');
		}
	}
	public function login()
	{
		$this->load->view('login');
	}
	public function prosesLogin()
	{
		$nik = $this->input->post('nik');
		$password = md5($this->input->post('password'));
		$where = [
			'nik'		=> $nik,
			'password'	=> $password,
			'status'	=> 1
		];
		$cek = $this->UserProvider->get_where($where)->row_array();
		// Cek data pada tabel, JIKA ada maka BUAT SESSION utk Login
		if ($cek != null) {
			$this->session->set_userdata('username',$nik);
			redirect();
		} else {
		// JIKA data tdk ditemukan BUAT SESSION utk mengambalikan error
			$this->session->set_flashdata('error','User ID atau Password Salah!');
			$this->session->set_flashdata('user_login',$nik);
			redirect('auth/index');
		}
	}
	public function register()
	{
		$this->load->view('register');
	}
	public function prosesRegister()
	{
        $nisn=$this->input->post('nisn');
        $nama=$this->input->post('nama');
        $nik=$this->input->post('nik');
        $password=$this->input->post('password');
        $konfirm_password=$this->input->post('password2');
        $email=$this->input->post('email');
        $nohp=$this->input->post('kontak');
        $password_default = '12345';
        if (empty($password)) {
        	$password = $password_default;
        	$konfirm_password = $password_default;
        }
        $level=2;
        if ($password <> $konfirm_password) {
            $this->session->set_flashdata('error','Password dan Password Konfirmasi Tidak Sama!');
            $this->session->set_flashdata('nisn_register',$nisn);
            $this->session->set_flashdata('nama_register',$nama);
            $this->session->set_flashdata('nik_register',$nik);
            $this->session->set_flashdata('email_register',$email);
            $this->session->set_flashdata('kontak_register',$nohp);
            redirect('auth/register');
        }else{
            try {
				$data = [
					'nik'       => $this->input->post('nik'),
					'password'  => md5($password),
					'email'		=> $this->input->post('email'),
					'nama'      => $this->input->post('nama'),
					'nisn'		=> $this->input->post('nisn'),
					'kontak'	=> $this->input->post('kontak'),
					'admin'		=> 0,
					'level'     => 0,
					'status'    => 1,
				];
				$this->UserProvider->insert($data);
				$this->session->set_flashdata('info','Akun Berhasil Dibuat! Silahkan Masuk dengan Akun yang Sudah Anda Buat!');
                redirect('auth/login');
            } catch (Exception $e) {
                $this->session->set_flashdata('error',$e->getMessage());
                $this->session->set_flashdata('nisn_register',$nisn);
                $this->session->set_flashdata('nama_register',$nama);
                $this->session->set_flashdata('nik_register',$nik);
                $this->session->set_flashdata('email_register',$email);
                $this->session->set_flashdata('kontak_register',$nohp);
                redirect('auth/register');
            }
        }
    }
	public function logout(){
		// HAPUS SEMUA SESSION DAN REDIRECT KE INDEX
		$this->session->sess_destroy();
		redirect();
	}
}