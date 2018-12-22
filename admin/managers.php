<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />
	<title>WATCH STORE</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="../css/reset.css">
	<link rel="stylesheet" href="../css/style.css">
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="../css/call.css">
	<link rel="stylesheet" href="../css/admin.css">
</head>
<body id="home">
	<div class="wrapper"> 
		<header> <!--Header-->
			<a href="tel:+77759527800" id="popup__toggle" onclick="return false;"><div class="circlephone" style="transform-origin: center;"></div><div class="circle-fill" style="transform-origin: center;"></div><div class="img-circle" style="transform-origin: center;"><div class="img-circleblock" style="transform-origin: center;"></div></div></a>

			<div class="section_container">
				<nav>
					<div class="logo">
						<a href="index.html"><img src="../img/miniLogo.png" alt="logo"></a>
					</div>
					<div class="mobile-nav-icon">
						<span class="">MENU</span>
					</div>

					<ul class="navigation show-mobile-nav">
						<li><a href="add.php">Add Watch</a></li>
						<li><a href="delete.php">Delete Watch</a></li>
						<li><a href="managers.php">Managers</a></li>
						<li><a href="blackFriday.php">Black Friday</a></li>
						<li><a href="signOut.php">Sign Out</a></li>
					</ul>
				</nav>
			</div>
		</header> <!--Header-->
		
		<section>
			<div class="crud-wrapper mt">
				<div class="add-admin crud">
					<h3>Add new manager</h3>
					<form action="managers.php" method="POST">
						<input type="text" name="login" placeholder="Login:"> <br>
						<input type="password" name="password" placeholder="Password:"> <br>
						<input type="text" name="privilege" placeholder="Privilege:">
						<button type="submit">Add</button>
						<?php
						    session_start();
							$conn = new mysqli("localhost","root","","watch2018");
							if (mysqli_connect_errno()) {
							    printf("Соединение --: %s\n", mysqli_connect_error());
							    exit();
							}
							$addName = "";
							$addPass = "";
							$addPriv = "";

							if ($_SESSION["priv"] == "5") {
								if (isset($_POST['login'])){
									$addName = $_POST['login'];
									if (isset($_POST['password'])){
										$addPass = $_POST['password'];
									}
									if (isset($_POST['privilege'])){
										$addPriv = $_POST['privilege'];
									}
									
									$query = "INSERT INTO `managers` (`login`, `password`, `accessibility`) VALUES ('$addName','$addPass','$addPriv')";
									$result = $conn->query($query);
									
									if (!$result) {
									    trigger_error('Invalid query: ' . $conn->error);
									}
								}
							}
							else{
								echo '<p style="text-align: center">You are only manager! <br> You have not permission <br> for adding new managers!</p>';
							}
							mysqli_close($conn);
						 ?>	
					</form>
				</div>
			</div>
		</section>

	</div>
	<script src="../js/jquery-2.1.4.min.js"></script>
	<script src="../js/jquery.fitvids.js"></script>
	<script src="../js/main.js"></script>
	<script src="../js/autoriz.js"></script>

</body>
</html>