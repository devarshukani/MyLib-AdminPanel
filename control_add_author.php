<?php

	session_start();
	require('config.php');
	extract($_GET);
	$sql = "INSERT INTO authordetail (AuthorID, AuthorName, AuthorContactNumber, AuthorAddress, CityID, Remark) VALUES (NULL, '$AuthorName', '$AuthorContactNumber', '$AuthorAddress', '$CityID', NULL);";

	$result = mysqli_query($conn,$sql);

	if (mysqli_errno($conn)) {
		$_SESSION['err'] = "Author not added";
	}
	else{
		$_SESSION['msg'] = "Author added successfully.";
	}
	header("Location: add_author.php");

?>