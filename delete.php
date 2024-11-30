
<?php
include 'dbconnect.php';

if(isset($_POST['delete']))
{
    $case_id = $_POST['case_id'];

    $query = "DELETE FROM case_table WHERE case_id='$case_id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        echo '<script> alert("Data Deleted"); </script>';
        header("location:try14.php");
    }
    else
    {
        echo '<script> alert("Data Not Deleted"); </script>';
    }
}

?>