<?php
include_once 'dbconnect.php';
if(isset($_POST['save_case']))
{

$case_id = $_POST['case_id']; 
$statement = $_POST['statement'];
$date= $_POST['date'];
$staffid=$_POST['staffid'];
$crime_type =$_POST['crime_type'];
$date = $_POST['date'];

 $sql = "INSERT INTO case_table (case_id,date_added,staffid,case_type)
  values ('$case_id','$date','$staffid','$crime_type')";
  if (mysqli_query($conn, $sql)) {

 header("location:casedetails.php");
 } else{
 	echo "Error:" .$sql. ":-" .mysqli_error($conn);
 }
mysqli_close($conn);
}

?>