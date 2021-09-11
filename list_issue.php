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
	            <h1 class="m-0 text-dark">Issued Book</h1>
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
		          			<td>User Name</td>
		          			<td>Book Name</td>
		          			<td>Issued Date</td>
		          			<td>Due Date</td>
		          			<td >Return</td>
		          			<td >Renew</td>
		          		</tr>
		          		<?php  
		          			require('config.php');
		          			$sql = "SELECT * FROM issuebook ib, bookdetail bd, userdetail ud WHERE ib.BookID = bd.BookID AND ib.UserID = ud.UserID;";
		          			$result = mysqli_query($conn,$sql);
		          			while($row = mysqli_fetch_assoc($result))
		          			{
		          		?>
		          		<tr>
		          			<td><?php echo $row['IssueBookID']; ?></td>
		          			<td><?php echo $row['UserName']; ?></td>
		          			<td><?php echo $row['BookName']; ?></td>
		          			<td><?php echo $row['IssueBookDate']; ?></td>
		          			<td><?php echo $row['DueDate']; ?></td>
		          			<td> <a href="control_delete_issue.php?id=<?php echo $row['IssueBookID'];?>&BookID=<?php echo $row['BookID']; ?>&UserID=<?php echo $row['UserID']; ?>" class="btn btn-danger" onclick="return deletefunction()">Return</a></td>
		          			<td> <a href="control_edit_issue.php?id=<?php echo $row['IssueBookID'];?>&BookID=<?php echo $row['BookID']; ?>&UserID=<?php echo $row['UserID']; ?>" class="btn btn-warning" onclick="return editfunction()">Renew</a></td>				
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
		var a = confirm("Are You sure want to return?");
		return a;
	}
</script>

<script type="text/javascript">
	function editfunction(){
		var a = confirm("Are You sure want to renew?");
		return a;
	}
</script>