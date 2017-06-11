<?php
	include("../includes/header.php");
	include("../includes/db_connect.php");
	include("lesson.php");

	$lesson = new Lesson("","","");


	echo "<div class=\"wrapper\">";
	echo "    <div class=\"main-content\">";
	if($lesson->deleteLesson()){
	 	echo "<h1>Record successfully deleted</h1>";
	}else {
	 	echo "<h1 style=\"text-align: center;\">" . $db->error . "</h1>";
	}
	echo "    </div>";
	echo "</div>";
	$db->close();
?>