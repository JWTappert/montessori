<?php
	include("../includes/header.php");
	include("../includes/db_connect.php");
	include("classroom.php");

	$success = "Record saved successfully";
	$failed = "Error: could not save user info";
	$output = "";

	$new_classroom = new Classroom($_POST["classroom_number"], $_POST["lead"],
		$_POST["assistant"]);

	if($new_classroom->createClassroom()){
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