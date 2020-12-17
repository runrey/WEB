<?php
// initializing variables
$email = "";
$errors = array(); 

// connect to the database
include "connect.php";

// ... 
if (isset($_POST['submit'])) {
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $pass = mysqli_real_escape_string($db, $_POST['pass']);

  if (empty($email)) {
  	array_push($errors, "Введите пашу почту");
  }
  if (empty($pass)) {
  	array_push($errors, "Введите пароль");
  }

  $user_check_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if(!empty($user)){
  	
	if($user['email'] == ""){
		array_push($errors, "Неправильная почта");
	}
	if(md5($pass) != $user['password']){
	  array_push($errors, "Неправильный пароль");
	}
  }
  
  if (count($errors) == 0) {
  	$pass = md5($pass);
  	$query = "SELECT * FROM users WHERE email='$email' AND password='$pass'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
	  $row = mysqli_fetch_assoc($results);
	  $logs = mysqli_query($db, "INSERT INTO enter_logs(user_id, date_time) VALUES (" .$row['user_id']. ", NOW())");
  	  $_SESSION['email'] = $email;
  	  $_SESSION['name'] = $row['name'];
  	  $_SESSION['user_id'] = $row['user_id'];
  	  header('location: index.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}

?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<title>Вход</title>
	<link rel="shortcut icon" href="img/favicon.png">
	<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/login.css?v=<?php echo time(); ?>">
</head>
<body>
	<form data-aos="zoom-in" data-aos-delay="50" data-aos-duration="1000" id="login" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<a href="index.php" title="Go to home:)" class="logo">Logo</a>

		<label>Введите ваш email:</label>
		<input type="email" name="email" placeholder="Email" autofocus value="<?php echo $email; ?>" required>

		<label>Введите ваш пароль:</label>
		<input type="password" name="pass" placeholder="Пароль" title="Пароль должен быть более 7 символов и содержать заглавные буквы" required>

		<?php include('errors.php'); ?>

		<input type="submit" name="submit" value="Войти">
		<p>Нет аккаунта? <a href="sign.php" title="Регистрация" class="link">Зарегистрироваться</a></p>
		<p><a class="link" href="passchange.php">Забыли пароль?</a></p>

	</form>
	<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
	<script>
		AOS.init();
	</script>
</body>
</html>