<?php 
session_start();

$connection = mysqli_connect("localhost","root","","db");

if(isset($_POST['addbutton']))
{
    $name = $_POST['edit_name'];
    $address= $_POST['edit_address'];
    $tel = $_POST['edit_tel'];
    $district= $_POST['edit_district'];
    $state = $_POST['edit_state'];
    $postcode = $_POST['edit_postcode'];
    $lat = $_POST['edit_lat'];
    $lng = $_POST['edit_lng'];

 $query = "INSERT INTO location (name, address, tel, district, state, postcode, lat, lng) VALUES ('$name','$address','$tel','$district','$state','$postcode','$lat','$lng')";
            $query_run = mysqli_query($connection, $query);
            
            if($query_run)
            {
                // echo "Saved";
                $_SESSION['success'] = "Location Added";
                header('Location: locationdetails.php');
            }
            else 
            {
                $_SESSION['status'] = "Location Not Added";
                header('Location: locationdetails.php');  
            }
        }

if(isset($_POST['updatebtn']))
{
    $id = $_POST['edit_id'];
    $name = $_POST['edit_name'];
    $address= $_POST['edit_address'];
    $tel = $_POST['edit_tel'];
    $district= $_POST['edit_district'];
    $state = $_POST['edit_state'];
    $postcode = $_POST['edit_postcode'];
    $lat = $_POST['edit_lat'];
    $lng = $_POST['edit_lng'];

    $query = "UPDATE location SET name = '$name', address = '$address', tel = '$tel', district = '$district', state = '$state', postcode = '$postcode', lat = '$lat', lng = '$lng' WHERE id = '$id'";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['success'] = "Your Data is UPDATED";
        header('Location: locationdetails.php');
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT UPDATED";
        header('Location: locationdetails.php');
    }

}

if(isset($_POST['delete_btn']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM location WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['success'] = "Your Data is DELETED";
        header('Location: locationdetails.php');
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT DELETED";
        header('Location: locationdetails.php');
    }

}



?>