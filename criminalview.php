<?php
include 'menubar.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>PHP CRUD - Funda of Web IT</title>
</head>
<body>
    <div class="container">
        <div class="jumbotron">

            <div class="row">
                <div class="col-md-6">
                    <h2>CASE DETAILS </h2>
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

                $query = "SELECT * FROM criminals";
                $query_run = mysqli_query($conn, $query);
            ?>

            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered" style="background-color: white;">
                        <thead class="table-dark">
                            <tr>
                                <th> Criminal_id </th>
                                <th> firstname</th>
                                <th> lastname </th>
                                <th> NCO </th>
                                <th> CID </th>
                                <th> Investigation status </th>
                                <th> Complete date</th>
                                <th> action </th>
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
                                        <th> <?php echo $row['case_type']; ?> </th>
                                        <th> <?php echo $row['date_added']; ?> </th>
                                        <th> <?php echo $row['staffid']; ?> </th>
                                        <th> <?php echo $row['cid']; ?> </th>
                                        <th> <?php echo $row['status']; ?> </th>
                                        <th> <?php echo $row['complete_date']; ?> </th>
                                        <th> 
                                            <form action="update.php" method="post">
                                                <input type="hidden" name="case_id" value="<?php echo $row['case_id'] ?>">
                                                <input type="submit" name="edit" class="btn btn-success" value="EDIT">
                                            </form>
                                        </th>
                                        <th> 
                                            <form action="delete.php" method="post">
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