<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title><?php echo $judul; ?></title>
    <!-- Favicon-->
    <link rel="icon" href="<?php echo base_url(); ?>assets/favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
 
    <!-- Waves Effect Css -->
    <link href="<?php echo base_url(); ?>assets/plugins/node-waves/waves.css" rel="stylesheet" />
     
    <!-- Animation Css -->
    <link href="<?php echo base_url(); ?>assets/plugins/animate-css/animate.css" rel="stylesheet" />
    
    <!-- JQuery DataTable Css -->
    <link href="<?php echo base_url(); ?>assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Custom Css -->
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?php echo base_url(); ?>assets/css/themes/all-themes.css" rel="stylesheet" />
	
	<link href="<?php echo base_url(); ?>assets/css/card_custom.css" rel="stylesheet" />
    
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
	<link href="<?php echo base_url('assets/plugins/jquery-ui/css/base/jquery-ui.css'); ?>" rel="stylesheet">
 
 
	<!-- TinyMCE -->
    <script src="<?php echo base_url(); ?>assets/plugins/tinymce/tinymce.js"></script>
	
	<script src="<?php echo base_url('assets/plugins/elFinder/js/elfinder.min.js'); ?>"></script>
    <link href="<?php echo base_url('assets/plugins/elFinder/css/theme.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/plugins/elFinder/css/elfinder.min.css'); ?>" rel="stylesheet">
	
 
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
    <script src="<?php echo base_url(); ?>assets/js/bootstrap-notify.js"></script>
 
	
    <script src="<?php echo base_url(); ?>assets/plugins/autosize/autosize.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/pages/ui/notifications.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/momentjs/moment.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>   
    <script src="<?php echo base_url(); ?>assets/js/demo.js"></script>
	
<script type="text/javascript">

function elFinderBrowser(callback, value, meta) {
    tinymce.activeEditor.windowManager.open({
        file: '<?php echo base_url("file_manager/filetes"); ?>', // use an absolute path!
        title: 'Files Manager',
        width: 900,
        height: 450,
        resizable: 'yes'
    }, {
        oninsert: function (file, elf) {
            var url, reg, info;

            // URL normalization
            url = file;

            reg = "\/[^/]+?\/\.\.\/";
            while (url.match(reg)) {
                url = url.replace(reg, '/');
            }

            var split_info = file.split("/");

            var filename = split_info[split_info.length - 1];
            
            var getsize = 0;
            get_filesize(file, function (size) {
                //alert("The size of " + filename + " is: " + size + " bytes.");
                getsize = size;
            });
            
            // Make file info
            info = filename + ' (' + elf.formatSize(getsize) + ')';

            // Provide file and text for the link dialog
            if (meta.filetype == 'file') {
                callback(url, {text: info, title: info});
            }

            // Provide image and alt text for the image dialog
            if (meta.filetype == 'image') {
                callback(url, {alt: info});
            }

            // Provide alternative source and posted for the media dialog
            if (meta.filetype == 'media') {
                callback(url);
            }
        }
    });
    return false;
}

// TinyMCE init
tinymce.init({
    selector: "#deskripsi",
    
	force_p_newlines: false,
	setup: function (editor) {
            editor.on('change', function () {
                tinymce.triggerSave();
            });
        },
    height: 400,
        plugins: [
        "advlist autolink autosave link image lists charmap print preview hr anchor pagebreak spellchecker",
        "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
        "save table contextmenu directionality emoticons template textcolor paste fullpage textcolor colorpicker"
    ],
    relative_urls: false,
    remove_script_host: false,

    toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
    file_picker_callback: elFinderBrowser
});

 

function get_filesize(url, callback) {
    var xhr = new XMLHttpRequest();
    xhr.open("HEAD", url, true); // Notice "HEAD" instead of "GET",
    //  to get only the header
    xhr.onreadystatechange = function () {
        if (this.readyState == this.DONE) {
            callback(parseInt(xhr.getResponseHeader("Content-Length")));
        }
    };
    xhr.send();
}
 </script>
	
</head>

<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Mohon Tunggu...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
     
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="<?php echo base_url(); ?>"> <?php echo $judul; ?> </a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                     
                    <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true">    <i class="material-icons">person</i>   </a></li>
                   
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                
				<!--list menu-->
			    <?php
				if($this->session->userdata('session') == 1){
				// apabila login sebagai superadmin
				?>
				
					<ul class="list">
					<li>
                        <a href="<?php echo base_url('dashboard'); ?>">
                            <i class="material-icons">home</i>
                            <span>Home  </span>
                        </a>
                    </li> 
                    <li class="header">Menu Master</li>  
                    <li>
                        <a href="<?php echo base_url('profil'); ?>">
                           <i class="material-icons">dns</i>
                            <span>Profil</span>
                        </a>
                    </li> 
					<li>
                        <a href="<?php echo base_url('admin_hrd'); ?>">
                           <i class="material-icons">dns</i>
                            <span>Admin HRD</span>
                        </a>
                    </li> 
                    <li>
                        <a href="<?php echo base_url('supervisor'); ?>">
                           <i class="material-icons">dns</i>
                            <span>Supervisor</span>
                        </a>
                    </li> 
                     <li>
                        <a href="<?php echo base_url('pelamar'); ?>">
                           <i class="material-icons">dns</i>
                            <span>Pelamar</span>
                        </a>
                    </li> 
                    <li>
                        <a href="<?php echo base_url('lowongan'); ?>">
                           <i class="material-icons">dns</i>
                            <span>Lowongan</span>
                        </a>
                    </li>
                     <li>
                        <a href="<?php echo base_url('email'); ?>">
                           <i class="material-icons">dns</i>
                            <span>Email</span>
                        </a>
                    </li> 
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">dns</i>
                            <span>User</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="<?php echo base_url('akun_admin_hrd'); ?>">Akun Admin HRD</a>
                            </li>
                            <li>
                                 <a href="<?php echo base_url('akun_supervisor'); ?>">Akun Supervisor</a>
                            </li> 
                            <li>
                                 <a href="<?php echo base_url('akun_pelamar'); ?>">Akun Pelamar</a>
                            </li> 
                            

                        </ul>
                    </li>
                    <li class="header">Menu Transaksi</li>
                    <li>
                        <a href="<?php echo base_url('lamaran_pekerjaan'); ?>">
                            <i class="material-icons">dns</i>
                            <span>Lamaran Pekerjaan</span>
                        </a>
                    </li> 
					<li>
                        <a href="<?php echo base_url('daftar_lamaran'); ?>">
                            <i class="material-icons">dns</i>
                            <span>Daftar Lamaran</span>
                        </a>
                    </li> 
                    <li>
                        <a href="<?php echo base_url('penilaian_seleksi'); ?>">
                            <i class="material-icons">dns</i>
                            <span>Penilaian Seleksi</span>
                        </a>
                    </li> 
                   
                    <li>
					<li class="header">Laporan</li>
                    <li>
                        <a href="<?php echo base_url('laporan_seleksi'); ?>">
                            <i class="material-icons">dns</i>
                            <span>Laporan Hasil Seleksi</span>
                        </a>
                    </li> 
                  
					</ul>
					
				<?php
				}else if($this->session->userdata('session') == 2){
				// apabila login sebagai admin pppu
				?>

					<ul class="list">
					<li>
                        <a href="<?php echo base_url('dashboard'); ?>">
                            <i class="material-icons">home</i>
                            <span>Home  </span>
                        </a>
                    </li> 
                     
                    <li class="header">Menu Transaksi</li> 
                    <li>
                        <a href="<?php echo base_url('dashboard'); ?>">
                            <i class="material-icons">dns</i>
                            <span>Validasi P3U</span>
                        </a>
                    </li> 
                 
					</ul>
				
				<?php
				}else{
				// apabila login sebagai sales
				?>

					<ul class="list">
					<li>
                        <a href="<?php echo base_url('dashboard'); ?>">
                            <i class="material-icons">home</i>
                            <span>Home  </span>
                        </a>
                    </li> 
                    <li class="header">Menu Master</li> 
                    <li>
                        <a href="<?php echo base_url('customer'); ?>">
                           <i class="material-icons">dns</i>
                            <span>Customer</span>
                        </a>
                    </li> 
                    <li>
                        <a href="<?php echo base_url('unit'); ?>">
                           <i class="material-icons">dns</i>
                            <span>Unit</span>
                        </a>
                    </li> 
                    
                    
                    
                    <li class="header">Menu Transaksi</li>
                    <li>
                        <a href="<?php echo base_url('booking_fee'); ?>">
                            <i class="material-icons">dns</i>
                            <span>Booking Fee</span>
                        </a>
                    </li> 
                    <li>
                        <a href="<?php echo base_url('pu'); ?>">
                            <i class="material-icons">dns</i>
                            <span>PU</span>
                        </a>
                    </li>  
                    <li>
					<li class="header">Laporan</li>
                    <li>
                        <a href="<?php echo base_url('closing'); ?>">
                            <i class="material-icons">dns</i>
                            <span>Closing</span>
                        </a>
                    </li> 
                    <li>
                        <a href="<?php echo base_url('refund'); ?>">
                            <i class="material-icons">dns</i>
                            <span>Refund</span>
                        </a>
                    </li> 
                          
                    
					</ul>
				
				<?php 
				}
				?>
			   
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2018 <a href="javascript:void(0);"> Siti Zahroh </a>
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
        <aside id="rightsidebar" class="right-sidebar">
      
            <div class="tab-content">
            
            
                    <div class="demo-settings">
                        <p> Hai <?php echo $this->session->userdata('username') . " ! <br> Anda masuk sebagai " .level_help($this->session->userdata('session')); ?> </p>
                        <ul class="demo-choose-skin">
                       
                         <a href="<?php echo base_url('login/logout'); ?>">
                        <li>
                          
                           <i class="material-icons">power_settings_new</i>
                            <span>Keluar</span>
                         
                        </li>
                          </a>
                       
                    </ul>
                    </div>
                
            </div>
        </aside>
        <!-- #END# Right Sidebar -->
        <!-- #END# Right Sidebar -->
    </section>

	<?php 
	echo $this->load->view($konten);
	?>
  
  

 
</body>

</html>