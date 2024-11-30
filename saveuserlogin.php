

<?php


if(session_status() == PHP_SESSION_NONE)
{
  
   include('dbconnect.php');
}


 include('dbconnect.php');


//array created to handle the error msgs
$errors = array();

// array to hold the json econded data
$output = array('error' => false);


  //Variables to hold the form data
 $password=$_POST['pwd']; 
 $status=$_POST['status']; 
 $username=$_POST['username']; 
 $fname=$_POST['fname'];
 $oname=$_POST['oname'];



$sql = "INSERT INTO userlogin (status,password, username, surname,othernames)
                                       VALUES('$status',('$password'),'$username','$fname','$oname'); ";

                   $success = mysqli_query($conn,$sql);

                         if( $success )

                         {
                             
                            echo "<script type='text/javascript'>alert('User Added');
      document.location='user.php'</script>";
                      }
            



        

        ?>
