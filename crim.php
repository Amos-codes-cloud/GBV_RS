<?php
include_once 'dbconnect.php';







$firstname = $lastname = $age = $occupation = $address = $gender = $date = $statement = $crime = $location = $possessions = $file= "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

$firstname = test_input($_POST['firstname']); 
$lastname = test_input($_POST['lastname']);
$age =test_input( $_POST['age']);
$occupation =test_input($_POST['occupation']);
$address =test_input($_POST['address']);
$gender =test_input($_POST['gender']);
$date =test_input( $_POST['date']);
$statement =test_input( $_POST['statement']);
$crime = test_input($_POST['crime']);
$location =test_input( $_POST['location']);
$possessions = test_input($_POST['possessions']);
$file = test_input($_POST['file']);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
if(isset($_POST['submit']))
{

$firstname = test_input($_POST['firstname']); 
$lastname = test_input($_POST['lastname']);
$age =test_input( $_POST['age']);
$occupation =test_input($_POST['occupation']);
$address =test_input($_POST['address']);
$gender =test_input($_POST['gender']);
$date =test_input( $_POST['date']);
$statement =test_input( $_POST['statement']);
$crime = test_input($_POST['crime']);
$location =test_input( $_POST['location']);
$possessions = test_input($_POST['possessions']);
$file = test_input($_POST['file']);

 $sql = "INSERT INTO criminals (firstname,lastname,age,occupation,address,possessions,gender,date,statement,crime,location,image) values ('$firstname','$lastname','$age','$occupation','$address','$possessions','$gender','$date','$statement','$crime','$location','$file')";if (mysqli_query($conn, $sql)) {

 header("location:criminals.php");
 } else{
 	echo "Error:" .$sql. ":-" .mysqli_error($conn);
 }
mysqli_close($conn);
}

?>