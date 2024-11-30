<?php 

include('dbconnect.php');
/*$case_type='';
 $case_id='';
  $staffid='';
  $statement='';*/

if (isset($_POST['editcase'])){
		  $case_id = $_POST['case_id'];
	$status= $_POST['status'];
		

	
mysqli_query($conn,"update case_table set status='$status' where case_id='$case_id'")or die(mysqli_error());
	}
	 
	// echo "<script type='text/javascript'>alert('Case Edited');
	  //document.location='caseview.php'</script>";

 ?>

