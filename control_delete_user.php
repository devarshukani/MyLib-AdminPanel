<?php  

	session_start();
	include 'config.php';

	$id = $_GET['id'];

	$sql = "DELETE FROM userdetail WHERE userdetail.UserID = $id";
	mysqli_query($conn,$sql);

	if (mysqli_errno($conn)) {
		$_SESSION['err'] = "You can not delete this user.";
	}
	
	header("Location: list_user.php");
?>