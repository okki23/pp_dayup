<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

 <!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title> <?php echo $judul; ?> </title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?php echo base_url(); ?>assets/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php echo base_url(); ?>assets/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="<?php echo base_url(); ?>assets/plugins/morrisjs/morris.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?php echo base_url(); ?>assets/css/themes/all-themes.css" rel="stylesheet" />



    <!-- Jquery Core Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/node-waves/waves.js"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

    <!-- Custom Js -->
    <script src="<?php echo base_url(); ?>assets/js/admin.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-lightbox/0.7.0/bootstrap-lightbox.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-lightbox/0.7.0/bootstrap-lightbox.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap-notify.js"></script>
 
 
    <script src="<?php echo base_url(); ?>assets/plugins/autosize/autosize.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/pages/ui/notifications.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/momentjs/moment.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>   
    <script src="<?php echo base_url(); ?>assets/js/demo.js"></script>
     
    
</head>
<body class="theme-red">
        <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="<?php echo base_url(); ?>"> <?php echo $judul; ?> </a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                     
                    <li class="pull-right-btn"> <button class="btn btn-lg btn-default" onclick="Show_Login();"> <i class="material-icons">person</i>  Masuk </button> </li>

                     <li class="pull-right-btn"> <button class="btn btn-lg btn-default" onclick="Show_Register();"> <i class="material-icons">person</i>  Daftar </button> </li>

                    
                   
                </ul>
            </div>
        </div>
    </nav>
 
    <br>
    &nbsp;
    <br>
    &nbsp;
    <br>
    &nbsp;
    
    <section class="content-fluid">
        <div class="container-fluid">
           
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Daftar Lowongan 
                            </h2>
                            <br>
                            
 
                        </div>
                        <div class="body">
                                
                            <div class="table-responsive">
                               <table class="table table-bordered table-striped table-hover js-basic-example" id="example" > 
                                    <thead>
                                        <tr>
                                            <th style="width:5%;">No</th>
                                            <th style="width:10%;">Lowongan</th> 
                                            <th style="width:20%;">Deskripsi</th> 
                                            <th style="width:10%;">Tanggal Terbit</th> 
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

    <!-- modal cari sales -->
    <div class="modal fade" id="Show_Detail" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" >Show Detail</h4>
                        </div>
                        <div class="modal-body">
                                
                                <p align="justify" id="deskripsi"> </p>
                                <br>
                                <hr>
                                <button type="button" class="btn btn-danger" data-dismiss="modal"> X Tutup </button>
                        </div>
                     
                    </div>
                </div>
    </div>


     <!-- modal login -->
    <div class="modal fade" id="Show_Login" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" align="center" >Login  </h4>
                                <div align="right">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal"> X Tutup </button> 
                                </div>
                        </div>
                        <div class="modal-body">
                                  
                               
                                            <form id="sign_in" action="<?php echo base_url('login/autentikasi'); ?>" method="POST" enctype="multipart/form-data">
                                                <div class="msg"> </div>
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons">person</i>
                                                    </span>
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
                                                    </div>
                                                </div>
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons">lock</i>
                                                    </span>
                                                    <div class="form-line">
                                                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                                                    </div>
                                                </div>
                                                <div align="center">
                                                <h5>Masuk Sebagai :<h5> 
                                                <hr>

                                                 <div class="input-group">
                                                 <input name="posisi" type="radio" id="radio_1" value="1"  />
                                                 <label for="radio_1">Superadmin</label>
                                                 <input name="posisi" type="radio" id="radio_2" value="2" />
                                                 <label for="radio_2">Admin HRD</label>
                                                 <input name="posisi" type="radio" id="radio_3" value="3" />
                                                 <label for="radio_3">Supervisor</label>
                                                 <input name="posisi" type="radio" id="radio_4" value="4" />
                                                 <label for="radio_4">Pelamar</label>
                                                </div>
                                                </div>
                                                <div class="row"> 
                                                    <div class="col-lg-12">
                                                        <button class="btn btn-block bg-blue waves-effect" type="submit">Masuk</button>
                                                    </div>
                                                </div>
                                                
                                            </form>
                                 

                               
                        </div>
                     
                    </div>
                </div>
    </div>

     <!-- modal login -->
    <div class="modal fade" id="Show_Registering" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" align="center" > Daftar Pelamar  </h4>
                                <div align="right">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal"> X Tutup </button> 
                                </div>
                        </div>
                        <div class="modal-body">
                                   
                               
                                            <form id="sign_in" action="<?php echo base_url('pendaftaran/buat_akun'); ?>" method="POST" enctype="multipart/form-data">
                                                <div class="msg"> </div>

                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons">person</i>
                                                    </span>
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" name="nama_lengkap" placeholder="Nama Lengkap" required autofocus>
                                                    </div>
                                                </div>

                                                 <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons">person</i>
                                                    </span>
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" name="email" placeholder="Email" required autofocus>
                                                    </div>
                                                </div>

                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons">person</i>
                                                    </span>
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
                                                    </div>
                                                </div>

                                                 <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons">person</i>
                                                    </span>
                                                    <div class="form-line">
                                                        <input type="password" class="form-control" name="password" placeholder="Password" required autofocus>
                                                    </div>
                                                </div>
                                               
                                                 
                                                <div class="row"> 
                                                    <div class="col-lg-12">
                                                        <button class="btn btn-block bg-blue waves-effect" type="submit">Daftar</button>
                                                    </div>
                                                </div>
                                                
                                            </form>
                                 

                               
                        </div>
                     
                    </div>
                </div>
    </div>

 
            

    <script type="text/javascript">
            function Test(id){
                $("#Show_Detail").modal({backdrop: 'static', keyboard: false,show:true});
                $.get("<?php echo base_url('front/show_detail/'); ?>"+id,function(data){
                     var parse = JSON.parse(data);
                      
                     $('.modal-title').html(parse.nama_lowongan);
                     $('#deskripsi').html(parse.deskripsi);
                });
                
            }

            function Show_Register(){
                $("#Show_Registering").modal({backdrop: 'static', keyboard: false,show:true}); 
            }

            function Show_Login(){
                 $("#Show_Login").modal({backdrop: 'static', keyboard: false,show:true});
            }


            $('#example').DataTable( {
                "bLengthChange": false,
            "ajax": "<?php echo base_url(); ?>front/fetch_front" 
        });
    </script>
</body>

</html>