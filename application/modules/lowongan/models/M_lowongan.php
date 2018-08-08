<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
author     : Karlina
email      : karlinamaksum19@gmail.com
copyright  : 2018 
deskripsi  : Class M_lowongan berisi rincian method atau fungsi logic yang digunakan untuk melakukan transaksi data master lowongan, dimana method yang terdaftar mengadopsi dari Parent Model
*/
class M_lowongan extends Parent_Model { 
  
  /*variabel global yang digunakan untuk instance di masing masing method agar dapat
  digunakan sewaktu waktu tanpa harus menulis ulang
  */

  var $nama_tabel = 'm_lowongan';
  var $daftar_field = array('id', 'blok_tower', 'lantai', 'no_lowongan', 'luas', 'tipe', 'foto', 'harga', 'user_insert', 'date_insert', 'user_update', 'date_update');
  var $primary_key = 'id';

	  
  public function __construct(){
        parent::__construct();
        $this->load->database();
  }
  public function fetch_lowongan(){   
		   $getdata = $this->db->get($this->nama_tabel)->result();
		   $data = array();  
		   $no = 1;
           foreach($getdata as $row)  
           {  
                $sub_array = array();  
                $sub_array[] = $no;
                $sub_array[] = $row->nama_lowongan;  
                $sub_array[] = limit_to_numwords($row->deskripsi,20). "...";  
			    $sub_array[] = $row->tanggal_terbit;  
			 
                 
			    $sub_array[] = '<a href="javascript:void(0)" class="btn btn-warning btn-xs waves-effect" id="edit" onclick="Ubah_Data('.$row->id.');" > <i class="material-icons">create</i> Ubah </a> 
				&nbsp; <a href="javascript:void(0)" id="delete" class="btn btn-danger btn-xs waves-effect" onclick="Hapus_Data('.$row->id.');" > <i class="material-icons">delete</i> Hapus </a>';  
               
                $data[] = $sub_array;  
                 $no++;
           }   		 
          
		   return $output = array("data"=>$data);
		    
    }

  
  
	 
 
}
