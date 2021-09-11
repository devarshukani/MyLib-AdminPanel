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
		          			<td>Publication Name</td>
		          			<td>Publication Address</td>
		          			<td>Publication Contact Number</td>
		          			<td>City Name</td>
		          			<td >Delete</td>
		          			<td >Update</td>
		          		</tr>
		          		<?php 
		          			require('config.php');
		          			$sql = "SELECT * FROM publicationdetail pd, citydetail cd WHERE pd.CityID = cd.CityID;";
		          			$result = mysqli_query($conn,$sql);
		          			while($row = mysqli_fetch_assoc($result))
		          			{
		          		?>
		          		<tr>
		          			<td><?php echo $row['PublicationID']; ?></td>
		          			<td><?php echo $row['PublicationName']; ?></td>
		          			<td><?php echo $row['PublicationAddress']; ?></td>
		          			<td><?php echo $row['PublicationContactNumber']; ?></td>
		          			<td><?php echo $row['CityName']; ?></td>
		          			<td> <a href="control_delete_publication.php?id=<?php echo $row['PublicationID'];?>" class="btn btn-danger" onclick="return deletefunction()">Delete</a></td>
		          			<td> <a href="edit_publication.php?id=<?php echo $row['PublicationID'];?>" class="btn btn-warning">update</a></td>						
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