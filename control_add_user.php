<?php

	session_start();
	require('config.php');
	extract($_GET);
	$sql = "INSERT INTO userdetail (UserID, UserName, Password, UserContactNumber, UserAddress, PendingDues, NumberOfIssuedBooks, CityID, Remark) VALUES (NULL, '$UserName', '$Password', '$UserContactNumber', '$UserAddress', '0', '0', '$CityID', NULL);";

	$result = mysqli_query($conn,$sql);

	if (mysqli_errno($conn)) {
		$_SESSION['err'] = "User not added";
	}
	else{
		$_SESSION['msg'] = "User added successfully.";
	}
		
	header("Location: add_user.php");

?>