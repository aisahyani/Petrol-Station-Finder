<?php
session_start();
include('includes/header.php'); 
include('includes/navbar.php'); 
?>

<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"> Edit User Profile </h6>
  </div>

  <div class="card-body">
<?php

$connection = mysqli_connect("localhost","root","","db");

  if(isset($_POST['edit_btn']))
{
    $id = $_POST['edit_id'];


    $query = "SELECT * FROM user WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);

    foreach($query_run as $row){

        ?>

    <form action="customer_code.php" method="POST">

        <input type="hidden" name="edit_id" value="<?php  echo $row['id']; ?>">
        <div class="form-group">
                <label> Full Name </label>
                <input type="text" name="edit_name" value= "<?php  echo $row['name']; ?>" class="form-control" placeholder="Enter Full Name">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="edit_email" value= "<?php  echo $row['email']; ?>" class="form-control" placeholder="Enter Email">
            </div>
            <div class="form-group">
                <label>Contact</label>
                <input type="text" name="edit_contact" value= "<?php  echo $row['contact']; ?>" class="form-control" placeholder="Enter Contact">
            </div>
            <div class="form-group">
                <label>Location</label>
                <input type="text" name="edit_location" value= "<?php  echo $row['location']; ?>" class="form-control" placeholder="Enter Location">
            </div>
            <div class="form-group">
                <label>IP Address</label>
                <input type="text" name="edit_ip_address" value= "<?php  echo $row['ip_address']; ?>" class="form-control" placeholder="Enter IP Address">
            </div>
	    <div class="form-group">
                <label>User Agent</label>
                <input type="text" name="edit_user_agent" value= "<?php  echo $row['user_agent']; ?>" class="form-control" placeholder="Enter User Agent">
            </div>
            <div class="form-group">
                <label>Coordinate</label>
                <input type="text" name="edit_coordinate" value= "<?php  echo $row['coordinate']; ?>" class="form-control" placeholder="Enter Coordinate">
            </div>
           
            <a href="customerdetail.php" class="btn btn-danger">CANCEL</a>
            <button type="submit" name="updatebtn2" class="btn btn-primary">UPDATE</button>

    </form>
            <?php
    }
}

?>
</div>
</div>
</div>

</div>
  