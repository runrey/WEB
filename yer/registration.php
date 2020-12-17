<?php
include "connect.php";
require_once "models/People.php";
include "models/Users.php";

$error = array();

if(!empty($_POST['username']) && !empty($_POST['first_name']) && !empty($_POST['last_name']) && !empty($_POST['email']) && !empty($_POST['url']) && !empty($_POST['pass']) && !empty($_POST['r_pass'])){

    $username = $_POST['username'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $url = $_POST['url'];
    $password = $_POST['pass'];
    $rePassword = $_POST['r_pass'];

    //checking for equality of passwords
	if($rePassword != $password){
		array_push($error, "Passwords are not matching!");
	}
	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
	  	array_push($error, "Email is not correct!");
	}
	if(substr($url, 0, 4) != "http"){
		array_push($error, "Your URL address is invalid!");
	}
	if(count($error) == 0){
		array_push($error, "success");   
	    $user = new Users($username, $first_name, $last_name, $url, $email, md5($password));
	    $param1 = $user->getUsername();
	    $param2 = $user->getFirstName();
	    $param3 = $user->getLastName();
	    $param4 = $user->getUrl();
	    $param5 = $user->getEmail();
	    $param6 = $user->getPassword();
	    $stmt = $link->prepare("INSERT INTO users(username, first_name, last_name, url, email, pass) VALUES (?,?,?,?,?,?)");
	    $stmt->bind_param("ssssss", $param1, $param2, $param3, $param4, $param5, $param6);
	    $results = $stmt->execute();

	    $stmt->close();   
	}
}

else{
  	array_push($error, "Not all fields are filled!");
}
    
echo json_encode($error);

?>