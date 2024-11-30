<?php 
include 'header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <title>online crime reporting system</title>
</head>
<body>
    <?php
   include'dbconnect.php';

    $case_id = $_POST['case_id'];

    $query = "SELECT * FROM complainant WHERE case_id='$case_id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        while($row = mysqli_fetch_array($query_run))
        {
            ?>
            <div class="container">
                <div class="jumbotron">
                    <div class="row">
                        <div class="col-md-12">
                            
                            <h2> </h2>
                            <hr>
                            <form action="Update2.php" method="post">
                                <input type="hidden" name="case_id" value="<?php echo $row['case_id'] ?>">
                                <div class="form-group">
                                    <label for=""> status </label>
                                    <input type="text" name="status" class="form-control" value="<?php echo $row['status'] ?>" placeholder="status" required>
                                </div>
                                

                                <button type="submit" name="update" class="btn btn-primary"> Update Data </button>

                                <a href="complainantsview.php" class="btn btn-danger"> CANCEL </a>
                            </form>

                        </div>
                                 </div>
                    
                    <?php
                    if(isset($_POST['update']))
                    {
                        $status = $_POST['status'];
                    

                        $query = "UPDATE complainant SET status='$status' WHERE case_id='$case_id'";
                        $query_run = mysqli_query($conn, $query);

                        if($query_run)
                        {
                            echo '<script> alert("Data Updated"); </script>';
                            header("location:complainantsview.php");
                        }
                        else
                        {
                            echo '<script> alert("Data Not Updated"); </script>';
                        }
                    }
                    ?>

                </div>
            </div>
            <?php
        }
    }
    else
    {
        // echo '<script> alert("No Record Found"); </script>';
        ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>No Record Found</h4>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
</body>
</html>