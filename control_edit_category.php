<?php

	session_start();
	require('config.php');
	extract($_GET);

	if (isset($Update)) {
		$sql = "UPDATE categorydetail SET CategoryName = '$CategoryName' WHERE categorydetail.CategoryID = $CategoryID;";

		$result = mysqli_query($conn,$sql);

		if (mysqli_errno($conn)) {
			$_SESSION['err'] = mysqli_error($conn);
		}
	}
	header("Location: list_category.php");


?>