
<div class="modal fade" id="edit<?php echo '$id';?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Criminal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     
     
    <?php
 include 'dbconnect.php';

  
  $query2=mysqli_query($conn,"SELECT * FROM criminals where criminal_id="Criminal_id"");
  $row1 = mysqli_fetch_array($query2);
  //$statement=$row1['statement'];
  //$casetype=$row1['case_type'];

  

  ?>

        
              
              <div class="row">
              <form class="form-horizontal" action="edit.php"  method="post" role="form">
            <div class="form-row">
                        <div class="col-md-7">
                <div class="form-group">
                  <label for="">Firstname:</label>
                  <input type="text" name="firstname" value="<?php echo $row1['firstname']?>" class="form-control" id="staffid"  >
                </div>
              </div>
               </div>
               <div class="form-row">
              <div class="col-md-7">
                <div class="form-group">
                  <label for="">lastname:</label>
                  <input type="text" name="lastname" value="<?php echo $row1['lastname']?>" class="form-control" id="staffid"  >
                </div>
              </div>
              </div>

            <div class="form-row" style="">
              <div class="col-md-7">
                <div class="form-group">
                  <label for="">Criminal Number:</label>
                  <input type="text" readonly="" name="criminal_id" value="<?php echo $row1['criminal_id']?>" class="form-control" id="staffid" >
                </div>
              </div>
               </div>
                         
                <div class="form-row" >
                <div class="col-md-7">
                <div class="form-group">

                  
                  <label for="">Status:</label>
                      <select class="form-control" name="status" id ="sdcrime">
                      <option selected="selected" value="">Select</option>

                      <option value="pending case"> pending case</option>
                      <option value="released"> released </option>
                      <option value="jailed"> jailed</option>
                      
                    

                     </select>
                  </div>
                </div>
              </div>

            
            </div>
           
         

          </div>
        
       
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"> <i class="icon-remove icon-large"></i>Close</button>
        <button type="submit" class="btn btn-success"> <i class="icon-check icon-large"></i>Update</button>
        </form>
      </div>
    </div>
  </div>
</div>
