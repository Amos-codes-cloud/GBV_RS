

<?php

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Database connection details
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

    // Get the form inputs
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $gender= $_POST['gender'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $crime = $_POST['crime'];
    $date = $_POST['date'];
    $location = $_POST['location'];
    $statement= $_POST['statement'];

    // Prepare and execute the SQL query
    $sql = "INSERT INTO complaints (Firstname, lastname, Gender, address, phone, crime, date, location, statement)
        VALUES ('$fname', '$lname', '$gender', '$address', '$phone', '$crime', '$date', '$location', '$statement')";

    if (mysqli_query($conn, $sql)) {
          
        echo "<script type='text/javascript'>alert('Victim details Added');
        document.location='complainantsview.php'</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}

include('header.php');
?>

<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GENDER VIOLENCE REPORTING SYSTEM</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-theme.min.css">

     <!-- Custom CSS -->
    <link href="assets/css/simple-sidebar.css" rel="stylesheet">
    <link href="assets/css/dataTables.bootstrap.min.css" rel="stylesheet">




    <title>Complaint Form</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url('C:\wamp64\www\system\assets\img');
            background-repeat: no-repeat;
            background-size: cover;
            <background-color:red;
        }

        .form-container {
            border: 1px solid #ccc;
            padding: 20px;
            width: 400px;
            background-color: #f2f2f2;
        }

        .form-group {
            margin-bottom: 10px;
        }

        .form-group label {
            display: inline-block;
            width: 150px;
            vertical-align: top;
            text-align: right;
            padding-right: 10px;
        }

        .form-group input[type="text"],
        .form-group input[type="number"],
        .form-group select {
            width: 200px;
        }

        .form-group .gender-label {
            display: inline-block;
            width: auto;
            margin-right: 10px;
        }

        .form-group .violence-acts-label {
            margin-bottom: 5px;
        }

        .form-group select {
            height: 100px;
        }

        .form-group input[type="submit"] {
            margin-top: 10px;
            background-color: green;
            color: red;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }

        .form-group input[type="submit"]:hover {
            background-color: green;
        }
    </style
</head>
<body>
    <nav class="navbar navbar-inverse" style="background-image: url("hero-bg.jpg");>
        <div class="container-box">
            <a class="navbar-brand" href="#"> <img  src="images/POLICE.jpg" class="rounded" alt="" width="100" height="100"></a>
        </div>
    </nav>




    <div class="form-container">
        <h1>COMPLAINT REGISTRATION FORM</h1>
        <form method="POST" action="">
            
            
                
            
            

            
            <div class="form-group">
                <label for="Firstname">Firstname:</label>
                <input type="text" name="Fname" required>
            </div>  
    
            <div class="form-group">
                <label for="lastname">Lastname:</label>
                <input type="text" name="lname" required>
            </div>

            <div class="form-group">
                <label for="gender">Gender:</label>
                <input type="radio" name="gender" value="male" required> Male
                <input type="radio" name="gender" value="female" required> Female
            </div>

            <div class="form-group">
                <label for="address">Address:</label>
                <input type="address" name="address" required>
            </div>

            <div class="form-group">
                <label for="phone">telephone:</label>
                <input type="number" name="phone" required>
            </div>

            <div class="form-group">
                <label for="crime">Violence type:</label>
                <select name="crime" multiple>
                    <option value="sexual-assault">Sexual Assault</option>
                    <option value="domestic-violence">Domestic Violence</option>
                    <option value="harassment">Harassment</option>
                    <option value="rape">Rape</option>
                    <option value="trafficking">Human Trafficking</option>
                </select>
            </div>

            <div class="form-group">
                <label for="date">Date:</label>
                <input type="date" name="date" required>
            </div>
            <div class="form-group">
                <label for="location">location:</label>
                <input type="text" name="location" required>
            </div>
            <div class="form-group">
                <label for="Statement">Statement:</label>
                <input type="text" name="statement" required>
            </div>

            <input type="submit" value="Submit">

        </form>
        <h3 class="panel-title"> <a href="adminpage.php">
									<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
  
								HOME</a>
								
								</h3>
    </div>
</body>
</html>
