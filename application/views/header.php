<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Escalera Investments</title>
    <link href="<?php echo base_url();?>/assets/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
   <script src="<?php echo base_url();?>/assets/js/bootstrap.min.js"></script>
   <script src="<?php echo base_url();?>/assets/js/jquery-1.11.1.min.js"></script>
    <!-- Bootstrap core CSS-->
    <link href="<?php echo base_url();?>/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url();?>/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="<?php echo base_url();?>/assets/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url();?>/assets/css/sb-admin.css" rel="stylesheet">
    <script src="<?php echo base_url();?>/assets/js/jquery.min.js"></script>
   </head>

  <body id="page-top">
   <div >
    <nav class="navbar navbar-expand  static-top" style="background:black;"">

      <a class="navbar-brand mr-1" href="#" style="color:white">Escalera</a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

      <!-- Navbar Search -->
      <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn btn-primary" type="button">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>

      <!-- Navbar -->
      <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-bell fa-fw"></i>
            <span class="badge badge-danger">9+</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
        <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-envelope fa-fw"></i>
            <span class="badge badge-danger">7</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle fa-fw"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            Logged in as:
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?php echo base_url();?>index.php/User/home" data-toggle="modal" data-target="#logoutModal"><?php 
				 $user = $this->session->userdata('user');
				 extract($user);
				 echo "(<i>Username</i><b>:"." ".$username."</b> )";
				?>Logout</a>
          </div>
        </li>
      </ul>

    </nav>
    </div>

    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav" style="background:black;">
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url();?>index.php/User/home">
            <i class="fas fa-home fa-fw"></i>
            <span>Home</span>
          </a>
        </li>
		<!-- Products --->
		 <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="<?php echo base_url(); ?>index.php/Welcome/registerStaff" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>Products</span>
		  </a>
		  <div class="dropdown-menu" aria-labelledby="pagesDropdown">
		    <h6 class="dropdown-header">Add</h6>
			<a class="dropdown-item" href="<?php echo base_url();?>index.php/Welcome/AddItem">New product</a>
      <a class="dropdown-item" href="<?php echo base_url();?>index.php/Welcome/ProductCategory">Product category</a>
			<div class="dropdown-divider"></div>
			<h6 class="dropdown-header">Display </h6>
			<a class="dropdown-item" href="<?php echo base_url();?>index.php/Welcome/view_items">Items List</a>
      <a class="dropdown-item" href="<?php echo base_url();?>index.php/Welcome/available_products">Current stock </a>
		  </div>
        </li>
    <!-- purchases --->
     <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="<?php echo base_url(); ?>index.php/Welcome/AddStaff" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>Purchases</span>
      </a>
      <div class="dropdown-menu" aria-labelledby="pagesDropdown">
        <h6 class="dropdown-header">Record purchases</h6>
      <a class="dropdown-item" href="<?php echo base_url();?>index.php/Welcome/Purchases">Purchases</a>
      <div class="dropdown-divider"></div>
      <h6 class="dropdown-header">Upload batch</h6>
      <!-- code for purchases upload
      <a class="dropdown-item" href="<?php //echo base_url();?>index.php/Csv/index">Import batches</a>
      -->

      <a class="dropdown-item" href="<?php echo base_url();?>index.php/Csv/index">Import batches</a>
      <a class="dropdown-item" href="<?php echo base_url();?>index.php/Welcome/display_purchases">All purchases</a>

      </div>
        </li>
		<!-- Sales --->
		 <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="<?php echo base_url(); ?>index.php/Welcome/registerStaff" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>Sales</span>
		  </a>
		  <div class="dropdown-menu" aria-labelledby="pagesDropdown">
		    <h6 class="dropdown-header">Record sales</h6>
        <a class="dropdown-item" href="<?php echo base_url();?>index.php/Welcome/Sales">Record daily sales</a>
        <!--
          <a class="dropdown-item" href="<?php //echo base_url();?>index.php/Csv/sales_batch_upload">Upload batch</a>
        -->
			<div class="dropdown-divider"></div>
			<h6 class="dropdown-header">Display Sales</h6>
			<a class="dropdown-item" href="<?php echo base_url();?>index.php/Welcome/view_daily_sales">All sales</a>
      <a class="dropdown-item" href="<?php echo base_url();?>index.php/Welcome/total_monthly_sales">Total monthly sales</a>
      <a class="dropdown-item" href="#">Monthly performance</a>
			
		  </div>
      </li>
		
		<!-- Purchases --->
		 <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="<?php echo base_url(); ?>index.php/Welcome/AddStaff" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>Expenditures</span>
		  </a>
		  <div class="dropdown-menu" aria-labelledby="pagesDropdown">
		    <h6 class="dropdown-header">Add Type</h6>
			<a class="dropdown-item" href="<?php echo base_url();?>index.php/Welcome/expenditure_categories">Add category</a>
			<div class="dropdown-divider"></div>
			<h6 class="dropdown-header">Expenses</h6>
			<a class="dropdown-item" href="<?php echo base_url();?>index.php/Welcome/expenses">Record expenditures</a>
			<a class="dropdown-item" href="<?php echo base_url();?>index.php/Welcome/show_expenditures">Expenditures display</a>
		  </div>
      </li>

      <!-- Services --->
     <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="<?php echo base_url(); ?>index.php/Welcome/AddStaff" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>Services</span>
      </a>
      <div class="dropdown-menu" aria-labelledby="pagesDropdown">
        <h6 class="dropdown-header">Add Type</h6>
      <a class="dropdown-item" href="<?php echo base_url();?>index.php/Welcome/Services">Add service type</a>
      <div class="dropdown-divider"></div>
      <h6 class="dropdown-header">Manage sales</h6>
      <a class="dropdown-item" href="<?php echo base_url();?>index.php/Welcome/service_sales">Record sales</a>
      <a class="dropdown-item" href="<?php echo base_url();?>index.php/Welcome/view_service_sales">View all sales</a>
      </div>
      </li>

      <!-- Financial management --->
     <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="<?php echo base_url(); ?>index.php/Welcome/AddStaff" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-book fa-fw "></i>
                <span>Finance</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
              <h6 class="dropdown-header">Accounts</h6>
              <a class="dropdown-item" href="#">Add service type</a>
              <div class="dropdown-divider"></div>
              <h6 class="dropdown-header">Manage sales</h6>
              <a class="dropdown-item" href="#">Record sales</a>
              <a class="dropdown-item" href="#">View all sales</a>
          </div>
      </li>
        <!-- Configurations -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-cog fa-spin"></i>
            <span>Configurations</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <h6 class="dropdown-header">Pages</h6>
            <a class="dropdown-item" href="<?php echo base_url();?>index.php/Welcome/AddStaff">Register new staff</a>
            <a class="dropdown-item" href="<?php echo base_url();?>index.php/Welcome/forgot_password">Forgot Password</a>
            <div class="dropdown-divider"></div>
            <h6 class="dropdown-header">Other Pages:</h6>
            <a class="dropdown-item" href="404.html">404 Page</a>
            <a class="dropdown-item" href="<?php echo base_url();?>index.php/Welcome/blank">Blank Page</a>
          </div>
        </li>
      </ul>

      <div id="content-wrapper">