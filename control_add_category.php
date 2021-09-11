<?php

	session_start();
	require('config.php');
	extract($_GET);
	$sql = "INSERT INTO categorydetail (CategoryID, CategoryName, Remark) VALUES (NULL, '$CategoryName', '');";

	$result = mysqli_query($conn,$sql);
	if (mysqli_errno($conn)) {
		$_SESSION['err'] = "Category Not added";
	}
	else{
		$_SESSION['msg'] = "Category added successfully.";
	}
		header("Location: add_category.php");

?>