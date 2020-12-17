<?php 
  include "connect.php";
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
	<title>Имя сайта</title>
	<meta name="description" lang="ru" content="">
	<meta name="author" lang="ru" content="Рыжков Евгений" />
	<link rel="shortcut icon" href="img/favicon.png">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/style.css?v=<?php echo time(); ?>">
</head>
<body id="body">
	<main>
		<header>
			<div class="header-normal">
				<div class="menu-toggle"><i class="fa fa-bars" aria-hidden="true"></i></div>
				<div class="header-mobile-left" id="menum">
					<a class="mlinks" href="#body">Главная</a>
					<a class="mlinks" href="#ex1">О нас</a>
					<a class="mlinks" href="#ex2">Курсы</a>
					<a class="mlinks" href="#ex3">Контакты</a>		
				</div>
				<div class="header-normal-left" id="menu" data-aos="zoom-in-right" data-aos-delay="200" data-aos-duration="1000">
					<a class="hlinks" href="#body">Главная</a>
					<a class="hlinks" href="#ex1">О нас</a>
					<a class="hlinks" href="#ex2">Курсы</a>
					<a class="hlinks" href="#ex3">Контакты</a>	
				</div>
				<span class="header-normal-logo" data-aos="zoom-in" data-aos-delay="50" data-aos-duration="1000"><a href="index.php" title="Go to home:)" class="logo">Logo</a></span>
				<div class="header-mobile-right">
<?php if (empty($_SESSION['email'])) : ?>
						<a class="mlinks" href="login.php">Login</a>
						<a class="mlinks" href="sign.php">Signup</a>
<?php endif ?>
<?php if (!empty($_SESSION['email'])) : ?>
						<a class="mlinks"><?php echo $_SESSION['name']; ?></a>
						<a class="mlinks" href="profile.php">Мой профиль</a>
						<a class="mlinks" href="courses.php">Мои курсы</a>
						<a class="mlinks" href="index.php?logout">Выйти</a>
<?php endif ?>			
				</div>
				<div class="header-normal-right" data-aos="zoom-in-left" data-aos-delay="600" data-aos-duration="1000">
<?php if (empty($_SESSION['email'])) : ?>
						<div class="header-normal-right-back"><a id="subs" href="login.php">Подписка на курсы</a></div>
<?php endif ?>
<?php if (!empty($_SESSION['email'])) : ?>
						<div class="menu-login"><?php echo $_SESSION['name']; ?><i class="fa fa-sign-in" aria-hidden="true"></i></div>
<?php endif ?>
				</div>
				<div class="menu-loginm"><i class="fa fa-sign-in" aria-hidden="true"></i></div>
			</div>
		</header>

		<div class="content">

			<div class="bgimg-1">

				<div data-aos="fade-up" data-aos-delay="300" data-aos-duration="1000">
					<h2>НАЧНИ СВОЙ ПУТЬ</h2>
					<h1 id="suc">К УСПЕХУ</h1>
					<h2>С НАМИ</h2>
				</div>
				
		    </div>
		
		    <div id="ex1">
		    	<div class="about">
		    		<div class="inabout">
		    			<div class="about-text">
		    				<h1 data-aos="fade-down-right" data-aos-delay="150" data-aos-duration="1000">О нас</h1>
		    				<p data-aos="fade-right" data-aos-delay="600" data-aos-duration="1000">Курсы <b>английского</b>, <b>IELTS</b>, <b>SAT</b> и <b>NUFYPET</b> ведут недавние выпускники и студенты с личным опытом сдачи экзаменов. С нами вы узнаете об эффективных стратегиях изучения языка и получите много практики. Мы используем качественные учебные материалы и ведем занятия последовательно для закрепления результата. Мы помогаем изучить язык и нацеливаем на постоянное самообразование и совершенствование навыков</p>
		    			</div>
		    			<div class="about-img" data-aos="fade-left" data-aos-delay="900" data-aos-duration="1000">
		    				<div></div>
		    			</div>
		    		</div>
		    	</div>
		    </div>

		    <div id="ex2" class="bgimg-2">
		    	<div>
		    		<div class="courses">
<?php
	if(!empty($_SESSION['user_id'])){
		$user_courses = array();
		$courses = mysqli_query($db, "SELECT uc_course_id FROM user_courses WHERE uc_user_id=" .$_SESSION['user_id']);
		if(mysqli_num_rows($courses) > 0){
			$user_courses = mysqli_fetch_array($courses);
		}
	}
	
	$result = mysqli_query($db, "SELECT * FROM courses");
	if (mysqli_num_rows($result) > 0){
		$row = mysqli_fetch_array($result);
		do{
			
			$ip = $row["course_id"];
			if(!empty($_SESSION['user_id'])){
				$purchased = false;
				for($i = 0; $i < count($user_courses)-1; $i++){
					if($ip == $user_courses[$i]){
						$purchased = true;
						break;
					}
				}
			}
			echo'
		    			<div data-aos="fade-up" data-aos-delay="250" data-aos-duration="800">

		    				<div>
		    					<span id="courses-h">' . $row["title"] . '</span>
			    				<p id="courses-list">
			    					' . $row["description"] . '
			    				</p>
		    				</div>
		    				<div id="courses-bottom">
		    					<span id="courses-price">' . $row["price"] . ' &#8376;</span>';
		    					if(!empty($_SESSION['user_id'])){
		    						if($purchased){
		    							echo '<a href="course.php?course=' .$ip. '&trem=' .md5($_SESSION['user_id']). '">Перейти к курсу</a>';
		    						}
		    						else{
		    							if(!empty($_SESSION['email'])){
		    								echo '<a href="purchase.php?course=' . $ip . '" name="purchase">Купить</a>';
				    					}
				    					else{
				    						echo '<a href="login.php" name="purchase">Купить</a>';
				    					}
		    						}
		    					}
		    					
		    					else{
		    						echo '<a href="login.php" name="purchase">Купить</a>';
		    					}
		    					
		    					echo '
		    				</div>
		    					
		    			</div>
		    ';
		} while ($row = mysqli_fetch_array($result));
	}
	else{
		echo'
		<h2 align="center" data-aos="zoom-out" class="empty">К сожалению курсов еще нет</h2>';
	}
?>
		    		</div>
		    	</div>
		    </div>

		    <div id="ex3">
		    	<h1>Контакты</h1>
		    	<p>Нур-Султан, ул. Сауран 1, каб 707, 708</p>
		    	<br>
		    	<p >E-mail: <span>example@gmail.com</span></p>
		    	<p>Телефон : <span>87774451122</span></p>
		    	<p>WhatsApp: <span>+77761970226</span></p>		    	
		    </div>

		</div>
	</main>

	<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
	<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
	<script src="js/custom.js?v=<?php echo time(); ?>"></script>
</body>
</html>