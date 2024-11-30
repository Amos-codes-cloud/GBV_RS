<!DOCTYPE html>
<?php
	require 'dbconnect.php';
	
 ?>
<html lang="en">
	<head>
		<style>	
		.table {
			width: 100%;
			margin-bottom: 20px;
		}	
 
		.table-striped tbody > tr:nth-child(odd) > td,
		.table-striped tbody > tr:nth-child(odd) > th {
			font-size: medium;
		}
 
		@media print{
			#print {
				display:none;
			}
		}
		@media print {
			#PrintButton {
				display: none;
			}
		}
 
		@page {
			size: auto;   /* auto is the initial value */
			margin: 0;  /* this affects the margin in the printer settings */
		}
	</style>
	</head>

<body bgcolor="">

	<img  src="images/Police.jpg" class="rounded" alt="" width="100" height="100" ></a>
	<h2 align="center">ONLINE CRIME REPORTING SYSTEM</h2>
	<P align="center"> Complainant Report</p>
	<br /> 
	<b style="color:blue;">Date Prepared:</b>
	<?php
		$date = date("Y-m-d", strtotime("+6 HOURS"));
		echo $date;
	?>

	<?php

	$dateCond = '';
if (!empty($_GET['from']) && !empty($_GET['to'])) {
$dateCond = "DATE(trn_date) >= '{$_GET['from']}' AND DATE(trn_date) <= '{$_GET['to']}'";
echo $dateCond;
}

	?>
	<br /><br />
	<center><button id="PrintButton" onclick="PrintPage()">Print</button></center>
	<table align="center" border="1" bgcolor="">
		<thead>
		<tr>
       <th>case_id</th>
       <th>name</th>
       <th>Tel</th>
       <th>occupation</th>
       <th>district</th>
        <th>street</th>
        <th>address</th>
        <th>age</th>
        <th>gender</th>
       <th>Date_added</th>
       <th>crime_type</th>
			</tr>
		</thead>
		<tbody>
			<?php
				require'dbconnect.php';
 
				$query = $conn->query("SELECT * FROM `complainant`");
				while($fetch = $query->fetch_array()){
 
			?>
 
			<tr>
			<td style="text-align:center;"><?php echo $fetch['case_id']?></td>
				<td style="text-align:center;"><?php echo $fetch['comp_name']?></td>
				<td style="text-align:center;"><?php echo $fetch['tel']?></td>
				<td style="text-align:center;"><?php echo $fetch['occupation']?></td>
				<td style="text-align:center;"><?php echo $fetch['dis']?></td>
				<td style="text-align:center;"><?php echo $fetch['street']?></td>
				<td style="text-align:center;"><?php echo $fetch['addrs']?></td>
				<td style="text-align:center;"><?php echo $fetch['age']?></td>
				<td style="text-align:center;"><?php echo $fetch['gender']?></td>
                <td style="text-align:center;"><?php echo $fetch['date_added']?></td>
                <td style="text-align:center;"><?php echo $fetch['crime_type']?></td>

			</tr>

			<?php
				}
			?>
		</tbody>
	</table>
	<div class="col-md-3">
						<div class="panel panel-info">
							<div class="panel-heading">
								<h3 class="panel-title"> <a href="crimreport.php">
									<span class="glyphicon glyphicon-home" aria-hidden="true"></span>case reports</a>
							</div>
							
						</div>
					</div>
</body>
<script type="text/javascript">
	function PrintPage() {
		window.print();
	}
</script>
</html>

