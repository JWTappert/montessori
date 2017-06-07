<?php
	include("../includes/header.php");
	include("../includes/db_connect.php");
	include("students.php");

	$success = "Record saved successfully";
	$failed = "Error: could not save user info";
	$output = "";

	$new_student = new Student($_POST["first_name"], $_POST["last_name"],
		$_POST["birth_date"], $_POST["age_group"], $_POST["classroom_id"]);

	if($new_student->createStudent()){
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