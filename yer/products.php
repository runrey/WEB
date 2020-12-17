<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Products</title>
	<link rel="shortcut icon" href="img/favicon.png" type="image/png">
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Anton" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/prods.css?v=<?php echo time(); ?>">
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

		<h1>Our Products</h1>
		<div class="view">
				<div class="view-buttons">
					<div id="block">
						<i class="fa fa-th-large" aria-hidden="true"></i>
					</div>
					<div id="list">
						<i class="fa fa-list" aria-hidden="true"></i>
					</div>
				</div>
				<div class="remove">
					<input type="submit" name="remove" id="remove" value="Reset">
				</div>
			</div>
		<div class="incontainer">
			
			<a href="8.php">
				<div class="prod">
					<img src="img/8classic.jpg" alt="8-wave slate" width="50%" title="8 wave classic">
					<div class="descrpt">
						<h3>Slate 8-wave</h3>
						<p>Number of waves: 8<br>
						Dimensions: 1 130mm × 1 750mm<br>
						Thickness: 5.8mm<br>
						Usable area: 1.57m2<br>
						Weight: 26.1kg</p>
						<p>Has 6 color options</p>
					</div>
				</div>
			</a>
			<a href="7.php">
				<div class="prod">
					<img src="img/7classic.jpg" alt="7-wave slate"  width="50%" title="7 wave classic">
					<div class="descrpt">
						<h3>Slate 7-wave</h3>
						<p>Number of waves: 7<br>
						Dimensions: 980mm × 1 750mm<br>
						Thickness: 5.8mm<br>
						Usable area: 1.336m2<br>
						Weight: 23.2kg</p>
						<p>Has 6 color options</p>
					</div>
				</div>
			</a>
			<a href="6.php">
				<div class="prod">
					<img src="img/6classic.jpg" alt="6-wave slate"  width="50%" title="6 wave classic">
					<div class="descrpt">
						<h3>Slate 6-wave</h3>
						<p>Number of waves: 6<br>
						Dimensions: 1 097mm × 1 750mm<br>
						Thickness: 5.8mm<br>
						Usable area: 1.6m2<br>
						Weight: 25.0kg</p>
						<p>Has 6 color options</p>
					</div>
				</div>
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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery.cookie.js"></script>
	<script src="https://use.fontawesome.com/99e1cb3fcf.js"></script>

	<script>
		$( window ).on('load', function() {
			event.preventDefault();
			if ( $.cookie('view') == null ) {
				$.cookie('view', 'list');
			}
			if ( $.cookie('view') == 'list' ) {
		    	$('#list').css("background-color", "#777");
				$('.incontainer').css("grid-template-columns", "1fr");
				$('.prod').css("flex-direction", "row");
		    }
		    if ( $.cookie('view') == 'block' ) {
				$('#block').css("background-color", "#777");
				$('.incontainer').css("grid-template-columns", "1fr 1fr 1fr");
				$('.prod').css("flex-direction", "column");
		    }
		});
		$( document ).ready(function() {

			$('#list').click(function(){
				$.cookie('view', 'list');
				$('#list').css("background-color", "#777");
				$('#block').css("background-color", "transparent");
				$('.incontainer').css("grid-template-columns", "1fr");
				$('.prod').css("flex-direction", "row");
			});
			$('#block').click(function(){
				$.cookie('view', 'block');
				$('#list').css("background-color", "transparent");
				$('#block').css("background-color", "#777");
				$('.incontainer').css("grid-template-columns", "1fr 1fr 1fr");
				$('.prod').css("flex-direction", "column");
			});
		    $('#remove').click(function(){
		    	$.removeCookie('view');
		    	window.location.href = "products.php";
		    });
		});
	</script>
</body>
</html>	