<?php    
	    if (!isset($_GET['id'])) {
			header("Location: list_issue.php");
			die();
		}
		require_once('config.php');
		$query = "select * from issuebook where IssueBookID = ".$_GET['id'];
		$ans = mysqli_query($conn,$query);
		$row = mysqli_fetch_assoc($ans);
		if (!$row) {
			header("Location: list_issue.php");
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
		                <h3 class="card-title">Edit Issue book details</h3>
		              </div>

		              <!-- /.card-header -->
		              <!-- form start -->

		              <form class="form-horizontal" action="control_edit_issue.php" method="GET">
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
				        <input type="hidden" name="IssueBookID" value="<?php echo $_GET['id'] ?>">

		                <div class="card-body">

		                  	<div class="form-group row">
			                  	<label class="col-md-4 control-label" for="selectbasic">User Name</label>
								  	<div class="col-lg-8">
									    <select id="selectbasic" name="UserID" class="form-control" >
									      <?php 
		  										require_once('config.php');
					                    		$sql = "select * from userdetail";
					                    		$result = mysqli_query($conn,$sql);
					                    		while($ans = mysqli_fetch_assoc($result))
					                    		{
					                    	?>

					                    	<option value="<?php echo($ans['UserID']); ?>" 

				                    		<?php  

				                    			if ($ans['UserID'] == $row['UserID']) {
				                    				echo ("selected = 'selected'");
				                    			}

				                    		?>

				                    		><?php echo ($ans['UserName']); ?></option>
					                   			
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
		  										require_once('config.php');
					                    		$sql = "select * from bookdetail";
					                    		$result = mysqli_query($conn,$sql);
					                    		while($ans = mysqli_fetch_assoc($result))
					                    		{
					                    	?>

					                    	<option value="<?php echo($ans['BookID']); ?>"

				                    		<?php  

				                    			if ($ans['BookID'] == $row['BookID']) {
				                    				echo ("selected = 'selected'");
				                    			}

				                    		?>

				                    		><?php echo ($ans['BookName']); ?></option>
					                   			
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
		                  <button type="submit" name="Update" class="btn btn-info" >Update</button> 

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