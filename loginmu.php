<html>
<head>
<link rel="stylesheet" href="loginform.css">
<title>  LOGIN FORM </title>
</head>
<body class="body">



<table align="center" border=0 width=50% height=200>

<tr>
<td>
<div class="op">
  <center><label><h2><b>LOGIN</h2></b></label></center>
  <form action="mupro.php" method="POST" class="form" ><center>
    <label for="fname">username</label><br>
    <input type="text"  name="username" placeholder="Your UserName.."><br>

    <label for="lname">Password</label><br>
    <input type="password"  name="password" placeholder="Your Password.."> <br>   
    <input type="submit" name="login" value="LoginHere"><br>

  </form>
</div>
<?php if(isset($_GET['err'])){
	echo "<script>alert('Invalid Username or Password')</script>";
	} ?>
</table>
<body>
</html>