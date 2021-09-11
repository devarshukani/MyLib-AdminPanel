<?php

	session_start();
	require('config.php');
	extract($_GET);
	$sql = "INSERT INTO publicationdetail (PublicationID, PublicationName, PublicationAddress, PublicationContactNumber, CityID, Remark) VALUES (NULL, '$PublicationName', '$PublicationAddress', '$PublicationContactNumber', '$CityID', NULL);";

	$result = mysqli_query($conn,$sql);
	if (mysqli_errno($conn)) {
		$_SESSION['err'] = "Publication not added";
	}
	else{
		$_SESSION['msg'] = "Publication added successfully.";
	}
		header("Location: add_publication.php");

?>