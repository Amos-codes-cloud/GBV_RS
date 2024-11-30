<?php
include'menubar.php';
   $conn = mysqli_connect("localhost:3308", "root", "", "msimbazi");
   
   $post_at = "";
   $post_at_to_date = "";
   $crime="";
   
   $queryCondition = "";
          $street = $_POST["street"];{
      }
      
      $queryCondition .= "WHERE crime_type= '$crime' ";
   {
      $sql = "SELECT * from complainant " . $queryCondition . " ORDER BY crime_type";
   $result = mysqli_query($conn,$sql);
   }

?>
<?php if(!empty($result))   { ?>
<table class="table-content">
          <thead>
        <tr>
                      
          <th width="30%"><span>case_id</span></th>
          <th width="50%"><span>comp_name</span></th>          
          <th width="20%"><span>tel</span></th> 
          <th width="30%"><span>occupation</span></th>
          <th width="50%"><span>gender</span></th>          
          <th width="20%"><span>age</span></th> 
          <th width="30%"><span>addrs</span></th>
          <th width="50%"><span>dis</span></th>          
          <th width="20%"><span>street</span></th> 
          <th width="30%"><span>loc</span></th>
          <th width="50%"><span>crime_type</span></th>          
         
        </tr>
      </thead>
    <tbody>
   <?php
      while($row = mysqli_fetch_array($result)) {
   ?>
        <tr>
         <td><?php echo $row["case_id"]; ?></td>
         <td><?php echo $row["comp_name"]; ?></td>
         <td><?php echo $row["tel"]; ?></td>
         <td><?php echo $row["occupation"]; ?></td>
         <td><?php echo $row["gender"]; ?></td>
         <td><?php echo $row["age"]; ?></td>
         <td><?php echo $row["addrs"]; ?></td>
         <td><?php echo $row["dis"]; ?></td>
         <td><?php echo $row["street"]; ?></td>
         <td><?php echo $row["loc"]; ?></td>
         <td><?php echo $row["crime_type"]; ?></td>


      </tr>

   <?php

      }
   ?>
   <tbody>
  </table>
<?php } ?>
  </form>
  </div>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script>
$.datepicker.setDefaults({
showOn: "button",
buttonImage: "datepicker.png",
buttonText: "Date Picker",
buttonImageOnly: true,
dateFormat: 'dd-mm-yy'  
});
$(function() {
$("#post_at").datepicker();
$("#post_at_to_date").datepicker();
});
</script>
</body></html>

   
?>