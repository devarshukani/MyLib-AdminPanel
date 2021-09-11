<?php

	session_start();
	require('config.php');
	extract($_GET);
	if (isset($Update)) {
		$sql = "UPDATE authordetail SET AuthorName = '$AuthorName', AuthorContactNumber = '$AuthorContactNumber', AuthorAddress = '$AuthorAddress', CityID = '$CityID' WHERE authordetail.AuthorID = $AuthorID;";

		$result = mysqli_query($conn,$sql);

		if (mysqli_errno($conn)) {
			$_SESSION['err'] = mysqli_error($conn);
		}
	}

	header("Location: list_author.php");
	

?>