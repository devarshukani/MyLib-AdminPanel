<?php  
		if (!isset($_GET['id'])) {
			header("Location: list_publication.php");
			die();
		}
		require_once('config.php');
		$query = "select * from publicationdetail where PublicationID = ".$_GET['id'];
		$ans = mysqli_query($conn,$query);
		$row = mysqli_fetch_assoc($ans);
		if (!$row) {
			header("Location: list_publication.php");
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
	            <h1 class="m-0 text-dark">Publication</h1>
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
		                <h3 class="card-title">Publication</h3>
		              </div>

		              <!-- /.card-header -->
		              <!-- form start -->
		              <form class="form-horizontal" action="control_edit_publication.php" method="GET">
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
				        <input type="hidden" name="PublicationID" value="<?php echo $_GET['id'] ?>">

		                <div class="card-body">
		                  	<div class="form-group row">
			                    <label class="col-md-4 control-label" for="textinput">Publication Name</label>
								<div class="col-lg-8">
									<input id="textinput" name="PublicationName" type="text" placeholder="Enter Publication Name" class="form-control input-md" required="required" value="<?php echo($row['PublicationName']); ?>">
								</div>
		                  	</div>

		                  	<div class="form-group row">
			                    <label class="col-md-4 control-label" for="textinput">Publication Contact Number</label>
								<div class="col-lg-8">
									<input id="textinput" name="PublicationContactNumber" type="Number" placeholder="Enter Contact Number" class="form-control input-md" required="required" maxlength="10" value="<?php echo($row['PublicationContactNumber']); ?>">
								</div>
		                  	</div>

		                  	<div class="form-group row">
			                    <label class="col-md-4 control-label" for="textinput">Publication Address</label>
								<div class="col-lg-8">
									<textarea id="texinput" name="PublicationAddress" placeholder="Enter Address" class="form-control input-md" required="required"><?php echo($row['PublicationAddress']); ?></textarea>
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