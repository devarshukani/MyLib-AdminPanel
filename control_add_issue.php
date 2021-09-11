<?php

	session_start();
	require('config.php');
	extract($_GET);

	$query = "SELECT * FROM bookdetail WHERE BookID = $BookID;";
	$ans = mysqli_query($conn,$query);
	$data = mysqli_fetch_assoc($ans);
	$quantity = $data['BookQuantity'];
	$DueDate = date('Y-m-d',strtotime(date("Y-m-d"). ' + 15 days'));

	if ($quantity > 0) {

		$eventschedular = "SET GLOBAL event_scheduler=\"ON\"";
		mysqli_query($conn,$eventschedular);

		$EventName = "event".$UserID.$BookID;

		$query = "CREATE EVENT ".$EventName." ON SCHEDULE AT CURRENT_TIMESTAMP + INTERVAL 30 SECOND DO UPDATE userdetail SET PendingDues = PendingDues+500 WHERE userdetail.UserID = $UserID;";

		mysqli_query($conn,$query);

		if (mysqli_errno($conn)) {
			$_SESSION['err'] = "You can't issue same book twice.";
			header("Location: add_issue.php");
		}
		else{
			$sql = "INSERT INTO issuebook (IssueBookID, UserID, BookID, IssueBookDate, DueDate, Remark) VALUES (NULL, '$UserID', '$BookID', NOW(), '$DueDate', NULL);";

			mysqli_query($conn,$sql);
			if (mysqli_errno($conn)) {
				$_SESSION['err'] = "Book not issued";
				header("Location: add_issue.php");
			}
			else{
				$_SESSION['msg'] = "Book issued successfully.";
			}
 


			$sql2 = "UPDATE bookdetail SET BookQuantity = BookQuantity - 1 WHERE BookID = $BookID;";
			mysqli_query($conn,$sql2);

			if (mysqli_errno($conn)) {
			 	$_SESSION['err'] = mysqli_error($conn);
			}

			$sql3 = "UPDATE userdetail SET NumberOfIssuedBooks = NumberOfIssuedBooks + 1 WHERE UserID = $UserID;";
			mysqli_query($conn,$sql3);

			if (mysqli_errno($conn)) {
			 	$_SESSION['err'] = mysqli_error($conn);
			}
		}


		
	}
	else{
		$_SESSION['err'] = "Book is out of stock.";
	}
	header("Location: add_issue.php");


	

?>