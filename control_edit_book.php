<?php

	session_start();
	require('config.php');
	extract($_GET);
	if (isset($Update)) {
		$PDate = date("Y-m-d", strtotime($PurchaseDate));
		$sql = "UPDATE bookdetail SET BookName = '$BookName', AuthorID = '$AuthorID', PublicationID = '$PublicationID', CategoryID = '$CategoryID', BookPages = '$BookPages', BookPrice = '$BookPrice', BookQuantity = '$BookQuantity', PurchaseDate = '$PDate', RackNumber = '$RackNumber' WHERE bookdetail.BookID = $BookID;";

		$result = mysqli_query($conn,$sql);
		if (mysqli_errno($conn)) {
			$_SESSION['err'] = mysqli_error($conn);
		}
	}
	header("Location: list_book.php");


?>