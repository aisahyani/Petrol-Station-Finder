<?php
session_start();
include('includes/header.php'); 
include('includes/navbar.php'); 
?>


<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Admin Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST">

        <div class="modal-body">

        <input type="hidden" name="edit_id" value="<?php  echo $row['id']; ?>">
        <div class="form-group">
                <label> Username </label>
                <input type="text" name="edit_username"  class="form-control" placeholder="Enter Username">
            </div>
            <div class="form-group">
                <label>Fullname</label>
                <input type="text" name="edit_fullname"  class="form-control" placeholder="Enter Fullname">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="edit_email" class="form-control" placeholder="Enter Email">
            </div>
            <div class="form-group">
                <label>Contact</label>
                <input type="text" name="edit_contact" class="form-control" placeholder="Enter Contact">
            </div>
            <div class="form-group">
                <label>Address</label>
                <input type="text" name="edit_address" class="form-control" placeholder="Enter Address">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="edit_password"  class="form-control" placeholder="Enter Password">
            </div>
            <a href="register.php" class="btn btn-danger">CANCEL</a>
            <button type="submit" name="registerbtn" class="btn btn-primary">ADD</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Admin Profile 
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
              Add Admin Profile 
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

        $query = "SELECT * FROM admin";
        $query_run = mysqli_query($connection,$query);

    ?>

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
          <th> ID </th>  
            <th> Username </th>
            <th> Fullname </th>
            <th> Email </th>
            <th>Contact</th>
            <th> Address </th>
            <th>Password</th>
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
            <td> <?php  echo $row['username']; ?></td>
            <td> <?php  echo $row['fullname']; ?></td>
            <td> <?php  echo $row['email']; ?></td>
            <td> <?php  echo $row['contact']; ?></td>
            <td> <?php  echo $row['address']; ?></td>
            <td> <?php  echo $row['password']; ?></td>
            <td>
                <form action="register_edit.php" method="post">
                    <input type="hidden" name="edit_id" value="<?php  echo $row['id']; ?>">
                    <button  type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
                </form>
            </td>
            <td>
                <form action="code.php" method="post">
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