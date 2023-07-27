<?php
session_start();
include('includes/header.php'); 
include('includes/navbar.php'); 
?>


<div class="modal fade" id="locationdetails" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Location</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="locationcode.php" method="POST">

        <div class="modal-body">

        <input type="hidden" name="edit_id" value="<?php  echo $row['id']; ?>">
        <div class="form-group">
                <label> Hospital / Clinic Name </label>
                <input type="text" name="edit_name"  class="form-control" placeholder="Enter Hospital / Clinic Name">
            </div>
            <div class="form-group">
                <label>Address</label>
                <input type="text" name="edit_address"  class="form-control" placeholder="Enter Address">
            </div>
            <div class="form-group">
                <label>Contact Number</label>
                <input type="text" name="edit_tel" class="form-control" placeholder="Enter Contact Number">
            </div>
            <div class="form-group">
                <label>District</label>
                <input type="text" name="edit_district" class="form-control" placeholder="Enter District">
            </div>
            <div class="form-group">
                <label>State</label>
                <input type="text" name="edit_state" class="form-control" placeholder="Enter State">
            </div>
            <div class="form-group">
                <label>Postcode</label>
                <input type="text" name="edit_postcode"  class="form-control" placeholder="Enter Postcode">
            </div>
	    <div class="form-group">
                <label>Latitude</label>
                <input type="text" name="edit_lat"  class="form-control" placeholder="Enter Latitude">
            </div>
	    <div class="form-group">
                <label>Longitude</label>
                <input type="text" name="edit_lng"  class="form-control" placeholder="Enter Longitude">
            </div>
            <a href="locationdetails.php" class="btn btn-danger">CANCEL</a>
            <button type="submit" name="addbutton" class="btn btn-primary">ADD</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Locations
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#locationdetails">
              Add New Location
            </button>
    </h6>
  </div>
<div class="container-fluid">


  <div class="card-body">


<?php

if (isset($_SESSION['success']) && $_SESSION['success'] !=''){

    echo '<h4 class="bg-info"> '.$_SESSION['success'].' </h4>';
    unset($_SESSION['success']);
}

if (isset($_SESSION['status']) && $_SESSION['status'] !=''){

    echo '<h4 class="bg-info"> '.$_SESSION['status'].' </h4>';
    unset($_SESSION['status']);
}
?>


    <div class="table-responsive">

    <?php
        $connection = mysqli_connect("localhost","root","","db");

        $query = "SELECT * FROM location";
        $query_run = mysqli_query($connection,$query);

    ?>

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
          <th> ID </th>  
            <th> Name </th>
            <th> Address </th>
            <th> Phone Number</th>
	    <th> District</th>
            <th> State </th>
            <th> Postcode </th>
	    <th> Latitude</th>
            <th> Longitude </th>
            <th>Edit </th>
            <th>Delete </th>

          </tr>
        </thead>
        <tbody>
     
        <?php
            if(mysqli_num_rows($query_run) > 0)
            {
                while($row = mysqli_fetch_assoc($query_run))
                {
                    ?>
                    
            <tr>
            <td> <?php  echo $row['id']; ?></td>   
            <td> <?php  echo $row['name']; ?></td>
            <td> <?php  echo $row['address']; ?></td>
	    <td> <?php  echo $row['tel']; ?></td>   
            <td> <?php  echo $row['district']; ?></td>
            <td> <?php  echo $row['state']; ?></td>
	    <td> <?php  echo $row['postcode']; ?></td>   
            <td> <?php  echo $row['lat']; ?></td>
            <td> <?php  echo $row['lng']; ?></td>
            <td>
                <form action="location_update.php" method="post">
                    <input type="hidden" name="edit_id" value="<?php  echo $row['id']; ?>">
                    <button  type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
                </form>
            </td>
            <td>
                <form action="locationcode.php" method="post">
                  <input type="hidden" name="delete_id" value="<?php  echo $row['id']; ?>">
                  <button type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button>
                </form>
            </td>
            
          </tr>
          <?php
                }
            }
            else{
                echo "no Record Found";
            }
        ?>
        
        </tbody>
      </table>

    </div>
  </div>
</div>



<?php
include('includes/scripts.php');
include('includes/footer.php');
?>