<?php
	include("../includes/header.php");
	include("../includes/db_connect.php");
	include("assistant.php");

	$success = "Record saved successfully";
	$failed = "Error: could not save user info";
	$output = "";

	$new_assistant = new Assistant($_POST["first_name"], $_POST["last_name"],
		$_POST["birth_date"], $_POST["phone"], $_POST["email"], $_POST["teacher_id"]);

	if($new_assistant->createAssistant()){
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