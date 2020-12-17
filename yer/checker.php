<?php
include "connect.php";

if($_POST['username']){
    $username = $_POST['username'];

    $sql = "SELECT * FROM users WHERE username = ?";

    $stmt = $link->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $res = $stmt->get_result();

    $stmt->close();
    
    if(mysqli_num_rows($res)>0){
        $array = array('message' => "not-available");
    }

    if(mysqli_num_rows($res)==0){
        $array = array('message' => "available");
    }

    echo json_encode($array);
}
?>