<?php
require_once('models/Query.php');
session_start();

//if user not logged in, this page will not be showed
if(!isset($_SESSION['username'])) header("Location: login.php");

$userQuery = new Query();
if(empty($_SESSION['adm'])){
	$user = $userQuery->getUserByUsername($_SESSION['username']);
}
else{
	$user = $userQuery->getAdminByUsername($_SESSION['username']);
}

if ($user == null) {
    header("Location: index.php?logout");
    return;
}

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
	<link rel="stylesheet" href="css/profile.css?v=<?php echo time(); ?>">
</head>
<body>
	<!-- Top navigation -->
	<header>

		<div class="top_line">
			<div><a href="index.php" class="logo"><img src="img/logo.png" alt="logo" title="go home"></a></div>
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

	</header>
	
	<!-- Main content -->
	<div class="container">
		<div class="profile-img">
			<img src="<?php echo $user->getUrl(); ?>" height="400">
		</div>
		<div class="profile-info">
			<div id="profile-info-main">
				<div>
					<h2><?php echo $user->getUsername(); ?></h2>
				</div>
				<div>
					<span><b>Name</b></span>
					<span><?php echo $user->getFirstName(); ?></span>
				</div>
				<div>
					<span><b>Surname</b></span>
					<span><?php echo $user->getLastName(); ?></span>
				</div>
				<div>
					<span><b>Email</b></span>
					<span><?php echo $user->getEmail(); ?></span>
				</div>
			</div>
			<div id="polymorphism">
				<span><?php echo $user->toString(); ?></span>
			</div>
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