<?php

	session_start();
	require('config.php');
	extract($_GET);
	$PDate = date("Y-m-d", strtotime($PurchaseDate));
	$sql = "INSERT INTO bookdetail (BookID, BookName, AuthorID, PublicationID, CategoryID, BookPages, BookPrice, BookQuantity, PurchaseDate, RackNumber, Remark) VALUES (NULL, '$BookName', '$AuthorID', '$PublicationID', '$CategoryID', '$BookPages', '$BookPrice', '$BookQuantity', '$PDate', '$RackNumber', NULL);";

	$result = mysqli_query($conn,$sql);

	if (mysqli_errno($conn)) {
		$_SESSION['err'] = "Book not added.";
	}
	else{
		$_SESSION['msg'] = "Book Added successfully.";
	}
	
		header("Location: add_book.php");

?>