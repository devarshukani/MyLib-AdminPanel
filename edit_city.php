<?php  
		if (!isset($_GET['id'])) {
			header("Location: list_city.php");
			die();
		}
		require_once('config.php');
		$query = "select * from citydetail where CityID = ".$_GET['id'];
		$ans = mysqli_query($conn,$query);
		$row = mysqli_fetch_assoc($ans);
		if (!$row) {
			header("Location: list_city.php");
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
	            <h1 class="m-0 text-dark">City</h1>
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
		                <h3 class="card-title">Add City</h3>
		              </div>

		              <!-- /.card-header -->
		              <!-- form start -->
		              <form class="form-horizontal" action="control_edit_city.php" method="GET">
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
				        <input type="hidden" name="CityID" value="<?php echo $_GET['id'] ?>">

		                <div class="card-body">
		                  	<div class="form-group row">
			                    <label class="col-md-4 control-label" for="textinput">City Name</label>
								<div class="col-lg-8">
									<input id="textinput" name="CityName" type="text" placeholder="Enter City Name" class="form-control input-md" required="required" value="<?php echo($row['CityName']) ?>">
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