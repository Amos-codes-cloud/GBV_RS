<?php

include'header.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title></title>
</head>
<body>
    <div class="container">
        <div class="jumbotron">

            <div class="row">
                <div class="col-md-6">
                    <h2>COMPLAINANTS DETAILS  </h2>
                </div>
                <div class="col-md-6">
                    <a href="case.php" class="btn btn-success" style="margin-left: 80%;"> ADD DATA </a>    
                </div>
                <div class="col-md-12">
                    <hr>
                </div>
            </div>

            <?php
               include 'dbconnect.php';

                $query = "SELECT * FROM complaints";
                $query_run = mysqli_query($conn, $query);
            ?>

            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered" style="background-color: white;">
                        <thead class="table-dark">
                            <tr>
                                <th> Case_id</th>
                                <th> Firstname</th>
                                <th> Lastname</th>
                                <th> Gender </th>
                                <th> Address</th>
                                <th> phone</th>
                                <th> Violence type</th>
                                <th> Date </th>
                                <th> location</th>             
                                <th> Action </th>
                                
                                
                            </tr>
                        </thead>
                        <tbody>
                                        
                        <?php
                        if($query_run)
                        {
                            while($row = mysqli_fetch_array($query_run))
                            {
                                ?>
                                    <tr>
                                        <th> <?php echo $row['case_id']; ?> </th>
                                        <th> <?php echo $row['Firstname']; ?> </th>
                                        <th> <?php echo $row['lastname']; ?> </th>
                                        <th> <?php echo $row['Gender']; ?> </th>
                                        <th> <?php echo $row['Address']; ?> </th>
                                        <th> <?php echo $row['phone']; ?> </th>
                                        <th> <?php echo $row['crime']; ?> </th> 
                                        <th> <?php echo $row['date']; ?> </th>
                                        <th> <?php echo $row['location']; ?> </th>
                                        
                                        <th>
                                            <form action="update2.php" method="post">
                                                <input type="hidden" name="case_id" value="<?php echo $row['case_id'] ?>">
                                                <input type="submit" name="edit" class="btn btn-success" value="EDIT">
                                            </form> <br>
                                        
                                        
                                            <form action="delete2.php" method="post">
                                                <input type="hidden" name="case_id" value="<?php echo $row['case_id'] ?>">
                                                <input type="submit" name="delete" class="btn btn-danger" value="DELETE"> 
                                            </form>
                                        </th>
                                    </tr>
                                <?php
                                }
                            }
                            else
                            {
                                ?>
                                    <tr>    
                                        <th colspan="6"> No Record Found </th>
                                    </th>
                                <?php
                            }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</body>
</html>