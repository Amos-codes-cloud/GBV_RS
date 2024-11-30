<?php 

include ('dbconnect.php');

?>
	

      <?php include('menubar.php')?> 
	<?php include('database.php');

	//$trans_id= uniqid();
	  
	 
	

	 $trans_id=uniqid();
	 

	?>

<div class="container-fluid">

	<div class="col-md-2"></div>
	<div class="col-md-8">
		<ul class="list-group" id="myinfo" >

			<li class="list-group-item" id="mylist"></li>

		</ul>
			<div class="panel panel-success">
					  	<div class="panel-heading">
		
					  		<h3 class="panel-title">Complainant Details</h3>
					  	</div>
			<div class="panel-body">

			 
				<div class="container-fluid">
					<form class="form-horizontal" id="addcase"  role="form" method="POST"  action="ham.php">

						<div class="form-row">
                        	<div class="col-md-6">
					       		<div class="form-group">
					       		 <label for="">Name of Complainant:</label>
					       		 <input type="hidden" name="uid" value="<?php echo $trans_id?>">
					        		<input type="text" name="name" class="form-control" id="name" placeholder="Enter Name"
					    		autofocus=""  >
					       		</div>
					   		</div>

					   		<div class="col-md-6">
					  		<div class="form-group">
					    		<label for="">Tel Phone:</label>
					    		<input type="text" name="tel" class="form-control" id="tel" maxlength="10" placeholder="Enter Number" >
					  			</div>
					  		</div>
					  	</div>


						<div class="form-row">
                        	<div class="col-md-6">
					       		<div class="form-group">
					       		 <label for="">Occupation:</label>
					       		 
					        		<input type="text" name="occ" class="form-control" id="nid" placeholder="Enter Occupation"
					    		autofocus=""  >
					       		</div>

					       		<div class="col-md-6">
					       		<div class="form-group">
									    <label for="">Gender:</label>
									    <select class="form-control" name="gender" id ="idcrime">
									    <option selected="selected" value="">Select</option>

											<option value="Male"> Male</option>
											<option value="Female"> Female</option>
										
										 </select>
										 </div>
										</div>
                          
					   	</div>
					
					   		
					 

					  	<div class="form-row">
                        	<div class="col-md-6">
					  				<div class="form-group">
					   				 <label for="">Age:</label>
					   				 <input type="number" name="age" class="form-control" id="addrs" placeholder="Age"  >
					  				</div>
					  		</div>
					  		<div class="col-md-6">
					  			<div class="form-group">
					    		<label for="">Address:</label>
					    		<input type="text" name="addrs" class="form-control py-4" id="digaddrs"  placeholder="Address" >
					  			</div>
					  		</div>
					  	</div>
						<div class="form-row">
                        		<div class="col-md-6">
					  				<div class="form-group">
					   				 <label for="">District:</label>
					    				<select class="form-control" name="district" id ="sdcrime">
									    <option selected="selected" value="">Select</option>
											<option value="Temeke">Temeke</option>
											<option value="Ubungo">Ubungo  </option>
											<option value="Ilala">Ilala</option>
											<option value="Kinondoni">Kinondoni </option>

										 </select>
					  				</div>
					  			</div>
					  			<div class="col-md-6">
					  				<div class="form-group">
					    				<label for="">street/ward:</label>
					    				<select name="street" class="form-control" placeholder="ward">
				<?php
include'dbconnect.php';
$sql = mysqli_query($conn,"select * from Wards");
										while($row = mysqli_fetch_assoc($sql)){ 
											?>

											<option value="<?php echo $row['street'] ?>"> <?php echo $row['street']?> </option>
										<?php
										}

										?> </select>

				



			</select>
					  				</div>
					  			</div>
					  		</div>
					<div class="form-row">
                        <div class="col-md-6">
					  		<div class="form-group">
					    		<label for="">Location:</label>
					    		<select name="loc" class="form-control" placeholder="ward">
				<?php
include'dbconnect.php';
$sql = mysqli_query($conn,"select * from Wards");
										while($row = mysqli_fetch_assoc($sql)){ 
											?>

											<option value="<?php echo $row['street'] ?>"> <?php echo $row['street']?> </option>
										<?php
										}

										?> </select>

				



			</select>
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

<?php include('scripts.php'); ?>
<script type="text/javascript">

	$(document).on('submit', 'save_case', function(event) {
		
		event.preventDefault();
		// This removes the error messages from the page
		 $(".list-group-item").remove();
		
		var formData = $(this).serialize();

			$.ajax({
					url: 'ham.php',
					type: 'post',
					data: formData,
					dataType: 'JSON',

					success: function(response){

						if(response.error){

							var len = response[0].length;

							for(var i=0; i<len; i++){



							$('#myinfo').append('<li class="list-group-item alert alert-danger"> ' + response[0][i] + '</li>');
													}
										}
					

						else{

							window.location=response.url;

						}

					}
					
					
				});
		


	});

</script>

</body>
</html>