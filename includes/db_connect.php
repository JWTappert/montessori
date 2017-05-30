<?php 

	$dbserver = "localhost";
	$dbusername = "root";
	$dbpassword = "password";
	$dbname = "montessori";

	$db = new mysqli($dbserver, $dbusername, $dbpassword, $dbname);

	if ($db->connect_error) {
		die("Connection failed: " . $db->connect_error);
	}
	echo "Connected Successfully";
?>