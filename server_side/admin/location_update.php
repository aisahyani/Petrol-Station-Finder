<?php
session_start();
include('includes/header.php'); 
include('includes/navbar.php'); 
?>

<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"> Edit Location</h6>
  </div>

  <div class="card-body">
<?php

$connection = mysqli_connect("localhost","root","","db");

  if(isset($_POST['edit_btn']))
{
    $id = $_POST['edit_id'];


    $query = "SELECT * FROM location WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);

    foreach($query_run as $row){

        ?>

    <form action="locationcode.php" method="POST">

    <input type="hidden" name="edit_id" value="<?php  echo $row['id']; ?>">
        <div class="form-group">
                <label> Hospital / Clinic Name </label>
                <input type="text" name="edit_name" value= "<?php  echo $row['name']; ?>" class="form-control" placeholder="Enter Hospital / Clinic Name">
            </div>
            <div class="form-group">
                <label>Address</label>
                <input type="text" name="edit_address" value= "<?php  echo $row['address']; ?>" class="form-control" placeholder="Enter Address">
            </div>
            <div class="form-group">
                <label>Contact Number</label>
                <input type="text" name="edit_tel" value= "<?php  echo $row['tel']; ?>" class="form-control" placeholder="Enter Contact Number">
          <div class="form-group">
                <label>District</label>
                <input type="text" name="edit_district" value= "<?php  echo $row['district']; ?>" class="form-control" placeholder="Enter District">
            </div>
            <div class="form-group">
                <label>State</label>
                <input type="text" name="edit_state" value= "<?php  echo $row['state']; ?>" class="form-control" placeholder="Enter State">
            </div>
            <div class="form-group">
                <label>Postcode</label>
                <input type="text" name="edit_postcode" value= "<?php  echo $row['postcode']; ?>" class="form-control" placeholder="Enter Postcode">
            </div>
	    <div class="form-group">
                <label>Latitude</label>
                <input type="text" name="edit_lat" value= "<?php  echo $row['lat']; ?>" class="form-control" placeholder="Enter Latitude">
            </div>
	    <div class="form-group">
                <label>Longitude</label>
                <input type="text" name="edit_lng" value= "<?php  echo $row['lng']; ?>" class="form-control" placeholder="Enter Longitude">
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
