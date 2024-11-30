<?php

if (session_status() == PHP_SESSION_NONE) {
    include('dbconnect.php');
}

// Array created to handle the error messages
$errors = array();

// Array to hold the JSON encoded data
$output = array('error' => false);

// Check if the required POST variables are set
if (isset($_POST['fname'], $_POST['lname'], $_POST['gender'], $_POST['address'], $_POST['crime'], $_POST['location'], $_POST['statement'], $_POST['date'], $_POST['phone'])) {
    // Variables to hold the form data
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $crime = $_POST['crime'];
    $location = $_POST['location'];
    $statement = $_POST['statement'];
    $date = $_POST['date'];
    $phone = $_POST['phone'];

    $sql = "INSERT INTO complaints (Firstname, lastname, Gender, Address, Crime, location, statement, date, phone)
            VALUES ('$fname', '$lname', '$gender', '$address', '$crime', '$location', '$statement', '$date', '$phone')";

    $success = mysqli_query($conn, $sql);

    if ($success) {
        echo "<script type='text/javascript'>alert('User Added');
        document.location='try15.php'</script>";
    } else {
        echo "Insertion failed";
        // Add your desired code or alert message here
    }
} else {
    echo "there are no variable set";
    // Add your desired code or alert message here
}

?>
