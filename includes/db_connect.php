<?php 

	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "password";
	$dbname = "montessori";

	// $dbhost = 'oniddb.cws.oregonstate.edu';
	// $dbname = 'tappertj-db';
	// $dbuser = 'tappertj-db';
	// $dbpass = 'wAyJRbK8nYMU7hir';

	$db = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

	if ($db->connect_error) {
		echo $db->connect_error;
	 	die("Connection failed: " . $db->connect_error);
	}
	// echo "Connected Successfully";
?>