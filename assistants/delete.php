<?php
	include("../includes/header.php");
	include("../includes/db_connect.php");
	include("assistant.php");

	$assistant = new Assistant("","","","","","");


	echo "<div class=\"wrapper\">";
	echo "    <div class=\"main-content\">";
	if($assistant->deleteAssistant()){
	 	echo "<h1>Record successfully deleted</h1>";
	}else {
	 	echo "<h1 style=\"text-align: center;\">" . $db->error . "</h1>";
	}
	echo "    </div>";
	echo "</div>";
	$db->close();
?>