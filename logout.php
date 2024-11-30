<?php


include('dbconnect.php');
include('session.php');
$logintime=$_SESSION['$username'];
unset($_SESSION['$username']);
session_destroy();
header('location:../login.php'); 
?>