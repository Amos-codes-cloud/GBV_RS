
<?php
session_start();
include('connect.php');
include('header.php');
if (isset($_POST['login'])){

$username = mysqli_real_escape_string($conn,trim($_POST['username']));
$pwd = mysqli_real_escape_string($conn,trim($_POST['pwd']));


$query=mysqli_query($conn,"SELECT * from userlogin where staffid='$username' AND password= SHA1('$pwd')");

$count=mysqli_num_rows($query);
if($count ==1){
	$row = mysqli_fetch_array($query);
$_SESSION['staffid']=$row['staffid'];
$_SESSION['role']=$row['status'];

}
header('location: admin/');
}
else{
	$_SESSION['error'] = 'Your Staff ID or password is not valid';
	}

?>