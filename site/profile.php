<?php 
include "connect.php";
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

$result = mysqli_query($db, "SELECT * FROM users WHERE user_id = " . $_SESSION['user_id']);
$row = mysqli_fetch_array($result);

if(isset($_POST['profile'])){
  	$profile = mysqli_query($db, "UPDATE users SET 
  	name='" .$_POST['name']. "', surname ='" .$_POST['sname']. "', phone='" .$_POST['phone']."', email='" .$_POST['email']."' 
  	WHERE user_id =" .$_SESSION['user_id']);
  	$_SESSION['name'] = $_POST['name'];
  	$_SESSION['email'] = $_POST['email'];
  	header("location: profile.php");
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
					<a href="profile.php?logout">Выйти</a>	
				</div>
				<div class="menu-login"><i class="fa fa-sign-in" aria-hidden="true"></i></div>
			</div>
		</header>
		
		<div class="content" data-aos="zoom-in" data-aos-delay="50" data-aos-duration="1000">
			<h1>Мой профиль</h1>
			<table>
				<tr>
					<th>Имя пользователя:</th>
					<td><?php echo $row['name']; ?></td>
				</tr>
				<tr>
					<th>Фамилия</th>
					<td><?php echo $row['surname']; ?></td>
				</tr>
				<tr>
					<th>Номер телефона:</th>
					<td><?php echo $row['phone']; ?></td>
				</tr>
				<tr>
					<th>Email:</th>
					<td><?php echo $row['email']; ?></td>
				</tr>
			</table>
			<div class="links">
				<span class="link" onclick="profile()">Редактировать профиль</span>
				<a class="link" href="passchange.php">Сменить пароль</a>
			</div>

			<form id="profile" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
				<label for="name">Имя:</label>
				<input type="text" name="name" value="<?php echo $row['name']; ?>" autocomplete="off" required>

				<label for="pass">Фамилия:</label>
				<input type="text" name="sname" value="<?php echo $row['surname']; ?>" autocomplete="off" required>

				<label for="email">Номер:</label>
				<input type="tel" name="phone" value="<?php echo $row['phone']; ?>" autocomplete="off" pattern="[8][0-9]{10}" required>

				<label for="pass">Email:</label>
				<input type="email" name="email" value="<?php echo $row['email']; ?>" required>

				<input type="submit" name="profile" value="Сохранить">
			</form>
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

		function profile(){
			document.getElementById('profile').style.display = "flex";
		}
	</script>
</body>
</html>