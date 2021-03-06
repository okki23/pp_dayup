<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
author     : Karlina
email      : karlinamaksum19@gmail.com
copyright  : 2018 
deskripsi  : Class M_customer berisi rincian method atau fungsi logic yang digunakan untuk melakukan transaksi data master customer, dimana method yang terdaftar mengadopsi dari Parent Model
*/
class M_customer extends Parent_Model { 
  
  /*variabel global yang digunakan untuk instance di masing masing method agar dapat
  digunakan sewaktu waktu tanpa harus menulis ulang
  */

  var $nama_tabel = 'm_customer';
  var $daftar_field = array('id', 'kode_pelanggan', 'nama', 'tempat_lahir', 'tanggal_lahir', 'no_hp', 'no_kantor', 'no_rumah', 'email', 'alamat', 'upload_ktp', 'upload_npwp', 'upload_slip_gaji', 'upload_dok_pendukung', 'user_insert', 'date_insert', 'user_update', 'date_update');
  var $primary_key = 'id';

	  
  public function __construct(){
        parent::__construct();
        $this->load->database();
  }
  public function fetch_customer(){   
		   $getdata = $this->db->get($this->nama_tabel)->result();
		   $data = array();  
		   $no = 1;
           foreach($getdata as $row)  
           {        
                $sub_array = array();  
                $sub_array[] = $no;
                $sub_array[] = $row->kode_pelanggan;  
                $sub_array[] = $row->nama;  
			    $sub_array[] = $row->no_hp; 
			    $sub_array[] = '<a href="javascript:void(0)" class="btn btn-primary btn-xs waves-effect" id="detail" onclick="Show_Detail('.$row->id.');" > <i class="material-icons">aspect_ratio</i> Detail </a>  
								&nbsp; <a href="javascript:void(0)" id="delete" class="btn btn-warning btn-xs waves-effect" onclick="Ubah_Data('.$row->id.');" > <i class="material-icons">build</i> Ubah </a>
								&nbsp; <a href="javascript:void(0)" id="delete" class="btn btn-danger btn-xs waves-effect" onclick="Hapus_Data('.$row->id.');" > <i class="material-icons">delete</i> Hapus </a>';  
               
                $data[] = $sub_array;  
                 $no++;
           }  
          
		   return $output = array("data"=>$data);
		    
    }

  
  
	 
 
}
