<?php
session_start();
error_reporting(0);
include "connect.php";

if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $stmt = $link->prepare("SELECT * FROM news WHERE news_id = ". $id);
	$stmt->execute();
	$res = $stmt->get_result();
	$stmt->close();
    $row = mysqli_fetch_array($res);
}

if(isset($_POST['submit'])){
    $title = $_POST['title'];
    $text = $_POST['text'];
    $date = $_POST['date'];

    $sql = "INSERT INTO news(editor_id, n_title, n_text, n_date) VALUES (?,?,?,?)";

    $stmt = $link->prepare($sql);
    $stmt->bind_param("isss", $_SESSION['id'], $title, $text, $date);
    $results = $stmt->execute();

    $stmt->close();

    header('location: news.php');
}

if(isset($_POST['esubmit'])){
    $iid = $_POST['id'];
    $title = $_POST['title'];
    $text = $_POST['text'];

    $sql = "UPDATE news SET n_title=?, n_text=? WHERE news_id = ?";

    $stmt = $link->prepare($sql);
    $stmt->bind_param("ssi", $title, $text, $iid);
    $results = $stmt->execute();

    $stmt->close();

    header('location: news.php');
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
		<?php if(isset($_GET['edit'])){ ?>
	    <h1>Item editing</h1>
	    <form method="POST" action="apanel.php">
	    	<input type="hidden" name="id" value="<?php echo $row['news_id'] ?>">

	        <label for="name">Title:</label>
	        <input type="text" name="title" id="name" value="<?php echo $row['n_title'] ?>" required>

	      	<label for="content">Text of news:</label>
            <textarea type="text" name="text" id="content" rows="10" cols="20" required><?php echo $row['n_text'] ?></textarea>

	        <input type="submit" name="esubmit" value="Submit">
	    </form>
	    <?php } if(isset($_GET['add'])){ ?>
	    <h1>News adding</h1>
        <form method="POST" action="apanel.php">
            <label for="heading">Heading of post:</label>
            <input type="text" name="title" id="heading" required>

            <label for="content">Content of post:</label>
            <textarea type="text" name="text" id="content" rows="10" cols="20" required></textarea>

            <label for="date">Date of post:</label>
            <input type="date" name="date" id="date" required>

            <input type="submit" name="submit" value="Submit">
        </form>
	    <?php } ?>
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