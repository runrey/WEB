<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>About Us</title>
	<link rel="shortcut icon" href="img/favicon.png" type="image/png">
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Anton" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/contacts.css?v=<?php echo time(); ?>">
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

	<!-- Main content -->
	<div class="container">
		<div class="incontainer">

			<h1>LLP "SHIFER"</h1>
			<p>LLP "SHIFER" - the largest producer of slate in the territory of the Republic of Kazakhstan. The company is one of the leading industry organizations existing at the moment in the industrial sphere of construction materials of Kazakhstan.</p>
			<p>The company specializes in production of chrysotile cement products. The market of building materials of the country has been operating since 1961.Stable and high quality of products the company guarantees due to the modern organizational and technical level of production, the use of advanced energy and resource-saving technologies, as well as the use of advanced foreign and domestic experience.</p>
			<p>The plant has a favorable geographical location, allowing with the lowest transport costs to deliver products anywhere in Kazakhstan and neighboring countries. Thanks to the effective application of the quality system and its continuous improvement in accordance with the requirements of the consumers of LLP "SHIFER" provided all the conditions for the production of high quality products. Stable quality of products the company guarantees due to the modern organizational and technical level of production, the use of advanced energy and resource-saving technologies, as well as the use of advanced foreign and domestic experience. For the first time, the question of the construction of Semipalatinsk slate plant was raised in 1957, in connection with the completion of the construction of the Semipalatinsk cement plant and the opening of large deposits of chrysotile asbestos in Kazakhstan.</p>
			<p>All production is certified, by production of all production environmentally friendly natural materials extracted and made in the Republic of Kazakhstan is used. Since 2010 the enterprise is certified on compliance of the Integrated management system to requirements of ISO 9001:2008, ISO 14001:2004, ISO OHSAS 18001: 2007. Stability of quality is guaranteed by annual certification of production in" Natseks " and inspection audits of the integrated management system from the company TRANSPARENT CERTIFICATIONS LIMITED.</p>
			<p>LLP "SHIFER" is the diploma holder and the participant of many exhibitions devoted to quality of products, is awarded by diplomas for high quality of products. At the competition "the Best goods of Kazakhstan" in the category "Industrial goods" awarded a diploma for the quality of "asbestos-cement corrugated Sheets".</p>

		</div>
	</div>

	<!-- Highlighted heading -->
	<div class="our">
		<div><h1 class="inour">Our products</h1></div>
	</div>
	
	<!-- Carousel on bootstrap -->
	<div class="carousel">
		<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="2500">
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