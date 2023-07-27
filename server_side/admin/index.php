<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
?>

<div class="container-fluid">
<br>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
<h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>

  <div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Registered Admin</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">

              <?php 

require 'dbconfig.php';

$query = "SELECT id FROM admin ORDER BY id";
$query_run = mysqli_query($connection, $query);

$row = mysqli_num_rows($query_run);

echo '<h1>'.$row.'</h1>';
?>
 <h4>Admin</h4>

              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-user fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Registered Users</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">

              <?php 

              require 'dbconfig.php';

              $query = "SELECT id FROM user ORDER BY id";
              $query_run = mysqli_query($connection, $query);

              $row = mysqli_num_rows($query_run);

              echo '<h1>'.$row.'</h1>';
              ?>
               <h4>Users</h4>

              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-user fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">List of Hospital/Clinic</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">

              <?php 

require 'dbconfig.php';

$query = "SELECT id FROM location ORDER BY id";
$query_run = mysqli_query($connection, $query);

$row = mysqli_num_rows($query_run);

echo '<h1> '.$row.'</h1>';
?>
<h4>Locations</h4>

              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-hospital fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <?php
include('includes/scripts.php');
include('includes/footer.php');
?>