<?php  
$servername = "localhost:3306";
$username = "root";
$password = "";
$database = "ardhi";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

date_default_timezone_set("Africa/Dar_es_Salaam");
?>
