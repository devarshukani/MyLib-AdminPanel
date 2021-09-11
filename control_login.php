<?php  

	session_start();
	$u = $_POST['Username'];
	$p = $_POST['Password'];

	if ($u == "admin" && $p == "admin") {
		$_SESSION['un'] = $u;
		header('Location: main_home.php');
	}
	else{
		$_SESSION['err'] = "Wrong password.....";
		header('Location: login.php');
	}

?>