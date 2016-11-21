<!DOCTYPE html>
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
  <title>3B's</title>
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
  <style>
  a:hover
  {
    background-color: green;
  }
  .btn-success {
    background-color: #00a000;
    border-color: #fff;

}.skin-blue .main-header .navbar .sidebar-toggle:hover {
    background-color: #008000;
}
.btn-success:hover, .btn-success:active, .btn-success.hover {
    background-color: #fff;
    color:#008000;
    border-color: #008000;
}
  </style>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="index2.php" class="logo" style="background-color:green;">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>3B</b>'s</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>3B</b>'s Const. & Dev.</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" style="background-color:#00a000;">
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
          <a href="#" style="border-left-color:green">
            <i class="fa fa-building"></i>
            <span>Create Project</span>
            <!--<span class="label label-primary pull-right">4</span>-->
          </a>
          
        </li>
        <li>
          <a href="pages/widgets.html">
            <i class="fa fa-table"></i> <span>Projects</span>
            <!--<small class="label pull-right bg-green">new</small>-->
          </a>
        </li>
        <li >
          <a href="#">
            <i class="fa fa-edit"></i> <span>Generate Invoice</span>
            <!--<i class="fa fa-angle-left pull-right"></i>-->
          </a>
          
        </li>
        <li >
          <a href="#">
            <i class="fa fa-table"></i> <span>Invoices</span>
           <!-- <i class="fa fa-angle-left pull-right"></i>-->
          </a>
          
        </li>
        <li >
          <a href="#">
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
        <div class="box-header" style="background-color:green;">
          <h3 class="box-title">Enter Project Details</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
      <!-- Info boxes -->
        <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>#</th>
          <th>Name</th>
                    <th>Address</th>
                    <th>Flats</th>
                    <th>Total Area</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Revenue</th>
                    <th>Status</th>
                    <th>Edit</th>
                </tr>
                </thead>
                <tbody>
                <?php

                                        $query  = "select * from projects";
                                        $result = mysqli_query($conn,$query);
                                        if (mysqli_num_rows($result) > 0) 
                                        {
                                            while($row = mysqli_fetch_assoc($result)) 
                                            {
                                                echo "<tr class='odd gradeX'><td>".$row['PROJECT_ID']."</td><td>".$row['NAME']."</td><td>".$row['ADDRES']."</td><td>".$row['NUMBER_OF_FLATS']."</td><td>".$row['TOTAL_AREA']."</td><td>".$row['START_DATE']."</td><td>".$row['END_DATE']."</td><td>".$row['REVENUE']."</td><td>".$row['STATUS']."</td><td><form name=f1 method=post action=editproject.php><input type=submit name=dynamicbutton style='width:100%;' value=".$row['PROJECT_ID']." ></input></form></td></tr>";
                                            }
                                        } 
                                        else 
                                        {
                                    
                                    ?>
                                    
                </tbody>
                <tfoot>
                <tr>
                  <th>#</th>
          <th>Name</th>
                    <th>Address</th>
                    <th>Flats</th>
                    <th>Total Area</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Revenue</th>
                    <th>Status</th>
                    <th>Edit</th>
                </tr>
                </tfoot>
              </table>
            <!-- /.row -->
    </div></div>
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
mysqli_close($conn);}
}
else
{
    header('Location:index.php');
}
?>
