<?php  

	session_start();
	include 'config.php';

	$id = $_GET['id'];

	$sql = "DELETE FROM authordetail WHERE authordetail.AuthorID = $id";
	mysqli_query($conn,$sql);

	if (mysqli_errno($conn)) {
		$_SESSION['err'] = "You can not delete this author.";
	}
	
	header("Location: list_author.php");
?>