<?php 
  session_start();
  if ($_SESSION['loginauth']!='admin') {
    header("Location:login.php");
  }

  if (isset($_GET['logout'])=='action') {
    session_destroy();
    header("Location:login.php");
  }

  include 'Classes/CustomerClass.php';
  $customer = new CustomerClass();
  include 'Classes/ClothClass.php';
  $cloth = new ClothClass();
  include 'Classes/MeasurementClass.php';
  $measure = new MeasurementClass();
  include 'Classes/CartClass.php';
  $cart = new CartClass();
  include 'Classes/EmployeeClass.php';
  $emp = new EmployeeClass();;
  include 'Classes/LoginClass.php';
  $create = new LoginClass();
  include 'Classes/FormatClass.php';
  $fm = new Format();
  
  $role = $_SESSION['role'];
  $id = $_SESSION['id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="This project is an educational project.">
  <meta name="author" content="Tailor Management System">
  <link href="img/logo/logo.jpg" rel="icon">
  <title>TAILOR</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet"> 
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon">
          <img src="img/logo/logo.jpg">
        </div>
        <div class="sidebar-brand-text mx-3">TAILOR</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Features
      </div>
      <div>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable" aria-expanded="true"
          aria-controls="collapseTable">
          <i class="fas fa-solid fa-user"></i>
          <span>Admin</span>
        </a>
        <div id="collapseTable" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Admin </h6>
            <?php if($role==0) { ?>
              <a class="collapse-item" href="adduser.php"> Create Sub Admin </a> 
            <?php } ?>
              <a class="collapse-item" href="users.php">Admin Details</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable1" aria-expanded="true"
          aria-controls="collapseTable">
          <i class="fas fa fa-users"></i>
          <span>Employee</span>
        </a>
        <div id="collapseTable1" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Employee </h6>
            <?php if(($role==0) || ($role==1)) { ?>
              <a class="collapse-item" href="create_employee.php">Create Employee</a> 
              <a class="collapse-item" href="employee_list.php">Employee List</a>
              <a class="collapse-item" href="salary_list.php">Salary</a>
            <?php } ?> 
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable2" aria-expanded="true"
          aria-controls="collapseTable">
          <i class="fas fal fa-user-tie"></i>
          <span>Customer</span>
        </a>
        <div id="collapseTable2" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Customer </h6>
              <a class="collapse-item" href="create_customer.php">Create Customer</a>
              <a class="collapse-item" href="customer_list.php">Customer Details</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseForm" aria-expanded="true"
          aria-controls="collapseForm">
          <i class="fas fa-tshirt"></i>
          <span>Cloth Type</span>
        </a>
        <div id="collapseForm" class="collapse" aria-labelledby="headingForm" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Cloth Type</h6>
            <div>          
              <a class="collapse-item" href="addtype.php">Add Cloth Type</a>      
              <a class="collapse-item" href="typelist.php">View Cloth Type</a>
            </div>
          </div>
        </div>
      </li>
 
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseForm1" aria-expanded="true"
          aria-controls="collapseForm">
          <i class="fas fa-file-alt"></i>
          <span>Cloth Details</span>
        </a>
        <div id="collapseForm1" class="collapse" aria-labelledby="headingForm" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Cloth Details</h6>
            <div>
              <a class="collapse-item" href="add_cloth.php">Add New Cloth</a>     
              <a class="collapse-item" href="all_cloth.php">View Existing Cloth</a>
            </div>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseForm2" aria-expanded="true"
          aria-controls="collapseForm">
          <i class="fas fa-cut"></i>
          <span>Measurement</span>
        </a>
        <div id="collapseForm2" class="collapse" aria-labelledby="headingForm" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Measurement</h6>
            <div>
              <a class="collapse-item" href="add_measurement.php">Take Measurement</a>     
              <a class="collapse-item" href="view_measurement.php">View Measurement</a>
            </div>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="cart.php">
          <i class="fas fa-shopping-cart"></i>
          <span>Cart</span>
        </a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="order.php">
          <i class="fas fa-shopping-bag"></i>
          <span>Order</span>
        </a>
      </li>

      <!-- <li class="nav-item">
        <a class="nav-link" href="images.php">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Image Galary</span>
        </a>
      </li> -->

      <!-- <li class="nav-item">
        <a class="nav-link" href="contact.php">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Contact</span>
        </a>
      </li> -->

     
      <hr class="sidebar-divider">
      <div class="version" id="version-ruangadmin"></div>
    </ul>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
          <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <ul class="navbar-nav ml-auto"> 
            <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <img class="img-profile rounded-circle" src="img/boy.png" style="max-width: 60px">
                <?php
                  if(isset($_GET['logout']) && isset($_GET['logout']) == 'logout'){
                      session_destroy();
                      header('Location:index.php');
                  }
                ?>
                <span class="ml-2 d-none d-lg-inline text-white small"><?php echo $_SESSION['email']; ?></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="profile.php">
                  <i class="fas fa-solid fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  User Profile
                </a>

                <a class="dropdown-item" href="up_password.php">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Change Password
                </a>
               
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="?logout=logout" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>
        </nav>

        <!-- Topbar -->
