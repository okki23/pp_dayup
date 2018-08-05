<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
author     : Karlina
email      : karlinamaksum19@gmail.com
copyright  : 2018 
deskripsi  : Class M_front berisi rincian method atau fungsi logic yang digunakan untuk melakukan transaksi data master front, dimana method yang terdaftar mengadopsi dari Parent Model
*/
class M_front extends Parent_Model { 
  
  /*variabel global yang digunakan untuk instance di masing masing method agar dapat
  digunakan sewaktu waktu tanpa harus menulis ulang
  */

  var $nama_tabel = 'm_lowongan';
   

	  
  public function __construct(){
        parent::__construct();
        $this->load->database();
  }
  public function fetch_front(){   
		   $getdata = $this->db->get($this->nama_tabel)->result();
		   $data = array();  
		   $no = 1;
           foreach($getdata as $row)  
           {  
                $sub_array = array();  
                $sub_array[] = $no;
                $sub_array[] = $row->nama_lowongan;   
			          $sub_array[] = limit_to_numwords($row->deskripsi,50)." ...  <button type='button' onclick='Test(".$row->id.");' class='btn btn-primary'> Read more </button>";   
                $sub_array[] = $row->tanggal_terbit;  
			   
                $data[] = $sub_array;  
                 $no++;
           }  
          
		   return $output = array("data"=>$data);
		    
    }

  
  
	 
 
}
