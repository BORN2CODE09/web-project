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
						<li class="click-login">
							<a href="#autorization">Log In</a>
							<div class="dropdown-login">
								<form action="">
									<input type="text" placeholder="Enter your login"> <br>
									<input type="password" placeholder="Enter your password"> <br>
									<input type="submit" value="Login">
								</form>
							</div>
						</li>
						<li class="clickAutor"><a href="#autorization">Sign Up</a></li>
					</ul>
				</nav>
			</div>
		</header> <!--Header-->
		
		<section>
			<div class="crud-wrapper mt">
				<div class="add crud">
					<h3>Add new watch</h3>
					<form action="add.php" method="post">
						<input type="text" name="name" placeholder="Watch name:"> <br>
						<input type="text" name="brand" placeholder="Brand:"> <br>
						<input type="text" name="category" placeholder="Category:"> <br>
						<input type="text" name="image" placeholder="Image SRC:" title="Image"> <br>
						<input type="text" name="descr" placeholder="Description:">
						<button type="submit">Add</button>
						<?php
							$conn = new mysqli("localhost","root","","watch2018");
							if (mysqli_connect_errno()) {
							    printf("Соединение --: %s\n", mysqli_connect_error());
							    exit();
							}
							$addName = "";
							$addBrand = "";
							$addCategory = "";
							$addImage = "";
							$addDescr = "";

							if (isset($_POST['name'])){
								$addName = $_POST['name'];	
							}
							if (isset($_POST['brand'])){
								$addBrand = $_POST['brand'];
							}
							if (isset($_POST['category'])){
								$addCategory = $_POST['category'];
							}
							if (isset($_POST['image'])){
								$addImage = $_POST['image'];
							}
							if (isset($_POST['descr'])){
								$addDescr = $_POST['descr'];
							}

							$query = "INSERT INTO `watches-list`(`name`, `brand`, `category`, `img`, `descr`) VALUES ('$addName','$addBrand','$addCategory','$addImage','$addDescr')";
							$result = $conn->query($query);
							
							if (!$result) {
							    trigger_error('Invalid query: ' . $conn->error);
							}
							mysqli_close($conn);
						 ?>		
					</form>
				</div>
			</div>
		</section>



		
		

	</div>
	<script src="js/jquery-2.1.4.min.js"></script>
	<script src="js/jquery.fitvids.js"></script>
	<script src="js/main.js"></script>
	<script src="js/autoriz.js"></script>

</body>
</html>