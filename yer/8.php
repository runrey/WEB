<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>8-wave slate</title>
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

			<h1>8-wave slate</h1>
			<img src="img/8classic.jpg" alt="8-wave slate in gray color" id="img1" width="100%" title="8 wave classic" />
			<img src="img/8red.jpg" alt="8-wave slate in red color" id="img2" width="100%" title="8 wave red">
			<img src="img/8green.jpg" alt="8-wave slate in green color" id="img3" width="100%" title="8 wave green">
			<img src="img/8coral.jpg" alt="8-wave slate in coral color" id="img4" width="100%" title="8 wave coral">
			<img src="img/8choco.jpg" alt="8-wave slate in choco color" id="img5" width="100%" title="8 wave choco">
			<img src="img/8blue.jpg" alt="8-wave slate in blue color" id="img6" width="100%" title="8 wave blue"><br>
			<input type="radio" name="color" id="r1" value="classic" checked><span class="rad">Classic</span>
			<input type="radio" name="color" id="r2" value="red"><span class="rad">Red</span>
			<input type="radio" name="color" id="r3" value="green"><span class="rad">Green</span>
			<input type="radio" name="color" id="r4" value="coral"><span class="rad">Coral</span>
			<input type="radio" name="color" id="r5" value="choco"><span class="rad">Choco</span>
			<input type="radio" name="color" id="r6" value="blue"><span class="rad">Blue</span>

			<h3>8-wave slate</h3>
			<p>Eight-wave slate is a standard roofing sheet, which is used in construction in our country for more than 60 years. It has symmetric edges, that requires the overlap of the sheets on the basis of SP 17.13330.2011 of the Roof. Updated version of SNiP II-26-76.  The wave height of this profile is 40 mm and the wave pitch is 150 mm. the Standard thickness is 4.7; 5.2; 5.8 mm.<br>Lightweight vosmiballnogo slate sheet with a thickness of 4.7; 5.2 mm easier sheet with a thickness of 5.8 mm, which reduces the cost of slate and simplifies installation. In this case, slate sheets with reduced thickness retain all the key properties of this product, and the strength is also superior to other roofing materials. <br>Eight-wave sheets are manufactured on modern equipment, which provides a smooth surface and accurate geometric dimensions.</p>
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
					<td rowspan="3">40 mm</td>
					<td rowspan="3">150 mm</td>
					<td rowspan="3">1130 mm</td>
					<td rowspan="3">1750 mm</td>
					<td>4.7 mm</td>
					<td>21.2 kg</td>
					<td rowspan="3">1.57 m<sup>2</sup></td>
				</tr>
				<tr>
					<td>5.2 mm</td>
					<td>23.4 kg</td>
				</tr>
				<tr>
					<td>5.8 mm</td>
					<td>26.1 kg</td>
				</tr>
			</table>

			<h2>ASSORTMENT</h2>
			<p>8-wave slate is available as a conventional gray color in the unpainted version, and in standard colors: Indigo (blue), green, chocolate, orange and red. Painted in the factory, slate is more resistant to the negative effects of the weather. Coating without loss of its properties lasts up to 6-7 years.</p>
			
			<h2>APPLICATION</h2>
			<p>The sheet of greater thickness is used in regions with high snow and wind load. A thinner sheet should be used in temperate zones.<br>Sheets of eight-wave slate are mainly used in residential low-rise construction to cover the roofs of private and apartment buildings, cottages, townhouses, non-residential buildings (gazebos, garages, etc.).</p>
			
		</div>

		<!-- Form of price calculation and adding to shopping cart -->
		<form method="GET" action="cart.php">
			<h2>Purchasing</h2>
			<span>Number of blocks:</span>
            <input type="hidden" name="action" value="add">
            <input type="hidden" name="id" value="1">
			<input type="hidden" id="price" value="2000">
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