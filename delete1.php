
<?php
include 'dbconnect.php';

if(isset($_POST['delete']))
{
    $criminal_id = $_POST['criminal_id'];

    $query = "DELETE FROM criminals WHERE criminal_id='$criminal_id' ";
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