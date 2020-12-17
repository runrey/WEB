<?php 
include "connect.php";

$code = 0;
$trq = "";
$em = "";
$version = "2.0.0";

if (isset($_GET['tRq'])) {
 	$version = "2.0.1";
 	$trq = $_GET['tRq'];
 	$em = $_GET['email'];
}
if (isset($_GET['email2'])) {
	$version = "2.0.2";
	$em2 = $_GET['email2'];
}
if(isset($_GET['try'])){
	echo '<script>alert("Неверный код")</script>';
}

if(isset($_POST['send'])){
  	$code = rand(100000, 999999);
  	require_once('phpmailer/PHPMailerAutoload.php');
    $mail = new PHPMailer;
    $mail->CharSet = 'utf-8';
    $mail->isSMTP();                                    
    $mail->Host = 'smtp.mail.ru';                                             
    $mail->SMTPAuth = true;                               
    $mail->Username = 'no-reply-01@mail.ru'; 
    $mail->Password = '24Q3UHfJQJ8B4jddfBED'; 
    $mail->SMTPSecure = 'ssl';    
    $mail->Port = 465; 
    $mail->setFrom('no-reply-01@mail.ru'); 
    $mail->addAddress($_POST['email']);     
    $mail->isHTML(true);                               

    $mail->Subject = 'Код на смену пароля';
    $mail->Body    = 'Ваш код для смены пароля: ' .$code. '<br> Если это не вы то никому не сообщайте этот код и смените ваш пароль';
    $mail->AltBody = '';

    if(!$mail->send()) {
        echo '<script>alert("Error");</script>';
    }
    else{ 	
    	$codes = strval($code);
    	$codes = md5($codes);
    	header('location: passchange.php?tRq=' . $codes. '&email=' .$_POST['email']);
    } 	
}

if (isset($_POST['apply'])) {
  	$ecode = $_POST['code'];
  	$ecode = md5($ecode);
  	if($trq == $ecode){
  		header('location: passchange.php?email2=' .$_GET['email']);
  	}
  	else{
  		header('location: passchange.php?tRq=' . $trq. '&email=' .$em. '&try');
  	}
}

if (isset($_POST['pass'])) {
  	if($_POST['new_pass'] == $_POST['new_rpass']){
  		$profile = mysqli_query($db, "UPDATE users SET 
  		password='" .md5($_POST['new_pass']). "' WHERE email ='" .$_GET['email2']."'");
  		require_once('phpmailer/PHPMailerAutoload.php');
	    $mail = new PHPMailer;
	    $mail->CharSet = 'utf-8';
	    $mail->isSMTP();                                   
	    $mail->Host = 'smtp.mail.ru';                                               
	    $mail->SMTPAuth = true;                               
	    $mail->Username = 'no-reply-01@mail.ru'; 
	    $mail->Password = '24Q3UHfJQJ8B4jddfBED'; 
	    $mail->SMTPSecure = 'ssl';                            
	    $mail->Port = 465; 
	    $mail->setFrom('no-reply-01@mail.ru'); 
	    $mail->addAddress($_GET['email2']);     
	    $mail->isHTML(true);                     

	    $mail->Subject = 'Ваш пароль был изменен';
	    $mail->Body    = 'Ваш пароль был успешно изменен. <br> Новый пароль: <b>' .$_POST['new_rpass']. '</b>';
	    $mail->AltBody = '';

	    if(!$mail->send()) {
	        echo '<script>alert("Error");</script>';
	    }
	    else{ 	
	    	header('location: index.php');
	    } 	
	  		
	}
	else{
	  	echo '<script>alert("Возникла ошибка, повторите пожалуйста")</script>';
	}
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<title>Смена пароля</title>
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="shortcut icon" href="img/favicon.png">
	<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/passchangecss.php?v=<?php echo time(); ?>&ver=<?php if(!isset($version)){echo '2.0.0';}   else{ echo $version; } ?>">
</head>
<body>
	
	<main>
		<header data-aos="zoom-in" data-aos-delay="50" data-aos-duration="1000">
			<div class="header-normal">
				<span class="header-normal-logo" data-aos="zoom-in" data-aos-delay="50" data-aos-duration="1000"><a href="index.php" title="Go to home:)">Logo</a></span>
			</div>
		</header>

		<div class="content" data-aos="zoom-in" data-aos-delay="50" data-aos-duration="1000">
			<h1>Смена пароля</h1>
			
			<form id="send" method="POST" action="">
				<label for="email">На вашу почту будет отправлена шестизначный код</label>
				<input type="email" name="email" placeholder="example@mail.ru" autofocus="on" required>
				<input type="submit" name="send" value="Отправить">
			</form>

			<form id="code" method="POST" action="passchange.php?tRq=<?php echo $trq; ?>&email=<?php echo $em; ?>">
				<label for="code">Введите код отправленный на вашу почту:</label>
				<input type="text" name="code" placeholder="Например, 123456" required>

				<input type="submit" name="apply" value="Проверить" >
			</form>
			<form id="pass" method="POST" action="passchange.php?email2=<?php echo $_GET['email2']; ?>">

				<label for="name">Новый пароль:</label>
				<input type="text" name="new_pass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Пароль должен содержать не менее одной цифры и одной прописной и строчной буквы, а также не менее 8 и более символов" autocomplete="off" required>

				<label for="name">Подтвердите новый пароль:</label>
				<input type="text" name="new_rpass" required>

				<input type="submit" name="pass" value="Сохранить">
			</form>
		</div>

		<div class="push"></div>
	</main>

	<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
	<script>
		AOS.init();
	</script>
</body>
</html>