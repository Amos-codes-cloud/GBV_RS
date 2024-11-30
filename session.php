<?php
//Start session
include 'dbconnect.php';
session_start();
if (!isset($_SESSION['username']) || ($_SESSION['username'] == '')); {
    header("location: login.php");
    exit();
}

$session_id=$_SESSION['username'];
?>