<?php 
session_start();

$connection = mysqli_connect("localhost","root","","db");

if(isset($_POST['updatebtn2']))
{
    $id = $_POST['edit_id'];
    $name = $_POST['edit_name'];
    $email = $_POST['edit_email'];
    $contact = $_POST['edit_contact'];
    $location = $_POST['edit_location'];
    $ip_address = $_POST['edit_ip_address'];
    $date = $_POST['edit_date'];
    $user_agent = $_POST['edit_user_agent'];
    $coordinate = $_POST['edit_coordinate'];

    $query = "UPDATE user SET name = '$name', email = '$email', contact = '$contact', location = '$location', ip_address = '$ip_address', date = '$date', user_agent = '$user_agent', coordinate = '$coordinate' WHERE id = '$id'";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['success'] = "Your Data is UPDATED";
        header('Location: customerdetail.php');
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT UPDATED";
        header('Location: customerdetail.php');
    }

}

if(isset($_POST['delete_btn']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM customer WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['success'] = "Your Data is DELETED";
        header('Location: customerdetail.php');
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT DELETED";
        header('Location: customerdetail.php');
    }

}



?>