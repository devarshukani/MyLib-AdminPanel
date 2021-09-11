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
		          			<td>Book Name</td>
		          			<td>Author Name</td>
		          			<td>Publication Name</td>
		          			<td>Category Name</td>
		          			<td>Book Pages</td>
		          			<td>Book Price</td>
		          			<td>Book Quantity</td>
		          			<td>Purchase Date</td>
		          			<td>Rack Number</td>
		          			<td >Delete</td>
		          			<td >Update</td>
		          		</tr>
		          		<?php 
		          			require('config.php');
		          			$sql = "SELECT * FROM bookdetail bd, authordetail ad, publicationdetail pd, categorydetail cd WHERE bd.AuthorID = ad.AuthorID AND bd.PublicationID = pd.PublicationID AND bd.CategoryID = cd.CategoryID;";
		          			$result = mysqli_query($conn,$sql);
		          			while($row = mysqli_fetch_assoc($result))
		          			{
		          				
		          		?>
		          		<tr>
		          			<td><?php echo $row['BookID']; ?></td>
		          			<td><?php echo $row['BookName']; ?></td>
		          			<td><?php echo $row['AuthorName']; ?></td>
		          			<td><?php echo $row['PublicationName']; ?></td>
		          			<td><?php echo $row['CategoryName']; ?></td>
		          			<td><?php echo $row['BookPages']; ?></td>
		          			<td><?php echo $row['BookPrice']; ?></td>
		          			<td><?php echo $row['BookQuantity']; ?></td>	
		          			<td><?php echo $row['PurchaseDate']; ?></td>	
		          			<td><?php echo $row['RackNumber']; ?></td>	
		          			<td> <a href="control_delete_book.php?id=<?php echo $row['BookID'];?>" class = "btn btn-danger" onclick="return deletefunction()">Delete</a></td>
		          			<td> <a href="edit_book.php?id=<?php echo $row['BookID'];?>" class = "btn btn-warning">Update</a></td>
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