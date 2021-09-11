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
		              <form class="form-horizontal" action="control_add_book.php" method="GET">
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
									<input id="textinput" name="BookName" type="text" placeholder="Enter Book Name" class="form-control input-md" required="required">
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
					                    		while($row = mysqli_fetch_assoc($result))
					                    		{
					                    	?>

					                    	<option value="<?php echo($row['AuthorID']); ?>"><?php echo ($row['AuthorName']); ?></option>
					                   			
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
					                    		while($row = mysqli_fetch_assoc($result))
					                    		{
					                    	?>

					                    	<option value="<?php echo($row['PublicationID']); ?>"><?php echo ($row['PublicationName']); ?></option>
					                   			
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
					                    		while($row = mysqli_fetch_assoc($result))
					                    		{
					                    	?>

					                    	<option value="<?php echo($row['CategoryID']); ?>"><?php echo ($row['CategoryName']); ?></option>
					                   			
					                   		<?php 
					                   			}
					                   		?>
									    </select>
								  	</div>
							</div>


		                  	<div class="form-group row">
			                    <label class="col-md-4 control-label" for="textinput">Book Pages</label>
								<div class="col-lg-8">
									<input id="textinput" name="BookPages" type="Number" placeholder="Enter Pages" class="form-control input-md" required="required">
								</div>
		                  	</div>

		                  	<div class="form-group row">
			                    <label class="col-md-4 control-label" for="textinput">Price</label>
								<div class="col-lg-8">
									<input id="textinput" name="BookPrice" type="Number" placeholder="Enter price" class="form-control input-md" required="required">
								</div>
		                  	</div>

		                  	<div class="form-group row">
			                    <label class="col-md-4 control-label" for="textinput">Quantity</label>
								<div class="col-lg-8">
									<input id="textinput" name="BookQuantity" type="Number" placeholder="Enter Quantity" class="form-control input-md" required="required">
								</div>
		                  	</div>

		                  	<div class="form-group row">
			                    <label class="col-md-4 control-label" for="textinput">Purchase Date</label>
								<div class="col-lg-8">
									<input id="textinput" name="PurchaseDate" type="Date" placeholder="Enter Quantity" class="form-control input-md" required="required" >
								</div>
		                  	</div>

		                  	

		                  	<div class="form-group row">
			                    <label class="col-md-4 control-label" for="textinput">Rack Number</label>
								<div class="col-lg-8">
									<input id="textinput" name="RackNumber" type="text" placeholder="Enter Rack Number" class="form-control input-md" required="required">
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