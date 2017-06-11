<?php
	include("../includes/header.php");
	//include("../includes/db_connect.php");
	include("teachers.php");

	$success = "Record saved successfully";
	$failed = "Error: could not save user info";
	$output = "";

	$new_teacher = new Teacher($_POST["first_name"], $_POST["last_name"],
		$_POST["birth_date"], $_POST["phone"], $_POST["email"], $_POST["classroom_id"]);

	if($new_teacher->createTeacher()){
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