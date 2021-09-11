<?php  
		if (!isset($_GET['id'])) {
			header("Location: list_author.php");
			die();
		}
		require_once('config.php');
		$query = "select * from authordetail where AuthorID = ".$_GET['id'];
		$ans = mysqli_query($conn,$query);
		$row = mysqli_fetch_assoc($ans);
		if (!$row) {
			header("Location: list_author.php");
			die();
		}
		  
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
	            <h1 class="m-0 text-dark">Author</h1>
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
		                <h3 class="card-title">Add Author Form</h3>
		              </div>

		              <!-- /.card-header -->
		              <!-- form start -->
		              <form class="form-horizontal" action="control_edit_author.php" method="GET">
		              	<input type="hidden" name="AuthorID" value="<?php echo($row['AuthorID']); ?>">
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
				        ?>
				        

		                <div class="card-body">
		                  	<div class="form-group row">
			                    <label class="col-md-4 control-label" for="textinput">Author Name</label>
								<div class="col-lg-8">
									<input id="textinput" name="AuthorName" type="text" placeholder="Enter Author Name" class="form-control input-md" required="required" value="<?php echo($row['AuthorName']); ?>">
								</div>
		                  	</div>

		                  	<div class="form-group row">
			                    <label class="col-md-4 control-label" for="textinput">Author Contact Number</label>
								<div class="col-lg-8">
									<input id="textinput" name="AuthorContactNumber" type="Number" placeholder="Enter Contact Number" class="form-control input-md" maxlength="10" required="required" value="<?php echo($row['AuthorContactNumber']); ?>">
								</div>
		                  	</div>

		                  	<div class="form-group row">
			                    <label class="col-md-4 control-label" for="textinput">Author Address</label>
								<div class="col-lg-8">
									<!-- <input id="textinput" name="AuthorAddress" type="text" placeholder="Enter Address" class="form-control input-md"> -->
									<textarea id="texinput" name="AuthorAddress" placeholder="Enter Address" class="form-control input-md" required="required"><?php echo($row['AuthorAddress']); ?></textarea>
								</div>
		                  	</div>

		                  	<div class="form-group row">
							<label class="col-md-4 control-label" for="selectbasic">City</label>
							  	<div class="col-lg-8">
								    <select id="selectbasic" name="CityID" class="form-control">
								      <?php 
	  										require_once('config.php');
				                    		$sql = "select * from citydetail";
				                    		$result = mysqli_query($conn,$sql);
				                    		while($ans = mysqli_fetch_assoc($result))
				                    		{
				                    	?>

				                    	<option value="<?php echo($ans['CityID']); ?>" 

				                    		<?php  

				                    			if ($ans['CityID'] == $row['CityID']) {
				                    				echo ("selected = 'selected'");
				                    			}

				                    		?>

				                    		><?php echo ($ans['CityName']); ?></option>
				                   			
				                   		<?php 
				                   			}
				                   		?>
								    </select>
							  	</div>
							</div>
							
		                </div>
		                <!-- /.card-body -->
		                <div class="card-footer">
		                	<button type="submit" name="Update" class="btn btn-info">Update</button>
                  			<button type="submit" name="Cancel" class="btn btn-default float-right">Cancel</button>
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