<?php

include('dbconnect.php');
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
 
<form action="crim.php" method="post" >
<label for="firstname">firstname:</label><input type="text" name="firstname" placeholder="firstname"><br><br>

<label for="lastname">lastname:</label>
<input type="text" name="lastname" placeholder="lastname"><br><br>

<label for="age">Age:</label>
<input type="number" name="age" placeholder="age"><br><br>

<label for="occupation">occupation:</label>
<input type="text" name="occupation" placeholder="occupation"><br><br>

<label for="address">address:</label>
<input type="text" name="address" placeholder="address"><br><br>

<label for="Possesion">Possesions:</label>
<input type="text" name="Possesions" placeholder="Possesions"><br><br>

<label for="Gender">Gender:</label>
<input type="radio" name="gender" value="male" > Male
 <input type="radio" name="gender" value="female" > Female

<label for="date">date:</label>
<input type="datetime-local" name="date"><br><br>

<label for="statement">statement:</label>
<input type="text" name="statement" placeholder="statement"><br><br>

<label for="crime">crime:</label>
<input type="text" name="crime" placeholder="Crime"><br><br>

<label for="location">location where crime was committed:</label>
<input type="text" name="location" placeholder="location"><br><br>

<input type="submit" class="btn btn-primary" name="submit" value="Submit">

</form>
</div>
</div>
</body>


