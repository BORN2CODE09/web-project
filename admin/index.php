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
						<a href="../index.html"><img src="../img/miniLogo.png" alt="logo"></a>
					</div>
					<div class="mobile-nav-icon">
						<span class="">MENU</span>
					</div>

					<ul class="navigation show-mobile-nav">
						<li><a href="index.php">Add Watch</a></li>
						<li><a href="index.php">Delete Watch</a></li>
						<li><a href="index.php">Managers</a></li>
						<li><a href="index.php">Black Friday</a></li>
					</ul>
				</nav>
			</div>
		</header> <!--Header-->
		
		<section>
			<div class="crud-wrapper mt">
				<div class="add crud">
					<h3>Enter to Admin panel</h3>
					<form action="index.php" method="POST">
						<input type="text" name="login" placeholder="Login:"> <br>
						<input type="password" name="password" placeholder="Password:"> <br>
						<button type="submit">Login</button>
						<?php
							session_start(); 
							$conn = new mysqli("localhost", "root","", "watch2018");
							if (mysqli_connect_errno()) {
							    printf("Соединение --: %s\n", mysqli_connect_error());
							    exit();
							}
							if(isset($_SESSION["login"])){
								header("location: add.php");
							}

							$Name = "";
							$Pass = "";

							if (isset($_POST['login'])){
								$Name = $_POST['login'];
								if (isset($_POST['password'])){
									$Pass = $_POST['password'];
								}
								$query = "SELECT * FROM `managers` where `login`='$Name' and `password`='$Pass' limit 1";
								$result = $conn->query($query);
								if(mysqli_num_rows($result) == 1){
									$_SESSION["login"] = $Name;
									$row = $result->fetch_assoc();
									$_SESSION["priv"] = $row["accessibility"];
									echo '<p style="text-align: center"">Logged In!</p>';
									header("location: add.php");

								}
								else{
									echo '<p style="text-align: center"">WRONG PASSWORD <br> OR  <br> LOGIN!</p>';
								}

								if (!$result) {
								    trigger_error('Invalid query: ' . $conn->error);
								}
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