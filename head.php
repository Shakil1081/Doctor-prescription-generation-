<?php
include('session.php');
?>
<!DOCTYPE html>
<html>
<?php include('db.php'); ?>

  <head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Awesome Prescription Solution</title>
    <!-- Favicon-->
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Bootstrap Material Datetime Picker Css -->
    <link href="plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />

    <!-- Wait Me Css -->
    <link href="plugins/waitme/waitMe.css" rel="stylesheet" />

    <!-- Bootstrap Select Css -->
    <link href="plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="css/themes/all-themes.css" rel="stylesheet" />
	<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
	<style>
	a:hover, a:focus{
		text-decoration: none !important;
	}
	h1, .h1, h2, .h2, h3, .h3 {
    color: #009688 !important;
	font-weight: bold !IMPORTANT;
}
.form-group .form-line:after{
	    border-bottom: 1px solid #ff9800!important;
	
}

.theme-red .navbar {
    background-color: #009688 !important;
}
.theme-red .sidebar .legal .copyright a,.theme-red .sidebar .menu .list li.active > :first-child i, .theme-red .sidebar .menu .list li.active > :first-child span {
    color: #009688 !important;
}
.dataTables_wrapper .dt-buttons a.dt-button {
background-color: #ff9800 !important;}
.bg-teal, .bg-teal:hover, .bg-teal:active, .bg-teal:focus {
    background-color: #009688 !important;
}

.sidebar .user-info {
   height: 92px !important;
}
	</style>
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
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
	
<div class="modal fade in" id="smallModal" tabindex="-1" role="dialog" style="padding-left: 17px;">
               <div class="modal-dialog" role="document" style="max-width:  400px;text-align: center;">
   
                    <div class="modal-content">
 
                        <div class="modal-body">
                          <div class="sa-icon sa-custom" style="display: block; background-image: url(&quot;images/thumbs-up.png&quot;);width:80px; height:80px;    background-repeat: no-repeat; margin: auto;"> </div>
						  <h2>Success!</h2>
						  <p style="display: block;">You have successfully completed.</p>
						  
						 
                        </div>
                        <div class="modal-footer">                           
                            <button type="button" id="closeZz" class="btn btn-danger waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </div>
                </div>			
            </div>
			
			
	
<div class="modal fade in" id="iderror" tabindex="-1" role="dialog" style="padding-left: 17px;">
               <div class="modal-dialog" role="document" style="max-width:  400px;text-align: center;">
   
                    <div class="modal-content">
 
                        <div class="modal-body">
						<div class="sa-icon sa-custom"><i class="material-icons" style="font-size: 40px; color: red;">error</i></div>
						  <h2 style="margin-top:  0px;  color: gray !important;">Ops!</h2>
						  <p style="display: block;" id="emassage"></p>
						  
						 
                        </div>
                        <div class="modal-footer">                           
                            <button type="button" id="closserrror" class="btn btn-danger waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </div>
                </div>			
</div>
			
			
           
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <?php include('top.php'); ?>
	
	<!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
		<?php include('sidemenu.php'); ?>
       <!-- #END# Left Sidebar -->
    </section>
