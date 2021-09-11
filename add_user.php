<?php  
		  
	  include('include/header.php');
	  include('include/left_sidebar.php');
?>

	  <!-- Content Wrapper. Contains page content -->
	  <div class="content-wrapper">
	    <!-- Content Header (Page header) -->
	    <div class="content-header">
	      <div class="container-fluid">
	        <div class="row">
	          <div class="col-sm-6">
	            <h1 class="m-0 text-dark">User</h1>
	          </div><!-- /.col -->
	        </div><!-- /.row -->
	      </div><!-- /.container-fluid -->
	    </div>
	    <!-- /.content-header -->

	    <!-- Main content -->
	    <div class="content">
	      <div class="container-fluid">
	        <div class="row">
	        	<div class="col-lg-2"></div>
	          	<div class="col-lg-8">
			        <div class="card card-info">
		              <div class="card-header">
		                <h3 class="card-title">Add User </h3>
		              </div>

		              <!-- /.card-header -->
		              <!-- form start -->
		              <form class="form-horizontal" action="control_add_user.php" method="GET">
		              	<?php  
				        	if(isset($_SESSION['err']))
				        	{
				        ?>
				        	<div style="color:red">
				        		<?php echo($_SESSION['err']); ?>
				        	</div>
				        <?php  
				        	unset($_SESSION['err']);
				        	}
				        	if (isset($_SESSION['msg'])) {
				        ?>
				        	<div style="color:green">
				        		<?php echo($_SESSION['msg']); ?>
				        	</div>
				        <?php  
				        	unset($_SESSION['msg']);
				        	}
				        ?>

		                <div class="card-body">
		                  	<div class="form-group row">
			                    <label class="col-md-4 control-label" for="textinput">User Name</label>
								<div class="col-lg-8">
									<input id="textinput" name="UserName" type="text" placeholder="Enter User Name" class="form-control input-md" required="required">
								</div>
		                  	</div>

		                  	<div class="form-group row">
			                    <label class="col-md-4 control-label" for="textinput">Password</label>
								<div class="col-lg-8">
									<input id="textinput" name="Password" type="text" placeholder="Enter Password" class="form-control input-md" required="required">
								</div>
		                  	</div>

		                  	<div class="form-group row">
			                    <label class="col-md-4 control-label" for="textinput">Contact Number</label>
								<div class="col-lg-8">
									<input id="textinput" name="UserContactNumber" type="Number" placeholder="Enter Contact Number" class="form-control input-md" required="required" maxlength="10">
								</div>
		                  	</div>

		                  	<div class="form-group row">
			                    <label class="col-md-4 control-label" for="textinput">Address</label>
								<div class="col-lg-8">
									<textarea id="texinput" name="UserAddress" placeholder="Enter Address" class="form-control input-md" required="required"></textarea>
								</div>
		                  	</div>

		                  	<div class="form-group row">
							<label class="col-md-4 control-label" for="selectbasic">City</label>
							  	<div class="col-lg-8">
								    <select id="selectbasic" name="CityID" class="form-control">
								      <?php 
	  										include('config.php');
				                    		$sql = "select * from citydetail";
				                    		$result = mysqli_query($conn,$sql);
				                    		while($row = mysqli_fetch_assoc($result))
				                    		{
				                    	?>

				                    	<option value="<?php echo($row['CityID']); ?>"><?php echo ($row['CityName']); ?></option>
				                   			
				                   		<?php 
				                   			}
				                   		?>
								    </select>
							  	</div>
							</div>
		                  
		                </div>
		                <!-- /.card-body -->
		                <div class="card-footer">
		                  <button type="submit" class="btn btn-info">Add</button>
		                </div>
		                <!-- /.card-footer -->
		              </form>
		            </div>
				</div>
	        </div>
	        <!-- /.row -->
	      </div><!-- /.container-fluid -->
	    </div>
	    <!-- /.content -->
	  </div>
	  <!-- /.content-wrapper -->

<?php
	include('include/footer.php');	
?>