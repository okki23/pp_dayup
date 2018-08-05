<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
author     : Karlina
email      : karlinamaksum19@gmail.com
copyright  : 2018 
deskripsi  : Class front berisi rincian method atau fungsi logic yang digunakan untuk melakukan olah data master front, dimana method yang terdaftar mengadopsi dari Parent Controller
*/

class Front extends Parent_Controller {
 
  	//method construct dijalankan pertama kali dan terus berjalan selama class digunakan
 	public function __construct(){
 		parent::__construct();
 		$this->load->model('m_front'); 
		 
 	}

 	//method untuk memanggil halaman front pertama kali
	public function index(){
		$data['judul'] = $this->data['judul'];  
		$this->load->view('front/front_view',$data); 
	}

  	//method untuk memanggil data dari database untuk di buatkan data JSON dan di parse ke view yang akan di sajikan dalam datatable
 	public function show_detail(){  
 	   $id = $this->uri->segment(3);
       $sql = $this->db->where('id',$id)->get('m_lowongan')->row();
       echo json_encode($sql);
  	}

  	//method untuk memanggil data dari database untuk di buatkan data JSON dan di parse ke view yang akan di sajikan dalam datatable
 	public function fetch_front(){  
 	 
       $getdata = $this->m_front->fetch_front();
       echo json_encode($getdata);   
  	}  
	
  	//method yang digunakan untuk menarik id dari data yang dituju untuk diambil datanya dengan query kemudian di parse kedalam form edit data
	public function get_data_edit(){
		$id = $this->uri->segment(3); 
		$get = $this->db->where($this->primary_key,$id)->get($this->nama_tabel)->row();
		echo json_encode($get,TRUE);
	}
	 


}
