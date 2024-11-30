
<?php 

include('header.php');
include('dbconnect.php');

 ?>



<div>
<table align="center" border="1" style="background-color:cadetblue ; font-color:white ;">
        <thead>
        <tr>
       <th>case_id</th>
       <th>Firstname</th>
       <th>lastname</th>
       <th>Gender</th>
       <th>Address</th>
        <th>violence type</th>
        <th>date</th>
        <th>violence type</th>
        
        <th>statement</th>

       <th>status</th>
            </tr>
        </thead>
        <tbody>
            <?php
                require'dbconnect.php';
 
                $query = $conn->query("SELECT * FROM `complaints`");
                while($fetch = $query->fetch_array()){
 
            ?>
 
            <tr>
            <td style="text-align:center;"><?php echo $fetch['case_id']?></td>
                <td style="text-align:center;"><?php echo $fetch['Firstname']?></td>
                <td style="text-align:center;"><?php echo $fetch['lastname']?></td>
                <td style="text-align:center;"><?php echo $fetch['Gender']?></td>
                <td style="text-align:center;"><?php echo $fetch['Address']?></td>
                <td style="text-align:center;"><?php echo $fetch['crime']?></td>
                <td style="text-align:center;"><?php echo $fetch['date']?></td>
                <td style="text-align:center;"><?php echo $fetch['location']?></td>
                <td style="text-align:center;"><?php echo $fetch['statement']?></td>
                
            </tr>

            <?php
                }
            ?>
        </tbody>
    </table>

    <?php include('scripts.php'); ?>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#myTable-trans').DataTable();
    });
</script>
</div>

<div class="container-fluid">
        
<div class="container-fluid">

    <div class="col-md-2"></div>
    <div class="col-md-8">
        <ul class="list-group" id="myinfo" >

            <li class="list-group-item" id="mylist"></li>

        </ul>
            <div class="panel panel-success">
                        <div class="panel-heading">
        
                            <h3 class="panel-title">Enter  Case Details</h3>
                        </div>
            <div class="panel-body">

             
                


                <div class="container-fluid">
                    <form class="form-horizontal" action="cas.php"  method="post" role="form">
                        <div class="form-row">
                         <label for="">case_id:</label>
                                        <select class="form-control" name="case_id" id ="crime">
                                        <option selected="selected" value="">Select</option>

                                            <?php
                                           include 'con2.php';
                                        //Get all unions from database
                                        $sql = mysqli_query($conn,"select * from complaints");
                                        while($row = mysqli_fetch_assoc($sql)){ 
                                            ?>

                                            <option value="<?php echo $row['case_id'] ?>"> <?php echo $row['case_id']?> </option>
                                        <?php
                                        }

                                        ?> </select>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="statement">statement:</label>
                                <input type="text" name="statement" class="form-control" id="staffid" required="" >
                            </div>
                        </div>
                </div>

                        <div class="form-row">
                            <div class="col-md-6">
                            <div class="form-group">
                                <label for="">date:</label>
                                <input type="date" name="date" class="form-control" id="staffid" required="">
                            </div>
                        </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                 <label for="">Select Crime Type:</label>
                                        <select class="form-control" name="crime_type" id ="crime">
                                        <option selected="selected" value="">Select</option>

                                            <?php
                                           include 'con2.php';
                                        //Get all unions from database
                                        $sql = mysqli_query($conn,"select * from crime_type");
                                        while($row = mysqli_fetch_assoc($sql)){ 
                                            ?>

                                            <option value="<?php echo $row['des'] ?>"> <?php echo $row['des']?> </option>
                                        <?php
                                        }

                                        ?> </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                            <div class="form-group">

                                
                                <label for="">Incharge:</label>
                                         
                                        <select class="form-control" name="staffid" id ="crime">
                                        <option selected="selected" value="">Select</option>

                                            <?php
                                           include 'con2.php';
                                        //Get all unions from database
                                        $sql = mysqli_query($conn,"select * from userlogin");
                                        while($row = mysqli_fetch_assoc($sql)){ 
                                            ?>

                                            <option value="<?php echo $row['username'] ?>"> <?php echo $row['username']?> </option>
                                        <?php
                                        }

                                        ?> </select>
                                </div>
                            </div>
                        </div>

                      
                      </div>
                      <div class="form-group">
                      <button  type="submit" name="save_case" class="btn btn-success form-control">Save and Continue
                      <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span>
                      </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-2"></div>
</div>
<center>
                               
                           </center>

<?php include('scripts.php'); ?>
<script type="text/javascript">

    $(document).on('submit', '#addsdtaff', function(event) {
        
        event.preventDefault();
        // This removes the error messages from the page
         $(".list-group-item").remove();
        
        var formData = $(this).serialize();

            $.ajax({
                    url: 'cas.php',
                    type: 'post',
                    data: formData,
                    dataType: 'JSON',

                    success: function(response){

                        if(response.error){

                            console.log(response.error);
                    }

                        else{

                            Swal.fire({
                              position: 'top-end',
                              icon: 'success',
                              title: 'Staff Saved',
                              showConfirmButton: false,
                              timer: 3000
                            });
                            
                            
                            setTimeout( function(){
                                window.location='addstaff.php';
                            }, 900);
                            

                        }

                    }
                    
                    
                });
        


    });

</script>

</body>
</html>