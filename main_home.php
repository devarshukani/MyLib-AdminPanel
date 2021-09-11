<?php  
		  
	  include('include/header.php');
	  include('include/left_sidebar.php');
?>
<head>
	<style>
		canvas{
			border: 2px solid black;
			margin-left: 50px;
			margin-top: 50px;
		}
	</style>
</head>

	  <!-- Content Wrapper. Contains page content -->
	  <div class="content-wrapper">
	    <!-- Content Header (Page header) -->
	    <div class="content-header">
	      <div class="container-fluid">
	        <div class="row">
	          <div class="col-sm-6">
	            <h1 class="m-0 text-dark">Dashboard</h1>
	          </div><!-- /.col -->
	        </div><!-- /.row -->
	      </div><!-- /.container-fluid -->
	    </div>
	    <!-- /.content-header -->

	    <!-- Main content -->
	    <div class="content">
	      <div class="container-fluid">
	        
	      <div class="row" style="margin-top: 20px;">

	      	<div class="col-lg-1 col-6">
	      	</div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>
                	<?php
						require_once('config.php');
						$sql="SELECT * FROM bookdetail";

						if ($result=mysqli_query($conn,$sql))
						  {
							  $rowcount=mysqli_num_rows($result);
						  }
						  echo "$rowcount";
					?>
                </h3>

                <p>Books</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer"></a>
            </div>
          </div>

          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>
                	<?php
						require_once('config.php');
						$sql="SELECT * FROM userdetail";

						if ($result=mysqli_query($conn,$sql))
						  {
							  $rowcount=mysqli_num_rows($result);
						  }
						  echo "$rowcount";
					?>
                </h3>

                <p>Users</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer"></a>
            </div>
          </div>

          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>
                	<?php
						require_once('config.php');
						$sql="SELECT * FROM categorydetail";

						if ($result=mysqli_query($conn,$sql))
						  {
							  $rowcount=mysqli_num_rows($result);
						  }
						  echo "$rowcount";
					?>
                </h3>

                <p>Categories</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer"></a>
            </div>
          </div>
          <!-- ./col -->
          
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