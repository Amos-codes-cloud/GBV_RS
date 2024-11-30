

<?php
require_once('database/Database.php');

include('header.php');
include('menubar.php');

include('dbconnect.php');
{
  
}



//array created to handle the error msgs
$errors = array();

  //Variables to hold the form data
 $statement='';  $status=''; $caseid='';


              if(empty($_POST['statement'])){
               array_push($errors, "The Statefield field cannot be empty, ensure is entered");
              }
              else{ 
              $statement = $_POST['statement'];
            }

        if(empty($_POST['status'])){
               array_push($errors, "You need select the status field");
              }
              else{ 
              $status= $_POST['status'];
            }
             if(empty($_POST['caseid'])){
               array_push($errors, "Enter the case id");
              }
              else{ 
              $caseid= $_POST['caseid'];
            }

 

 

                if($errors){

                     // $output = array('error' => true, $errors);
                       foreach($errors as $value){

                    echo '<span>'. $value.' </span> </br>'; 


                    }

                    }

                 else{  

                        $sql = "UPDATE case_table SET statement=?,status=? WHERE case_id=?";


                            $q = $conn->prepare($sql);
                           $success= $q -> execute(array($statement,$status,$caseid));
                           
                         if($success)

                         {
                            
                             echo "<script>alert('The Statement saved successfully')</script>";
                            echo "<script>window.open('index.php','_self')</script>";
    

                            
                             // header( 'Location: cidcaseview.php?' );
                      }
               }



      

        $conn->close();
        ?>
