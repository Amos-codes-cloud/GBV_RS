

<?php
require_once('dbconnect.php');


include('dbconnect.php');
if(session_status() == PHP_SESSION_NONE)
{
 // include('session.php');
}



//array created to handle the error msgs
$errors = array();

  //Variables to hold the form data
 $investigator=''; $case_id='';  $crime=''; $assign='Assigned';


              if(empty($_POST['investigator'])){
               array_push($errors, "The field cannot be empty, ensure is entered");
              }
              else{ 
              $investigator = $_POST['investigator'];
            }

        if(empty($_POST['case_id'])){
               array_push($errors, "You need to enter complainant details before you are allow to enter the action diary");
              }
              else{ 
              $case_id = $_POST['case_id'];
            }

 if(empty($_POST['crime'])){
               array_push($errors, "You need to go back and select crime type details before you are allow to enter the action diary");
              }
              else{ 
              $crime = $_POST['crime'];
            }

             

                if($errors){

                     // $output = array('error' => true, $errors);
                       foreach($errors as $value){

                    echo '<span>'. $value.' </span> </br>'; 


                    }

                    }

                 else{  

                  include('header.php');
include('dbconnect.php');
$status='';
    
    if($status==''){
mysqli_query($conn,"update case_table set cid='$investigator' where case_id='$case_id'" )or die(mysqli_error());
}
if(!empty($status)){
mysqli_query($conn,"update case_table set cid='$investigator' where case_id=$case_id")or die(mysqli_error());
}

    
     echo "<script type='text/javascript'>alert('investigator has been Assigned');
      document.location='try14.php'</script>";
      

               }



      

        $conn->close();
        ?>
