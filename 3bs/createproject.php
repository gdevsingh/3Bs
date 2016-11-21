<!DOCTYPE html>
<!--
    author:Gurdev Singh
    e-mail:gdevsingh@outlook.com
-->
<?php
session_start(); 
if($_SESSION['login']==1)
{
    
    require_once("DB_CONNECT.php");
    if(isset($_POST['submit']))
    {
        if($_POST['projectname']!="" && $_POST['address']!="" && $_POST['flats']!=""  && $_POST['startdate']!="" )
        {
            $query  = "insert into projects(NAME,ADDRES,NUMBER_OF_FLATS,START_DATE)
            values ('".$_POST['projectname']."','".$_POST['address']."','".$_POST['flats']."','".date("Y-m-d", strtotime($_POST['startdate']))."')";
            //echo  date("Y-m-d", strtotime($_POST['startdate']));    
          
            if (mysqli_query($conn, $query)) 
            {
              echo "<div class='alert alert-success' style='margin-bottom:-.5%;'>New project created</div>";    
                 //header('location: invoicetemplate.php');
            }
            else
            {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }    
        else
        {
           echo "<div class='alert alert-danger' style='margin-bottom:-.5%;'>Please fill in all the fields</div>";
       }   
    }
    

?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Create Project|3B's</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
 <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="plugins/colorpicker/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="plugins/select2/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <style>
  .btn-success {
    background-color: #e62c2b;
    border-color: #fff;

}
.box.box-solid.box-success {
    border: 1px solid #e62c2b;
}

.skin-blue .sidebar-menu>li:hover>a, .skin-blue .sidebar-menu>li.active>a {
    color: #fff;
    background: #1e282c;
    border-left-color: #e62c2b;
}
.skin-blue .main-header .navbar .sidebar-toggle:hover {
    background-color: #e62c2b;
}
.btn-success:hover, .btn-success:active, .btn-success.hover {
    background-color: #fff;
    color:#e62c2b;
    border-color: #e62c2b;
}

.btn-success.focus, .btn-success:focus {
    color: #fff;
    background-color: #e62c2b;
    border-color: #e62c2b;
}
  .no-js #loader { display: none;  }
.js #loader { display: block; position: absolute; left: 100px; top: 0; }
.se-pre-con {
  position: fixed;
  left: 0px;
  top: 0px;
  width: 100%;
  height: 100%;
  z-index: 9999;
  background: url(Preloader_2.gif) center no-repeat #fff;
}

  </style>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
<script>
$(window).load(function() {
    // Animate loader off screen
$(".se-pre-con").fadeOut("slow");;
  }); 
  </script> 

  

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="se-pre-con"></div>
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="index2.php" class="logo" style="background-color:#C7201F;">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>3B</b>'s</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>3B</b>'s Const. & Dev.</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" style="background-color:#e62c2b;">
      <!-- Sidebar toggle button-->
      <a href="#"  class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      

    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <!-- search form -->
      
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li >
          <a href="index2.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span> 
            <!--i class="fa fa-angle-left pull-right"></i>-->
          </a>
          
        </li>
        <li class="active " >
          <a href="#" style="border-left-color:#C7201F">
            <i class="fa fa-building"></i>
            <span>Create Project</span>
            <!--<span class="label label-primary pull-right">4</span>-->
          </a>
          
        </li>
        <li>
          <a href="projects.php">
            <i class="fa fa-table"></i> <span>Projects</span>
            <!--<small class="label pull-right bg-#C7201F">new</small>-->
          </a>
        </li>
        <li >
          <a href="generateinvoice.php">
            <i class="fa fa-edit"></i> <span>Generate Invoice</span>
            <!--<i class="fa fa-angle-left pull-right"></i>-->
          </a>
          
        </li>
        <li >
          <a href="showinvoices.php">
            <i class="fa fa-table"></i> <span>Invoices</span>
           <!-- <i class="fa fa-angle-left pull-right"></i>-->
          </a>
          
        </li>
        <li >
          <a href="logout.php">
            <i class="fa fa-sign-out"></i> <span>Logout</span>
           <!-- <i class="fa fa-angle-left pull-right"></i>-->
          </a>
          
        </li>
        
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-building"></i> Create Project
        <!--<small>HOME</small>-->

      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Create Project</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
	<div class="box box-solid box-success" >
        <div class="box-header" style="background-color:#C7201F;">
          <h3 class="box-title">Enter Project Details</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
        <form name=f1 method=post action="">  
                                        <div class="form-group">
                                            <label class="control-label" for="inputSuccess">Project Name</label>
                                            <input  name="projectname" size="40" type="text" class="form-control" id="inputSuccess">
                                        </div>
                                        <div class="form-group ">
                                            <label class="control-label" for="inputSuccess">Address</label>
                                            <input name="address" type="text" class="form-control" id="inputWarning">
                                        </div>
                                        <div class="form-group ">
                                            <label class="control-label" for="inputSuccess">Number of Flats</label>
                                            <input name="flats" type="number" class="form-control" id="inputSuccess">
                                        </div>
                                        
                                        <div class="form-group">
                <label>Start Date:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input name="startdate" type="text" class="form-control pull-right" id="datepicker">
                </div>
                <!-- /.input group -->
              </div>
                                        <div>
                                            <input type=submit name=submit value=SAVE type="button" class="btn btn-block btn-success" style="WIDTH:auto;"/>
                                        </div>

                                            
                                    </form>
        </div><!-- /.box-body -->
      </div>
  </div>
  <footer class="main-footer" style="position:absolute;
   bottom:0;width:100%;">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.3
    </div>
    <strong>Copyright &copy; 2015-2016 3B's Constructions & Developers</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
                 
      </div>
      <!-- /.tab-pane -->
    </div>
      
      <!-- /.tab-pane -->
    
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.0 -->
<script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="plugins/select2/select2.full.min.js"></script>
<!-- InputMask -->
<script src="plugins/input-mask/jquery.inputmask.js"></script>
<script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- bootstrap color picker -->
<script src="plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();

    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    //Datemask2 mm/dd/yyyy
    $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
    //Money Euro
    $("[data-mask]").inputmask();

    //Date range picker
    $('#reservation').daterangepicker();
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
    //Date range as a button
    $('#daterange-btn').daterangepicker(
        {
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate: moment()
        },
        function (start, end) {
          $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
    );

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    });

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass: 'iradio_minimal-red'
    });
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-#C7201F',
      radioClass: 'iradio_flat-#C7201F'
    });

    //Colorpicker
    $(".my-colorpicker1").colorpicker();
    //color picker with addon
    $(".my-colorpicker2").colorpicker();

    //Timepicker
    $(".timepicker").timepicker({
      showInputs: false
    });
  });
</script>

</body>
</html>
<?php
}
else
{
    header('Location:index.php');
}
?>