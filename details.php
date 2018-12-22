<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />
	<title>WATCH STORE</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/style.css">
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/call.css">
	<link rel="stylesheet" href="css/details.css">
</head>
<body id="home">
	<div class="wrapper"> <!--Main wrapper-->
		<!-- <div class="popup_login">
			<div class="form_wrapper">
				<form action="autorization.php" method="post">
					<input type="text" name="mail">
					<input type="password" name="password">
					<input type="submit" value="Enter">
				</form>
				<p>Not registered yet?</p>
				<form action="registration.php" method="post">
					<input type="text" name="mail">
					<input type="password" name="password">
					<input type="submit" value="Register">
				</form>
			</div>
		</div> -->
		<header> <!--Header-->
			<a href="tel:+77759527800" id="popup__toggle" onclick="return false;"><div class="circlephone" style="transform-origin: center;"></div><div class="circle-fill" style="transform-origin: center;"></div><div class="img-circle" style="transform-origin: center;"><div class="img-circleblock" style="transform-origin: center;"></div></div></a>

			<div class="section_container">
				<nav>
					<div class="logo">
						<a href="index.html"><img src="img/miniLogo.png" alt="logo"></a>
					</div>
					<div class="mobile-nav-icon">
						<span class="">MENU</span>
					</div>

					<ul class="navigation show-mobile-nav">
						<li><a href="index.php">Home</a></li>
						<li><a href="details.html">Details</a></li>
						<li><a href="items.php?page=1">Assortment</a></li>
						<li><a href="gallery.html">Gallery</a></li>
						<li><a href="#contacts">Contacts</a></li>
						<?php
							session_start();
							//session_destroy();
							if(!isset($_SESSION["login"])){
								//header("location: add.php");
								echo '<li class="click-login">';
								echo '<a href="#autorization">Log In</a>';
								echo '<div class="dropdown-login">';
								echo '<form action="index.php" method="post">';
								echo '<input id="login" type="text" name="login" placeholder="Enter your login:" minlength="5"> <br>';
								echo '<input id="pass" type="password" name="password" placeholder="Enter your password:" minlength="6"> <br>';
								echo '<button onclick="myFunction()" style="border:2px solid green; text-align: center; width:100%; height: 25px; font-weight:bold;">Login</button>';
								echo '<p id="onError"></p>';
								echo '</form>';

								echo '<li class="clickAutor click-login">';
								echo '<a href="#autorization">Sign Up</a>';
								echo '<div class="dropdown-login">';
								echo '<form action="register.php" method="post">';
								echo '<input type="text" name="rName" placeholder="Enter your name:"> <br>';
								echo '<input type="text" name="rLogin" placeholder="Enter your login:"> <br>';
								echo '<input type="password" name="rPass" placeholder="Enter your password:"> <br>';
								echo '<input type="text" name="rNum" placeholder="Enter your phone num:"> <br>';
								echo '<input type="text" name="rAddr" placeholder="Enter your address:"> <br>';
								echo '<input type="submit" value="Register">';
								echo '</form>';
								echo '</div>';
								echo '</li>';
								$conn = new mysqli("localhost", "root","", "watch2018");
									if (mysqli_connect_errno()) {
									    printf("Соединение --: %s\n", mysqli_connect_error());
									    exit();
									}
									if(isset($_SESSION["login"])){
										//header("location: add.php");
									}

									$Name = "";
									$Pass = "";
									if (isset($_POST['login'])){
									$Name = $_POST['login'];
									if (isset($_POST['password'])){
										$Pass = $_POST['password'];
									}
									$query = "SELECT * FROM `buyers` where `login`='$Name' and `password`='$Pass' limit 1";
									$result = $conn->query($query);
									if(mysqli_num_rows($result) == 1){
										$_SESSION["login"] = $Name;
										$row = $result->fetch_assoc();
										echo '<p style="text-align: center"">Logged In!</p>';
										header("location: index.php");

									}
									else{
										echo '<p style="text-align: center"">WRONG PASSWORD <br> OR  <br> LOGIN!</p>';
									}

									if (!$result) {
									    trigger_error('Invalid query: ' . $conn->error);
									}
								}
								
								mysqli_close($conn);
								echo '</div>';
								echo '</li>';		
							}
							else{
								echo '<li class="click-login">';
								echo '<a href="admin/signOutUser.php">Sign Out</a>';
								echo '</li>';
							}
						?>
					</ul>
				</nav>
			</div>
		</header> <!--Header-->
		
		<section class="details">
			<div class="heading titleD">
				<h1>A time Store</h1>
			</div>
			<div class="equal-height">
				<div class="item">
					<img src="img/conveyor-512.png" alt="">
					<h2>MANUFACTURE</h2>
					<p>Here, the whole range of professions and production processes necessary for the design and manufacture of Hublot watches is assembled under one roof.</p>
				</div>
				<div class="item">
					<img src="img/mechanism-icon-png-5.png" alt="">
					<h2>MECHANISMS</h2>
					<p>The integration of production processes at the watch manufactory reaches the top when it becomes possible to equip the manufactured watch with its own developed watch movements.</p>
				</div>
				<div class="item">
					<img src="img/cement_icon_194146.png" alt="">
					<h2>CONCRETE</h2>
					<p>Work with materials - be it an improvement in the strength and aesthetic properties of traditional precious metal alloys or the invention of completely new composites.</p>
				</div>
			</div>
			<div class="heading">
				<h1>Materials</h1>
			</div> 	
			<div class="materials-a">
				<div class="item2">
					<img src="img/hublot-materials-aluminium.png" alt="">
					<h2>ALUMINUM</h4>
					<p>VERY SOFT METAL AND DURABILITY</p>
				</div>
				<div class="item2">
					<img src="img/hublot-materials-carbon.png" alt="">
					<h2>CARBON</h4>
					<p>EASY AS PER AND STRENGTH AS STEEL</p>
				</div>
				<div class="item2">
					<img src="img/hublot-materials-ceramic.png" alt="">
					<h2>CERAMICS</h4>
					<p>EXCELLENT HARDNESS AND DURABILITY</p>
				</div>
				<div class="item2">
					<img src="img/hublot-materials-kgold.png" alt="">
					<h2>GOLD</h4>
					<p>EXCLUSIVE RED GOLD COLOR, TRADITIONAL RED GOLD 5N.</p>
				</div>
			</div>
			<div class="wrapper-details">
				
				<div>
					<p>Pure aluminum is an extremely soft metal. In industry, aluminum alloys with copper, magnesium, zinc, manganese and titanium are used.</p>
					<p>The crust consists of about 18.5% carbon. When creating a Hublot watch from carbon, carbon fiber is produced. Then this fiber is woven and impregnated with resin; The resulting material is used for the manufacture of watch cases and some parts of the clock mechanism. The weight of carbon fiber is less than 2.6 g / cm3.</p>
				</div>
			</div>
		</section>

		
		<section id="contacts" class="contacts"> <!-- Contacts -->
			<div class="heading">
				<h1>Contacts</h1>
			</div> 		
			<div class="section_container">
				<form action="action.php">
					<p>Enter Yor Name</p>
					<input type="text">
					<p>Enter Yor Email</p>
					<input type="text">
					<p>Add Your Message</p>
					<textarea></textarea>
					<button class="btn btn_default btn_yellow btn_block">Submit</button>
				</form>
			</div>
		</section> <!-- Contacts -->
		
		<section class="footer"> <!-- Footer -->
			<div class="section_container">

				<div class="footer_left_side">
					<h4>Follow Us</h4>
					<ul class="footer_social">
						<li>
							<a href="#"><i class="fa fa-instagram"></i></a>
						</li>
						<li>
							<a href="#"><i class="fa fa-vk"></i></a>
						</li>
						<li>
							<a href="#"><i class="fa fa-facebook"></i></a>
						</li>
						<li>
							<a href="#"><i class="fa fa-twitter"></i></a>
						</li>																		
					</ul>
				</div>			
				<div class="footer_right_side">
					<ul class="footer_nav">
						<li><a href="#">Contact Us</a></li>
						<li><a href="#">ADS</a></li>
					</ul>
					<p>Web project 2018</p>
				</div> 
			</div>
		</section> <!-- Footer -->

	</div>
	<script src="js/jquery-2.1.4.min.js"></script>
	<script src="js/jquery.fitvids.js"></script>
	<script src="js/main.js"></script>
	<script src="js/autoriz.js"></script>

</body>
</html>