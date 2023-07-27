<?php
session_start();
include('includes/header.php'); 
include('includes/navbar.php'); 
?>

<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"> Edit Admin Profile </h6>
  </div>

  <div class="card-body">
<?php

$connection = mysqli_connect("localhost","root","","db");

  if(isset($_POST['edit_btn']))
{
    $id = $_POST['edit_id'];


    $query = "SELECT * FROM admin WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);

    foreach($query_run as $row){

        ?>

    <form action="code.php" method="POST">

    <input type="hidden" name="edit_id" value="<?php  echo $row['id']; ?>">
        <div class="form-group">
                <label> Username </label>
                <input type="text" name="edit_username" value= "<?php  echo $row['username']; ?>" class="form-control" placeholder="Enter Username">
            </div>
            <div class="form-group">
                <label>Fullname</label>
                <input type="text" name="edit_fullname" value= "<?php  echo $row['fullname']; ?>" class="form-control" placeholder="Enter Fullname">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="edit_email" value= "<?php  echo $row['email']; ?>" class="form-control" placeholder="Enter Email">
            </div>
            <div class="form-group">
                <label>Contact</label>
                <input type="number" name="edit_contact" value= "<?php  echo $row['contact']; ?>" class="form-control" placeholder="Enter Contact">
            </div>
            <div class="form-group">
                <label>Address</label>
                <input type="text" name="edit_address" value= "<?php  echo $row['address']; ?>" class="form-control" placeholder="Enter Address">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="edit_password" value= "<?php  echo $row['password']; ?>" class="form-control" placeholder="Enter Password">
            </div>
            <a href="register.php" class="btn btn-danger">CANCEL</a>
            <button type="submit" name="updatebtn" class="btn btn-primary">UPDATE</button>


    </form>
            <?php
    }
}

?>
</div>
</div>
</div>

</div>
    