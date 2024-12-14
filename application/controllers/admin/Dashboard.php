<?php
class Dashboard extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
	}
	function index(){
		if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2'){
			$this->load->view('admin/v_header');
			$this->load->view('admin/v_dashboard');
			$this->load->view('admin/v_footer');
		}else{
			redirect('administrator');
		}
	
	}
	
}