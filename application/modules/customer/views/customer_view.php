 
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
                                Data Customer
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
                                            <th style="width:5%;">Kode Pelanggan</th>
                                            <th style="width:5%;">Nama</th> 
											<th style="width:5%;">No HP</th> 
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
                            <h4 class="modal-title" >Form Tambah Data</h4>
                        </div>
                        <div class="modal-body">
                              <form method="post" id="user_form" enctype="multipart/form-data">    
                                    <input type="hidden" name="id" id="id"> 
									<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="kode_pelanggan" id="kode_pelanggan" class="form-control" placeholder="Kode Pelanggan" />
                                        </div>
                                    </div>
									<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama" />
                                        </div>
                                    </div>
									<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="tempat_lahir" id="tempat_lahir"  class="form-control" placeholder="Tempat Lahir" />
                                        </div>
                                    </div>
									<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="tanggal_lahir" id="tanggal_lahir"  class="form-control datepicker" placeholder="Tanggal Lahir" />
                                        </div>
                                    </div> 
									<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="no_hp" id="no_hp" class="form-control" placeholder="No HP" />
                                        </div>
                                    </div> 
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="no_kantor" id="no_kantor" class="form-control" placeholder="No Telp Kantor" />
                                        </div>
                                    </div> 
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="no_rumah" id="no_rumah" class="form-control" placeholder="No Telp Rumah" />
                                        </div>
                                    </div> 
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="email" id="email" class="form-control" placeholder="Email" />
                                        </div>
                                    </div> 
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Alamat" />
                                        </div>
                                    </div>
									<div class="form-group">
                                        <div class="form-line">
										   Upload KTP
                                           <input type="file" name="user_ktp" id="user_ktp" class="form-control" onchange="GetKTP(this);" placeholder="Upload KTP" />  
                                        </div>
										   <input type="hidden" name="upload_ktp" id="upload_ktp">
                                    </div>
									<div class="form-group">
                                        <div class="form-line">
										   Upload NPWP
                                           <input type="file" name="user_npwp" id="user_npwp" class="form-control" onchange="GetNPWP(this);" placeholder="Upload KTP" />  
                                        </div>
										   <input type="hidden" name="upload_npwp" id="upload_npwp">
                                    </div>		
									<div class="form-group">
                                        <div class="form-line">
										   Upload Slip Gaji
                                           <input type="file" name="user_slip_gaji" id="user_slip_gaji" class="form-control" onchange="GetGaji(this);" placeholder="Upload KTP" />  
                                        </div>
										   <input type="hidden" name="upload_slip_gaji" id="upload_slip_gaji">
                                    </div>	
									<div class="form-group">
                                        <div class="form-line">
										   Upload Dokumen Pendukung
                                           <input type="file" name="user_dok_pendukung" id="user_dok_pendukung" class="form-control" onchange="GetPendukung(this);" placeholder="Upload KTP" />  
                                        </div>
										   <input type="hidden" name="upload_dok_pendukung" id="upload_dok_pendukung">
                                    </div>										
 
								  
								   <button type="button" onclick="Simpan_Data();" class="btn btn-success waves-effect"> <i class="material-icons">save</i> Simpan</button>

                                   <button type="button" name="cancel" id="cancel" class="btn btn-danger waves-effect" onclick="javascript:Bersihkan_Form();" data-dismiss="modal"> <i class="material-icons">clear</i> Batal</button>
							 </form>
					   </div>
                     
                    </div>
                </div>
    </div>
	
	<!-- detail data customer -->
	<div class="modal fade" id="DetailModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Detail Customer</h4>
                        </div>
                        <div class="modal-body">
						
						<table class="table table-responsive">
							<tr>
								<td style="font-weight:bold;"> Kode Pelanggan</td>
								<td> : </td>
								<td> <p id="kode_pelanggan_dtl"> </p> </td>
								
								<td style="font-weight:bold;"> Nama</td>
								<td> : </td>
								<td> <p id="nama_dtl"> </p> </td> 
							</tr>
							<tr>
								<td style="font-weight:bold;"> Tempat Lahir</td>
								<td> : </td>
								<td> <p id="tempat_lahir_dtl"> </p> </td>
								
								<td style="font-weight:bold;"> Tanggal Lahir</td>
								<td> : </td>
								<td> <p id="tanggal_lahir_dtl"> </p> </td> 
							</tr>
							<tr>
								<td style="font-weight:bold;"> No HP</td>
								<td> : </td>
								<td> <p id="no_hp_dtl"> </p> </td>
								
								<td style="font-weight:bold;"> No Telp Kantor</td>
								<td> : </td>
								<td> <p id="no_kantor_dtl"> </p> </td> 
							</tr>
							<tr>
								<td style="font-weight:bold;"> No Telp Rumah</td>
								<td> : </td>
								<td> <p id="no_rumah_dtl"> </p> </td>
								
								<td style="font-weight:bold;"> Email</td>
								<td> : </td>
								<td> <p id="email_dtl"> </p> </td> 
							</tr>
							<tr>
								<td style="font-weight:bold;"> Alamat  </td> 
								<td colspan="4">  : </td> 
							</tr> 
							<tr>
								<td colspan="6"> <p id="alamat_dtl"> </p> </td> 
							</tr>
							<tr>
								<td style="font-weight:bold;"> Dokumen Pendukung  </td> 
								<td colspan="4">  : </td> 
							</tr> 
							<tr>
								<td colspan="6" align="center">  
								 
								<div class="col-md-12">
									<div class="col-md-3">
									 
										 <div class="card">
											<a href="" id="data-ktp" target="_blank">      
											<img class="card-img-top" src="<?php echo base_url('upload/document.png'); ?>">
											<div class="card-block"> 
												<h5 class="card-title mt-3">KTP </h5> 
											</div>
											</a> 
										</div>
										
									</div>
									<div class="col-md-3">
									 
										 <div class="card">
											<a href="" id="data-npwp" target="_blank">      
											<img class="card-img-top" src="<?php echo base_url('upload/document.png'); ?>">
											<div class="card-block"> 
												<h5 class="card-title mt-3">NPWP </h5> 
											</div>
											</a> 
										</div>
										
									</div>
									<div class="col-md-3">
									 
										 <div class="card">
											<a href="" id="data-slipgaji" target="_blank">      
											<img class="card-img-top" src="<?php echo base_url('upload/document.png'); ?>">
											<div class="card-block"> 
												<h5 class="card-title mt-3">Slip Gaji </h5> 
											</div>
											</a> 
										</div>
										
									</div>
									<div class="col-md-3">
									 
										 <div class="card">
											<a href="" id="data-dokpendukung" target="_blank">      
											<img class="card-img-top" src="<?php echo base_url('upload/document.png'); ?>">
											<div class="card-block"> 
												<h5 class="card-title mt-3">Dokumen Pendukung </h5> 
											</div>
											</a> 
										</div>
										
									</div> 
								</div>
								 
 
				
								</td> 
							</tr>
							 <div class="modal-footer">
							  <button type="button" class="btn btn-danger" data-dismiss="modal"> X Tutup </button>
							 </div>
						</table>
                           
					   </div>
                     
                    </div>
                </div>
    </div>
			
 
   <script type="text/javascript">
		
	 function GetKTP(input) {
        if (input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload = function (e) {
               
				$("#upload_ktp").val($('#user_ktp').val().replace(/C:\\fakepath\\/i, ''));
            };
            reader.readAsDataURL(input.files[0]);
			
        }
     }
	 function GetNPWP(input) {
        if (input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload = function (e) {
               
				$("#upload_npwp").val($('#user_npwp').val().replace(/C:\\fakepath\\/i, ''));
            };
            reader.readAsDataURL(input.files[0]);
			
        }
     }
	 function GetGaji(input) {
        if (input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload = function (e) {
               
				$("#upload_slip_gaji").val($('#user_slip_gaji').val().replace(/C:\\fakepath\\/i, ''));
            };
            reader.readAsDataURL(input.files[0]);
			
        }
     }
	 function GetPendukung(input) {
        if (input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload = function (e) {
               
				$("#upload_dok_pendukung").val($('#user_dok_pendukung').val().replace(/C:\\fakepath\\/i, ''));
            };
            reader.readAsDataURL(input.files[0]);
			
        }
     }
       
	 function Show_Detail(id){ 
		$("#DetailModal").modal({backdrop: 'static', keyboard: false,show:true});
		$.ajax({
			 url:"<?php echo base_url(); ?>customer/get_data_edit/"+id,
			 type:"GET",
			 dataType:"JSON", 
			 success:function(result){  
			 
                 $("#kode_pelanggan_dtl").html(result.kode_pelanggan);
                 $("#nama_dtl").html(result.nama);
                 $("#tempat_lahir_dtl").html(result.tempat_lahir); 
				 $("#tanggal_lahir_dtl").html(result.tanggal_lahir); 
				 $("#no_hp_dtl").html(result.no_hp);
                 $("#no_kantor_dtl").html(result.no_kantor);
                 $("#no_rumah_dtl").html(result.no_rumah);
                 $("#email_dtl").html(result.email);
                 $("#alamat_dtl").html(result.alamat); 
				 $("#data-ktp").attr("href","upload/"+result.kode_pelanggan+'-'+result.upload_ktp);
				 $("#data-npwp").attr("href","upload/"+result.kode_pelanggan+'-'+result.upload_npwp);
				 $("#data-slipgaji").attr("href","upload/"+result.kode_pelanggan+'-'+result.upload_slip_gaji);
				 $("#data-dokpendukung").attr("href","upload/"+result.kode_pelanggan+'-'+result.upload_dok_pendukung);
				 
			 }
		 });
	 }
	 function Ubah_Data(id){
		 
		$("#defaultModal").modal({backdrop: 'static', keyboard: false,show:true});
		$("#kode_pelanggan").prop('readonly', true);
		$.ajax({
			 url:"<?php echo base_url(); ?>customer/get_data_edit/"+id,
			 type:"GET",
			 dataType:"JSON", 
			 success:function(result){ 
                
				 $("#defaultModal").modal('show'); 
				 $("#id").val(result.id);
                 $("#kode_pelanggan").val(result.kode_pelanggan);
                 $("#nama").val(result.nama);
                 $("#tempat_lahir").val(result.tempat_lahir); 
				 $("#tanggal_lahir").val(result.tanggal_lahir); 
				 $("#no_hp").val(result.no_hp);
                 $("#no_kantor").val(result.no_kantor);
                 $("#no_rumah").val(result.no_rumah);
                 $("#email").val(result.email);
                 $("#alamat").val(result.alamat);  
				 $("#upload_ktp").val(result.upload_ktp);
                 $("#upload_npwp").val(result.upload_npwp);
                 $("#upload_slip_gaji").val(result.upload_slip_gaji); 
				 $("#upload_dok_pendukung").val(result.upload_dok_pendukung);
                  
			 }
		 });
	 }
 
	 function Bersihkan_Form(){
        $(':input').val('');  
     }

	 function Hapus_Data(id){
		if(confirm('Anda yakin ingin menghapus data ini?'))
        {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo base_url('customer/hapus_data')?>/"+id,
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
     
  
	function Simpan_Data(){
		//setting semua data dalam form dijadikan 1 variabel 
		 var formData = new FormData($('#user_form')[0]); 
 
         //validasi form sebelum submit ke controller
         
         var nama = $("#nama").val();
         var tempat_lahir = $("#tempat_lahir").val();
		 var tanggal_lahir = $("#tanggal_lahir").val(); 
         var no_hp = $("#no_hp").val();
         var no_kantor = $("#no_kantor").val();
         var no_rumah = $("#no_rumah").val();
         var email = $("#email").val();
         var alamat = $("#alamat").val();
		 var upload_ktp = $("#upload_ktp").val();
         var upload_npwp = $("#upload_npwp").val();
         var upload_slip_gaji = $("#upload_slip_gaji").val();
         var upload_dok_pendukung = $("#upload_dok_pendukung").val();

		 var extension_upload_ktp = $('#upload_ktp').val().split('.').pop().toLowerCase();  
		 var extension_upload_npwp = $('#upload_npwp').val().split('.').pop().toLowerCase();  
		 var extension_upload_slip_gaji = $('#upload_slip_gaji').val().split('.').pop().toLowerCase();  
		 var extension_upload_dok_pendukung = $('#upload_dok_pendukung').val().split('.').pop().toLowerCase();  

         if(nama == ''){
            alert("Nama Belum anda masukkan!");
            $("#nama").parents('.form-line').addClass('focused error');
            $("#nama").focus();
         }else if(tempat_lahir == ''){
            alert("Tempat Lahir anda masukkan!");
            $("#tempat_lahir").parents('.form-line').addClass('focused error');
            $("#tempat_lahir").focus();
         }else if(tanggal_lahir == ''){
            alert("Tanggal Lahir Belum anda masukkan!");
            $("#tanggal_lahir").parents('.form-line').addClass('focused error');
            $("#tanggal_lahir").focus(); 
		 }else if(no_hp == ''){
            alert("No HP Belum anda masukkan!");
            $("#no_hp").parents('.form-line').addClass('focused error');
            $("#no_hp").focus();
		 }else if(no_kantor == ''){
            alert("No Kantor Belum anda masukkan!");
            $("#no_kantor").parents('.form-line').addClass('focused error');
            $("#no_kantor").focus();
         }else if(no_rumah == ''){
            alert("No Rumah Belum anda masukkan!");
            $("#no_rumah").parents('.form-line').addClass('focused error');
            $("#no_rumah").focus();
         }else if(email == ''){
            alert("Email Rumah Belum anda masukkan!");
            $("#email").parents('.form-line').addClass('focused error');
            $("#email").focus();
         }else if(alamat == ''){
            alert("Alamat Rumah Belum anda masukkan!");
            $("#alamat").parents('.form-line').addClass('focused error');
            $("#alamat").focus();
		 }else if(upload_ktp == ''){
			alert('Anda Belum Unggah KTP!');
	     }else if(jQuery.inArray(extension_upload_ktp, ['docx','doc','xls','xlsx','txt','pdf']) == -1){
			alert("Format File yang diizinkan adalah DOCX ,DOC ,XLS, XLSX, TXT, PDF!");  
            $('#user_image').val('');  
            return false;  
		 }else if(upload_npwp == ''){
			alert('Anda Belum Unggah NPWP!');
		 }else if(jQuery.inArray(extension_upload_npwp, ['docx','doc','xls','xlsx','txt','pdf']) == -1){
			alert("Format File yang diizinkan adalah DOCX ,DOC ,XLS, XLSX, TXT, PDF!");  
            $('#user_image').val('');  
            return false;  
		 }else if(upload_slip_gaji == ''){
			alert('Anda Belum Unggah Slip Gaj!');
		 }else if(jQuery.inArray(extension_upload_slip_gaji, ['docx','doc','xls','xlsx','txt','pdf']) == -1){
			alert("Format File yang diizinkan adalah DOCX ,DOC ,XLS, XLSX, TXT, PDF!");  
            $('#user_image').val('');  
            return false;  
		 }else if(upload_dok_pendukung == ''){
			alert('Anda Belum Unggah Dokumen Pendukung!');
		 }else if(jQuery.inArray(extension_upload_dok_pendukung, ['docx','doc','xls','xlsx','txt','pdf']) == -1){
			alert("Format File yang diizinkan adalah DOCX ,DOC ,XLS, XLSX, TXT, PDF!");  
            $('#user_image').val('');  
            return false;  
		 
		 }else{ 
		 
            //transaksi dibelakang layar
            $.ajax({
             url:"<?php echo base_url(); ?>customer/simpan_data",
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
                 } );
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

            $.get("<?php echo base_url('customer/generate_kode_pelanggan');?>",function(data){
               $("#kode_pelanggan").val(data);
            });
           
            $("#kode_pelanggan").prop('readonly', true);
		});
		
		$("#addmodalx").on("click",function(){
			$("#defaultModalx").modal({backdrop: 'static', keyboard: false,show:true});
            $("#defaultModalLabel").html("Form Tambah Datax");
		});
		
		$('#example').DataTable( {
			"ajax": "<?php echo base_url(); ?>customer/fetch_customer" 
		});
	 
	 
		 
	  });
  
		
		 
    </script>