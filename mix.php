

<?php
require_once('dbconnect.php');
include 'dbconnect.php';

//array created to handle the error msgs
$errors = array();

// array to hold the json econded data
$output = array('error' => false);

  //Variables to hold the form data
 $name='';$tel='';$district='';$loc=''; $crime='';$occ='';
 $addrs='';$age=''; $gender='';


            
              
              
              if(empty($_POST['name'])){
               array_push($errors, "The name cannot be empty, ensure is entered");
              }
              else{ 
              $name = $_POST['name'];
            }
            if(empty($_POST['gender'])){
               array_push($errors, "The gender field cannot be empty, ensure is entered");
              }
              else{ 
              $gender = $_POST['gender'];
            }

             
              if(empty($_POST['tel'])){
                array_push($errors,"The  tel cannot be empty, ensure is entered");
               
              }
              else{ 
              $tel=$_POST['tel'];
               }
           
              if(empty($_POST['occ']) ){
                array_push($errors,"The occupation field cannot be empty, ensure is entered");
              }
              else{ 
              $occ=$_POST['occ'];
               }
             
              if(empty($_POST['district'])){
               array_push($errors,"The district field cannot be empty, ensure is entered");
                }

              else{ 
              $district=$_POST['district'];
                 }
             
              if(empty($_POST['loc'])){
               array_push($errors,"The  location field cannot be empty, ensure is entered");
                }

              else{ 
              $loc=$_POST['loc'];
               }

               if(empty($_POST['crime_type'])){
                array_push($errors,"The  crime type name field cannot be empty, ensure is entered");
                
              }
              else{ 
              $crime=$_POST['crime_type'];
               }

               
              if(empty($_POST['addrs'])){
                array_push($errors,"The address field cannot be empty, ensure is entered");
               
              }
              else{ 
              $addrs=$_POST['addrs'];

             }

              if(empty($_POST['age'])){
                array_push($errors,"The age field cannot be empty, ensure is entered");
              
              }
              else{ 
              $age=$_POST['age'];
               }
             
             


                if($errors){

                      $output = array('error' => true, $errors);


                    }

                 else{  

                         $sql = "INSERT INTO complainant (case_id, comp_name, tel, district,loc, addrs, age,occupation,gender)
                                       VALUES(?,?,?,?,?,?,?,?,?,?); ";

                   $success = $conn->insertRow($sql, [$name, $tel, $district, $loc, $addrs, $age, $occ, $gender]);

                         if( $success )

                         {
                             
                            // header( 'Location: union_thank.php?message=success' );
                             $output['url'] = "addcase.php?id=staff&caseid=$trans_id&crimetype=$crime";
                        }
               }



        echo json_encode($output);

        $conn->close();
        ?>
