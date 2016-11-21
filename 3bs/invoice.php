<!DOCTYPE html>
<!--
    author:Gurdev Singh
    e-mail:gdevsingh@outlook.com
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>INVOICE #<?php echo $id;?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
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
  <style>
  .btn-success {
    background-color: #E5343A;
    border-color: #fff;

}
.box.box-solid.box-success {
    border: 1px solid #E5343A;
}
.skin-blue .main-header .logo {
    background-color: #B91D22;
    color: #fff;
    border-bottom: 0 solid transparent;
}

.skin-blue .sidebar-menu>li:hover>a, .skin-blue .sidebar-menu>li.active>a {
    color: #fff;
    background: #1e282c;
    border-left-color: #B91D22;
}
.skin-blue .main-header .navbar {
    background-color: #E5343A;
}
.skin-blue .main-header .navbar .sidebar-toggle:hover {
    background-color: #E5343A;
}
.btn-success:hover, .btn-success:active, .btn-success.hover {
    background-color: #fff;
    color:#E5343A;
    border-color: #E5343A;
}
.box.box-solid.box-success>.box-header {
    color: #fff;
    background: #E5343A;
    background-color: #E5343A;
}
.pagination>.active>a, .pagination>.active>a:focus, .pagination>.active>a:hover, .pagination>.active>span, .pagination>.active>span:focus, .pagination>.active>span:hover {
    z-index: 3;
    color: #fff;
    cursor: default;
    background-color: #E5343A;
    border-color: #E5343A;
}
.skin-blue .main-header .logo:hover {
    background-color: #B91D22;
}
.btn-default {
    background-color: #E5343A;
    color: #fff;
    border-color: #E5343A;
}
.btn-default:hover {
    background-color: #fff;
    color: #E5343A;
    border-color: #E5343A;
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
<?php
session_start();

if($_SESSION['login']==1)
{

require_once('DB_CONNECT.php');
$query="select * from invoices ORDER BY INVOICE_ID DESC LIMIT 1;";
$result=mysqli_query($conn,$query);
if (mysqli_num_rows($result) > 0) 
{
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
      $id=$row['INVOICE_ID'];
      $name=$row['CUSTOMER_NAME'];
      $address=$row['CUSTOMER_ADDRESS'];
      $contact=$row['CUSTOMER_CONTACT'];
      $date=$row['DATE'];
      $projid=$row['PROJECT_ID'];
      $amount=$row['AMOUNT'];
      $cashcheque=$row['CASHCHEQUENUMBER'];
      $flat_number=$row['flat_number'];    
    }
} 
mysqli_close($conn);
//another connection
define('DBb_USER', "gdev_root"); // db user
define('DBb_PASSWORD', "gdev_root"); // db password (mention your db password here)
define('DBb_DATABASE', "gdev_3bsconstruction"); // database name
define('DBb_SERVER', "localhost");
$conn1=mysqli_connect(DBb_SERVER,DBb_USER,DBb_PASSWORD,DBb_DATABASE);
$querys="select * from projects where PROJECT_ID=".$projid;
$results=mysqli_query($conn1,$querys);
if (mysqli_num_rows($results) > 0) {
    // output data of each row
    while($rows = mysqli_fetch_assoc($results)) {
      $pname=$rows['NAME'];
      $padd=$rows['ADDRES'];
          
    }
    mysqli_close($conn1);
} 
require_once('PHPMailer/PHPMailerAutoload.php');

$mail = new PHPMailer;

$mail->isSMTP();                            // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                     // Enable SMTP authentication
$mail->Username = 'bchm007@gmail.com';          // SMTP username
$mail->Password = 'lebikhari'; // SMTP password
$mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                          // TCP port to connect to

$mail->setFrom('jagtaran1111@gmail.com', '3B\'s Constructions & Devlopers');
$mail->addReplyTo('jagtaran1111@gmail.com', '3B\'s Constructions & Devlopers');
$mail->addAddress('13030121004@sicsr.ac.in');   // Add a recipient

$mail->isHTML(true);  // Set email format to HTML

$bodyContent = '<table cellpadding="0" cellspacing="0" border=1>
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                3B\'s COns
                            </td>
                            
                            <td>
                                Invoice #:'.$id.'<br>
                                Created: '.$date.'<br>
                                
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                Gurudwara Road,<br>
                                Akurdi,<br>
                                Pune - 411 033
                            </td>
                            
                            <td>
                                3B\'s Constructions & Developers<br>
                                Jagtaran Singh<br>
                                jagtaran1111@gmail.com
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="details">
                <td><br><big><big>
                Received with thanks from Mr./Mrs./Miss <b style="border-bottom:1px solid #000;">'.$name.'</b> <br>
                    the sum of Rupees <b style="border-bottom:1px solid #000;">₹&nbsp;'.$amount.'/-</b> only <br>
                    by <b style="border-bottom:1px solid #000;">'.$cashcheque.'</b> on <b style="border-bottom:1px solid #000;">'.$date.'</b><br> 
                    towards <b style="border-bottom:1px solid #000;">Flat'.$flat_number.",".$pname.",".$padd.'</b> <br></td>   
            </big></big>
            </tr>
            </table>
            <table style="float:right;" >
            <tr style="float:right;">
               <TD><div class="form-group input-group">
                    <big><span class="input-group-addon" style="height:10px:2px;color:black;"><big>₹</big></span></big>
                    <input  style="font-sizes:30pt;width:50%;height:40px;" type="text"  disabled class="form-control" value='.$amount.'/-></input>                       
               </td>
               <TD >
                For 3B\'s Constructions & Developers
               </td>
            </tr>
            <tr>
                <td>
                </td>
                <td style="padding-top:5%">Authorised Signatory
                </td>   
            </tr>
            </taBLE>';

$bodyContent = str_replace('$name',$name,$bodyContent);
$bodyContent = str_replace('$id',$id,$bodyContent);
$bodyContent = str_replace('$flat_number',$flat_number,$bodyContent);
$bodyContent = str_replace('$pname',$pname,$bodyContent);
$bodyContent = str_replace('$padd',$padd,$bodyContent);
$bodyContent = str_replace('$date',$date,$bodyContent);
$bodyContent = str_replace('$amount',$amount,$bodyContent);
$bodyContent = str_replace('$cashcheque',$cashcheque,$bodyContent);
$mail->Subject = 'INVOICE:'.$id;
$mail->Body    = $bodyContent;

if(!$mail->send()) {
    // echo 'Message could not be sent.';
    // echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    //echo 'Message has been sent';
}



?>
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
        <li >
          <a href="index2.php">
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
        <i class="fa fa-edit"></i> INVOICE #<?php echo $id;?>
        <!--<small>HOME</small>-->

      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Generate Invoice</li>
        <li class="active">Invoice</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> 3B's Constructions & Developers
            <small class="pull-right">Date: <?php echo date("F j, Y, g:i a",time());?>     </small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          From
          <address>
            <!--
$id=$row['INVOICE_ID'];
      $name=$row['CUSTOMER_NAME'];
      $address=$row['CUSTOMER_ADDRESS'];
      $contact=$row['CUSTOMER_CONTACT'];
      $date=$row['DATE'];
      $projid=$row['PROJECT_ID'];
      $amount=$row['AMOUNT'];
      $cashcheque=$row['CASHCHEQUENUMBER'];
      $flat_number=$row['flat_number'];    
          -->
            <strong>3B's Constructions & Develpers.</strong><br>
            Gurudwara Road<br>
            Akurdi, Pune<br>
            Phone: (xxx) xxx-xxxx<br>
            Email: jagtaran1111@gmail.com
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          To
          <address>
            <strong><?php echo $name;?></strong><br>
            <?php echo $address;?><br>
            Phone: <?php echo $contact;?><br>
            
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <b>Invoice #<?php echo $id;?></b><br>
          <br>
          </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <p class="lead">Received with thanks from Mr./Mrs./Miss <b><?php echo $name;?></b> 
the sum of <b>₹ <?php echo $amount;?>/-</b> only 
by <b><?php echo $cashcheque;?></b>  on <b><?php echo $date;?></b> 
towards <b>Flat# <?php echo $flat_number;?> ,<?php echo $pname;?>,<?php echo $padd;?> </b>
        </p></div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        
        <!-- /.col -->
          

          <div class="table-responsive">
            <table class="table">
              <tr><font size=20>
                <big><th>Total:</th>
                <p class="lead"><td >₹<?php echo $amount;?>/-</td></p></big>
                <td width=100% align=right style="float:right;" >For 3B's Constructions & Developers<br><br>
Authorised Signatory</td>
              </font-sizes></tr>
            </table>
          </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <form name='f1' method=post action="invoice-print.php">
            <button type=submit  class="btn btn-default"><i class="fa fa-print"></i> Print</a>
            <input type="hidden" name="id" value="<?php echo $id?>">
            <input type="hidden" name="name" value="<?php echo $name?>">
            <input type="hidden" name="address" value="<?php echo $address?>">
            <input type="hidden" name="pname" value="<?php echo $pname?>">
            <input type="hidden" name="padd" value="<?php echo $padd?>">
            <input type="hidden" name="contact" value="<?php echo $contact?>">
            <input type="hidden" name="date" value="<?php echo $date?>">
            <input type="hidden" name="projid" value="<?php echo $projid?>">
            <input type="hidden" name="amount" value="<?php echo $amount?>">
            <input type="hidden" name="cashcheque" value="<?php echo $cashcheque?>">

            <input type="hidden" name="flat_number" value="<?php echo $flat_number?>">
          
          <button type="button" style="display:none" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
          </button>
          <button style="display:none" type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Generate PDF
          </button>
          </form>
        </div>
      </div>
    </section>
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
