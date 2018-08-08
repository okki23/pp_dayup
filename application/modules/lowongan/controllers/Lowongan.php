<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
author     : Karlina
email      : karlinamaksum19@gmail.com
copyright  : 2018 
deskripsi  : Class lowongan berisi rincian method atau fungsi logic yang digunakan untuk melakukan olah data master lowongan, dimana method yang terdaftar mengadopsi dari Parent Controller
*/

class Lowongan extends Parent_Controller {

  /*variabel global yang digunakan untuk instance di masing masing method agar dapat
  digunakan sewaktu waktu tanpa harus menulis ulang
  */
  var $nama_tabel = 'm_lowongan';
  var $daftar_field = array('id', 'nama_lowongan', 'deskripsi', 'tanggal_terbit');
  var $primary_key = 'id';
 
  //method construct dijalankan pertama kali dan terus berjalan selama class digunakan
 	public function __construct(){
 		parent::__construct();
 		$this->load->model('m_lowongan'); 
		if(!$this->session->userdata('username')){
		   echo "<script language=javascript>
				 alert('Anda tidak berhak mengakses halaman ini!');
				 window.location='" . base_url('login') . "';
				 </script>";
		}
 	}

  //method untuk memanggil halaman lowongan pertama kali
	public function index(){
		$data['judul'] = $this->data['judul']; 
		$data['konten'] = 'lowongan/lowongan_view';
		$this->load->view('template_view',$data);		
   
	}

  //method untuk memanggil data dari database untuk di buatkan data JSON dan di parse ke view yang akan di sajikan dalam datatable
  public function fetch_lowongan(){  
       $getdata = $this->m_lowongan->fetch_lowongan();
       echo json_encode($getdata);   
  }  
	
  //method yang digunakan untuk menarik id dari data yang dituju untuk diambil datanya dengan query kemudian di parse kedalam form edit data
	public function get_data_edit(){
		$id = $this->uri->segment(3); 
		$get = $this->db->where($this->primary_key,$id)->get($this->nama_tabel)->row();
		echo json_encode($get,TRUE);
	}
	
  //method atau fungsi yang digunakan untuk menghapus data 
	public function hapus_data(){
		$id = $this->uri->segment(3);  
    

    $sqlhapus = $this->m_lowongan->hapus_data($id);
		
		if($sqlhapus){
			$result = array("response"=>array('message'=>'success'));
		}else{
			$result = array("response"=>array('message'=>'failed'));
		}
		
		echo json_encode($result,TRUE);
	}
	
  //method atau fungsi yang digunakan untuk menyimpan data dari form,baik saat melakukan simpan maupun ubah data
	public function simpan_data(){
     
    $data_form = $this->m_lowongan->array_from_post($this->daftar_field);

	$nama_lowongan =  $this->input->post('nama_lowongan');
	$id =  $this->input->post('id');
	$deskripsi =  $this->input->post('deskripsi');
	$tanggal_terbit =  $this->input->post('tanggal_terbit');
	 
	
    $simpan_data = $this->m_lowongan->simpan_data_master($data_form,$this->nama_tabel,$this->primary_key,$id);
	
	
		if($simpan_data){
			$result = array("response"=>array('message'=>'success'));
		}else{
			$result = array("response"=>array('message'=>'failed'));
		}
		
		echo json_encode($result,TRUE); 

	}
	 
       


}
