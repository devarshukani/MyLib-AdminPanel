<?php 
	$conn = mysqli_connect("localhost","root","","mylib");
	if (! $conn) {
		echo "error....";
		die();
	}


	$sql = "select * from categorydetail";
	$result = mysqli_query($conn,$sql);

	

	while($row = mysqli_fetch_assoc($result))
	{
		$new_data [] = array('CategoryID' => $row['CategoryID'], 'CategoryName' => $row['CategoryName'], 'Remark' => $row['Remark'] );
	}

	$json_data = json_encode($new_data);

	echo "$json_data";
	


?>