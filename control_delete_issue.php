<?php  

	session_start();
	include 'config.php';

	$id = $_GET['id'];
	$BookID = $_GET['BookID'];
	$UserID = $_GET['UserID'];

	$eventname = "event".$UserID.$BookID;
	$query = "DROP EVENT ".$eventname;
	mysqli_query($conn,$query);
	
	

	$sql = "DELETE FROM issuebook WHERE issuebook.IssueBookID = $id";
	mysqli_query($conn,$sql);

	if (mysqli_errno($conn)) {
		$_SESSION['err'] = "You can not return book .";
	header("Location: list_issue.php");
	}

	$sql2 = "UPDATE bookdetail SET BookQuantity = BookQuantity + 1 WHERE BookID = $BookID;";
	mysqli_query($conn,$sql2);

	if (mysqli_errno($conn)) {
	 	$_SESSION['err'] = mysqli_error($conn);
	}

	$sql3 = "UPDATE userdetail SET NumberOfIssuedBooks = NumberOfIssuedBooks - 1 WHERE UserID = $UserID;";
	mysqli_query($conn,$sql3);

	if (mysqli_errno($conn)) {
	 	$_SESSION['err'] = mysqli_error($conn);
	}


	header("Location: list_issue.php");
?>