
<?php

session_start();
include('dbconnect.php');
include('header.php');
if (isset($_POST['login'])){

$username = mysqli_real_escape_string($conn,trim($_POST['username']));
$pwd = mysqli_real_escape_string($conn,trim($_POST['pwd']));


$query=mysqli_query($conn,"select * from userlogin where username='$username' AND password= SHA1('$pwd')");

$count=mysqli_num_rows($query);
if($count ==1){
	$row = mysqli_fetch_array($query);
$_SESSION['username']=$row['username'];
$_SESSION['role']=$row['status'];

}
}

header('location: menubar.php');


?>