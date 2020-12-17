<?php

session_start();

if (isset($_GET['logout'])) {
	session_destroy();
    unset($_SESSION['username']);
    unset($_SESSION['id']);
    header("location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Shifer</title>
	<link rel="shortcut icon" href="img/favicon.png" type="image/png">
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Anton" rel="stylesheet">  	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
	<style>
</style>
</head>
<body>
	<!-- Top navigation -->
	<header>

		<div class="top_line">
			<div><a href="index.php" target="blanck" class="logo"><img src="img/logo.png" alt="logo" title="go home"></a></div>
		</div>
		<p id="day"></p>
		<div class="reg_auth">
            <?php if(!isset($_SESSION['id'])){ ?>
			<a href="login.php"><div class="btn">Login</div></a>
			<a href="reg.php"><div class="btn">Signup</div></a>
            <?php } ?>
            <?php if(isset($_SESSION['id'])){ ?>
                <div>
                    <a href="myprofile.php" class="logged"><i class="fa fa-user-circle-o" aria-hidden="true"></i><?php echo $_SESSION['username']; ?></a>
                    <a href="index.php?logout" class="logged"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a>
                    <a href="cart.php" class="logged"><i class="fa fa-shopping-cart" aria-hidden="true"></i>Shopping cart</a>
                </div>
            <?php } ?>
		</div>

		<nav>
			<div class="topnav">
				<a href="index.php">HOME</a>
				<a href="about.php">About Us</a>
				<a href="products.php">Products</a>
				<a href="contacts.php">Contacts</a>
				<a href="news.php">News</a>
			</div>
		</nav>

	</header>

	<!-- Highlighted headings -->
	<h1 class="header">THE BEST PRODUCER OF SLATE IN KAZAKHSTAN</h1>
	<div class="our">
		<div><h1 class="inour">Our products</h1></div>
	</div>

	<!-- Carousel on bootstrap -->
	<div class="carousel">
		<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="2000">
		  <ol class="carousel-indicators">
		    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
		    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
		    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
		  </ol>
		  <div class="carousel-inner">
		    <div class="carousel-item active">
		      <img class="d-block w-100" src="img/8red.jpg" alt="First slide" width="100%" title="8 wave red">
		    </div>
		    <div class="carousel-item">
		      <img class="d-block w-100" src="img/7classic.jpg" alt="Second slide" width="100%" title="7 wave classic">
		    </div>
		    <div class="carousel-item">
		      <img class="d-block w-100" src="img/6choco.jpg" alt="Third slide" width="100%" title="6 wave choco">
		    </div>
		  </div>
		  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
		    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
		    <span class="sr-only">Previous</span>
		  </a>
		  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
		    <span class="carousel-control-next-icon" aria-hidden="true"></span>
		    <span class="sr-only">Next</span>
		  </a>
		</div>
	</div>

	<!-- Highlighted heading -->
	<div class="mis">
		<div><h1 class="inour">Mission and values</h1></div>
	</div>

	<div class="body">
		<h3>Mission:</h3>
		<h4>Create comfortable conditions of life of customers by using high quality eco-friendly building materials at affordable prices</h4>
		<h3>Values:</h3>
		<ol class="rounded">
		  	<li><span>We maintain the HIGHEST STANDARDS of product QUALITY</span></li>
			<li><span>We take full RESPONSIBILITY for what we do</span></li>
			<li><span>We are TRANSPARENT AND HONEST in our work</span></li>
			<li><span>We RESPECT our employees, customers, partners and suppliers</span></li>
			<li><span>We TRUST our employees, customers, partners and suppliers</span></li>
			<li><span>We are constantly EVOLVING AND IMPROVING in everything from decision-making to implement these solutions as a result</span></li>
		</ol>
	</div>

	<!-- Footer -->
	<footer>
		<pre>Made by Bolatkanov Yernur IT-1902</pre>
	</footer>

	<!-- Hidden navbar -->
	<div id="navbar">
	  	<a href="index.php">HOME</a>
		<a href="about.php">About Us</a>
		<a href="products.php">Products</a>
		<a href="contacts.php">Contacts</a>
		<a href="news.php">News</a>
	</div>

	<!-- Including custom js file and bootstrap js files -->
	<script type="text/javascript" src="js/custom.js"></script>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script type="text/javascript" src="js/jquery.cookie.js"></script>
	<script src="https://use.fontawesome.com/99e1cb3fcf.js"></script>
</body>
</html>