<?php
session_start();
include('includes/header.php'); 
include('includes/navbar.php'); 
?>

<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Users</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

    </div>
  </div>
</div>


<div class="container-fluid">

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">User Profile 

    </h6>
  </div>


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

        $query = "SELECT * FROM user";
        $query_run = mysqli_query($connection,$query);

    ?>
    <h4>User Profile</h4>
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
          <th> ID </th>  
            <th> Full Name </th>
            <th> Email </th>
            <th> Contact </th>
            <th> Location </th>
            <th> IP Address </th>
            <th> Date </th>
	    <th> User Agent </th>
            <th> Coordinate </th>
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
            <td> <?php  echo $row['email']; ?></td>
            <td> <?php  echo $row['contact']; ?></td>
            <td> <?php  echo $row['location']; ?></td>
            <td> <?php  echo $row['ip_address']; ?></td>
            <td> <?php  echo $row['date']; ?></td>
	    <td> <?php  echo $row['user_agent']; ?></td>
            <td> <?php  echo $row['coordinate']; ?></td>
            <td>
                <form action="cust_update.php" method="post">
                    <input type="hidden" name="edit_id" value="<?php  echo $row['id']; ?>">
                    <button  type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
                </form>
            </td>
            <td>
                <form action="customer_code.php" method="post">
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