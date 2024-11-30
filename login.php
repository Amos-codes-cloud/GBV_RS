<?php
// Database connection information
$host = "localhost"; // Change to your database host
$username = "root"; // Change to your database username
$password = ""; // Change to your database password
$database = "ardhi"; // Change to your database name

// Create a connection to the database
$mysqli = new mysqli($host, $username, $password, $database);

// Check the connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Assuming you have a form where the user enters their username and password
 // Replace with your form field name
// Replace with your form field name
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
}


// Perform a query to fetch user data for the given username
$sql = "SELECT * FROM userlogin WHERE username = '$username' AND password = '$password'";
$result = $mysqli->query($sql);

// Check if the query returned any rows
if ($result->num_rows > 0) {
    // User found, you can fetch user data from the result
    $user = $result->fetch_assoc();

    // Now you can use $user['column_name'] to access user data
    $user_id = $user['id'];
    $user_name = $user['username'];

    // Do something with the user data, like setting up a session
    // Example: $_SESSION['user_id'] = $user_id;

    // Redirect to a success page or perform other actions
    echo "  " ;
    header('location: adminpage.php');
    
    // Example: header("Location: dashboard.php")
}
else {
    // User not found or credentials are incorrect
    // You can show an error message or redirect to a login page
    
    // Example: header("Location: login.php?error=1");
}

// Close the database connection when done
$mysqli->close();
?>




<div class="col-md-3"></div>
<div class="col-md-6">
	<div class="panel panel-success">
		<div class="panel-heading">
			<h3 class="panel-title">Please Login Here</h3>
		</div>
		<div class="panel-body">
			<form class="form-horizontal" action="mupro.php" method="post" role="form" >
			  <div class="form-group">
			    <label class="control-label col-sm-2" for="un">Username:</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" name="username" id="un" placeholder="Enter Username" autofocus="" required="">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="control-label col-sm-2" for="pwd">Password:</label>
			    <div class="col-sm-10"> 
			      <input type="password" class="form-control" name="password" id="pwd" placeholder="Enter password" required="">
			    </div>
			  </div>
			 
			  <div class="form-group"> 
			    <div class="col-sm-offset-2 col-sm-10">
			      <button type="submit" name="login" class="btn btn-default">Login
			      <span class="glyphicon glyphicon-check" ></span>
			      </button>
			    </div>
			  </div>

			  <div class="form-group"> 
			    <div class="col-sm-offset-2 col-sm-10">
			      <button type="" name="Register" class="btn btn-default"><a class="nav-link scrollto" href="register.php">Register
			      <span class="glyphicon glyphicon-check" ></span>
			      </button>
			    </div>
			  </div>

			  	 <div class="form-group"> 
			    <div class="col-sm-offset-2 col-sm-10">
			    
			    </div>
			  </div>


			</form>
		</div>
	</div>
</div>





<script type="text/javascript" src="assets/js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>



