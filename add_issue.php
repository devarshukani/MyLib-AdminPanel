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
	            <h1 class="m-0 text-dark">Issue Book</h1>
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
		                <h3 class="card-title">Add Issue book details</h3>
		              </div>

		              <!-- /.card-header -->
		              <!-- form start -->

		              <form class="form-horizontal" action="control_add_issue.php" method="GET">
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
			                  	<label class="col-md-4 control-label" for="selectbasic">User Name</label>
								  	<div class="col-lg-8">
									    <select id="selectbasic" name="UserID" class="form-control">
									      <?php 
		  										include('config.php');
					                    		$sql = "select * from userdetail";
					                    		$result = mysqli_query($conn,$sql);
					                    		while($row = mysqli_fetch_assoc($result))
					                    		{
					                    	?>

					                    	<option value="<?php echo($row['UserID']); ?>"><?php echo ($row['UserName']); ?></option>
					                   			
					                   		<?php 
					                   			}
					                   		?>
									    </select>
								  	</div>
							  </div>


							<div class="form-group row">
								<label class="col-md-4 control-label" for="selectbasic">Book Name</label>
								  	<div class="col-lg-8">
									    <select id="selectbasic" name="BookID" class="form-control">
									      <?php 
		  										include('config.php');
					                    		$sql = "select * from bookdetail";
					                    		$result = mysqli_query($conn,$sql);
					                    		while($row = mysqli_fetch_assoc($result))
					                    		{
					                    	?>

					                    	<option value="<?php echo($row['BookID']); ?>"><?php echo ($row['BookName']); ?></option>
					                   			
					                   		<?php 
					                   			}
					                   		?>
									    </select>
								  	</div>
							</div>

		                  	<div class="form-group row">
			                    <label class="col-md-4 control-label" for="textinput">Due Date</label>
								<div class="col-lg-8">
									<input id="textinput" name="DueDate" type="Date" placeholder="Enter Date" class="form-control input-md" required="required" value="<?php echo(date('Y-m-d',strtotime(date("Y-m-d"). ' + 15 days'))) ?>" disabled>
								</div>
		                  	</div>
		                  </div>

		                <!-- /.ca rd-body -->
		                <div class="card-footer">
		                  <button type="submit" class="btn btn-info" >Add</button> 
<!-- 		                  <a href="control_add_issue.php?bid=$BookID&uid=$UserID&idate=$IssueBookDate">Submit</a> -->
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