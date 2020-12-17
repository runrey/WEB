<?php
// initializing variables
$name = "";
$sname = "";
$tele = "";
$email = "";
$errors = array(); 

// connect to the database
include "connect.php";

// REGISTER USER
if (isset($_POST['submit'])) {
  // receive all input values from the form
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $sname = mysqli_real_escape_string($db, $_POST['sname']);
  $tele = mysqli_real_escape_string($db, $_POST['tele']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $pass = mysqli_real_escape_string($db, $_POST['pass']);
  $rpass = mysqli_real_escape_string($db, $_POST['pass']);

  // first check the database to make sure 
  // a user does not already exist with the same email
  $user_check_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['email'] === $email) {
      array_push($errors, "Пользователь с такой почтой уже существует");
    }
  }
  if($pass != $rpass){
  	array_push($errors, "Пароли не совпадают");
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
    require_once('phpmailer/PHPMailerAutoload.php');
    $mail = new PHPMailer;
    $mail->CharSet = 'utf-8';
    //$mail->SMTPDebug = 3;                               // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.mail.ru';                                               // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'no-reply-01@mail.ru'; // Ваш логин от почты с которой будут отправляться письма
    $mail->Password = '24Q3UHfJQJ8B4jddfBED'; // Ваш пароль от почты с которой будут отправляться письма
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465; // TCP port to connect to / этот порт может отличаться у других провайдеров

    $mail->setFrom('no-reply-01@mail.ru'); // от кого будет уходить письмо?
    $mail->addAddress($email);     // Кому будет уходить письмо 

    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = 'Вы зарегистрировались на сайте онлайн курсов';
    $mail->Body    = '' .$name . ', благодарим за регистрацию на нашем сайтe.<br> Ваш телефон: <b>' .$tele. '</b><br>Почта: <b>' .$email. '</b><br>Ваш пароль: <b>' .$pass. '</b>';
    $mail->AltBody = '';

    if(!$mail->send()) {
        echo 'Error';
    }
    else{
      $pass = md5($pass);
      $query = "INSERT INTO users (name, surname, phone, email, password) 
            VALUES('$name', '$sname', '$tele', '$email', '$pass')";
      mysqli_query($db, $query);
      header('location: login.php');
    } 	
  }
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<title>Регистрация</title>
	<link rel="shortcut icon" href="img/favicon.png">
	<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/login.css?v=<?php echo time(); ?>">
</head>
<body>
	<form data-aos="zoom-in" data-aos-delay="50" data-aos-duration="1000" id="sign" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<a href="index.php" title="Go to home:)" class="logo">Logo</a>

		<label>Введите ваше имя:</label>
		<input type="text" name="name" placeholder="Иван" value="<?php echo $name; ?>" autocomplete="off" required>

		<label>Введите вашу фамилию:</label>
		<input type="text" name="sname" placeholder="Иванов" value="<?php echo $sname; ?>" autocomplete="off" required>

		<label>Введите ваш email:</label>
		<input type="email" name="email" placeholder="example@mail.ru" value="<?php echo $email; ?>" autocomplete="off" required>

		<label>Введите ваш номер телефона:</label>
		<input type="tel" name="tele" placeholder="8-777-123-1212" value="<?php echo $tele; ?>" autocomplete="off" pattern="[8][0-9]{10}"  required>

		<label>Введите ваш пароль:</label>
		<input type="text" name="pass" placeholder="Пароль" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Пароль должен содержать не менее одной цифры и одной прописной и строчной буквы, а также не менее 8 и более символов" autocomplete="off" required>

		<label>Подтвердите пароль:</label>
		<input type="text" name="rpass" placeholder="Подтвердите пароль" autocomplete="off" required>

		<?php include('errors.php'); ?>

		<input type="submit" name="submit" value="Зарегистрироваться">
		<p>Уже есть аккаунт? <a href="login.php" title="Логин" class="link">Войти</a></p>
    
	</form>
	<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
	<script>
		AOS.init();
	</script>
</body>
</html>