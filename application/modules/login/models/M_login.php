<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
author     : Karlina
email      : karlinamaksum19@gmail.com
copyright  : 2018 
deskripsi  : Class M_login berisi rincian method atau fungsi logic yang digunakan untuk melakukan transaksi data master login, dimana method yang terdaftar mengadopsi dari Parent Model
*/
class M_login extends Parent_Model { 
  
  /*variabel global yang digunakan untuk instance di masing masing method agar dapat
  digunakan sewaktu waktu tanpa harus menulis ulang
  */

  var $nama_tabel_superadmin = 'm_akun_superadmin';
  var $daftar_field_superadmin = array( 'id', 'username', 'password');
  
  var $nama_tabel_admin_hrd = 'm_akun_admin_hrd';
  var $daftar_field_admin_hrd = array('id', 'username', 'password', 'id_admin_hrd'); 
  
  var $nama_tabel_supervisor = 'm_akun_supervisor';
  var $daftar_field_supervisor = array('id', 'username', 'password', 'id_supervisor');

  var $nama_tabel_pelamar = 'm_akun_pelamar';
  var $daftar_field_pelamar = array('id', 'username', 'password', 'id_akun_pelamar'); 
  
  var $primary_key = 'id';

	  
	public function __construct(){
        parent::__construct();
        $this->load->database();
	}

	public function autentikasi_superadmin($username,$password){
        $sql = $this->db->get_where($this->nama_tabel_superadmin,array('username'=>$username,'password'=>$password));
		return $sql;
	}
	public function autentikasi_admin_hrd($username,$password){
        $sql = $this->db->get_where($this->nama_tabel_admin_hrd,array('username'=>$username,'password'=>$password));
		return $sql;
	}
	public function autentikasi_supervisor($username,$password){
        $sql = $this->db->get_where($this->nama_tabel_supervisor,array('username'=>$username,'password'=>$password));
		return $sql;
	}
  public function autentikasi_pelamar($username,$password){
        $sql = $this->db->get_where($this->nama_tabel_pelamar,array('username'=>$username,'password'=>$password));
    return $sql;
  }
 
 
}
