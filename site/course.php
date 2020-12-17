<?php 
  include "connect.php";
  if(empty($_SESSION['email'])){
  	header('location: login.php');
  }
  if($_GET['trem'] != md5($_SESSION['user_id'])){
  	header('location: courses.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['email']);
	unset($_SESSION['user_id']);
	unset($_SESSION['name']);
  	header("location: index.php");
  }
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<title>Курсы</title>
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="shortcut icon" href="img/favicon.png">
	<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/profile.css?v=<?php echo time(); ?>">
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
					<a href="courses.php?logout">Выйти</a>	
				</div>
				<div class="menu-login"><i class="fa fa-sign-in" aria-hidden="true"></i></div>
			</div>
		</header>
		
		<div class="content" data-aos="zoom-in" data-aos-delay="50" data-aos-duration="1000">
			<a href="courses.php" class="back">< Назад</a>
<?php
	$title = mysqli_query($db, "SELECT * FROM courses WHERE course_id=" .$_GET['course']);
	$tit = mysqli_fetch_array($title);
	echo '<h1 id="mains">' .$tit['title']. '</h1>';
	$result = mysqli_query($db, "SELECT * FROM course_content WHERE cc_course_id=" .$_GET['course']);
	if (mysqli_num_rows($result) > 0){
		$row = mysqli_fetch_array($result);
		do{
			echo'

			<div class="video">
				<h2 id="mains">' .$row['cc_subtitle']. '</h2>
				<p>' .$row['cc_text']. '</p><br>
				<video width="720" controls controlsList="nodownload">
					<source src="videos/' .$row['cc_video']. '" type="video/mp4">
				  Your browser does not support the video tag.
				</video>
			</div>
			';
		} while ($row = mysqli_fetch_array($result));
	}
	else{
		echo'
		<h2 align="center" data-aos="zoom-out" class="empty">Данный курс пуст</h2>';
	}
?>

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