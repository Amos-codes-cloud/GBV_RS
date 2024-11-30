
<?php

include_once 'dbconnect.php';
if(isset($_POST['save_case']))
{

$name = $_POST['name']; 
$tel = $_POST['tel'];
$occ = $_POST['occ'];
$gender =$_POST['gender'];
$age =$_POST['age'];
$addrs =$_POST['addrs'];
$district =$_POST['district'];
$street= $_POST['street'];
$loc = $_POST['loc'];
$crime_type= $_POST['crime_type'];


 $sql= "INSERT INTO complainant (comp_name,tel,occupation,gender,age,addrs,dis,street,loc,crime_type) 
 values ('$name','$tel','$occ','$gender','$age','$addrs','$district','$street','$loc','$crime_type')";
 if (mysqli_query($conn,$sql)) {

 header("location:case.php"); echo "case added";
 } else{
  echo "Error:" .$sql. ":-" .mysqli_error($conn);
 }
mysqli_close($conn);
}

?>