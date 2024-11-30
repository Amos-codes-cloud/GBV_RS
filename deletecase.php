<?php
include('dbconnect.php');
if (isset($_POST['delete'])){
	$delete = mysqli_real_escape_string($conn,trim($_POST['deleted']));
mysqli_query($conn,"DELETE FROM case_table where case_id='$delete'");
mysqli_query($conn,"DELETE FROM complainant where case_id='$delete'");


header("location: caseview.php");
}
?>