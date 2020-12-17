<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>7-wave slate</title>
	<link rel="shortcut icon" href="img/favicon.png" type="image/png">
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Anton" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
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

			<h1>7-wave slate</h1>
			<img src="img/7classic.jpg" alt="7-wave slate in gray color" id="img1" width="100%" title="7 wave classic" />
			<img src="img/7red.jpg" alt="7-wave slate in red color" id="img2" width="100%" title="7 wave red">
			<img src="img/7green.jpg" alt="7-wave slate in green color" id="img3" width="100%" title="7 wave green">
			<img src="img/7coral.jpg" alt="7-wave slate in coral color" id="img4" width="100%" title="7 wave coral">
			<img src="img/7choco.jpg" alt="7-wave slate in choco color" id="img5" width="100%" title="7 wave choco">
			<img src="img/7blue.jpg" alt="7-wave slate in blue color" id="img6" width="100%" title="7 wave blue"><br>
			<input type="radio" name="color" id="r1" value="classic" checked><span class="rad">Classic</span>
			<input type="radio" name="color" id="r2" value="red"><span class="rad">Red</span>
			<input type="radio" name="color" id="r3" value="green"><span class="rad">Green</span>
			<input type="radio" name="color" id="r4" value="coral"><span class="rad">Coral</span>
			<input type="radio" name="color" id="r5" value="choco"><span class="rad">Choco</span>
			<input type="radio" name="color" id="r6" value="blue"><span class="rad">Blue</span>

			<h3>7-wave slate</h3>
			<p>Slate leaves with a wavy profile on the 7 waves have symmetrical edges and are produced in thickness 4,7; 5,2; 5,8 mm. Height of this profile is 40 mm, pitch of corrugation 150mm.<br>The width of the seven-wave slate (980 mm) is less than eight-wave and even than six-wave (profile 41/177) and to cover the roof need more sheets. But if the surface area of the roof is well covered by this type of sheets, it is more appropriate to apply this material. The size of the slate sheet affects the weight of the material, respectively, differs and the load from the roof, made of sheets of different sizes on the truss system and bearing walls.<br>Seven-wave sheets are made on modern equipment, which provides a smooth surface and accurate geometric dimensions.</p>
			<hr>

			<h2>TECHNICAL SPECIFICATIONS AND DIMENSIONS 7 - WAVE SLATE</h2>
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
					<td rowspan="3">40 mm</td>
					<td rowspan="3">150 mm</td>
					<td rowspan="3">980 mm</td>
					<td rowspan="3">1750 mm</td>
					<td>4.7 mm</td>
					<td>18.8 kg</td>
					<td rowspan="3">1.336 m<sup>2</sup></td>
				</tr>
				<tr>
					<td>5.2 mm</td>
					<td>20.8 kg</td>
				</tr>
				<tr>
					<td>5.8 mm</td>
					<td>23.2 kg</td>
				</tr>
			</table>

			<h2>ASSORTMENT</h2>
			<p>As well as other types of wave slate, 7-wave release painted and unpainted. Color slate palette: green, blue, red, brown and orange.</p>

			<h2>APPLICATION</h2>
			<p>Seven-wave slate is used in both residential and industrial construction to cover roofs.</p>
			
		</div>

		<!-- Form of price calculation and adding to shopping cart -->
		<form method="GET" action="cart.php">
			<h2>Purchasing</h2>
			<span>Number of blocks:</span>
            <input type="hidden" name="action" value="add">
            <input type="hidden" name="id" value="2">
			<input type="hidden" id="price" value="1600">
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