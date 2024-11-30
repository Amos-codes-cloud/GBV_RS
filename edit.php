<?php 
 

include('header.php');
include('dbconnect.php');
$status='';
if (isset($_POST['save'])){
$status = $_POST['$status'];

$criminal_id = $_POST['criminal_id'];


mysqli_query($conn,"update criminals set status='$status' where criminal_id='$criminal_id'")or die(mysqli_error());
}
if(!empty($status)){
mysqli_query($conn,"update criminals set status='$status' where criminal_id='$criminal_id'")or die(mysqli_error());
}

	
	// echo "<script type='text/javascript'>alert('Staff Edited');
	 /// document.location='try6.php'</script>";
	  




 ?>