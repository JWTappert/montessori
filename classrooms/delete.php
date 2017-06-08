<?php
	include("../includes/header.php");
	include("../includes/db_connect.php");
	include("classroom.php");

	$classroom = new Classroom("","","");


	echo "<div class=\"wrapper\">";
	echo "    <div class=\"main-content\">";
	if($classroom->deleteClassroom()){
	 	echo "<h1>Record successfully deleted</h1>";
	}else {
	 	echo "<h1 style=\"text-align: center;\">" . $db->error . "</h1>";
	}
	echo "    </div>";
	echo "</div>";
?>