<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
author     : Karlina
email      : karlinamaksum19@gmail.com
copyright  : 2018 
deskripsi  : Class customer berisi rincian method atau fungsi logic yang digunakan untuk melakukan olah data master customer, dimana method yang terdaftar mengadopsi dari Parent Controller
*/

class Customer extends Parent_Controller {

  /*variabel global yang digunakan untuk instance di masing masing method agar dapat
  digunakan sewaktu waktu tanpa harus menulis ulang
  */
  var $nama_tabel = 'm_customer';
  var $daftar_field = array('id', 'kode_pelanggan', 'nama', 'tempat_lahir', 'tanggal_lahir', 'no_hp', 'no_kantor', 'no_rumah', 'email', 'alamat', 'upload_ktp', 'upload_npwp', 'upload_slip_gaji', 'upload_dok_pendukung', 'user_insert', 'date_insert', 'user_update', 'date_update');
  var $primary_key = 'id';
 
  //method construct dijalankan pertama kali dan terus berjalan selama class digunakan
 	public function __construct(){
 		parent::__construct();
 		$this->load->model('m_customer'); 
		if(!$this->session->userdata('username')){
		   echo "<script language=javascript>
				 alert('Anda tidak berhak mengakses halaman ini!');
				 window.location='" . base_url('login') . "';
				 </script>";
		}
 	}

  //method untuk memanggil halaman customer pertama kali
	public function index(){
		$data['judul'] = $this->data['judul']; 
		$data['konten'] = 'customer/customer_view';
		$this->load->view('template_view',$data);		
   
	}

	public function generate_kode_pelanggan(){
		$param = 5;
		echo "KP".generate_kode_pelanggan($param);
	}

  //method untuk memanggil data dari database untuk di buatkan data JSON dan di parse ke view yang akan di sajikan dalam datatable
  public function fetch_customer(){  
       $getdata = $this->m_customer->fetch_customer();
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
		
        //cek apakah dokumen tersedia
		$dokumen = $this->db->where($this->primary_key,$id)->get($this->nama_tabel)->row(); 
   
		if($dokumen->upload_ktp!= '' || $dokumen->upload_ktp != NULL){
          //apabila dok ktp ada maka dihapus,apabila sebaliknya maka tidak dihapus
          unlink("upload/".str_replace(" ","_",$dokumen->kode_pelanggan."-".$dokumen->upload_ktp));
		}   
		 
		if($dokumen->upload_npwp != '' || $dokumen->upload_npwp != NULL){
          //apabila dok npwp ada maka dihapus,apabila sebaliknya maka tidak dihapus
          unlink("upload/".str_replace(" ","_",$dokumen->kode_pelanggan."-".$dokumen->upload_npwp));
		}   
		 
   
		if($dokumen->upload_slip_gaji!= '' || $dokumen->upload_slip_gaji != NULL){
          //apabila dok slip gaji ada maka dihapus,apabila sebaliknya maka tidak dihapus
          unlink("upload/".str_replace(" ","_",$dokumen->kode_pelanggan."-".$dokumen->upload_slip_gaji));
		}   
		  
   
		if($dokumen->upload_dok_pendukung != '' || $dokumen->upload_dok_pendukung != NULL){
          //apabila dok pendukung ada maka dihapus,apabila sebaliknya maka tidak dihapus
          unlink("upload/".str_replace(" ","_",$dokumen->kode_pelanggan."-".$dokumen->upload_dok_pendukung));
		}   

    $sqlhapus = $this->m_customer->hapus_data($id);
		
		if($sqlhapus){
			$result = array("response"=>array('message'=>'success'));
		}else{
			$result = array("response"=>array('message'=>'failed'));
		}
		
		echo json_encode($result,TRUE);
	}
	
  //method atau fungsi yang digunakan untuk menyimpan data dari form,baik saat melakukan simpan maupun ubah data
	public function simpan_data(){ 
    
    $data_form = $this->m_customer->array_from_post($this->daftar_field);

    $id = isset($data_form['id']) ? $data_form['id'] : NULL; 
 

    $simpan_data = $this->m_customer->simpan_data_master($data_form,$this->nama_tabel,$this->primary_key,$id);
    $simpan_ktp = $this->upload_ktp($data_form['kode_pelanggan']);
	$simpan_npwp = $this->upload_npwp($data_form['kode_pelanggan']);
	$simpan_slip_gaji = $this->upload_slip_gaji($data_form['kode_pelanggan']);
	$simpan_dok_pendukung = $this->upload_dok_pendukung($data_form['kode_pelanggan']);
	 
		if($simpan_data && $simpan_ktp && $simpan_npwp && $simpan_slip_gaji && $simpan_dok_pendukung){
			$result = array("response"=>array('message'=>'success'));
		}else{
			$result = array("response"=>array('message'=>'failed'));
		}
		
		echo json_encode($result,TRUE);

	}
	
  //method atau fungsi yang digunakan untuk menyimpan dokumen-dokumen dari form dan me return nama file yang baru di upload untuk digunakan saat penyimpanan atau perubahan data dokumenar
  function upload_ktp($kode_pelanggan){  
    if(isset($_FILES["user_ktp"])){  
        $extension = explode('.', $_FILES['user_ktp']['name']);   
        $destination = './upload/' . $kode_pelanggan.'-'.$_FILES['user_ktp']['name'];  
        return move_uploaded_file($_FILES['user_ktp']['tmp_name'], $destination);  
         
    }  
  }  
  function upload_npwp($kode_pelanggan){  
    if(isset($_FILES["user_npwp"])){  
        $extension = explode('.', $_FILES['user_npwp']['name']);   
        $destination = './upload/' . $kode_pelanggan.'-'.$_FILES['user_npwp']['name'];  
        return move_uploaded_file($_FILES['user_npwp']['tmp_name'], $destination);  
         
    }  
  }  
  function upload_slip_gaji($kode_pelanggan){  
    if(isset($_FILES["user_slip_gaji"])){  
        $extension = explode('.', $_FILES['user_slip_gaji']['name']);   
        $destination = './upload/' . $kode_pelanggan.'-'.$_FILES['user_slip_gaji']['name'];  
        return move_uploaded_file($_FILES['user_slip_gaji']['tmp_name'], $destination);  
         
    }  
  }  
  function upload_dok_pendukung($kode_pelanggan){  
    if(isset($_FILES["user_dok_pendukung"])){  
        $extension = explode('.', $_FILES['user_dok_pendukung']['name']);   
        $destination = './upload/' . $kode_pelanggan.'-'.$_FILES['user_dok_pendukung']['name'];  
        return move_uploaded_file($_FILES['user_dok_pendukung']['tmp_name'], $destination);  
         
    }  
  }  
       


}
