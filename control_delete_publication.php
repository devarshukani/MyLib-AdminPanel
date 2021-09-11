<?php  

	session_start();
	include 'config.php';

	$id = $_GET['id'];

	$sql = "DELETE FROM publicationdetail WHERE publicationdetail.PublicationID = $id";
	mysqli_query($conn,$sql);

	if (mysqli_errno($conn)) {
		$_SESSION['err'] = "You can not delete this publication.";
	}
	
	header("Location: list_publication.php");
?>