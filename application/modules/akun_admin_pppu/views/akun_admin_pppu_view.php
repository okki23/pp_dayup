 
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                 
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Data Akun Admin PPPU
                            </h2>
                            <br>
                            <a href="javascript:void(0);" id="addmodal" class="btn btn-primary waves-effect">  <i class="material-icons">add_circle</i>  Tambah Data </a>
 
                        </div>
                        <div class="body">
                                
                            <div class="table-responsive">
							   <table class="table table-bordered table-striped table-hover js-basic-example" id="example" >
  
									<thead>
										<tr>
											<th style="width:5%;">No</th>
                                            <th style="width:5%;">Username</th> 
											<th style="width:5%;">Nama</th> 
											<th style="width:10%;">Opsi</th> 
										</tr>
									</thead> 
								</table> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         


        </div>
    </section>

   
	<!-- form tambah dan ubah data -->
	<div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Form Tambah Data</h4>
                        </div>
                        <div class="modal-body">
                              <form method="post" id="user_form" enctype="multipart/form-data">   
                                 
                                    <input type="hidden" name="id" id="id"> 
									<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="username" id="username" class="form-control" placeholder="Username" />
                                        </div>
                                    </div>
									<div class="form-group">
                                        <div class="form-line">
                                            <span class="label label-danger">* Kosongkan Apabila Tidak Mengganti Password </span>
                                            <input type="password" name="password" id="password" class="form-control" placeholder="Password" /> 
                                        </div>
                                    </div>
									<div class="form-group">
                                        <div class="form-line">
                                            <div class="input-group">
                                                <div class="form-line">
                                                    <input type="text" name="nama_adminpppu" id="nama_adminpppu" class="form-control" readonly="readonly" >
                                                    <input type="hidden" name="id_admin_pppu" id="id_admin_pppu">
                                                </div>
                                                <span class="input-group-addon">
                                                    <button type="button" onclick="CariAdminPPPU();" class="btn btn-primary"> Cari Admin PPPU... </button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
									 

								   <button type="button" onclick="Simpan_Data();" class="btn btn-success waves-effect"> <i class="material-icons">save</i> Simpan</button>

                                   <button type="button" name="cancel" id="cancel" class="btn btn-danger waves-effect" onclick="javascript:Bersihkan_Form();" data-dismiss="modal"> <i class="material-icons">clear</i> Batal</button>
							 </form>
					   </div>
                     
                    </div>
                </div>
    </div>

    <!-- modal cari sales -->
    <div class="modal fade" id="ModalCariAdminPPPU" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" >Cari Admin PPPU</h4>
                        </div>
                        <div class="modal-body">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Pilih</button>

                                <br>
                                <hr>

                                 <table class="table table-bordered table-striped table-hover " id="daftar_adminpppu" >
  
                                    <thead>
                                        <tr> 
                                            <th style="width:5%;">NIK</th>
                                            <th style="width:5%;">Nama</th> 
                                            <th style="width:5%;">No Telp</th> 
                                            <th style="width:10%;">Email</th> 
                                        </tr>
                                    </thead> 
                                    <tbody id="daftar_adminpppux">

                                </tbody>
                                </table> 
                       </div>
                     
                    </div>
                </div>
    </div>
			
 
   <script type="text/javascript">
	
 
       
	 function Ubah_Data(id){
		$("#defaultModalLabel").html("Form Ubah Data");
		$("#defaultModal").modal('show');
 
		$.ajax({
			 url:"<?php echo base_url(); ?>akun_admin_pppu/get_data_edit/"+id,
			 type:"GET",
			 dataType:"JSON", 
			 success:function(result){  
				 $("#defaultModal").modal('show'); 
				 $("#id").val(result.id);
                 $("#username").val(result.username); 
                 $("#id_admin_pppu").val(result.id_admin_pppu);
				 $("#nama_adminpppu").val(result.nama); 
			 }
		 });
	 }
 
	 function Bersihkan_Form(){
        $(':input').val(''); 
     }

     function CariAdminPPPU(){
        $("#ModalCariAdminPPPU").modal({backdrop: 'static', keyboard: false,show:true});
     }

     

	 function Hapus_Data(id){
		if(confirm('Anda yakin ingin menghapus data ini?'))
        {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo base_url('akun_admin_pppu/hapus_data')?>/"+id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
			   
               $('#example').DataTable().ajax.reload(); 
			   
			    $.notify("Data berhasil dihapus!", {
					animate: {
						enter: 'animated fadeInRight',
						exit: 'animated fadeOutRight'
					}  
				 },{
					type: 'success'
					});
				 
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });
   
    }
	}
    
   
    $('.thumbnail').on('click',function(){
        $('.modal-body').empty();
        var title = $(this).parent('a').attr("title");
        $('.modal-title').html(title);
        $($(this).parents('div').html()).appendTo('.modal-body');
        $('#Prev').modal({show:true});
    });
  
	function Simpan_Data(){
		//setting semua data dalam form dijadikan 1 variabel 
		 var formData = new FormData($('#user_form')[0]); 

          
         //validasi form sebelum submit ke controller
         var username = $("#username").val();
         var nama_sales = $("#nama_sales").val();
        
          
         if(username == ''){
            alert("Username Belum anda masukkan!");
            $("#username").parents('.form-line').addClass('focused error');
            $("#username").focus();
         }else if(nama_sales == ''){
            alert("Nama Sales Belum anda masukkan!");
            $("#nama_sales").parents('.form-line').addClass('focused error');
            $("#nama_sales").focus();
         
		 }else{

            //transaksi dibelakang layar
            $.ajax({
             url:"<?php echo base_url(); ?>akun_admin_pppu/simpan_data_akun_admin_pppu",
             type:"POST",
             data:formData,
             contentType:false,  
             processData:false,   
             success:function(result){ 
                
                 $("#defaultModal").modal('hide');
                 $('#example').DataTable().ajax.reload(); 
                 $('#user_form')[0].reset();
                 
                 $.notify("Data berhasil disimpan!", {
                    animate: {
                        enter: 'animated fadeInRight',
                        exit: 'animated fadeOutRight'
                 } 
                 },{
                    type: 'success'
                });
             }
            }); 

         }

	}
     

	 $('.datepicker').bootstrapMaterialDatePicker({
        format: 'YYYY-MM-DD',
        clearButton: true,
        weekStart: 1,
        time: false
     });

	 
       $(document).ready(function() {
		   
		$("#addmodal").on("click",function(){
			$("#defaultModal").modal({backdrop: 'static', keyboard: false,show:true});
            $("#method").val('Add');
            $("#defaultModalLabel").html("Form Tambah Data");
		});
		
		 
		$('#example').DataTable( {
			"ajax": "<?php echo base_url(); ?>akun_admin_pppu/fetch_akun_admin_pppu" 
		});

        $('#daftar_adminpppu').DataTable( {
            "ajax": "<?php echo base_url(); ?>akun_admin_pppu/fetch_nama_adminpppu" 
        });

        var daftar_adminpppu = $('#daftar_adminpppu').DataTable();
     
        $('#daftar_adminpppu tbody').on('click', 'tr', function () {
            //onsole.log(daftar_adminpppu.row(this).data());
             var content = daftar_adminpppu.row(this).data()
            
            $("#nama_adminpppu").val(content[2]);
            $("#id_admin_pppu").val(content[0]);
            $("#ModalCariAdminPPPU").modal('hide');
        } );
	 
	 
		 
	  });
  
		
		 
    </script>