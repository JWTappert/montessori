<?php
	include("../includes/header.php");
	include("../includes/db_connect.php");
	include("student_lesson.php");

	$success = "Record saved successfully";
	$failed = "Error: could not save relationship info";
	$output = "";

	$new_item = new Student_Lesson($_POST["student_id"], $_POST["lesson_id"]);

	if($new_item->create()){
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