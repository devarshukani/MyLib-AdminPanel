<?php 
	//issue kreli books
	$conn = mysqli_connect("localhost","root","","mylib");
	if (! $conn) {
		echo "error....";
		die();
	}

	$id = $_GET['id'];

	$sql = "SELECT * FROM issuebook ib,userdetail cd, bookdetail bd WHERE cd.UserName = $id AND ib.UserID = cd.UserID AND ib.BookID = bd.BookID";
	$result = mysqli_query($conn,$sql);


	if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result))
		{
			$new_data [] = array('ans' => "1", 'BookName' => $row['BookName'], 'DueDate' => $row['DueDate'], 'IssueBookDate' => $row['IssueBookDate'], 'UserID' => $row['UserID'], 'BookID' => $row['BookID'], 'IssueBookID' => $row['IssueBookID']);
		}

	}
	else{
		$new_data [] = array('ans' => "0");
	}
		
	$json_data = json_encode($new_data);

	echo "$json_data";



?>