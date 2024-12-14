<?php
class Home extends CI_Controller{
	function __construct(){
		parent::__construct();
	}
	function index(){
		$this->load->view('depan/v_header');
		$this->load->view('depan/v_home');
		$this->load->view('depan/v_footer');
	}
}