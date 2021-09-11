<?php  

	session_start();
	include 'config.php';

	$id = $_GET['id'];

	$sql = "DELETE FROM bookdetail WHERE bookdetail.BookID = $id";
	mysqli_query($conn,$sql);

	if (mysqli_errno($conn)) {
		$_SESSION['err'] = "You can not delete this Book.";
	}
	
	header("Location: list_book.php");
?>