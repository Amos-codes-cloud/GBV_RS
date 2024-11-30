<?php 

include('header.php');
include('dbconnect.php');

 ?>


<div class="container-fluid">
		
<div class="container-fluid">

	<div class="col-md-2"></div>
	<div class="col-md-8">
		<ul class="list-group" id="myinfo" >

			<li class="list-group-item" id="mylist"></li>

		</ul>
			<div class="panel panel-success">
					  	<div class="panel-heading">
		
					  		<h3 class="panel-title">Enter  Details</h3>
					  	</div>
			<div class="panel-body">

			 <form action="edit.php" method="post" >
			 	<div>
			 	 <select class="form-control" name="criminal_id" id ="crime">
									    <option selected="selected" value="">Select</option>

									    	<?php
			                               include 'con2.php';
										//Get all unions from database
										$sql = mysqli_query($conn,"select * from criminals");
										while($row = mysqli_fetch_assoc($sql)){ 
											?>

											<option value="<?php echo $row['criminal_id'] ?>"> <?php echo $row['criminal_id']?> </option>
										<?php
										}

										?> </select>	

			 	</div>
			 		

			 		<label for="">status:</label>
					    				<select class="form-control" name="status" id ="sdcrime">
									    <option selected="selected" value="">Select</option>
											<option value="pending court decision">pending court decision</option>
											<option value="released">released  </option>
											<option value="jailed">jailed</option>
											<option value="released on bail ">released on bail </option>

										 </select>

			 	</div>

 <div class="form-group">
					  <button  type="submit" name="save" class="btn btn-success form-control">Save and Continue
					  <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span>
					  </button>
					</div>
			 	 
			 



			 </form>
				


				
<?php include('scripts.php'); ?>
<script type="text/javascript">

	$(document).on('submit', '#addsdtaff', function(event) {
		
		event.preventDefault();
		// This removes the error messages from the page
		 $(".list-group-item").remove();
		
		var formData = $(this).serialize();

			$.ajax({
					url: 'edit.php',
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
								window.location='editcrim.php';
							}, 900);
							

						}

					}
					
					
				});
		


	});

</script>

</body>
</html>