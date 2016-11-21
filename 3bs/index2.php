<?php
session_start();
if($_SESSION['login']==1)
{  
require_once("DB_CONNECT.php");
$query  = "select count(*),SUM(revenue),(select count(*) from projects where status=1) as status from projects";
$result = mysqli_query($conn,$query);
if (mysqli_num_rows($result) > 0) {
    
    while($row = mysqli_fetch_assoc($result)) {
        $count = $row['count(*)'];
        $ongoing = $row['status'];
        
    }
} else {
    $count = 0;
}
$query1  = "select SUM(revenue) as revenue from projects";
//$query1  = "select SUM(amount) as revenue from invoices";
$result1 = mysqli_query($conn,$query1);
if (mysqli_num_rows($result1) > 0) {
    
    while($row = mysqli_fetch_assoc($result1)) {
        $revenue = $row['revenue'];
        
        
    }
}


$query2  = "select name,revenue from projects order by revenue desc limit 3";
$result2 = mysqli_query($conn,$query2);
if (mysqli_num_rows($result2) > 0) {
    $c=0;
    while($row = mysqli_fetch_assoc($result2)) {
        $c++;
    
        $revenues = $row['revenue'];
        $names = $row['name'];
        if($c==1){$name1=$names;$revenue1=$revenues;}
        else if($c==2){$name2=$names;$revenue2=$revenues;}
        else if($c==3)  {$name3=$names;$revenue3=$revenues;}
        
    }
    
}
mysqli_close($conn);
?>
<?php
// $conn2=mysqli_connect(DB_SERVER,DB_USER,DB_PASSWORD,DB_DATABASE);
//                                                     $query1  = "select * from invoices";
//                                                     $result = mysqli_query($conn,$query);
//                                                     if (mysqli_num_rows($result) > 0) {
//                                                     // output data of each row
//                                                         while($row = mysqli_fetch_assoc($result)) {
//                                                             echo "<option>".$row['NAME']."</option>";
//                                                         }
//                                                     }
//                                                     else {
//                                                         $count = 0;
//                                                     }

//                                                     mysqli_close($conn);
?>
<!DOCTYPE html>
<!--
    author:Gurdev Singh
    e-mail:gdevsingh@outlook.com
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Home|3B's</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- jvectormap -->
  
  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>

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
  <style>
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
      <div  style="display:none;"class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form style="display:none;" action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active " >
          <a href="#" style="border-left-color:#3c8dbc">
            <i class="fa fa-dashboard" ></i> <span>Dashboard</span> 
            <!--i class="fa fa-angle-left pull-right"></i>-->
          </a>
          
        </li>
        <li >
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
            <i name="logout" class="fa fa-sign-out"></i> <span>Logout</span>
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
        <i class="fa fa-dashboard"></i> Dashboard
        <!--<small>HOME</small>-->

      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-md-4 col-sm-9 col-xs-12">
          <div class="info-box bg-aqua">
            <span class="info-box-icon "><i class="fa fa-building"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">TOTAL PROJECTS</span>
              <span class="info-box-number"><?php echo $count ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="info-box bg-yellow">
            <span class="info-box-icon "><i class="fa fa-spinner"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Ongoing projects</span>
              <span class="info-box-number"><?php echo $ongoing ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="info-box bg-green">
            <span class="info-box-icon "><i class="fa fa-money"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">REVENUE TILL DATE</span>
              <span class="info-box-number">₹&nbsp;<?php echo round($revenue) ?>/-</span>
            </div>
            <!-- /.info-box-content -->
        
          </div>
          <!-- /.info-box -->
        
        </div>
        </div>
        <div  class="callout callout-danger lead">
          <CENTER><h3><span class='label label-info'>TOP 3 GROSSING PROJECTS</span></h3></CENTER>
        <div class="progress-group">

                    <p><span class='label label-success'><b><?php echo $name1?></b></p>
                    
                    <div class="progress sm">
                      <div class="progress-bar progress-bar-green progress-bar-striped active" style="width: <?php echo ($revenue1/$revenue)*100?>%"></div>
                    </div>
                    <p align=right><span class='label label-warning '><?php echo round(($revenue1/$revenue)*100)?>%</span> of total revenue</p>
                    

                  </div>
                  <div class="progress-group">
                    <p><span class='label label-info'><b><?php echo $name2?></b></p>
                    
                    <div class="progress sm">
                      <div class="progress-bar progress-bar-aqua progress-bar-striped active" style="width: <?php echo ($revenue2/$revenue)*100?>%"></div>
                    </div>
                    <p align=right><span class='label label-warning'><?php echo round(($revenue2/$revenue)*100)?>%</span> of total revenue</p>
                    

                  </div>
      <div class="progress-group">
                    <p><span class='label label-warning'><b><?php echo $name3?></b></p>
                    
                    <div class="progress sm">
                      <div class="progress-bar progress-bar-yellow progress-bar-striped active"  style="width: <?php echo ($revenue3/$revenue)*100?>%"></div>
                    </div>
                    <p align=right><span class='label label-warning'><?php echo round(($revenue3/$revenue)*100)?>%</span> of total revenue</p>
                    

                  </div>
          

                </div>
       
<!--% details-->

        <!-- /.col -->
        <!-- /.col -->
      
      <!-- /.row -->
    </div>
  </section>
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
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS 1.0.1 -->
<script src="plugins/chartjs/Chart.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
<?php
}
else
{
    header('Location:index.php');
}
?>
