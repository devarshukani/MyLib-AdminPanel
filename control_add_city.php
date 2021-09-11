<?php

	session_start();
	require('config.php');
	extract($_GET);
	$sql = "INSERT INTO citydetail (CityID, CityName, Remark) VALUES (NULL, '$CityName', NULL);";

	$result = mysqli_query($conn,$sql);
	if (mysqli_errno($conn)) {
		$_SESSION['err'] = "City not added";
	}
	else{
		$_SESSION['msg'] = "City added successfully.";
	}
	header("Location: add_city.php");

?>