<?php
require_once('configs/config.php');
require_once('models/Database.php');

$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);

try{
    $link = $db->connect();
}
catch(Exception $e){
    echo "<span style='color: white'>".$e->getmessage()."</span>";
}