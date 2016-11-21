<!DOCTYPE html>
<?php
session_start(); 
if($_SESSION['login']==1)
{  
    
    require_once("DB_CONNECT.php");
    if(isset($_POST['submit']))
    {
        if($_POST['customername']!="" && $_POST['customeraddress']!="" && $_POST['customercontact']!="" && $_POST['amount']!="" && $_POST['cashcheque']!="" && $_POST['project']!="")
        {
            $query  = "insert into invoices(CUSTOMER_NAME,CUSTOMER_ADDRESS,CUSTOMER_CONTACT,PROJECT_ID,AMOUNT,CASHCHEQUENUMBER,flat_number,DATE)
            values ('".$_POST['customername']."','".$_POST['customeraddress']."',".$_POST['customercontact'].","."(select PROJECT_ID from projects where name='".$_POST['project']."'),".$_POST['amount'].",'".$_POST['cashcheque']."',".$_POST['flatnumber'].",now())";
            if (mysqli_query($conn, $query)) 
            {
                echo "<div class='alert alert-success' style='margin-bottom:-.5%;'>Invoice created successfully!</div>";
                echo ("<script>window.open(\"" . invoice.".".php . "\");</script>");
                //header('location: invoicetemplate.php');
            $query1  = "update projects set revenue =revenue +".$_POST['amount']." where NAME='".$_POST['project']."'";
             mysqli_query($conn, $query1); 
            }
            else
            {
                echo "<div class='alert alert-danger'>Error: " . $sql . "<br>" . mysqli_error($conn)."</div>";
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
  <title>GenerateInvoice|3B's</title>
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
<STYLE>
.btn-success {
    background-color: #F0BA0A;
    border-color: #fff;

}
.box.box-solid.box-success {
    border: 1px solid #F0BA0A;
}
.skin-blue .main-header .logo {
    background-color: #D7A709;
    color: #fff;
    border-bottom: 0 solid transparent;
}
.skin-blue .main-header .logo:hover {
    background-color: #D7A709;
    color: #fff;
    border-bottom: 0 solid transparent;
}
.skin-blue .sidebar-menu>li:hover>a, .skin-blue .sidebar-menu>li.active>a {
    color: #fff;
    background: #1e282c;
    border-left-color: #D7A709;
}
.skin-blue .main-header .navbar {
    background-color: #F0BA0A;
}
.skin-blue .main-header .navbar .sidebar-toggle:hover {
    background-color: #F0BA0A;
}
.btn-success:hover, .btn-success:active, .btn-success.hover {
    background-color: #fff;
    color:#F0BA0A;
    border-color: #F0BA0A;
}
.box.box-solid.box-success>.box-header {
    color: #fff;
    background: #F0BA0A;
    background-color: #F0BA0A;
}
.pagination>.active>a, .pagination>.active>a:focus, .pagination>.active>a:hover, .pagination>.active>span, .pagination>.active>span:focus, .pagination>.active>span:hover {
    z-index: 3;
    color: #fff;
    cursor: default;
    background-color: #F0BA0A;
    border-color: #F0BA0A;
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
.btn-success.focus, .btn-success:focus {
    color: #fff;
    background-color: #f0ba0a;
    border-color: #f0ba0a;
}
.btn-success.active.focus, .btn-success.active:focus, .btn-success.active:hover, .btn-success:active.focus, .btn-success:active:focus, .btn-success:active:hover, .open>.dropdown-toggle.btn-success.focus, .open>.dropdown-toggle.btn-success:focus, .open>.dropdown-toggle.btn-success:hover {
    color: #fff;
    background-color: #f0ba0a;
    border-color: #f0ba0a;
}
  </style>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>

<script>
$(window).load(function() {
    // Animate loader off screen
    $(".se-pre-con").fadeOut("slow");;
  }); 
  </script>
  <script>        
           function phoneno(){          
            $('#phone').keypress(function(e) {
                var a = [];
                var k = e.which;

                for (i = 48; i < 58; i++)
                    a.push(i);

                if (!(a.indexOf(k)>=0))
                    e.preventDefault();
            });
        }
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
    <a href="index2.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>3B</b>'s</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>3B</b>'s Const. & Dev.</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
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
          <a href="createproject.php">
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
        <li class="active">
          <a href="#" style="border-left-color:#F0BA0A">
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
        <i class="fa fa-edit"></i> Generate Invoice
        <!--<small>HOME</small>-->

      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-edit"></i> Home</a></li>
        <li class="active">Generate Invoice</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="box box-solid box-success" >
        <div class="box-header">
          <h3 class="box-title">Enter Project Details</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
        <form name=f1 method=post action="">  
                      <div class="form-group ">
                                            <label class="control-label" for="inputSuccess">Customer Name</label>
                                            <input  name="customername" size="40" type="text" class="form-control" id="inputSuccess">
                                        </div>
                                        <div class="form-group ">
                                            <label class="control-label" for="inputSuccess">Customer Address</label>
                                            <input name="customeraddress" type="text" class="form-control" id="inputWarning">
                                        </div>
                                        <div class="form-group ">
                                            <label class="control-label" for="inputSuccess">Customer Contact</label>
                                            <input name="customercontact" maxlength=10 type="text" onkeypress="phoneno()"  class="form-control" id="phone">
                                        </div>
                                        <div class="form-group ">
                                            <label class="control-label" for="inputSuccess">Amount</label>
                                            <input name="amount" type="number" class="form-control" id="inputWarning">
                                        </div>

                                        <div class="form-group ">
                                            <label class="control-label" for="inputSuccess">Cash/Cheque_Number</label>
                                            <input name="cashcheque" type="text" class="form-control" id="phone">
                                        </div> 
                                        <div class="form-group ">
                                            <label class="control-label" for="inputSuccess">Project</label>
                                            <select  name="project" class="form-control">
                                                <optgroup label="Select Project"/>
                                                <?php
                                                    
                                                    $query  = "select * from projects";
                                                    $result = mysqli_query($conn,$query);
                                                    if (mysqli_num_rows($result) > 0) {
                                                    // output data of each row
                                                        while($row = mysqli_fetch_assoc($result)) {
                                                            echo "<option>".$row['NAME']."</option>";
                                                        }
                                                    }
                                                    else {
                                                        $count = 0;
                                                    }

                                                    mysqli_close($conn);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group ">
                                            <label class="control-label" for="inputSuccess">Flat Number</label>
                                            <input name="flatnumber" type="number" class="form-control" id="inputSuccess">
                                                 
                                        </div>
                                        <div>
                                            <big><button type="submit" name="submit" class="btn btn-outline btn-success">GENERATE INVOICE</button></big>
                                        </div>

                                        <div>
                                            
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