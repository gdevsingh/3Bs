<?php
    session_start();
    if(isset($_POST['submit']))
    {
        if($_POST['password']=='admin' )
        {
            
            $_SESSION['login']=1;
            header('Location:index2.php');
        }
        else
        {

             $_SESSION['login']=2;  

        }    
    }
    
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
  <title> Login|3B's</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
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
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition lockscreen">
  <div class="se-pre-con"></div>
<!-- Automatic element centering -->
<div class="lockscreen-wrapper">
  <div class="lockscreen-logo">
    <a href="index2.php"><b>3B </b>'s</a>
  </div>
  <!-- User name -->
  <div style="margin-top:-20pt;" class="lockscreen-name">Constructions & Developers</div>

  <!-- START LOCK SCREEN ITEM -->
  <div class="lockscreen-item" style="width:220px;">
    <!-- lockscreen image -->
    
    <!-- /.lockscreen-image -->

    <!-- lockscreen credentials (contains the form) -->
    <form class="lockscreen-credentials" method="post" action="">
      <div class="input-group">
        <input  name="password" type="password" style="margin-left:-50pt;text-align: center;  width:130pt;" class="form-control" placeholder="password">

        <div class="input-group-btn">
          <b><input name='submit' value=&rarr; type="submit"  class="btn"></b>
        </div>

      </div>

    </form>
    
  </div>
  <div style="height:10pt;margin-top:10pt;background-color:#d2d6de;"></div>
    <!-- /.lockscreen credentials -->
    <?php
                                if($_SESSION['login']==2)
                                {
                                ?>
                                 <center><div class="callout callout-danger " style="width: intrinsic;">
                
                <center><h4><i class="icon fa fa-ban" ></i> Incorrect Password !</h4></center>
                
              </div> </center>
              <?php
            }
            ?>
  
  <!-- /.lockscreen-item -->
  
  <div class="lockscreen-footer text-center">
    Copyright &copy; 2015-2016 <b>3B's Constructions & Developers</b><br>
    All rights reserved
  </div>
</div>
<!-- /.center -->

<!-- jQuery 2.2.0 -->
<script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
