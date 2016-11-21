<!DOCTYPE html>
<?php
session_start();
if($_SESSION['login']==1)
{  

require_once('DB_CONNECT.php');
$invoiceid=$_REQUEST['dynamicbutton'];

$query="select * from invoices where INVOICE_ID=".$invoiceid;
$result=mysqli_query($conn,$query);
if (mysqli_num_rows($result) > 0) {
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

?>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>INVOICE#<?php echo $id?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
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
<body onload="window.print();">
  <big>
  <big>
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
          <i class="fa fa-globe"></i><big> 3B's Constructions & Developers</big>
          <small class="pull-right">Date: <?php echo date("F j, Y, g:i a");?></small>
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
        <div class="col-xs-12 table-responsive" style="margin-right:20%;">
          <p class="lead"><big>Received with thanks from Mr./Mrs./Miss <b><?php echo $name;?></b> 
the sum of <b>₹ <?php echo $amount;?>/-</b> only 
by <b><?php echo $cashcheque;?></b>  on <b><?php echo $date;?></b><br> 
towards <b>Flat# <?php echo $flat_number;?> ,<?php echo $pname;?>,<?php echo $padd;?> </b>
        </big></p></div>
        <!-- /.col -->
      </div>
      <div class="row">
        <!-- accepted payments column -->
        
        <!-- /.col -->
        <div class="col-xs-12">
          

          <div class="table-responsive">
            <table class="table">
              <tr>
                <big><th>Total:</th>
                <p class="lead"><td>₹<?php echo $amount;?>/-</td></p></big>
                <td width=100% align=right style="float:right;" >For 3B's Constructions & Developers<br><br>
Authorised Signatory</td>
              </tr>
            </table>
          </div>
        </div>
        <!-- /.col -->
      </div><!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
</html>
<?php
}
else
{
    header('Location:index.php');
}
?>
