<?php  
		if (!isset($_GET['id'])) {
			header("Location: list_book.php");
			die();
		}
		require_once('config.php');
		$query = "select * from bookdetail where BookID = ".$_GET['id'];
		$ans = mysqli_query($conn,$query);
		$row = mysqli_fetch_assoc($ans);
		if (!$row) {
			header("Location: list_book.php");
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
	            <h1 class="m-0 text-dark">Book</h1>
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
		                <h3 class="card-title">Add Book Form</h3>
		              </div>

		              <!-- /.card-header -->
		              <!-- form start -->
		              <form class="form-horizontal" action="control_edit_book.php" method="GET">
		              	<input type="hidden" name="BookID" value="<?php echo($_GET['id']); ?>">
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
			                    <label class="col-md-4 control-label" for="textinput">Book Name</label>
								<div class="col-lg-8">
									<input id="textinput" name="BookName" type="text" placeholder="Enter Book Name" class="form-control input-md" required="required" value="<?php echo($row['BookName']); ?>">
								</div>
		                  	</div>

		                  	<div class="form-group row">
			                  	<label class="col-md-4 control-label" for="selectbasic">Author Name</label>
								  	<div class="col-lg-8">
									    <select id="selectbasic" name="AuthorID" class="form-control">
									      <?php 
		  										include('config.php');
					                    		$sql = "select * from authordetail";
					                    		$result = mysqli_query($conn,$sql);
					                    		while($ans = mysqli_fetch_assoc($result))
					                    		{
					                    	?>

					                    	<option value="<?php echo($ans['AuthorID']); ?>"

					                    			<?php 

					                    				if ($ans['AuthorID'] == $row['AuthorID']) {
					                    					echo "selected = 'selected'";
					                    				}

					                    			?>

					                    		>
					                    		<?php echo ($ans['AuthorName']); ?>
					                    		</option>
					                   			
					                   		<?php 
					                   			}
					                   		?>
									    </select>
								  	</div>
							  </div>


							<div class="form-group row">
								<label class="col-md-4 control-label" for="selectbasic">Publication Name</label>
								  	<div class="col-lg-8">
									    <select id="selectbasic" name="PublicationID" class="form-control">
									      <?php 
		  										include('config.php');
					                    		$sql = "select * from publicationdetail";
					                    		$result = mysqli_query($conn,$sql);
					                    		while($ans = mysqli_fetch_assoc($result))
					                    		{
					                    	?>

					                    	<option value="<?php echo($ans['PublicationID']); ?>"

					                    			<?php 

					                    				if ($ans['PublicationID'] == $row['PublicationID']) {
					                    					echo "selected = 'selected'";
					                    				}

					                    			?>

					                    		><?php echo ($ans['PublicationName']); ?></option>
					                   			
					                   		<?php 
					                   			}
					                   		?>
									    </select>
								  	</div>
							</div>

							<div class="form-group row">
								<label class="col-md-4 control-label" for="selectbasic">Category Name</label>
								  	<div class="col-lg-8">
									    <select id="selectbasic" name="CategoryID" class="form-control">
									      <?php 
		  										include('config.php');
					                    		$sql = "select * from categorydetail";
					                    		$result = mysqli_query($conn,$sql);
					                    		while($ans = mysqli_fetch_assoc($result))
					                    		{
					                    	?>

					                    	<option value="<?php echo($ans['CategoryID']); ?>"

					                    			<?php 

					                    				if ($ans['CategoryID'] == $row['CategoryID']) {
					                    					echo "selected = 'selected'";
					                    				}

					                    			?>

					                    		><?php echo ($ans['CategoryName']); ?></option>
					                   			
					                   		<?php 
					                   			}
					                   		?>
									    </select>
								  	</div>
							</div>


		                  	<div class="form-group row">
			                    <label class="col-md-4 control-label" for="textinput">Book Pages</label>
								<div class="col-lg-8">
									<input id="textinput" name="BookPages" type="Number" placeholder="Enter Pages" class="form-control input-md" required="required" value="<?php echo($row['BookPages']); ?>">
								</div>
		                  	</div>

		                  	<div class="form-group row">
			                    <label class="col-md-4 control-label" for="textinput">Price</label>
								<div class="col-lg-8">
									<input id="textinput" name="BookPrice" type="Number" placeholder="Enter price" class="form-control input-md" required="required" value="<?php echo($row['BookPrice']); ?>">
								</div>
		                  	</div>

		                  	<div class="form-group row">
			                    <label class="col-md-4 control-label" for="textinput">Quantity</label>
								<div class="col-lg-8">
									<input id="textinput" name="BookQuantity" type="Number" placeholder="Enter Quantity" class="form-control input-md" required="required" value="<?php echo($row['BookQuantity']); ?>">
								</div>
		                  	</div>

		                  	<div class="form-group row">
			                    <label class="col-md-4 control-label" for="start">Purchase Date</label>
								<div class="col-lg-8">
									<!-- <input id="textinput" name="PurchaseDate" type="Date" class="form-control input-md" required="required"  value="05-13-2000">  value="2000-05-13"-->
									<input type="date" id="start" name="PurchaseDate" value="<?php echo($row['PurchaseDate']); ?>" class="form-control input-md" required="required">
								</div>
		                  	</div>

		                  	

		                  	<div class="form-group row">
			                    <label class="col-md-4 control-label" for="textinput">Rack Number</label>
								<div class="col-lg-8">
									<input id="textinput" name="RackNumber" type="text" placeholder="Enter Rak Number" class="form-control input-md" required="required" value="<?php echo($row['RackNumber']); ?>">
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