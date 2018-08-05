<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
author     : Karlina
email      : karlinamaksum19@gmail.com
copyright  : 2018 
deskripsi  : Class pendaftaran berisi rincian method atau fungsi logic yang digunakan untuk melakukan olah data master pendaftaran, dimana method yang terdaftar mengadopsi dari Parent Controller
*/

class Pendaftaran extends Parent_Controller {

  /*variabel global yang digunakan untuk instance di masing masing method agar dapat
  digunakan sewaktu waktu tanpa harus menulis ulang
  */
  var $nama_tabel = 'm_pelamar';
  var $daftar_field = array( 'id', 'nama_lengkap', 'no_ktp', 'email', 'tempat_lahir', 'tanggal_lahir', 'alamat_tinggal', 'jenis_kelamin', 'kewarganegaraan', 'agama', 'no_telp', 'riwayat_pendidikan', 'pengalaman_pekerjaan', 'pendidikan_terakhir', 'upload_cv');
  var $primary_key = 'id';
 
  //method construct dijalankan pertama kali dan terus berjalan selama class digunakan
 	public function __construct(){
 		parent::__construct();
 		$this->load->model('m_pendaftaran');  
	  $this->load->library('MyPHPMailer'); // load library
 	}

   
 
 	public function Buat_Akun(){
 		   $nama_lengkap = $this->input->post('nama_lengkap'); 
 	     $email = $this->input->post('email');
       $username = $this->input->post('username');
       $password = base64_encode($this->input->post('password'));
    
        $this->db->query("insert into m_pelamar (nama_lengkap,email) values ('".$nama_lengkap."','".$email."')");
        $insert_id = $this->db->insert_id();

        $new_account = $this->db->query("insert into m_akun_pelamar set username = '".$username."' , password = '".$password."', id_akun_pelamar = '".$insert_id."' ");

         
        $isiEmail = "Pelamar  atas nama ".$nama_lengkap." dengan email ".$email." sudah aktif<br>
        Berikut akun yang dapat anda gunakan untuk masuk ke sistem : <br>
        <b>Username  : </b> ".$username." <br>
        <b>Password  : </b> ".base64_decode($password)." <br>
        
        <hr>
        Sekian dan Terima Kasih";

        $mail = new PHPMailer();
        $mail->IsHTML(true);    // set email format to HTML
        $mail->IsSMTP();   // we are going to use SMTP
        $mail->SMTPAuth   = true; // enabled SMTP authentication
        $mail->SMTPSecure = "ssl";  // prefix for secure protocol to connect to the server
        $mail->Host       = "smtp.gmail.com";      // setting GMail as our SMTP server
        //$mail->Host       = "srv27.niagahoster.com";      // setting GMail as our SMTP server
       
        $mail->Port       = 465;                   // SMTP port to connect to GMail
        $mail->Username   = "azzahrohku@gmail.com";  // alamat email kamu
        $mail->Password   = "punyapoohku";            // password GMail
        $mail->SetFrom('azzahrohku@gmail.com', 'noreply');  //Siapa yg mengirim email
        $mail->Subject    = "Pendaftaran Akun";
        $mail->Body       = $isiEmail;
        
        $mail->AddAddress($email);
       
       if($mail->Send() && $new_account){
        echo "<script language=javascript>
             alert('Pendaftaran Berhasil, Silahkan buka email anda');
             window.location='" . base_url() . "';
                 </script>";
       }
        
         
 	}


}
