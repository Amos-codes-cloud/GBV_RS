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

			 
				


				<div class="container-fluid">
					<form class="form-horizontal" action="saveinfo.php"  method="post" role="form">
						<div class="form-row">
                        <div class="col-md-6">
					  		<div class="form-group">
					    		<label for="">Firstname:</label>
					    		<input type="text" name="fname" class="form-control" id="staffid" required="" >
					  		</div>
					  	</div>
					  	<div class="col-md-6">
					  		<div class="form-group">
					    		<label for="">Lastname:</label>
					    		<input type="text" name="lname" class="form-control" id="staffid" required="" >
					  		</div>
					  	</div>
				</div>

						<div class="form-row">
							<div class="col-md-6">
					  		<div class="form-group">
					    		<label for="">Gender:</label>
                        
                        <input type="radio" name="gender" value="male" required> Male 
                        <input type="radio" name="gender" value="female" required> Female
					  		</div>
					  	</div>
                        	<div class="col-md-6">
					       		<div class="form-group">
					       		 <label for="address">Address:</label>
					       	
					        		<input type="text"  name="address" value="" class="form-control" id="pname"
					    		autofocus=""  >
					       		</div>
					   		</div>

					   		<div class="col-md-6">
					  		<div class="form-group">

					  			
					    		<label for="">Violence type:</label>
									    <select class="form-control" name="crime" id ="sdcrime">
									    <option selected="selected" value="">Select</option>

											<option value="Harassment"> Harassment </option>
											<option value="Abuse"> Abuse</option>
											<option value="sexual assult"> sexual assault</option>
											<option value="rape"> rape </option>
											<option value="domestic violence">domestic violence</option>
										
										 </select>
					  			</div>
					  		</div>
					  	</div>
                          <div class="col-md-6">
					  		<div class="form-group">
					    		<label for="">location:</label>
					    		<input type="text" name="location" class="form-control" id="staffid" required="" >
					  		</div>
					  	</div>
					  	<div class="col-md-6">
					  		<div class="form-group">
					    		<label for="">Statement:</label>
					    		<input type="text" name="statement" class="form-control" id="staffid" required="" >
					  		</div>
					  	</div>
                          <div class="col-md-6">
					  		<div class="form-group">
					    		<label for="">Date:</label>
					    		<input type="Date" name="date" class="form-control" id="staffid" required="" >
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
							   <a href="user.php" class="btn btn-success">View system users
								   <span class="glyphicon glyphicon-foward" aria-hidden="true"></span>
							   </a>
						   </center>

<?php include('scripts.php'); ?>
<script type="text/javascript">

	$(document).on('submit', '#addsdtaff', function(event) {
		
		event.preventDefault();
		// This removes the error messages from the page
		 $(".list-group-item").remove();
		
		var formData = $(this).serialize();

			$.ajax({
					url: 'saveuserlogin.php',
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