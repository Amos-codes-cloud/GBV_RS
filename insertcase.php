<?php
include_once 'dbconnect.php';
if(isset($_POST['submit']))
{

$statement = $_POST['statement']; 
$date_add = $_POST['date_added'];
$staffid = $_POST['staffid'];
$case_type= $_POST['case_type'];
$status = $_POST['status'];
$complete_date = $_POST['complete_date'];
$diaryofaction = $_POST['diaryofaction'];
$cid = $_POST['cid'];

 $sql = "INSERT INTO case_table (statement,date_added,staffid,case_type,status,complete_date,diaryofaction,cid,) values 
 ('$statement','$date_added','staffid','case_type','status','complete_date','diaryofaction','cid',)"; 
 if (mysqli_query($conn, $sql)) {

 header("location:complains.php");
 } else{
 	echo "Error:" .$sql. ":-" .mysqli_error($conn);
 }
mysqli_close($conn);
}