<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>6-wave slate</title>
	<link rel="shortcut icon" href="img/favicon.png" type="image/png">
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Anton" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" >
	<link rel="stylesheet" href="css/slates.css?v=<?php echo time(); ?>">
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

	<!-- Main deatails about the product -->
	<div class="container">
		<div class="incontainer">

			<h1>6-wave slate</h1>
			<img src="img/6classic.jpg" alt="6-wave slate in gray color" id="img1" width="100%" title="6 wave classic" />
			<img src="img/6red.jpg" alt="6-wave slate in red color" id="img2" width="100%" title="6 wave red">
			<img src="img/6green.jpg" alt="6-wave slate in green color" id="img3" width="100%" title="6 wave green">
			<img src="img/6coral.jpg" alt="6-wave slate in coral color" id="img4" width="100%" title="6 wave coral">
			<img src="img/6choco.jpg" alt="6-wave slate in choco color" id="img5" width="100%" title="6 wave choco">
			<img src="img/6blue.jpg" alt="6-wave slate in blue color" id="img6" width="100%" title="6 wave blue"><br>
			<input type="radio" name="color" id="r1" value="classic" checked><span class="rad">Classic</span>
			<input type="radio" name="color" id="r2" value="red"><span class="rad">Red</span>
			<input type="radio" name="color" id="r3" value="green"><span class="rad">Green</span>
			<input type="radio" name="color" id="r4" value="coral"><span class="rad">Coral</span>
			<input type="radio" name="color" id="r5" value="choco"><span class="rad">Choco</span>
			<input type="radio" name="color" id="r6" value="blue"><span class="rad">Blue</span>

			<h3>6-wave slate</h3>
			<p>A distinctive feature of the six-wave slate sheet with a wave height of 51 mm and a wave pitch of 177 mm is the presence of asymmetric edges. Asymmetric edges are convenient because only half of the wave is overlapped during the installation process and the efficiency of using the sheet area is increased.<br>Six-wave slate is 5.2 mm or 6.0 mm thick. Sheet thickness of 5.2 mm is lighter than sheet thickness of 6.0 mm by about 3 kg, which facilitates installation work, and most importantly, reduces the cost of slate. At the same time, slate sheets with reduced thickness retain strength indicators.<br>Six-wave sheets are manufactured on modern equipment, which provides a smooth surface and accurate geometric dimensions.</p>
			<hr>

			<h2>TECHNICAL SPECIFICATIONS AND DIMENSIONS 8 - WAVE SLATE</h2>
			<table class="specs-table">
				<tr>
					<th>Wave height</th>
					<th>Wave step</th>
					<th>Wave step</th>
					<th>Length</th>
					<th>Thickness</th>
					<th>Mass</th>
					<th>Usable area</th>
				</tr>
				<tr>
					<td rowspan="2">51 mm</td>
					<td rowspan="2">177 mm</td>
					<td rowspan="2">1097 mm</td>
					<td rowspan="2">1750 mm</td>
					<td>5.2 mm</td>
					<td>21.6 kg</td>
					<td rowspan="2">1.6 m<sup>2</sup></td>
				</tr>
				<tr>
					<td>6.0 mm</td>
					<td>25.0 kg</td>
				</tr>
			</table>

			<h2>ASSORTMENT</h2>
			<p>The plants produce 6-wave slate in both standard colour (grey) and coloured. The main colors are blue, green, red, orange and brown.</p>

			<h2>APPLICATION</h2>
			<p>Sheets of six-wave slate with a thickness of 6.0 mm is advisable to use in regions with high snow and wind load. Sheets with reduced thickness (5.2 mm) can be used in residential construction.</p>

		</div>

		<!-- Form of price calculation and adding to shopping cart -->
		<form method="GET" action="cart.php">
			<h2>Purchasing</h2>
			<span>Number of blocks:</span>
			<input type="hidden" name="action" value="add">
            <input type="hidden" name="id" value="3">
			<input type="hidden" id="price" value="1200">
			<input type="number" name="amount" id="inp" min="1" required>
			<span><input type="checkbox" name="delivery" value="1" id="chk"> with delivery</span>
			<span>Color:</span>
			<select id="sel" name="color">
				<option value="Classic" selected="selected">Classic</option>
				<option value="Red">Red</option>
				<option value="Green">Green</option>
				<option value="Coral">Coral</option>
				<option value="Choco">Choco</option>
				<option value="Blue">Blue</option>
			</select>
			<p id="pr">Total price:</p>
			<div>
				<input type="button" class="buy" id="buy" value="Show price">
				<input type="reset" class="buy" value="Clear">
			</div>
            <?php if(isset($_SESSION['id'])){ ?>
			<input type="submit" class="buy" value="Add to cart">
            <?php } ?>
            <?php if(!isset($_SESSION['id'])){ ?>
            <a href="login.php" class="buy">Add to cart</a>
            <?php } ?>
		</form>
		
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
	<script type="text/javascript" src="js/slates.js"></script>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script type="text/javascript" src="js/jquery.cookie.js"></script>
	<script src="https://use.fontawesome.com/99e1cb3fcf.js"></script>
</body>
</html>	