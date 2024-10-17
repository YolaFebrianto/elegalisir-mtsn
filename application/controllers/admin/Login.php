<?php
class Login extends CI_Controller{
    function __construct(){
        parent:: __construct();
        $this->load->model('M_login');
    }
    function index(){
        $this->load->view('admin/v_login');
    }
    function auth(){
        $username=strip_tags(str_replace("'", "", $this->input->post('username')));
        $password=strip_tags(str_replace("'", "", $this->input->post('password')));
        $u=$username;
        $p=$password;
        $cadmin=$this->M_login->cekadmin($u,$p);
        // echo json_encode($cadmin);
        if($cadmin->num_rows() > 0){
         $this->session->set_userdata('masuk',true);
         $this->session->set_userdata('user',$u);
         $xcadmin=$cadmin->row_array();
         if($xcadmin['pengguna_level']=='1'){
            $this->session->set_userdata('akses','1');
            $idadmin=$xcadmin['pengguna_id'];
            $user_nama=$xcadmin['pengguna_nama'];
            $this->session->set_userdata('idadmin',$idadmin);
            $this->session->set_userdata('nama',$user_nama);
            redirect('admin/dashboard');
         }else{
             $this->session->set_userdata('akses','2');
             $idadmin=$xcadmin['pengguna_id'];
             $user_nama=$xcadmin['pengguna_nama'];
             $this->session->set_userdata('idadmin',$idadmin);
             $this->session->set_userdata('nama',$user_nama);
             redirect('admin/dashboard');
         }

       }else{
         echo $this->session->set_flashdata('error','Username Atau Password Salah');
         $this->session->set_flashdata('username_login',$username);
         redirect('admin/login');
       }

    }

    function logout(){
        $this->session->sess_destroy();
        redirect('admin/login');
    }
    function register(){
        $this->load->view('admin/v_register');
    }
    function simpan_data_register(){
        $this->load->model('M_pengguna');
        $nisn=$this->input->post('xnisn');
        $nama=$this->input->post('xnama');
        $username=$this->input->post('xusername');
        $password=$this->input->post('xpassword');
        $konfirm_password=$this->input->post('xpassword2');
        $email=$this->input->post('xemail');
        $nohp=$this->input->post('xkontak');
        $level=2;
        if ($password <> $konfirm_password) {
            echo $this->session->set_flashdata('error','Password dan Password Konfirmasi Tidak Sama!');
            $this->session->set_flashdata('nisn_register',$nisn);
            $this->session->set_flashdata('nama_register',$nama);
            $this->session->set_flashdata('username_register',$username);
            $this->session->set_flashdata('email_register',$email);
            $this->session->set_flashdata('kontak_register',$nohp);
            redirect('admin/login/register');
        }else{
            try {
                $this->M_pengguna->simpan_pengguna_tanpa_gambar($nama,'',$username,$password,$email,$nohp,$level,$nisn,'','');
                echo $this->session->set_flashdata('success','Akun Berhasil Dibuat! Silahkan Masuk dengan Akun yang Sudah Anda Buat!');
                redirect('admin/login');
            } catch (Exception $e) {
                echo $this->session->set_flashdata('error',$e->getMessage());
                $this->session->set_flashdata('nisn_register',$nisn);
                $this->session->set_flashdata('nama_register',$nama);
                $this->session->set_flashdata('username_register',$username);
                $this->session->set_flashdata('email_register',$email);
                $this->session->set_flashdata('kontak_register',$nohp);
                redirect('admin/login/register');
            }
        }
    }
}
