<?php
  session_start();
include 'dbconnect.php';

if ($_SERVER["REQUEST_METHOD"]=="POST")
{
$username=$_POST["username"];
$password=$_POST["password"];	
}


$sql= "select * from userlogin where username='".$username."' AND password='".($password)."'   ";
$result= mysqli_query($conn,$sql);
$row= mysqli_fetch_array($result);

if ($row["status"]=="Admin")
{
	$_SESSION["username"]=$username;
	header("location: adminpage.php");
}

elseif ($row["status"]=="CID")
{
	$_SESSION["username"]=$username;
	header("location: menubar.php");
}

elseif ($row["status"]=="NCO")
{
	$_SESSION["username"]=$username;
	header("location: menubar.php");
}

else 
{
	echo'<script>alert("username or password is incorrect")</script>';
	header("location:login.php");
}
?>
