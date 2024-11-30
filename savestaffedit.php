<?php 

include('header.php');
include('dbconnect.php');
$username = $_POST['username'];
	$fname =$_POST['fname'];
	$oname =$_POST['oname'];
	$status =$_POST['status'];
	
	if($status==''){
mysqli_query($conn,"update userlogin set surname='$fname', othernames='$oname' where username='$username'")or die(mysqli_error());
}
if(!empty($status)){
mysqli_query($conn,"update userlogin set surname='$fname',status='$status', othernames='$oname' where username='$username'")or die(mysqli_error());
}

	
	 echo "<script type='text/javascript'>alert('Staff Edtted');
	  document.location='user.php'</script>";
	  

 ?>

