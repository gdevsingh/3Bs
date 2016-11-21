<!DOCTYPE html>
<!--
    author:Gurdev Singh
    e-mail:gdevsingh@outlook.com
-->
<?php
session_start();  
if($_SESSION['login']==1)
{ 
     
    if(!isset($_POST['submit']))
    {
    $projid=$_REQUEST['dynamicbutton'];
    

    //separate db conns
    define('DBb_USER', "gdev_root"); // db user
    define('DBb_PASSWORD', "gdev_root"); // db password (mention your db password here)
    define('DBb_DATABASE', "gdev_3bsconstruction"); // database name
    define('DBb_SERVER', "localhost");
    $connss=mysqli_connect(DBb_SERVER,DBb_USER,DBb_PASSWORD,DBb_DATABASE);
    
    //check connection
    if (!$connss) {
    die("Connection failed: " . mysqli_connect_error());
    }

    $querys="select * from projects where PROJECT_ID=".$projid;
    //echo $querys;
    $results=mysqli_query($connss,$querys);
    if (mysqli_num_rows($results) > 0) {
    // output data of each row
    while($rows = mysqli_fetch_assoc($results)) {
        $pname=$rows['NAME'];
        $_SESSION['name']=$rows['NAME'];
        $padd=$rows['ADDRES'];
        $pflats=$rows['NUMBER_OF_FLATS'];
        
        $pstartdate=$rows['START_DATE'];
        $penddate=$rows['END_DATE'];
        $prevenue=$rows['REVENUE'];
        $pstatus=$rows['STATUS'];
        $projname=$pname;    
    }
    mysqli_close($conn1);
}
    } 

    //separatedb conns end
    require_once("DB_CONNECT.php");
    
    if(isset($_POST['submit']))
    {
        if($_POST['projectname']!="" && $_POST['address']!="" && $_POST['flats']!="" &&  $_POST['startdate']!="" && $_POST['enddate']!="" )
        {
            $query  = "update projects set NAME='".$_POST['projectname']."',ADDRES='".$_POST['address']."',NUMBER_OF_FLATS=".$_POST['flats'].",START_DATE='".date("Y-m-d", strtotime($_POST['startdate']))."',END_DATE='".date("Y-m-d", strtotime($_POST['enddate']))."',REVENUE=".$_POST['revenue'].",STATUS='".$_POST['status']."' where PROJECT_ID=".$_POST['proid'];
            //echo $query;    

            if (mysqli_query($conn, $query)) 
            {
              echo "<div class='alert alert-success' style='margin-bottom:-.5%'>Project Updated</div>";    
                 //header('location: invoicetemplate.php');
                if($_POST['status']==0)
            {
             
              define('DBa_USER', "gdev_root"); // db user
    define('DBa_PASSWORD', "gdev_root"); // db password (mention your db password here)
    define('DBa_DATABASE', "gdev_3bsconstruction"); // database name
    define('DBa_SERVER', "localhost");
                $connss1=mysqli_connect(DBa_SERVER,DBa_USER,DBa_PASSWORD,DBa_DATABASE);
    
    //check connection
    if (!$connss1) {
    die("Connection failed: " . mysqli_connect_error());
    }

    $querys1="select i.CUSTOMER_CONTACT from invoices i where PROJECT_ID=".$_POST['proid'];
    //echo $querys1;
  
    $results1=mysqli_query($connss1,$querys1);
    if (mysqli_num_rows($results1) > 0) 
    {
    // output data of each row
      while($rows1 = mysqli_fetch_assoc($results1)) 
      {
         $mobno.=','.$rows1['CUSTOMER_CONTACT'];
         $projname=$rows1['PROJECT_NAME'];
            
      }
      $mobno = ltrim($mobno, ',');
      //echo $mobno;
  
      mysqli_close($connss1);

      //msg91 starts
      
    //Your authentication key
    $authKey = "111799A1wHmgjukQ5725ba10";
    
    //Multiple mobiles numbers separated by comma
    $mobileNumber = "".$mobno."";
    
    //Sender ID,While using route4 sender id should be 6 characters long.
    $senderId = "TBSCND";
    
    //Your message to send, Add URL encoding here.
    $message = urlencode("3Bs are happy to inform you that ".$_SESSION['name']." is ready for posession :)");
    //echo "3Bs are happy to inform you that ".$_SESSION['name']." is ready for posession :)";    
    //Define route 
    $route = "4";
    //Prepare you post parameters
    $postData = array(
        'authkey' => $authKey,
        'mobiles' => $mobileNumber,
        'message' => $message,
        'sender' => $senderId,
        'route' => $route
    );
    
    //API URL
    $url="https://control.msg91.com/api/sendhttp.php";
    
    // init the resource
    $ch = curl_init();
    curl_setopt_array($ch, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $postData
        //,CURLOPT_FOLLOWLOCATION => true
    ));
    

    //Ignore SSL certificate verification
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

    
    //get response
    $output = curl_exec($ch);
    
    //Print error if any
    if(curl_errno($ch))
    {
        echo 'error:' . curl_error($ch);
    }
    
    curl_close($ch);
     //echo $output;
      //msg91ends

    }


  
            }
                    } 
        }   
        else
        {
           echo "<div class='alert alert-danger' style='margin-bottom:-.5%;'>Please fill in all the fields</div>";
       }   
    }
    

?><html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Edit Project|3B's</title>
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
    background-color: #f9a123;
    border-color: #fff;

}
.box.box-solid.box-success {
    border: 1px solid #f9a123;
}
.skin-blue .main-header .logo {
    background-color: #e15601;
    color: #fff;
    border-bottom: 0 solid transparent;
}

.skin-blue .sidebar-menu>li:hover>a, .skin-blue .sidebar-menu>li.active>a {
    color: #fff;
    background: #1e282c;
    border-left-color: #e15601;
}
.skin-blue .main-header .navbar {
    background-color: #f9a123;
}
.skin-blue .main-header .navbar .sidebar-toggle:hover {
    background-color: #f9a123;
}
.btn-success:hover, .btn-success:active, .btn-success.hover {
    background-color: #fff;
    color:#f9a123;
    border-color: #f9a123;
}
.box.box-solid.box-success>.box-header {
    color: #fff;
    background: #f9a123;
    background-color: #f9a123;
}
.pagination>.active>a, .pagination>.active>a:focus, .pagination>.active>a:hover, .pagination>.active>span, .pagination>.active>span:focus, .pagination>.active>span:hover {
    z-index: 3;
    color: #fff;
    cursor: default;
    background-color: #f9a123;
    border-color: #f9a123;
}
.skin-blue .main-header .logo:hover {
    background-color: #e15601;
}

.btn-success.focus, .btn-success:focus {
    color: #fff;
    background-color: #f9a123;
    border-color: #f9a123;
}
.btn-success.active.focus, .btn-success.active:focus, .btn-success.active:hover, .btn-success:active.focus, .btn-success:active:focus, .btn-success:active:hover, .open>.dropdown-toggle.btn-success.focus, .open>.dropdown-toggle.btn-success:focus, .open>.dropdown-toggle.btn-success:hover {
    color: #fff;
    background-color: #f9a123;
    border-color: #f9a123;
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
<!--<div class="se-pre-con"></div>-->

<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="index2.php" class="logo" >
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>3B</b>'s</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>3B</b>'s Const. & Dev.</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
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
        <li  >
          <a href="createproject.php" >
            <i class="fa fa-building"></i>
            <span>Create Project</span>
            <!--<span class="label label-primary pull-right">4</span>-->
          </a>
          
        </li>
        <li>
          <a href="projects.php">
            <i class="fa fa-table"></i> <span>Projects</span>
            <!--<small class="label pull-right bg-green">new</small>-->
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
        <i class="fa fa-building"></i> Edit Project
        <!--<small>HOME</small>-->

      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Project</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
  <div class="box box-solid box-success" >
        <div class="box-header" >
          <h3 class="box-title">Edit Project Details</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
        <form name=f1 method=post action="">  
                                        <div class="form-group">
                                            <label class="control-label" for="inputSuccess">Project Name</label>
                                            <input  name="projectname" size="40" type="text" class="form-control" value="<?php echo $pname;?>" id="inputSuccess">
                                        </div>
                                        <div class="form-group ">
                                            <label class="control-label" for="inputSuccess">Address</label>
                                            <input name="address" value="<?php echo $padd;?>" type="text" class="form-control" id="inputWarning">
                                        </div>
                                        <div class="form-group ">
                                            <label class="control-label" for="inputSuccess">Number of Flats</label>
                                            <input name="flats" value="<?php echo $pflats;?>" type="number" class="form-control" id="inputSuccess">
                                        </div>
                                        

              <div class="form-group">
                <label>Start Date:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input name="startdate" value="<?php echo $pstartdate;?>" type="text" class="form-control pull-right" id="datepicker">
                </div>
                <!-- /.input group -->
              </div>
<div class="form-group">
                <label>End Date:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input name="enddate" value="<?php echo $penddate;?>" type="text" class="form-control pull-right" id="datepicker2">
                </div>
                <!-- /.input group -->
              </div>

                                        <div class="form-group ">
                                          <label class="control-label" for="inputSuccess">Revenue</label>
                                          <div class="input-group ">
                                            
                                            
                                            <span class="input-group-addon">₹</span>
                
                
              
                                            <input value='<?php echo $prevenue;?>' name="revenue" type="decimal" class="form-control" id="inputWarning">
                                            <span class="input-group-addon">.00</span></div>
                                        </div>
                                        <div class="form-group ">
                                            <INPUT type='hidden' name="proid" value="<?php echo $projid?>"/>
                                            <label class="control-label" for="inputSuccess">Status</label>
                                            <select  name="status" class="form-control">
                                                <optgroup label="COMPLETE"/>
                                                    <option>0</OPTION>
                                                <optgroup label="ONGOING"/>
                                                    <option>1</option>        
                                            </select>
                                        </div>
                                         <div>
                                            <input type=submit name=submit value=UPDATE type="button" class="btn btn-block btn-success" style="WIDTH:auto;"/>
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
  <asidse class="control-sidebar control-sidebar-dark">
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
    $('#datepicker2').datepicker({
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
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
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