<?php
session_start();
unset($_SESSION["login_user1"]);
header("Location:adminlogin.php");
?>