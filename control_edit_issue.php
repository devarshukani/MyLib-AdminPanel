<?php

	session_start();
	require('config.php');
	extract($_GET);
	$IssueBookID = $id;

	$DDate = date('Y-m-d',strtotime(date("Y-m-d"). ' + 15 days'));

	$eventname = "event".$UserID.$BookID;
	$query = "DROP EVENT ".$eventname;
	mysqli_query($conn,$query);

	$EventName = "event".$UserID.$BookID;

	$query = "CREATE EVENT ".$EventName." ON SCHEDULE AT CURRENT_TIMESTAMP + INTERVAL 15 DAY DO UPDATE userdetail SET PendingDues = PendingDues+500 WHERE userdetail.UserID = $UserID;";

	mysqli_query($conn,$query);
		
	$sql = "UPDATE issuebook SET IssueBookDate = NOW(), DueDate = '$DDate' WHERE issuebook.IssueBookID = '$IssueBookID';";

	$result = mysqli_query($conn,$sql);
	if (mysqli_errno($conn)) {
		$_SESSION['err'] = "Book not issued";
		header("Location: add_issue.php");
	}
	else{
		$_SESSION['msg'] = "Book issued successfully.";
	}

		
	header("Location: list_issue.php");

?>