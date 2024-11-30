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
                    <h2>PERPETRATORS DETAILS  </h2>
                </div>
                <div class="col-md-6">
                    <a href="offender.php" class="btn btn-success" style="margin-left: 80%;"> ADD DATA </a>    
                </div>
                <div class="col-md-12">
                    <hr>
                </div>
            </div>

            <?php
               include 'dbconnect.php';

                $query = "SELECT * FROM criminals";
                $query_run = mysqli_query($conn, $query);
            ?>

            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered" style="background-color: white;">
                        <thead class="table-dark">
                            <tr>
                                <th> perpetrators_id</th>
                                <th> firstname</th>
                                <th> lastname </th>
                                <th> age </th>
                                <th> occupation </th>
                                <th> address </th>
                                <th> crime</th>
                                <th> date </th>
                                <th> statement </th>
                                <th> image</th>
                                <th> Gender </th>
                                <th> location </th>
                                <th> status </th>
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
                                        <th> <?php echo $row['criminal_id']; ?> </th>
                                        <th> <?php echo $row['firstname']; ?> </th>
                                        <th> <?php echo $row['lastname']; ?> </th>
                                        <th> <?php echo $row['age']; ?> </th>
                                        <th> <?php echo $row['occupation']; ?> </th>
                                        <th> <?php echo $row['address']; ?> </th>
                                        <th> <?php echo $row['crime']; ?> </th> 
                                        <th> <?php echo $row['date']; ?> </th>
                                        <th> <?php echo $row['statement']; ?> </th>
                                        <th> <?php echo $row['image']; ?> </th>
                                        <th> <?php echo $row['gender']; ?> </th>
                                        <th> <?php echo $row['location']; ?> </th>
                                        <th> <?php echo $row['status']; ?> </th>
                                        <th> 
                                            <form action="update1.php" method="post">
                                                <input type="hidden" name="criminal_id" value="<?php echo $row['criminal_id'] ?>">
                                                <input type="submit" name="edit" class="btn btn-success" value="EDIT">
                                            </form> <br>
                                        
                                        
                                            <form action="delete1.php" method="post">
                                                <input type="hidden" name="criminal_id" value="<?php echo $row['criminal_id'] ?>">
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