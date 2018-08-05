<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dtb extends CI_Controller {

 
 	public function __construct(){
 		parent::__construct();
 		$this->load->model('m_dtb');
 	}
	public function index()
	{ 
		$this->load->view('dtb/dtb_view');
	}
	 
	public function get_data_edit(){
		$urut = $this->uri->segment(3); 
		$get = $this->db->where('urut',$urut)->get('tb_lintas')->row();
		echo json_encode($get,TRUE);
	}
	
	public function delete_data(){
		$urut = $this->uri->segment(3); 
		
		
		$getfoto = $this->db->where('urut',$urut)->get('tb_lintas')->row();
		
		if($getfoto->foto != '' || $getfoto->foto != NULL){
          unlink("upload/".str_replace(" ","_",$getfoto->foto));
		}  
		
		$get = $this->db->where('urut',$urut)->delete('tb_lintas');
		if($get){
			$result = array("response"=>array('message'=>'success'));
		}else{
			$result = array("response"=>array('message'=>'failed'));
		}
		
		echo json_encode($result,TRUE);
	}
	
	public function save_data(){
  
		$urut = $this->input->post('urut');
		$lintas = $this->input->post('lintas');
		$prodi = $this->input->post('prodi');
		$nama_lintas = $this->input->post('nama_lintas'); 
		$method =  $this->input->post('nama_lintas'); 

    if($method == 'Add'){

    }else{

    }
    
		$send_to_db = array('urut'=>$urut,
          							'lintas'=>$lintas,
          							'prodi'=>$prodi,
          							'nama_lintas'=>$nama_lintas,
          							'foto'=>$this->upload_image()
                        );
		
		$save = $this->db->insert('tb_lintas',$send_to_db);
		

		if($save){
			$result = array("response"=>array('message'=>'success'));
		}else{
			$result = array("response"=>array('message'=>'failed'));
		}
		
		echo json_encode($result,TRUE);
	}
	
    function fetch_user(){  
 
		   $getdata = $this->db->get('tb_lintas')->result();
		   $data = array();  
           foreach($getdata as $row)  
           {  
                $sub_array = array();  
                 
                $sub_array[] = $row->urut;  
                $sub_array[] = $row->lintas;  
			          $sub_array[] = $row->prodi;  
                $sub_array[] = $row->nama_lintas;  
				if($row->foto == '' || $row->foto == NULL){
					$sub_array[] = '<a title="Preview" onclick="Sempak();"  href="javascript:void(0)"><img class="thumbnail img-responsive" src="'.base_url().'upload/photo_na.jpg"></a>';
				}else{
					$sub_array[] = '<a title="Preview" onclick="Sempak();" href="javascript:void(0)"><img class="thumbnail img-responsive" src="'.base_url().'upload/'.$row->foto.'"></a>';
				}
				 
			    $sub_array[] = '<a href="javascript:void(0)" class="btn btn-warning btn-xs waves-effect" id="edit" onclick="Edit('.$row->urut.');" > <i class="material-icons">create</i> Ubah </a>  &nbsp; <a href="javascript:void(0)" id="delete" class="btn btn-danger btn-xs waves-effect" onclick="Delete('.$row->urut.');" > <i class="material-icons">delete</i> Hapus </a>';  
               
                $data[] = $sub_array;  
           }  
		   $output = array("data"=>$data);
		   echo json_encode($output);  
		  
      }  
      function user_action(){  
           if($_POST["action"] == "Add")  
           {  
                $insert_data = array(  
                     'first_name'        =>     $this->input->post('first_name'),  
                     'last_name'         =>     $this->input->post("last_name"),  
                     'image'             =>     $this->upload_image()  
                );  
                $this->load->model('crud_model');  
                $this->crud_model->insert_crud($insert_data);  
                echo 'Data Inserted';  
           }  
           if($_POST["action"] == "Edit")  
           {  
                $user_image = '';  
                if($_FILES["user_image"]["name"] != '')  
                {  
                     $user_image = $this->upload_image();  
                }  
                else  
                {  
                     $user_image = $this->input->post("hidden_user_image");  
                }  
                $updated_data = array(  
                     'first_name'          =>     $this->input->post('first_name'),  
                     'last_name'               =>     $this->input->post('last_name'),  
                     'image'                    =>     $user_image  
                );  
                $this->load->model('crud_model');  
                $this->crud_model->update_crud($this->input->post("user_id"), $updated_data);  
                echo 'Data Updated';  
           }  
      }  
      function upload_image()  
      {  
           if(isset($_FILES["user_image"]))  
           {  
                $extension = explode('.', $_FILES['user_image']['name']);  
                $new_name = rand() . '.' . $extension[1];  
                $destination = './upload/' . $new_name;  
                move_uploaded_file($_FILES['user_image']['tmp_name'], $destination);  
                return $new_name;  
           }  
      }  
      function fetch_single_user()  
      {  
           $output = array();  
           $this->load->model("crud_model");  
           $data = $this->crud_model->fetch_single_user($_POST["user_id"]);  
           foreach($data as $row)  
           {  
                $output['first_name'] = $row->first_name;  
                $output['last_name'] = $row->last_name;  
                if($row->image != '')  
                {  
                     $output['user_image'] = '<img src="'.base_url().'upload/'.$row->image.'" class="img-thumbnail" width="50" height="35" /><input type="hidden" name="hidden_user_image" value="'.$row->image.'" />';  
                }  
                else  
                {  
                     $output['user_image'] = '<input type="hidden" name="hidden_user_image" value="" />';  
                }  
           }  
           echo json_encode($output);  
      }  
      function delete_single_user()  
      {  
           $this->load->model("crud_model");  
           $this->crud_model->delete_single_user($_POST["user_id"]);  
           echo 'Data Deleted';  
      }  


}
