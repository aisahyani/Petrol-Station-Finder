<?php 
session_start();

$connection = mysqli_connect("localhost","root","","db");

if(isset($_POST['registerbtn']))
{
    $username = $_POST['edit_username'];
    $fullname = $_POST['edit_fullname'];
    $email = $_POST['edit_email'];
    $contact = $_POST['edit_contact'];
    $address = $_POST['edit_address'];
    $password = $_POST['edit_password'];

 $query = "INSERT INTO admin (username,fullname,contact,email,address,password) VALUES ('$username','$fullname','$contact','$email','$address','$password')";
            $query_run = mysqli_query($connection, $query);
            
            if($query_run)
            {
                // echo "Saved";
                $_SESSION['success'] = "Admin Profile Added";
                header('Location: register.php');
            }
            else 
            {
                $_SESSION['status'] = "Admin Profile Not Added";
                header('Location: register.php');  
            }
        }

if(isset($_POST['updatebtn']))
{
    $id = $_POST['edit_id'];
    $username = $_POST['edit_username'];
    $fullname = $_POST['edit_fullname'];
    $email = $_POST['edit_email'];
    $contact = $_POST['edit_contact'];
    $address = $_POST['edit_address'];
    $password = $_POST['edit_password'];

    $query = "UPDATE admin SET username = '$username',fullname = '$fullname', email = '$email',contact = '$contact', address = '$address', password = '$password' WHERE id = '$id'";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['success'] = "Your Data is UPDATED";
        header('Location: register.php');
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT UPDATED";
        header('Location: register.php');
    }

}

if(isset($_POST['delete_btn']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM admin WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['success'] = "Your Data is DELETED";
        header('Location: register.php');
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT DELETED";
        header('Location: register.php');
    }

}



?>