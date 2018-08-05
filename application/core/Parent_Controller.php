<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
author     : Karlina
email      : karlinamaksum19@gmail.com
copyright  : 2018 
deskripsi  : Class ini digunakan untuk menampung fungsi dasar yang mana fungsi tersebut akan di adopsi oleh class turunan nya
*/
class Parent_Controller extends CI_Controller {

	 
	public function __construct(){
		parent::__construct(); 
		$this->data['judul'] = 'Sistem Aplikasi P3U Meikarta';
	}
}
