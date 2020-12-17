<?php
	session_start();
	//error_reporting(0);
	$db = mysqli_connect('localhost', 'root', '', 'sitedb') OR DIE('ERROR: Could not connect to database.');;
?>