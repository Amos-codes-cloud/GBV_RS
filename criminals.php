<?php

include('dbconnect.php');
include'menubar.php';


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="">
</head>
<body>
    <div class="container-fluid">
            <div class="panel panel-success">
                        <div class="panel-heading">
        
                            <h3 class="panel-title">Criminals details</h3>
                        </div>
            <div class="panel-body">

             
                <div class="container-fluid">
 
<form action="crim.php" method="post" >
  <div class="col-md-6">
      
      <label for="firstname">firstname:</label>
<input type="text" name="firstname" placeholder="firstname" class="form-control" id="name" required=''><br><br>
  </div>  

 <div class="col-md-6">
  <label for="lastname">lastname:</label>
<input type="text" name="lastname" placeholder="lastname" class="form-control" id="name" required=''><br><br>   

 </div>

<div class="col-md-6">
    
<label for="age">Age:</label>
<input type="number" name="age" placeholder="age" class="form-control" id="age" required=''><br><br>
</div>

<div class="col-md-6">
    <label for="occupation">occupation:</label>
<input type="text" name="occupation" placeholder="occupation" class="form-control" required=''><br><br>
</div>


<div class="col-md-6">
   <label for="address">address:</label>
<input type="text" name="address" placeholder="address" class="form-control" required=''><br><br> 
</div>
<div class="col-md-6">
<label for="Possesion">Possessions:</label>
<input type="text" name="Possessions" placeholder="Possesions" class="form-control" id="crime" required=''><br><br>
</div>

<div class="col-md-6">
<label for="Gender">Gender:</label>
<input type="radio" name="gender" value="male" class="form-control" id="crime" required=''> Male
 <input type="radio" name="gender" value="female"  class="form-control" id="crime" required=''> Female
<br><br>
</div>
<div class="col-md-6">
<label for="date">date:</label>
<input type="datetime-local" name="date" class="form-control" id="date" required=''><br><br>
</div>
<div class="col-md-6">
<label for="statement">statement:</label>
<textarea id="statement" name="statement" rows="4" cols="10" class="form-control" required=''></textarea> 


</div>
</div>

<div class="col-md-6">
                        <div class="col-md-6">
                                        <label for="">Select Crime Type:</label>
                                        <select class="form-control" name="crime" id ="crime">
                                        <option selected="selected" value="">Select</option>

                                            <?php
                                           include 'con2.php';
                                        //Get all unions from database
                                        $sql = mysqli_query($conn,"select * from crime_type");
                                        while($row = mysqli_fetch_assoc($sql)){ 
                                            ?>

                                            <option value="<?php echo $row['des'] ?>"> <?php echo $row['des']?> </option>
                                        <?php
                                        }

                                        ?> </select>
                             </div>
                        </div>
<div class="col-md-6">
<div class="form-group">
<label for="location">location where crime was committed:</label>
<input type="text" name="location" placeholder="location" class="form-control" id="crime"><br><br>
</div>
<div class="col-md-6">
    <label for="image"> Image</label>
<input type="file" name="file" id="file" class="form-control">
</div>

</div>
<div class="form-row">
    <input type="submit" class="btn btn-primary" name="submit" value="Submit" class="form-control" id="button">
</div>


</form>
</div>
</div>
</div>
</div>
</body>

 

<?php include('scripts.php'); 
session_destroy();

?>
<script type="text/javascript">
