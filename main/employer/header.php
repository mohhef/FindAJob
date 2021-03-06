<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<meta http-equiv="x-ua-compatible" content="IE=edge">

<?php if(basename($_SERVER['PHP_SELF']) == 'post_job.php'){ ?>
    <script src="../js/jquery3.4.1.min.js"></script>
    <script src="../js/1.14.7popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
    <script src="../js/secure.js"></script>
    <script src="../js/bootbox.min.js"></script>
    <script src="../js/bootbox.locales.min.js"></script>
    <?php }
        elseif(basename($_SERVER['PHP_SELF']) == 'view_job.php' ||basename($_SERVER['PHP_SELF']) == 'application_job.php'|| basename($_SERVER['PHP_SELF']) == 'payment.php' ||
         basename($_SERVER['PHP_SELF']) == 'subscription.php' || basename($_SERVER['PHP_SELF']) == 'admin.php' || basename($_SERVER['PHP_SELF']) == 'profile.php'|| basename($_SERVER['PHP_SELF']) == 'offers.php'|| basename($_SERVER['PHP_SELF']) == 'contact_admin.php' ){
      ?>
      <script src="../js/jquery-3.31.js"></script>
      <script src="../js/bootstrap.min.js"></script>
      <script src="../js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
      <script src="../js/dataTables.bootstrap4.min.js"></script>
      <script src="../js/ColReorderWithResize.js"></script>
      <script src="../js/secure.js"></script>
      <script src="../js/bootbox.min.js"></script>
      <script src="../js/bootbox.locales.min.js"></script>
    <?php } ?>    
    


      <?php if(basename($_SERVER['PHP_SELF']) == 'post_job.php'){ ?>
        <link rel="stylesheet" href="../css/4.3.1bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../css/find_a_job.css" />
        <link rel="stylesheet" type="text/css" href="../../inventory/style/main.css" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" />
      <?php }
        elseif(basename($_SERVER['PHP_SELF']) == 'view_job.php' ||basename($_SERVER['PHP_SELF']) == 'application_job.php'|| basename($_SERVER['PHP_SELF']) == 'payment.php' ||
         basename($_SERVER['PHP_SELF']) == 'subscription.php' || basename($_SERVER['PHP_SELF']) == 'admin.php' || basename($_SERVER['PHP_SELF']) == 'profile.php'|| basename($_SERVER['PHP_SELF']) == 'offers.php'|| basename($_SERVER['PHP_SELF']) == 'contact_admin.php' ){
      ?>
      <link rel="stylesheet" href="../css/4.1.3bootstrap.css">
      <link rel="stylesheet" type="text/css" href="../css/maindata.css" />
      <link rel="stylesheet" href="../css/dataTables.bootstrap4.min.css">
      <!--  <link rel="stylesheet" type="text/css" href="../../inventory/style/main.css" /> -->
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" />      
    <?php } ?>    
</head>

<body>
<div class="row">
    <div class="col-md-4 mr-auto" id="change">
      <a href="\comp-353\main\employer\post_job.php">
        <img src="../png/findAjob.png" width=auto height=70px alt="" width=auto height=50px id ="Logo" position:absolute;>
      </a>
    </div>
    <div class="frozen">
    <div class="col-md-1-auto" id="change1">
      <a class="btn btn-outline-primary" href="\comp-353\main\employer\post_job.php" id="pipeview">Post A job</a>
    </div>
  </div>
  <div class="frozen">
    <div class="col-md-1-auto" id="change1">
      <a class="btn btn-outline-primary" href="\comp-353\main\employer\view_job.php" id="pipeview">Modify A job</a>
    </div>
  </div>
  <div class="frozen">
    <div class="col-md-1-auto" id="change1">
      <a class="btn btn-outline-primary" href="\comp-353\main\employer\application_job.php" id="pipeview">Job Applications</a>
    </div>
  </div>
  <div class="frozen">
    <div class="col-md-1-auto" id="change1">
      <a class="btn btn-outline-primary" href="\comp-353\main\employer\offers.php" id="pipeview">Offers</a>
    </div>
  </div>
    <div class="col-md-1-auto" id="change1">
      <a class="btn btn-outline-primary" href="\comp-353\main\employer\subscription.php" id="pipeview">Subscription</a>
    </div>
    <div class="frozen">
    <div class="col-md-1-auto" id="change1">
      <a class="btn btn-outline-primary" href="\comp-353\main\employer\profile.php" id="pipeview">Profile</a>
    </div>
    </div>
    <div class="frozen">
    <div class="col-md-1-auto" id="change1">
      <a class="btn btn-outline-primary" href="\comp-353\main\employer\rep_dashboard.php" id="pipeview">Representatives</a>
    </div>
    </div>
    <div class="frozen">
     <div class="col-md-1-auto" id="change1">
      <a class="btn btn-outline-primary" href="\comp-353\main\employer\contact_admin.php" id="pipeview">Contact Admin</a>
    </div>
    </div>
    <div class="col-md-1-auto" id="change4">
      <a class="btn btn-danger" onclick="cookieset_employer();" id="cooks">Logout</a>
    </div>
    <div class="col-md-1-auto" id="change2">
    </div>
  </div>
