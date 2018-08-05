<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
author     : Karlina
email      : karlinamaksum19@gmail.com
copyright  : 2018 
deskripsi  : Class login berisi rincian method atau fungsi logic yang digunakan untuk melakukan autentikasi login serta logout, dimana method yang terdaftar mengadopsi dari Parent Controller
*/

class Login extends Parent_Controller {

  	/*variabel global yang digunakan untuk instance di masing masing method agar dapat
  	digunakan sewaktu waktu tanpa harus menulis ulang
  	*/
  	var $nama_tabel = 'm_user';
  	var $daftar_field = array('id','id_user','username','password','user_insert','date_insert','user_update','date_update');
  	var $primary_key = 'id';

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
			$list = array("username"=>$username,"password"=>$password,"posisi"=>$posisi);
			//var_dump($list);
			
			//cek ke database apakah username dan password yang dimaksud tersedia didalam tabel?
			$auth = $this->m_login->autentikasi_superadmin($username,$password);
			/* echo $this->db->last_query();
			exit(); */
			$session = $this->m_login->autentikasi_superadmin($username,$password)->row();
			//apabila tersedia maka akan mengalihkan ke halaman dashboard serta generate session aktif
			if($auth->num_rows() > 0){
				$this->session->set_userdata(array('username'=>$session->username,'session'=>$posisi));
				redirect(base_url('dashboard'));
			}else{
				echo "<script language=javascript>
				alert('Akun yang anda masukkan tidak tersedia, Periksa kembali!');
				window.location='" . base_url('login') . "';
				</script>";
			}
			
		//apabila posisi login sebagai admin pppu
		}else if($posisi == '2'){
			$list = array("username"=>$username,"password"=>$password,"posisi"=>$posisi);
			//var_dump($list);
			
			//cek ke database apakah username dan password yang dimaksud tersedia didalam tabel?
			$auth = $this->m_login->autentikasi_admin_pppu($username,$password);
			/* echo $this->db->last_query();
			exit(); */
			$session = $this->m_login->autentikasi_admin_pppu($username,$password)->row();
			//apabila tersedia maka akan mengalihkan ke halaman dashboard serta generate session aktif
			if($auth->num_rows() > 0){
				$this->session->set_userdata(array('username'=>$session->username,'session'=>$posisi));
				redirect(base_url('dashboard'));
			}else{
				echo "<script language=javascript>
				alert('Akun yang anda masukkan tidak tersedia, Periksa kembali!');
				window.location='" . base_url('login') . "';
				</script>";
			}
			
		//apabila posisi login sebagai sales
		}else{
			$list = array("username"=>$username,"password"=>$password,"posisi"=>$posisi);
			//var_dump($list);
			
			//cek ke database apakah username dan password yang dimaksud tersedia didalam tabel?
			$auth = $this->m_login->autentikasi_sales($username,$password);
			/* echo $this->db->last_query();
			exit(); */
			$session = $this->m_login->autentikasi_sales($username,$password)->row();
			//apabila tersedia maka akan mengalihkan ke halaman dashboard serta generate session aktif
			if($auth->num_rows() > 0){
				$this->session->set_userdata(array('username'=>$session->username,'session'=>$posisi));
				redirect(base_url('dashboard'));
			}else{
				echo "<script language=javascript>
				alert('Akun yang anda masukkan tidak tersedia, Periksa kembali!');
				window.location='" . base_url('login') . "';
				</script>";
			}
		}
		
 
	}

	public function logout(){
		$this->session->sess_destroy();
		echo "<script language=javascript>
             alert('Anda telah keluar dari ".$this->data['judul']." ');
             window.location='" . base_url('login') . "';
             </script>";
		 
	}
}
