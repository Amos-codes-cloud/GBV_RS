<?php 


include('dbconnect.php');

 ?>


<div class="container-fluid">
	

      <?php include('header.php')?> 




	

<div class="container-fluid">

	<div class="col-md-2"></div>
	<div class="col-md-8">
		<ul class="list-group" id="myinfo" >

			<li class="list-group-item" id="mylist"></li>

		</ul>
			<div class="panel panel-success">
					  	<div class="panel-heading">
		
					  		<h3 class="panel-title">Details of Action</h3>
					  	</div>
			<div class="panel-body">

			 <div class="container-fluid">
					<form class="form-horizontal" action="saveassigncase.php" method="post" role="form">
				
					  	
					  	<div class="form-row">
					  	<div class="col-md-6">
					  		<div class="form-group">

					    		<label for="">Case Number:</label>

					    		
					    		
					    		  <select class="form-control" name="case_id" id ="crime">
                                        <option selected="selected" value="">Select</option>

                                            <?php
                                           include 'con2.php';
                                        //Get all unions from database
                                        $sql = mysqli_query($conn,"select * from case_table");
                                        while($row = mysqli_fetch_assoc($sql)){ 
                                            ?>

                                            <option value="<?php echo $row['case_id'] ?>"> <?php echo $row['case_id']?> </option>
                                        <?php
                                        }

                                        ?> </select> 
					    		
					  		</div>
					  	</div>

					  	<div class="col-md-6">
					  		<div class="form-group">

					    		<label for="">Crime Type:</label>
					    		 <select class="form-control" name="crime" id ="crime">

					    		         <option selected="selected" value="">Select</option>

                                            <?php
                                           include 'con2.php';
                                        //Get all unions from database
                                        $sql = mysqli_query($conn,"select * from case_table");
                                        while($row = mysqli_fetch_assoc($sql)){ 
                                            ?>

                                            <option value="<?php echo $row['case_id'] ?>"> <?php echo $row['case_type']?> </option>
                                        <?php
                                        }

                                        ?> </select> 
					    		
					    		
					  		</div>
					  	</div>




					  	 </div>
					  	
					  	<div class="form-row">
					  	<div class="col-md-6">
					  	<div class="form-group">
									    <label for="">Select Investigator:</label>
									    <select class="form-control" name="investigator" id ="crime">
									    <option selected="selected" value="">Select</option>

									    	<?php
			
										//Get all unions from database
										$sql = mysqli_query($conn,"select * from userlogin where status='Admin'");
										while($row = mysqli_fetch_assoc($sql)){ ?>

											<option value="<?php echo $row['username'] ?>"> <?php echo $row['username']?> </option>
										<?php
										}

										?> </select>
							 </div>
						</div>
					  	 </div>

					  <div class="form-group">
					  <button  type="submit" name="saveassign" class="btn btn-success form-control">Save
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

	$(document).on('submit', '#addaction', function(event) {
		event.preventDefault();
		// This removes the error messages from the page
		 $(".list-group-item").remove();
		 
		var formData = $(this).serialize();

			$.ajax({
					url: 'saveassigncase.php',
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
							
							Swal.fire({
							  position: 'top-end',
							  icon: 'success',
							  title: 'Your Case Saved',
							  showConfirmButton: false,
							  timer: 3000
							});
							
							$('input[name=statement]').val('');
							setTimeout( function(){
								window.location='caseview.php';
							}, 900);
							

						}

					}
					
					
				});
		


	});

</script>

</body>
</html>