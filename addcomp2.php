

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
          
        echo "<script type='text/javascript'>alert('Your details have been Added');
        document.location='index.php'</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>
<head>
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
            background-color: #4CAF50;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }

        .form-group input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style
</head>
<body>
    <div class="form-container">
        <h1>COMPLAINT REGISTRATION FORM</h1>
        <form method="POST" action="">
            
            <div class="form-group">
                <label for="fname">First Name:</label>
                <input type="text" name="fname" required>
            </div>

            <div class="form-group">
                <label for="Mname">Middle Name:</label>
                <input type="text" name="mname" required>
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
       
    </div>
</body>
</html>
