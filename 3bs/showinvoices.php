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
  
    

?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>INVOICES|3B's</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <style>
table { 
  width: 100%; 
  border-collapse: collapse; 
}
/* Zebra striping */
tr:nth-of-type(odd) { 
  background: #eee; 
}
th { 
  font-weight: bold; 
}
td, th { 
  padding: 6px; 
  border: 1px solid #ccc; 
  text-align: right; 
}

@media 
only screen and (max-width: 760px),
(min-device-width: 768px) and (max-device-width: 1024px)  {

  /* Force table to not be like tables anymore */
  table, thead, tbody, th, td, tr { 
    display: block; 
  }
  
  /* Hide table headers (but not display: none;, for accessibility) */
  thead tr { 
    position: absolute;
    top: -9999px;
    left: -9999px;
  }
  
  tr { border: 1px solid #ccc; }
  
  td { 
    /* Behave  like a "row" */
    border: none;
    border-bottom: 1px solid #eee; 
    position: relative;
    padding-left: 50%; 
  }
 

  td:before { 
    /* Now like a table header */
    position: absolute;
    /* Top/left values mimic padding */
    top: 6px;
    left: 6px;
    width: 45%; 
    padding-right: 10px; 
    white-space: nowrap;
  }
  
  /*
  Label the data
  */
  td:nth-of-type(1):before { content: "#"; }
  td:nth-of-type(2):before { content: "Name"; }
  td:nth-of-type(3):before { content: "Address"; }
  td:nth-of-type(4):before { content: "Flats"; }
  td:nth-of-type(5):before { content: "Area"; }
  td:nth-of-type(6):before { content: "Start Date"; }
  td:nth-of-type(7):before { content: "End Date"; }
  td:nth-of-type(8):before { content: "Revenue"; }
  td:nth-of-type(9):before { content: "Status"; }
  td:nth-of-type(10):before { content: "Edit"; }
}
.btn-success {
    background-color: #B04E7D;
    border-color: #fff;

}
.box.box-solid.box-success {
    border: 1px solid #B04E7D;
}
.skin-blue .main-header .logo {
    background-color: #844362;
    color: #fff;
    border-bottom: 0 solid transparent;
}

.skin-blue .sidebar-menu>li:hover>a, .skin-blue .sidebar-menu>li.active>a {
    color: #fff;
    background: #1e282c;
    border-left-color: #844362;
}
.skin-blue .main-header .navbar {
    background-color: #B04E7D;
}
.skin-blue .main-header .navbar .sidebar-toggle:hover {
    background-color: #B04E7D;
}
.btn-success:hover, .btn-success:active, .btn-success.hover {
    background-color: #fff;
    color:#B04E7D;
    border-color: #B04E7D;
}
.box.box-solid.box-success>.box-header {
    color: #fff;
    background: #B04E7D;
    background-color: #B04E7D;
}
.pagination>.active>a, .pagination>.active>a:focus, .pagination>.active>a:hover, .pagination>.active>span, .pagination>.active>span:focus, .pagination>.active>span:hover {
    z-index: 3;
    color: #fff;
    cursor: default;
    background-color: #B04E7D;
    border-color: #B04E7D;
}
.skin-blue .main-header .logo:hover {
    background-color: #844362;
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
    background-color: #b04e7d;
    border-color: #b04e7d;
}
.btn-success.active.focus, .btn-success.active:focus, .btn-success.active:hover, .btn-success:active.focus, .btn-success:active:focus, .btn-success:active:hover, .open>.dropdown-toggle.btn-success.focus, .open>.dropdown-toggle.btn-success:focus, .open>.dropdown-toggle.btn-success:hover {
    color: #fff;
    background-color: #b04e7d;
    border-color: #b04e7d;
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

  

</head>
<body class="hold-transition skin-blue sidebar-mini">
 <div class="se-pre-con"></div>
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
    <nav class="navbar navbar-static-top" ;>
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
          <a href="createproject.php">
            <i class="fa fa-building"></i>
            <span>Create Project</span>
            <!--<span class="label label-primary pull-right">4</span>-->
          </a>
          
        </li>
        <li >
          <a href="projects.php" >
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
        <li class="active">
          <a href="#" >
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
        <i class="fa fa-table"></i>   Invoices
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        
        <li class="active"><i class="fa fa-table"></i> Invoices</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
          <!-- /.box -->

          <div class="box box-solid box-success">
            <div class="box-header">
              <h3 class="box-title">Details</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th><center>#</th>
                                            <th><center>Customer Name</th>
                                            <th><center>Customer Address</th>
                                            <th><center>Customer Contact</th>
                                            <th><center>Date</th>
                                            <th><center>Project ID</th>
                                            <th><center>Amount</th>
                                            <th><center>Cash / Cheque#</th>
                                            <th><center>Flat Number</th>
                                            <th><center>Print Invoice</th>
                                        
                </tr>
                </thead>
                <tbody>
                	                                    <?php

                                        $query  = "select * from invoices";
                                        $result = mysqli_query($conn,$query);
                                        if (mysqli_num_rows($result) > 0) 
                                        {
                                            while($row = mysqli_fetch_assoc($result)) 
                                            {
                                                echo "<tr class='odd gradeX'><td><center>".$row['INVOICE_ID']."</td><td><center>".
                                                $row['CUSTOMER_NAME']."</td><td><center>".$row['CUSTOMER_ADDRESS']."</td><td><center>".
                                                $row['CUSTOMER_CONTACT']."</td><td><center>".$row['DATE']."</td><td><center>".$row['PROJECT_ID'].
                                                "</td><td><center>"."<span class='label label-danger'><big>₹". $row['AMOUNT']."/-</big></span>"."</td><td><center>"."<span class='label label-info'><big><big>".$row['CASHCHEQUENUMBER']."</big></span>"."</td><td><center>".
                                                $row['flat_number']."</td><td><center><form name=f1 method=post action='separateinvoice.php?'><input  type=submit name=dynamicbutton class='btn btn-block btn-success' style='width:100%;' value=".$row['INVOICE_ID']." ></input></form></td></tr>";
                                            }
                                        } 
                                        
                                    
                                    ?>
                </tbody>
                <tfoot>
                <tr>
                	<th>#</th>
                                            <th>Customer Name</th>
                                            <th>Customer Address</th>
                                            <th>Customer Contact</th>
                                            <th>Date</th>
                                            <th>Project ID</th>
                                            <th>Amount</th>
                                            <th>Cash / Cheque#</th>
                                            <th>Flat Number</th>
                                            <th>Print Invoice</th>
                                        
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 <footer class="main-footer" >
    <div class="pull-right hidden-xs">
     
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
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
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
