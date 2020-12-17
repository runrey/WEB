<?php 
include "connect.php";
$course = -1;
if(empty($_SESSION['email'])){
	header('location: login.php');
}

if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['email']);
	unset($_SESSION['user_id']);
	unset($_SESSION['name']);
  	header("location: index.php");
}

if (isset($_GET['course'])) {
	$course = $_GET['course'];
}

if (isset($_POST['submit'])) {
	$user = mysqli_query($db,"INSERT INTO user_courses(uc_user_id, uc_course_id, card_number, cvv, period) VALUES (" .$_SESSION['user_id']. "," .$_GET['courses']. ", '" .$_POST['card']. "', '" .$_POST['cvv']. "', '" .$_POST['month']. "/" .$_POST['year']. "')");
	header("location: courses.php");
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<title>Мой профиль</title>
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="shortcut icon" href="img/favicon.png">
	<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/card.css?v=<?php echo time(); ?>">
</head>
<body >
	
	<main>
		
		<header data-aos="zoom-in" data-aos-delay="50" data-aos-duration="1000">
			<div class="header-normal">
				<span class="header-normal-logo" data-aos="zoom-in" data-aos-delay="50" data-aos-duration="1000"><a href="index.php" title="Go to home:)">Logo</a></span>
				<div class="header-mobile-right">
					<a>Ник</a>
					<a href="profile.php">Мой профиль</a>
					<a href="courses.php">Мои курсы</a>
					<a href="profile.php?logout">Выйти</a>	
				</div>
				<div class="menu-login"><i class="fa fa-sign-in" aria-hidden="true"></i></div>
			</div>
		</header>
		
		<div class="content" data-aos="zoom-in" data-aos-delay="50" data-aos-duration="1000">
			<h1>Оплата</h1>
<?php
	if(empty($_GET['course'])){
		echo '<h2>Товар не выбран</h2>';
	}
	else{
		if($course > 0){
			$user = mysqli_query($db, "SELECT * FROM users WHERE user_id = " . $_SESSION['user_id']);
			$row = mysqli_fetch_array($user);

			$courses = mysqli_query($db, "SELECT * FROM courses WHERE course_id = " .$course);
			$row2 = mysqli_fetch_array($courses);
			echo '
			<div class="text">
				<p>Оплата на аккаунт: <b>' .$_SESSION['email']. '</b></p>
				<p>Оплата на: <b>' .$row2['price']. ' &#8376;</b></p>
			</div>
			
			<form method="POST" action="purchase.php?courses=' .$course. '">
				<div class="card">
					<div>
						<label for="cvv">Номер карты</label>
						<input type="number" name="card" id="card" maxlength="16" max="9999999999999999" pattern="[0-9]{16}" autofocus autocomplete="off" required>
					</div>
					<div class="date">
						<div class="date-expire"><label>Срок действия</label></div>
						<div class="input">
							<label>МЕСЯЦ/ГОД</label>
							<div class="month">
								<input type="text" name="month" id="month" maxlength="2" pattern="[0-9]{2}" autocomplete="off" required>
								<span>/</span>
								<input type="text" name="year" id="year" maxlength="2" pattern="[0-9]{2}" autocomplete="off" required>
							</div>
						</div>
					</div>
				</div>
				<div class="reverse-card">
					<div class="black"></div>
					<div class="input">
						<label for="cvv">CVV</label>
						<input type="tel" name="cvv" id="CVV" maxlength="3" pattern="[0-9]*" autocomplete="off" required>
					</div>
				</div>
				<input type="submit" name="submit" value="Оплатить" id="submit">
			</form>
			<div class="push"></div>
			
			';}} ?>
		</div>

		<div class="push"></div>
	</main>

	<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
	<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
	<script>
		AOS.init();
		$(document).ready(function(){
			$("#menum").on("click","a", function (event) {
				event.preventDefault();
				var id = $(this).attr('href'),
				top = $(id).offset().top;
				$('body,html').animate({scrollTop: top}, 800);
			});
		});

		$(document).ready(function(){
			$('.menu-login').click(function(){
				$('.header-mobile-right').toggleClass('active');
			})
		})
	</script>
</body>
</html>