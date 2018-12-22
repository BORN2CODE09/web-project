<?php
	session_start();
	$conn = new mysqli("localhost","root","","watch2018");
	if (mysqli_connect_errno()) {
	    printf("Соединение --: %s\n", mysqli_connect_error());
	    exit();
	}
	$addName = "";
	$addLogin = "";
	$addPass = "";
	$addNum = "";
	$addAddr = "";

	if (isset($_POST['rName'])){
		$addName = $_POST['rName'];
		if (isset($_POST['rLogin'])){
			$addLogin = $_POST['rLogin'];
		}
		if (isset($_POST['rPass'])){
			$addPass = $_POST['rPass'];
		}
		if (isset($_POST['rNum'])){
			$addNum = $_POST['rNum'];
		}
		if (isset($_POST['rAddr'])){
			$addAddr = $_POST['rAddr'];
		}

		$query = "INSERT INTO `buyers`(`login`, `password`, `address`, `phone`) VALUES ('$addLogin','$addPass','$addAddr','$addNum')";
		$result = $conn->query($query);
		$_SESSION["login"] = $addLogin;
		header("location: index.php");
		if (!$result) {
		    trigger_error('Invalid query: ' . $conn->error);
		}
	}
	
	else{
		echo '<p style="text-align: center">You are only manager! <br> You have not permission <br> for adding new managers!</p>';
	}
	mysqli_close($conn);
?>	