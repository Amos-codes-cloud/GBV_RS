<?php
include('dbconnect.php');
if (isset($_POST['delete'])){
	$delete = mysqli_real_escape_string($conn,trim($_POST['deleted']));

mysqli_query($conn,"DELETE FROM userlogin where staffid='$delete'");


header("location: user.php");
}
?>