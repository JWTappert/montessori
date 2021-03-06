<!DOCTYPE html>
<?php  
	include_once(dirname(__FILE__) . "/db_connect.php");
?>
<html lang="en">
	<head>
		<title><?php echo $title ?></title>
		<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,700">
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"/>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<script src="https://use.fontawesome.com/63a9b81731.js"></script>
	</head>
	
	<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="/">CS340</a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	      <ul class="nav navbar-nav">
	        <li><a href="/students.php">Students </a></li>
	        <li><a href="/teachers.php">Teachers </a></li>
	        <li><a href="/assistants.php">Assistants </a></li>
	        <li><a href="/classrooms.php">Classrooms </a></li>
	        <li><a href="/lessons.php">Lessons </a></li>
	        <li><a href="/subjects.php">Subjects </a></li>
	        <li><a href="/student_lesson.php">Completed Lessons </a></li>
	      </ul>
	      </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>

	<body>