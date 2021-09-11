<?php

	session_start();
	require('config.php');
	extract($_GET);
	if (isset($Update)) {
		$sql = "UPDATE publicationdetail SET PublicationName = '$PublicationName', PublicationAddress = '$PublicationAddress', PublicationContactNumber = '$PublicationContactNumber', CityID = '$CityID' WHERE publicationdetail.PublicationID = $PublicationID;";

		$result = mysqli_query($conn,$sql);

		if (mysqli_errno($conn)) {
			$_SESSION['err'] = mysqli_error($conn);
		}
	}
	header("Location: list_publication.php");

?>