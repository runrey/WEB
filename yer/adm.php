<?php
include "connect.php";
require_once "models/People.php";
include "models/Users.php";

session_start();
$error = array();

if(!empty($_POST['username']) && !empty($_POST['password'])){

    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $stmt = $link->prepare("SELECT * FROM admins WHERE a_username = ? and a_pass = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $res = $stmt->get_result();

    $stmt->close();
    
    if(mysqli_num_rows($res)>0){
    	$row = $res->fetch_assoc();
    	$_SESSION['id'] = $row['admin_id'];
        $_SESSION['username'] = $username;
        $_SESSION['adm'] = "admin";
        array_push($error, "good");
    }

    if(mysqli_num_rows($res)==0){
        array_push($error, "Wrong password");
    }
}

else{
  	array_push($error, "Not all fields are filled!");
}
    
echo json_encode($error);
?>