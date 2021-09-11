<?php

 
	$conn = mysqli_connect("localhost","root","","mylib");
	if (! $conn) {
		echo "error....";
		die();
	}

	$id = $_GET['id'];

	$sql = "SELECT * FROM userdetail WHERE UserName = $id;";
	$result = mysqli_query($conn,$sql);

	
	while($row = mysqli_fetch_assoc($result))
	{
		$new_data [] = array('UserID' => $row['UserID'], 'UserName' => $row['UserName'], 'Password' => $row['Password'], 'UserContactNumber' => $row['UserContactNumber'], 'UserAddress' => $row['UserAddress'], 'PendingDues' => $row['PendingDues'], 'NumberOfIssuedBooks' => $row['NumberOfIssuedBooks']);
	}

	$json_data = json_encode($new_data);

	echo "$json_data";


?>