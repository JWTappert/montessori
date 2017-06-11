<?php
	include("../includes/header.php");
	include("../includes/db_connect.php");
	include("lesson.php");

	$success = "Record saved successfully";
	$failed = "Error: could not save user info";
	$output = "";

	$new_lesson = new Lesson($_POST["name"], $_POST["description"],
		$_POST["type_id"]);

	if($new_lesson->createLesson()){
		$output = $success;
	} else {
		$output = $failed;
	}

	echo "<div class=\"wrapper\">";
	echo "    <div class=\"main-content\">";
	echo "<h1 style=\"text-align: center;\">"; echo "$output"; echo "</h1>";
	echo "    </div>";
	echo "</div>";
	$db->close();
?>