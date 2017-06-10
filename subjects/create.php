<?php
	include("../includes/header.php");
	include("../includes/db_connect.php");
	include("subject.php");

	$success = "Record saved successfully";
	$failed = "Error: could not save user info";
	$output = "";

	$new_subject = new Subject($_POST["type"]);

	if($new_subject->createSubject()){
		$output = $success;
	} else {
		$output = $failed;
	}

	echo "<div class=\"wrapper\">";
	echo "    <div class=\"main-content\">";
	echo "<h1 style=\"text-align: center;\">"; echo "$output"; echo "</h1>";
	echo "    </div>";
	echo "</div>";
?>