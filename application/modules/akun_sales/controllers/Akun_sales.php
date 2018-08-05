<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
author     : Karlina
email      : karlinamaksum19@gmail.com
copyright  : 2018 
deskripsi  : Class akun_sales berisi rincian method atau fungsi logic yang digunakan untuk melakukan olah data master akun_sales, dimana method yang terdaftar mengadopsi dari Parent Controller
*/

class Akun_sales extends Parent_Controller {

  /*variabel global yang digunakan untuk instance di masing masing method agar dapat
  digunakan sewaktu waktu tanpa harus menulis ulang
  */
  var $nama_tabel = 'm_akun_sales';
  var $daftar_field = array('id', 'nik', 'nama', 'no_telp', 'email', 'user_insert', 'date_insert', 'user_update', 'date_update');
  var $primary_key = 'id';
 
  //method construct dijalankan pertama kali dan terus berjalan selama class digunakan
 	public function __construct(){
 		parent::__construct();
 		$this->load->model('m_akun_sales'); 
		if(!$this->session->userdata('username')){
		   echo "<script language=javascript>
				 alert('Anda tidak berhak mengakses halaman ini!');
				 window.location='" . base_url('login') . "';
				 </script>";
		}
 	}

  //method untuk memanggil halaman akun_sales pertama kali
	public function index(){
		$data['judul'] = $this->data['judul']; 
		$data['konten'] = 'akun_sales/akun_sales_view';
		$data['list_sales'] = $this->get_sales();
		$this->load->view('template_view',$data);		
   
	}

	public function get_sales(){
		return $this->db->query("SELECT a.*,b.nama from m_akun_sales a
INNER JOIN m_sales b on b.id = a.id_sales")->row();
	}

  //method untuk memanggil data dari database untuk di buatkan data JSON dan di parse ke view yang akan di sajikan dalam datatable
  public function fetch_akun_sales(){  
       $getdata = $this->m_akun_sales->fetch_akun_sales();
       echo json_encode($getdata);   
  }  
	
  //method yang digunakan untuk menarik id dari data yang dituju untuk diambil datanya dengan query kemudian di parse kedalam form edit data
	public function get_data_edit(){
		$id = $this->uri->segment(3); 
		$get = $this->db->query("SELECT a.*,b.nama from m_akun_sales a
								 INNER JOIN m_sales b on b.id = a.id_sales WHERE a.id = '".$id."' ")->row();
		 
		echo json_encode($get,TRUE);
	}
	
  //method atau fungsi yang digunakan untuk menghapus data 
	public function hapus_data(){
		$id = $this->uri->segment(3);  
    

    $sqlhapus = $this->m_akun_sales->hapus_data($id);
		
		if($sqlhapus){
			$result = array("response"=>array('message'=>'success'));
		}else{
			$result = array("response"=>array('message'=>'failed'));
		}
		
		echo json_encode($result,TRUE);
	}

	public function fetch_nama_sales(){
		$getdata = $this->m_akun_sales->fetch_nama_sales();
       	echo json_encode($getdata);   
	}
	
  //method atau fungsi yang digunakan untuk menyimpan data dari form,baik saat melakukan simpan maupun ubah data 
	public function simpan_data_akun_sales(){
		$data_form = $this->m_akun_sales->array_from_post(array('id','username','password','id_sales'));
		$id = $data_form['id'];	 
	 
		//apabila user id kosong maka input data baru
		if($id == '' || empty($id)){  
				return $this->db->query("insert into m_akun_sales set username = '".$data_form['username']."', password = '".base64_encode($data_form['password'])."', id_sales = '".$data_form['id_sales']."', user_insert = '".$this->session->userdata('username')."', date_insert = '".date('Y-m-d H:i:s')."'");
		  

		//apabila user id tersedia maka update data
		}else{

			if($data_form['password'] == '' || empty($data_form['password'])){
				 
				return $this->db->query("update m_akun_sales set username = '".$data_form['username']."', id_sales = '".$data_form['id_sales']."', user_insert = '".$this->session->userdata('username')."', date_insert = '".date('Y-m-d H:i:s')."'  where id = '".$id."' ");
		 
			}else{
			 
				return $this->db->query("update m_akun_sales set username = '".$data_form['username']."',password = '".base64_encode($data_form['password'])."', id_sales = '".$data_form['id_sales']."', user_insert = '".$this->session->userdata('username')."', date_insert = '".date('Y-m-d H:i:s')."'  where id = '".$id."' ");
			}

		}

		 
		
	}
       


}
