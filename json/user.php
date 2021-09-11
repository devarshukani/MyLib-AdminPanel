<?php 
	$conn = mysqli_connect("localhost","root","","mylib");
	if (! $conn) {
		echo "error....";
		die();
	}

	$uid = $_GET['id'];
	$pas = $_GET['pas'];


	$temp = 1;

	$sql = "SELECT * FROM userdetail ud, citydetail cd WHERE ud.CityID = cd.CityID";

	$result = mysqli_query($conn, $sql);

	while($row = mysqli_fetch_assoc($result))
	{
		if($uid == $row['UserName'] && $pas == $row['Password']){
			$response[]= array('value' => "1");
			$response[]= array('id' => $row['UserID']);
			$temp ++;
			break;
		}
	}
	if ($temp == 1) {
		$response[]= array('value' => 0);
	}

	$json_data = json_encode($response);

	echo "$json_data";


?>