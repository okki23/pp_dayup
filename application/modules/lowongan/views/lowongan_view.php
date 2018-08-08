 
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
                                Data Lowongan
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
                                            <th style="width:5%;">Nama Lowongan</th> 
											<th style="width:5%;">Deskripsi</th>
											<th style="width:5%;">Tanggal Terbit</th> 
							 
							 
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
                                            <input type="text" name="nama_lowongan" id="nama_lowongan" class="form-control" placeholder="Nama Lowongan" />
                                        </div>
                                    </div>
									<div class="form-group">
                                        <div class="form-line">
 
                                            <textarea id="deskripsi" name="deskripsi"> 
											</textarea>
                                        </div>
                                    </div>
									<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="tanggal_terbit" id="tanggal_terbit"  class="datepicker form-control" placeholder="Tanggal Terbit" />
                                        </div>
                                    </div>
									 
								 

								   <button type="button" onclick="Simpan_Data();" class="btn btn-success waves-effect"> <i class="material-icons">save</i> Simpan</button>

                                   <button type="button" name="cancel" id="cancel" class="btn btn-danger waves-effect" onclick="javascript:Bersihkan_Form();" data-dismiss="modal"> <i class="material-icons">clear</i> Batal</button>
							 </form>
					   </div>
                     
                    </div>
                </div>
    </div>
			
 
   <script type="text/javascript">
     function stripHTML(dirtyString) {
	  var container = document.createElement('div');
	  var text = document.createTextNode(dirtyString);
	  container.appendChild(text);
	  return container.innerHTML; // innerHTML will be a xss safe string
	}
	
	 function Ubah_Data(id){
		$("#defaultModalLabel").html("Form Ubah Data");
		$("#defaultModal").modal('show');
 
		$.ajax({
			 url:"<?php echo base_url(); ?>lowongan/get_data_edit/"+id,
			 type:"GET",
			 dataType:"JSON", 
			 success:function(result){ 
                console.log(result);
				 
				 $("#defaultModal").modal('show'); 
				 $("#id").val(result.id); 
                 $("#nama_lowongan").val(result.nama_lowongan);
                  //var ngehe = "\n\n\n\n \nde\n \n";
                //tinymce.activeEditor.setContent('');
                 tinymce.get("deskripsi").setContent(result.deskripsi);
               
				 //$("#deskripsi").val($("<div>").html(result.deskripsi).text());
				 // tinymce.get("deskripsi").setContent(result.deskripsi);
                 $("#tanggal_terbit").val(result.tanggal_terbit); 
			 }
		 });
	 }
 
	 function Bersihkan_Form(){
        $(':input').val(''); 
        $("#image1").attr('src','<?php echo base_url('upload/image_prev.jpg'); ?>');
     }

	 function Hapus_Data(id){
		if(confirm('Anda yakin ingin menghapus data ini?')){
        // ajax delete data to database
        $.ajax({
            url : "<?php echo base_url('lowongan/hapus_data')?>/"+id,
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
		 var deskripsi = tinymce.get('deskripsi').getContent();
         //var deskripsi = $('#deskripsi').html(tinymce.get('deskripsi').getContent() );
         var id = $("#id").val();
		 var nama_lowongan = $("#nama_lowongan").val();
		 var tanggal_terbit = $("#tanggal_terbit").val();
		  
       
         if(nama_lowongan == ''){
            alert("Nama lowongan Belum anda masukkan!");
            $("#nama_lowongan").parents('.form-line').addClass('focused error');
            $("#nama_lowongan").focus();
         
		 }else if(tanggal_terbit == ''){
            alert("Tanggal Terbit Belum anda masukkan!");
            $("#tanggal_terbit").parents('.form-line').addClass('focused error');
            $("#tanggal_terbit").focus 
		 
       
		 }else{
			
            //transaksi dibelakang layar
            $.ajax({
             url:"<?php echo base_url(); ?>lowongan/simpan_data",
             type:"POST",
             data:{id:id,nama_lowongan:nama_lowongan,tanggal_terbit:tanggal_terbit,deskripsi:deskripsi},
             dataType:"json",
             success:function(result){ 
			 
			 //console.log(result);
                
                 $("#defaultModal").modal('hide');
                 $('#example').DataTable().ajax.reload(); 
                 $('#user_form')[0].reset();
                 tinymce.activeEditor.setContent('');
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

           
			tinymce.get("deskripsi").setContent('');
			   
            $("#defaultModalLabel").html("Form Tambah Data");
		});
		
		 
		
		$('#example').DataTable( {
			"ajax": "<?php echo base_url(); ?>lowongan/fetch_lowongan" 
		});
	 
	 
		 
	  });
  
		
		 
    </script>