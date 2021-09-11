<?php

	session_start();
	require('config.php');
	extract($_GET);
	if (isset($Update)) {
		$sql = "UPDATE citydetail SET CityName = '$CityName' WHERE citydetail.CityID = $CityID;";

		$result = mysqli_query($conn,$sql);

		if (mysqli_errno($conn)) {
			$_SESSION['err'] = mysqli_error($conn);
		}
	}
	// header("Location: list_city.php")
	
?> 