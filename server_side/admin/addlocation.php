<?php
session_start();
include('includes/header.php'); 
include('includes/navbar.php'); 
?>

<form action="locationcode.php" method="POST" enctype= "multipart/form-data">

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
        <input type="text" name="edit_contactnum"  class="form-control" placeholder="Enter Contact Number">
    </div>
   <div class="form-group">
        <label>District</label>
        <input type="text" name="edit_district"  class="form-control" placeholder="Enter District">
    </div>
  <div class="form-group">
        <label>State</label>
        <input type="text" name="edit_state"  class="form-control" placeholder="Enter State">
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
        <input type="hidden" name="edit_option" class="form-control" value="<?php  echo $row['option']; ?>">
    <a href="productdetails.php" class="btn btn-danger">CANCEL</a>
    <button type="submit" name="addbutton" class="btn btn-primary">ADD PRODUCT</button>
</div>
</form>
</div>
        <!-- End of Content Wrapper -->
<?php
include('includes/scripts.php');
include('includes/footer.php');
?>