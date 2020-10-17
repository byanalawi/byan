<!DOCTYPE html>

<?php

ini_set('show_errors', 'On');
ini_set('display_errors', 1);
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);

function __autoload($className){
    include_once  $className.'.php';
}

session_start();

include './login.php';


?>

<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Zain Scheduling System</title>
         <link rel = "icon" href ="img/logo2.png" type = "image/x-icon"> 
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    </head>
 
 <?php
 
 if($_SESSION['usertype'] == "Technician"){
      $appointment="techpage.php";

 }  elseif($_SESSION['usertype'] == "Staff") {
      $appointment="apprequests.php";
 } 
 elseif( $_SESSION['usertype'] == "Admin") {
      $appointment="apprequests.php";
 } 
 else {
      $appointment="custrequest.php";
}
 
 ?>
    
    <body class="sb-nav-fixed">
       
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a href="index.php" class="brand-link">
            <img src="img/logo2.png" alt="AdminLTE Logo" class="brand-image"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">Zain Appointments</span>
        </a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button
            ><!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
<!--                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-info" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>-->
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">Settings</a><a class="dropdown-item" href="#">Activity Log</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="logout.php">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            
                             <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="<?php echo  $_SESSION['userimg'];?>" style="margin-left: 12px;"class="img-circle elevation-4" alt="User Image" height="80" width="60">
                </div>
                <div class="info">
                    <a href="#" class="d-block" class="sb-sidenav-menu-heading"  style=" color: grey"><?php echo $_SESSION['username']; ?></a>
                  
                    <small class="badge badge-info"> <?php echo  $_SESSION['usertype'];?></small>
                </div>
            </div>
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard</a>
                            <a class="nav-link" href="<?php echo $appointment; ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-calendar"></i></div>
                                Appointments</a>
                            
                            <?php
                            
                              if ($_SESSION['usertype'] != "Customer"){
                                  echo '<a class="nav-link" href="archive.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-archive"></i></div>
                                Appointments Archive</a>';
                              }
                            ?>
                            
                                                       
                            
                            
                            <?php
                             if ($_SESSION['usertype'] == "Admin"){
                            ?>
                            
                            <div class="sb-sidenav-menu-heading">User Management</div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts"><div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                User Management
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div></a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="allusers.php">All users</a><a class="nav-link" href="adduser.php">Add new user</a> </nav>
                            </div>
                           
                           
                            <div class="sb-sidenav-menu-heading">System Management</div>
                            <a class="nav-link" href="costreport.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Resolution cost report</a>
                            
                            
                            <a class="nav-link" href="managedescription.php">
                          <div class="sb-nav-link-icon"><i class="fas fa-cogs"></i></div>
                                Manage resolution list</a>
                            <a class="nav-link" href="timelist.php">
                          <div class="sb-nav-link-icon"><i class="fas fa-clock"></i></div>
                                Manage timing list</a>
                            
                            <?php
                             }
                            ?>
                            
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as: <?php echo $_SESSION['username']; ?>   </div>
                
                    </div>
                </nav>
            </div>