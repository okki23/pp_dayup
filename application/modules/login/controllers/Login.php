<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
author     : Karlina
email      : karlinamaksum19@gmail.com
copyright  : 2018 
deskripsi  : Class login berisi rincian method atau fungsi logic yang digunakan untuk melakukan autentikasi login serta logout, dimana method yang terdaftar mengadopsi dari Parent Controller
*/

class Login extends Parent_Controller {

   

 	public function __construct(){
 		parent::__construct();
 		$this->load->model('m_login');
 	}
	public function index(){
		$data['judul'] = $this->data['judul']; 
		$this->load->view('login/login_view',$data);
	}
	public function autentikasi(){
		//parsing username dan password dari form untuk di autentikasi
		$username = $this->input->post('username');
		$password = base64_encode($this->input->post('password'));
		$posisi = $this->input->post('posisi');
		
		
		//apabila posisi login sebagai superadmin
		if($posisi == '1'){ 
			$list = array("username"=>$username,"6"=>$password,"posisi"=>$posisi);
			//var_dump($list);
			
			//cek ke database apakah username dan password yang dimaksud tersedia didalam tabel?
			$auth = $this->m_login->autentikasi_superadmin($username,$password);
		 
			$session = $this->m_login->autentikasi_superadmin($username,$password)->row();
			//apabila tersedia maka akan mengalihkan ke halaman dashboard serta generate session aktif
			if($auth->num_rows() > 0){
				$this->session->set_userdata(array('username'=>$session->username,'session'=>$posisi));
				redirect(base_url('dashboard'));
			}else{
				echo "<script language=javascript>
				alert('Akun yang anda masukkan tidak tersedia, Periksa kembali!');
				window.location='" . base_url() . "';
				</script>";
			}
			
		//apabila posisi login sebagai admin hrd
		}else if($posisi == '2'){
			$list = array("username"=>$username,"password"=>$password,"posisi"=>$posisi);
			//var_dump($list);
			
			//cek ke database apakah username dan password yang dimaksud tersedia didalam tabel?
			$auth = $this->m_login->autentikasi_admin_hrd($username,$password);
			 
			$session = $this->m_login->autentikasi_admin_hrd($username,$password)->row();
			//apabila tersedia maka akan mengalihkan ke halaman dashboard serta generate session aktif
			if($auth->num_rows() > 0){
				$this->session->set_userdata(array('username'=>$session->username,'session'=>$posisi));
				redirect(base_url('dashboard'));
			}else{
				echo "<script language=javascript>
				alert('Akun yang anda masukkan tidak tersedia, Periksa kembali!');
				window.location='" . base_url() . "';
				</script>";
			}
			
		//apabila posisi login sebagai supervisor
		}else if($posisi == '3'){ 
			$list = array("username"=>$username,"password"=>$password,"posisi"=>$posisi);
			//var_dump($list);
			
			//cek ke database apakah username dan password yang dimaksud tersedia didalam tabel?
			$auth = $this->m_login->autentikasi_supervisor($username,$password);
			 
			$session = $this->m_login->autentikasi_supervisor($username,$password)->row();
			//apabila tersedia maka akan mengalihkan ke halaman dashboard serta generate session aktif
			if($auth->num_rows() > 0){
				$this->session->set_userdata(array('username'=>$session->username,'session'=>$posisi));
				redirect(base_url('dashboard'));
			}else{
				echo "<script language=javascript>
				alert('Akun yang anda masukkan tidak tersedia, Periksa kembali!');
				window.location='" . base_url() . "';
				</script>";
			}
		//apabila posisi login sebagai pelamar	
		}else{
			$list = array("username"=>$username,"password"=>$password,"posisi"=>$posisi);
			//var_dump($list);
			
			//cek ke database apakah username dan password yang dimaksud tersedia didalam tabel?
			$auth = $this->m_login->autentikasi_pelamar($username,$password);
			 
			$session = $this->m_login->autentikasi_pelamar($username,$password)->row();
			//apabila tersedia maka akan mengalihkan ke halaman dashboard serta generate session aktif
			if($auth->num_rows() > 0){
				$this->session->set_userdata(array('username'=>$session->username,'session'=>$posisi));
				redirect(base_url('dashboard'));
			}else{
				echo "<script language=javascript>
				alert('Akun yang anda masukkan tidak tersedia, Periksa kembali!');
				window.location='" . base_url() . "';
				</script>";
			}
		}
		
 
	}

	public function logout(){
		$this->session->sess_destroy();
		echo "<script language=javascript>
             alert('Anda telah keluar dari ".$this->data['judul']." ');
             window.location='" . base_url() . "';
             </script>";
		 
	}
}
