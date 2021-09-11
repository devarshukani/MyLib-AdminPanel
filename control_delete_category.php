<?php  

	session_start();
	include 'config.php';

	$id = $_GET['id'];

	$sql = "DELETE FROM categorydetail WHERE categorydetail.CategoryID = $id";
	mysqli_query($conn,$sql);

	if (mysqli_errno($conn)) {
		$_SESSION['err'] = "You can not delete this Category.";
	}
	
	header("Location: list_category.php");
?>