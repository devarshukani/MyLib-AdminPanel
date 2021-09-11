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
	        	<table class="table table-hover">
		          		<tr>
		          			<td>#</td>
		          			<td>Author Name</td>
		          			<td>Author Contact Number</td>
		          			<td>Author Address</td>
		          			<td>City Name</td>
		          			<td >Delete</td>
		          			<td >Update</td>
		          		</tr>
		          		<?php 
		          			require('config.php');
		          			$sql = "SELECT * FROM authordetail ad, citydetail cd WHERE ad.CityID = cd.CityID;";
		          			$result = mysqli_query($conn,$sql);
		          			while($row = mysqli_fetch_assoc($result))
		          			{
		          		?>
		          		<tr>
		          			<td><?php echo $row['AuthorID']; ?></td>
		          			<td><?php echo $row['AuthorName']; ?></td>
		          			<td><?php echo $row['AuthorContactNumber']; ?></td>
		          			<td><?php echo $row['AuthorAddress']; ?></td>
		          			<td><?php echo $row['CityName']; ?></td>
		          			<td> <a href="control_delete_author.php?id=<?php echo $row['AuthorID'];?>" class = "btn btn-danger" onclick="return deletefunction()">Delete</a></td>
		          			<td> <a href="edit_author.php?id=<?php echo $row['AuthorID'];?>" class = "btn btn-warning">Update</a></td>
		          		</tr>
		          		<?php
		          			}
		          		?>	
	          	</table>
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

<script type="text/javascript">
	function deletefunction(){
		var a = confirm("Are You sure want to delete?");
		return a;
	}
</script>