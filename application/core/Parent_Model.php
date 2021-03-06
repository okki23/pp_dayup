<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
author     : Karlina
email      : karlinamaksum19@gmail.com
copyright  : 2018 
deskripsi  : Class ini digunakan untuk menampung fungsi dasar yang mana fungsi tersebut akan di adopsi oleh class turunan nya
*/
class Parent_Model extends CI_Model {

	/*variabel global yang digunakan untuk instance di masing masing method agar dapat
    digunakan sewaktu waktu tanpa harus menulis ulang
    */

    protected $nama_tabel = '';
    protected $daftar_field = '';
    protected $primary_key = 'id';
  
	public function __construct(){
		parent::__construct();
	}

    public function array_from_post($fields) {
        $data = array();
        foreach ($fields as $field) {
            $data[$field] = $this->input->post($field);
        }
        return $data;
    }

	
    
    public function hapus_data($id){
    	$hapus = $this->db->where('id',$id)->delete($this->nama_tabel);
    	return $hapus;
 	}
 
 	public function simpan_data_master($data_form,$nama_tabel,$primary_key,$id){
 
 		if ($id === NULL || $id == '') { 
            $this->db->set($data_form);
            return $this->db->insert($nama_tabel);
           
        } else {
            
            $this->db->set($data_form);
            $this->db->where($primary_key, $id);
            return $this->db->update($nama_tabel);
           
        }

 	}
	
	public function simpan_data_transaksi($data_form,$nama_tabel,$primary_key,$id){

 		$user_insert = $this->session->userdata('username');
 		$date_insert = date('Y-m-d H:i:s');
 		$user_update = $this->session->userdata('username');
 		$date_update = date('Y-m-d H:i:s');
		
		
 		if ($id === NULL || $id == '') { 
            $this->db->set($data_form);
            return $this->db->insert($nama_tabel);
           
        } else {
            
            $this->db->set($data_form);
            $this->db->where($primary_key, $id);
            return $this->db->update($nama_tabel);
           
        }

 	}
}
