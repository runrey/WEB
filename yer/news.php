<?php
session_start();
error_reporting(0);
include "connect.php";

$stmt = $link->prepare("SELECT * FROM news");
$stmt->execute();
$res = $stmt->get_result();
$stmt->close();

if (isset($_GET['delete'])) {
	mysqli_query($link, "DELETE FROM news WHERE news_id = ".$_GET['delete']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>News</title>
	<link rel="shortcut icon" href="img/favicon.png" type="image/png">
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Anton" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/news.css?v=<?php echo time(); ?>">	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="js/pagination.js"></script>
	<script>
		$(document).ready(function()
		{
			$("#tab").pagination({
		    	items: 5,
		    	contents: 'contents',
		    	previous: 'Previous',
		    	next: 'Next',
		    	position: 'bottom',
		   });
		});
	</script>
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
		<h1>Our news</h1>
		<?php if(isset($_SESSION['adm'])){ ?>
		<a href="apanel.php?add" class="edit">Add news</a>
		<?php } ?>
		<div id="wrapper">
          	<div class="contents">
	          	<?php 
				if(mysqli_num_rows($res)>0){
				   	while ($row = $res->fetch_assoc()) {
				   		?>

				   		<div class="post">
						    <h2 class="headings"><?php echo $row['n_title']; ?></h2>
						    <hr class="line">
						    <p class="content"><?php print $row['n_text']; ?></p>
						    <pre><?php echo $row['n_date']; ?></pre>
						    <?php if(isset($_SESSION['adm'])){ ?>
						    <div class="buttons">
						        <a href="apanel.php?edit=<?php echo $row['news_id']; ?>" class="edit">EDIT</a>
						        <a href="news.php?delete=<?php echo $row['news_id']; ?>" class="delete">DELETE</a>
						    </div>
						    <?php } ?>
						</div>
						<?php
	   				}

				}

				if(mysqli_num_rows($res)==0){
					echo "<h1>There are no posts yet!</h1>";
				}
				?>
	            
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
		<a href="news.php">News</a>
	</div>
	
	<!-- Including custom js file and bootstrap js files -->
	<script src="https://use.fontawesome.com/99e1cb3fcf.js"></script>
	
</body>
</html>	