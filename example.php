<?php
	require('config.php');
	$sql = "SELECT * FROM authordetail ad, citydetail cd WHERE ad.CityID = cd.CityID;";
	$result = mysqli_query($conn,$sql);
	class a {}
	$myObj = new a;
	while($row = mysqli_fetch_assoc($result))
	{
		$myObj->AuthorID  = $row['AuthorID'];
		$myObj->AuthorName = $row['AuthorName'];
		$myObj->AuthorContactNumber = $row['AuthorContactNumber'];
		$myObj->AuthorAddress = $row['AuthorAddress'];
		$myObj->CityID  = $row['CityID'];
		$myObj->Remark = $row['Remark'];
		$AuthorJSON = json_encode($myObj);
		echo $AuthorJSON;
	}
?>