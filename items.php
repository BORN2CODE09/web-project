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
	<link rel="stylesheet" href="css/paginationStyle.css">
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
						<li><a href="index.html">Home</a></li>
						<li><a href="details.html">Details</a></li>
						<li><a href="items.html">Assortment</a></li>
						<li><a href="gallery.html">Gallery</a></li>
						<li><a href="#contacts">Contacts</a></li>
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
		

		<section id="features" class="features"> 
			<div class="heading" style="margin-top: 75px; font-family: 'Kaushan Script';">
				<h2>Watches</h1>
			</div>
			<div style="display: flex; justify-content: space-around;">
				<div class="styled-select yellow rounded margin-sel" style="margin-right: 6px;">
				  <select>
				  	<option>All brands</option>
				    <option>Casio</option>
				    <option>Hublot</option>
				    <option>Tissot</option>
				  </select>
				</div>
				<div class="styled-select yellow rounded margin-sel">
				  <select>
				  	<option>All types</option>
				    <option>Sport</option>
				    <option>Daily</option>
				    <option>Classic</option>
				  </select>
				</div>
			</div>
			<div class="search" style="display: flex; margin-bottom: 15px;">
				<form action="zxc">
					<input type="text" placeholder="Find by Brand" style="border-radius: 10px; padding: 6px;">
					<button type="submit" style="background-color: #eec111; padding: 8px; border-radius: 20px;">Search</button>
				</form>
			</div>
			
			<div class="section_container all-cent">
				<ul>
					<?php
						$conn = new mysqli("localhost","root","","watch2018");
						if (mysqli_connect_errno()) {
						    printf("Соединение --: %s\n", mysqli_connect_error());
						    exit();
						}
						
						$page = $_GET["page"];
						if($page == "" || $page == "1"){
							$page1 = 0;
						}
						else{
							$page1 = ($page*8)-8;
						}
						$query = "SELECT * FROM `watches-list` limit $page1,8";
						$result = $conn->query($query);
						if (!$result) {
						    trigger_error('Invalid query: ' . $conn->error);
						}
						if ($result->num_rows > 0){
							$cnt = 0;
							while($row = $result->fetch_assoc()){
								$cnt = $cnt + 1;
								echo "<li>";
								echo "<i>";
								echo '<img src="'. $row["img"]. '" alt="">';
								echo "</i>";
								echo "<h5>". $row["name"] ."</h5>";
								echo "<p>". $row["descr"] . "</p>";
								echo "</li>";
								if($cnt == 4){
									echo "</ul>";
									echo "</div>";
									echo '<div class="section_container all-cent mt-all">';
									echo "<ul>";
									$cnt = 0;
								}
							}	
							mysqli_free_result($result);
						}
						mysqli_close($conn);
					 ?>			
				</ul>
			</div>
		</section> 

		<div class="pagination-page">
			<ul class="pagination modal-4">
			  <?php
			    $conn = new mysqli("localhost","root","","watch2018");
				if (mysqli_connect_errno()) {
				    printf("Соединение --: %s\n", mysqli_connect_error());
				    exit();
				}
				$query = "SELECT * FROM `watches-list`";
				$result = $conn->query($query);
				if (!$result) {
				    trigger_error('Invalid query: ' . $conn->error);
				}
			  	$cou = mysqli_num_rows($result);
			  	$a = $cou/8;
			  	$a = ceil($a);
			  	for ($i=1; $i<=$a; $i++){
			  		?> <a href="items.php?page=<?php echo $i;?>"><?php echo $i?></a><?php
			  	}
			  ?>
			</ul>
		</div>

		
		<section id="contacts" class="contacts"> 
			<div class="heading">
				<h1>Contacts</h1>
			</div> 		
			<div class="section_container">
				<form action="login.php">
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