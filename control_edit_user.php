<?php

	session_start();
	require('config.php');
	extract($_GET);
	if (isset($Update)) {
		$sql = "UPDATE userdetail SET UserName = '$UserName', Password = '$Password', UserContactNumber = '$UserContactNumber', UserAddress = '$UserAddress', PendingDues = '$PendingDues', NumberOfIssuedBooks = '$NumberOfIssuedBooks', CityID = '$CityID' WHERE userdetail.UserID = $UserID;";

		$result = mysqli_query($conn,$sql);

		if (mysqli_errno($conn)) {
			$_SESSION['err'] = mysqli_error($conn);
		}
	}
	header("Location: list_user.php");

?>