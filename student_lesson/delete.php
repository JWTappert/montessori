<?php
	include("../includes/header.php");
	include("../includes/db_connect.php");
	include("student_lesson.php");

	$item = new Student_Lesson("","");


	echo "<div class=\"wrapper\">";
	echo "    <div class=\"main-content\">";
	if($item->delete()){
	 	echo "<h1>Record successfully deleted</h1>";
	}else {
	 	echo "<h1 style=\"text-align: center;\">" . $db->error . "</h1>";
	}
	echo "    </div>";
	echo "</div>";
	$db->close();
?>