<?php
include'menubar.php';
   $conn = mysqli_connect("localhost:3308", "root", "", "msimbazi");
   
   $post_at = "";
   $post_at_to_date = "";
   
   $queryCondition = "";
   if(!empty($_POST["search"]["post_at"])) {       
      $post_at = $_POST["search"]["post_at"];
      list($fid,$fim,$fiy) = explode("-",$post_at);
      
      $post_at_todate = date('Y-m-d');
      if(!empty($_POST["search"]["post_at_to_date"])) {
         $post_at_to_date = $_POST["search"]["post_at_to_date"];
         list($tid,$tim,$tiy) = explode("-",$_POST["search"]["post_at_to_date"]);
         $post_at_todate = "$tiy-$tim-$tid";
      }
      
      $queryCondition .= "WHERE date BETWEEN '$fiy-$fim-$fid' AND '" . $post_at_todate . "'";
   }

   $sql = "SELECT * from complainant " . $queryCondition . " ORDER BY date desc";
   $result = mysqli_query($conn,$sql);
?>

<html>
   <head>
    <title>simple report</title>     
   <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
   <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

   <style>
   .table-content{border-top:#CCCCCC 4px solid; width:50%;}
   .table-content th {padding:5px 20px; background: #F0F0F0;vertical-align:top;} 
   .table-content td {padding:5px 20px; border-bottom: #F0F0F0 1px solid;vertical-align:top;} 
   </style>
   </head>
   
   <body>
    <div class="demo-content">
      <h2 class="title_with_link">Complainants report</h2>
  <form name="frmSearch" method="post" action="">
    <p class="search_input">
      <input type="date" placeholder="From Date" id="post_at" name="search[post_at]"  value="<?php echo $post_at; ?>" class="input-control" />
       <input type="date" placeholder="To Date" id="post_at_to_date" name="search[post_at_to_date]" style="margin-left:10px"  value="<?php echo $post_at_to_date; ?>" class="input-control"  />        
      <input type="submit" name="go" value="Search" >
   </p>
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
