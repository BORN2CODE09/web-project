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
	<link rel="stylesheet" href="css/login.css">
</head>
<body id="home">
	<div class="wrapper"> <!--Main wrapper-->
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
						<li><a href="index.html">Home</a></li>
						<li><a href="details.html">Details</a></li>
						<li><a href="items.php?page=1">Assortment</a></li>
						<li><a href="gallery.html">Gallery</a></li>
						<li><a href="#contacts">Contacts</a></li>
						<?php
							session_start();
							if(!isset($_SESSION["login"])){
								//header("location: add.php");
								echo '<li class="click-login">';
								echo '<a href="#autorization">Log In</a>';
								echo '<div class="dropdown-login">';
								echo '<form action="index.php" method="post">';
								echo '<input id="login" type="text" name="login" placeholder="Enter your login:" minlength="5"> <br>';
								echo '<input id="pass" type="password" name="password" placeholder="Enter your password:" minlength="6"> <br>';
								echo '<button onclick="myFunction()">Login</button>';
								echo '<p id="onError"></p>';
								echo '</form>';
								<?php 
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
								?>
									
							}
							else{
								echo "string";
							}
						?>

						<li class="click-login">
							<a href="#autorization">Log In</a>
							<div class="dropdown-login">
								<form action="index.php" method="post">
									<input id="login" type="text" name="login" placeholder="Enter your login:" minlength="5"> <br>
									<input id="pass" type="password" name="password" placeholder="Enter your password:" minlength="6"> <br>
									<button onclick="myFunction()">Login</button>
									<p id="onError"></p>
								</form>
								
							</div>
						</li>
						<li class="clickAutor click-login">
							<a href="#autorization">Sign Up</a>
							<div class="dropdown-login">
								<form action="">
									<input type="text" placeholder="Enter your name:"> <br>
									<input type="text" placeholder="Enter your login:"> <br>
									<input type="password" placeholder="Enter your password:"> <br>
									<input type="password" placeholder="Enter your phone num:"> <br>
									<input type="password" placeholder="Enter your address:"> <br>
									<input type="submit" value="Register">
								</form>
							</div>
						</li>
					</ul>
				</nav>
			</div>
		</header> <!--Header-->

		<section class="header"> <!--Welcome-->
			<div class="section_container">
				<div class="left_side">
					<h1>SALE 50% OFF</h1>
					<h3>Tissot and Hublot Watches</h3>
					<span>100% Original watch.</span>

					<div class="t_watch_options">
						<div class="color_box">
							<span class="sub_title">Color</span>
							<ul class="tabs_nav" data-tab-name="Tab1">
								<li class="tab_btn c_white" data-title="tab4"></li>
								<li class="tab_btn c_black" data-title="tab1"></li>
								<li class="tab_btn c_grey" data-title="tab2"></li>
								<li class="tab_btn c_orange active" data-title="tab3"></li>
							</ul>
						</div>
						<div class="quantity">
							<span class="sub_title">Quantity</span>
							<input type="text" placeholder="0">
						</div>
						<div class="size_box">
							<span class="sub_title">Size</span>
							<ul>
								<li class="size">52 mm</li>
								<li class="size">48 mm</li>
								<li class="size active">45 mm</li>
								<li class="size">42 mm</li>
								<li class="size">40 mm</li>
								<li class="size">38 mm</li>	
							</ul>
						</div>
					</div>

					<div class="btn_container">
						<a href="#" class="btn btn_default btn_orange btn_shadow">$220 Buy Now</a>
					</div>
					<p class="small">You will receive your delivery within 5 working days.</p>
				</div>
				<div class="right_side">
					<ul class="tabs_content" data-tab-name="Tab1">
						<li class="tab_content" data-title="tab1"><img src="img/MainBig3.png" alt=""></li>
						<li class="tab_content" data-title="tab2"><img src="img/MainBig2.png" alt=""></li>
						<li class="tab_content" data-title="tab3"><img src="img/MainBig.png" alt=""></li>
						<li class="tab_content" data-title="tab4"><img src="img/MainBig4.png" alt=""></li>
					</ul>				
				</div>
			</div>
		</section> <!--Welcome-->

		<section id="features" class="features"> <!-- Features -->
			<div class="heading">
				<h1>Features</h1>
			</div>
			<div class="section_container">
				<ul>
					<li>
						<i class="fa fa-clock-o"></i>
						<h5>The Watches</h5>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.Provident ipsa pariatur. Corporis rem aliquam minima!</p>
					</li>
					<li>
						<i class="far fa-sun"></i>
						<h5>For Daily Life</h5>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.Provident ipsa pariatur. Corporis rem aliquam minima!</p>
					</li>
					<li>
						<i class="fa fa-gift"></i>
						<h5>Sales & Gifts</h5>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.Provident ipsa pariatur. Corporis rem aliquam minima!.</p>
					</li>
					<li>
						<i class="fa fa-object-group"></i>
						<h5>Large Assortment</h5>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.Provident ipsa pariatur. Corporis rem aliquam minima!</p>
					</li>										
				</ul>
			</div>
		</section> <!-- Features -->

		<section id="info" class="features_02"> <!-- Info -->
			<div class="heading">
				<h1>Info</h1>
			</div>		
			<div class="section_container">
				<ul>
					<li>
						<h5>All-inclusive Pricing 
							<span>Learn <a href="#">How Pricing Works</a></span>
						</h5>
						<ul>
							<li><i class="fa fa-lemon-o"></i> No hidden fees</li>	
							<li><i class="fa fa-lemon-o"></i> No setup charges</li>
							<li><i class="fa fa-lemon-o"></i> Free artist review</li>
						</ul>
						<a href="#" class="btn btn_small btn_orange">Learn More</a>
					</li>
					<li>
						<h5>Free Shipping
							<span>Order Watch Today...</span>
						</h5>
						<ul>
							<li><i class="fa fa-lemon-o"></i> Almaty Free 2-week Delivery</li>	
							<li><i class="fa fa-lemon-o"></i> Karaganda Free 1-week Delivery</li>
							<li><i class="fa fa-lemon-o"></i> Astana Super Delivery 3 days</li>
						</ul>
						<a href="#" class="btn btn_small btn_orange">Learn More</a>
					</li>
					<li>
						<h5>Free Shipping
							<span>Order Watch Today...</span>
						</h5>
						<ul>
							<li><i class="fa fa-lemon-o"></i> No hidden fees</li>	
							<li><i class="fa fa-lemon-o"></i> No setup charges</li>
							<li><i class="fa fa-lemon-o"></i> Free artist review</li>
						</ul>
						<a href="#" class="btn btn_small btn_orange">Learn More</a>
					</li>										
				</ul>
				<div class="img_box"><img src="img/menWatch.jpg" alt=""></div>
			</div>
		</section> <!-- Info -->
		
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
	<script src="js/loginChecker.js"></script>
</body>
</html>