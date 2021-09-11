<?php 
	$conn = mysqli_connect("localhost","root","","mylib");
	if (! $conn) {
		echo "error....";
		die();
	}

	$sql = "SELECT * FROM bookdetail bd, authordetail ad, publicationdetail pd, categorydetail cd WHERE bd.AuthorID = ad.AuthorID AND bd.PublicationID = pd.PublicationID AND bd.CategoryID = cd.CategoryID;";
	$result = mysqli_query($conn,$sql);

	
	while($row = mysqli_fetch_assoc($result))
	{
		$new_data [] = array('BookID' => $row['BookID'], 'BookName' => $row['BookName'], 'AuthorName' => $row['AuthorName'], 'PublicationName' => $row['PublicationName'], 'CategoryName' => $row['CategoryName'], 'BookPages' => $row['BookPages'], 'BookPrice' => $row['BookPrice'], 'BookQuantity' => $row['BookQuantity'], 'PurchaseDate' => $row['PurchaseDate'], 'RackNumber' => $row['RackNumber'], 'Remark' => $row['Remark']);
	}

	$json_data = json_encode($new_data);

	echo "$json_data";


?>