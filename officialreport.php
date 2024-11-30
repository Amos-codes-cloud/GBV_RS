<?php

include('header.php');

	$conn = mysqli_connect("localhost:3306", "root", "", "ardhi");
	
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

	$sql = "SELECT * from complaints " . $queryCondition . " ORDER BY date asc";
	$result = mysqli_query($conn,$sql);
?>
<center><button id="PrintButton" onclick="PrintPage()">Print</button></center>
<html>
	<head>
    <title>COMPLAINANTS REPORT</title>		
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	 <link href="assets/css/style.css" rel="stylesheet">

	<style>
	.table-content{border-top:#CCCCCC 4px solid; width:50%;}
	.table-content th {padding:5px 20px; background: #F0F0F0;vertical-align:top;} 
	.table-content td {padding:5px 20px; border-bottom: #F0F0F0 1px solid;vertical-align:top;} 
	</style>
	</head>
	
	<body>
    <div class="demo-content">
		<h2 class="title_with_link">complaints filter by Dates</h2>
  <form name="frmSearch" method="post" action="">
	 <p class="search_input">
		<input type="text" placeholder="From Date" id="post_at" name="search[post_at]"  value="<?php echo $post_at; ?>" class="input-control" />
	    <input type="text" placeholder="To Date" id="post_at_to_date" name="search[post_at_to_date]" style="margin-left:10px"  value="<?php echo $post_at_to_date; ?>" class="input-control"  />			 
		<input type="submit" name="go" value="Search" >
		<div class="col-md-3">
						
	</p>
<?php if(!empty($result))	 { ?>
<table class="table-content">
          <thead>
        <tr>
                  <th width="30%"><span>case_id</span></th>
          <th width="50%"><span>firstname</span></th>          
          <th width="20%"><span>lastname</span></th> 
          <th width="30%"><span>Gender</span></th>
          <th width="50%"><span>Address</span></th>          
          <th width="20%"><span>phone</span></th> 
          <th width="30%"><span>violence_type</span></th>
          <th width="50%"><span>date</span></th>          
          <th width="20%"><span>location</span></th> 
          <th width="50%"><span>statement</span></th>
                  
          
        </tr>
      </thead>
    <tbody>
	<?php
		while($row = mysqli_fetch_array($result)) {
	?>
        <tr>
		<td><?php echo $row["case_id"]; ?></td>
         <td><?php echo $row["Firstname"]; ?></td>
         <td><?php echo $row["lastname"]; ?></td>
         <td><?php echo $row["Gender"]; ?></td>
         <td><?php echo $row["Address"]; ?></td>
         <td><?php echo $row["phone"]; ?></td>
         <td><?php echo $row["crime"]; ?></td>
         <td><?php echo $row["date"]; ?></td>
         <td><?php echo $row["location"]; ?></td>
         <td><?php echo $row["statement"]; ?></td>
         <td><?php echo $row["status"]; ?></td>

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
showOn:"button",
buttonImage: "datepicker.png",
buttonText: "Date Picker",
buttonImageOnly: true,
dateFormat: 'dd-mm-yy'  
});
$(function() {
$("#post_at").datepicker();
$("#post_at_to_date").datepicker();
});


    function PrintPage() {
        window.print();
    }
</script>
<form>
	<center>
							   <a href="filterreports.php" class="btn btn-success">BACK 
								   <span class="glyphicon glyphicon-back" aria-hidden="true"></span>
							   </a>
						   </center>
</form>
</body></html>
