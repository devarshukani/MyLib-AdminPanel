<?php 
	  	require('config.php');
		$sql = "select * from citydetail";
		$result = mysqli_qurey($conn,$sql);
		while($row = mysqli_fetch_assoc($result))
		{
			echo "hello";
		}
?>