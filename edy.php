<?php 
$statement='', $casetype='';, $case_id='', $staffid='';
include('header.php');
include('dbconnect.php');
if (isset($_POST['editcase'])){
$casetype = $_POST['crime_type'];
	$statement =$_POST['statement'];
	$case_id =$_POST['case_id'];
	$staffid =$_POST['staffid'];

	
	}
mysqli_query($conn,"update case_table set diaryofaction='$statement', case_type='$casetype' where case_id='$case_id'")or die(mysqli_error());
	
	//echo "<script type='text/javascript'>alert('Case Edited');
	 //s document.location='caseview.php'</script>";
	  

 ?>

