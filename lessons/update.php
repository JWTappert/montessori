<?php
	$title = "Update lesson Info";
	include("../includes/header.php");
	include("../lessons/lesson.php");

	$updatelesson = new Lesson(NULL, NULL, NULL);
	$updatelesson->displayLessonInfo($_GET["id"]);

	if(isset($_POST["update"])) {

	 	if($updatelesson->updateLessonInfo($_GET["id"], $_POST["name"], $_POST["description"], $_POST["type_id"])){
			echo "<h1> Record Successfully updated </h1>";
		} else {
			echo "ERROR: Could not execute"; //. mysqli_error($db);
		}
	}
?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-danger">
				<div class="panel-heading">
					<h3><?php echo $updatelesson->name ?></h3>
				</div>

				<div class="panel-body">
					<form method="post">
						<div class="form-group">
							<label for="name">Lesson Name</label>
							<input class="form-control" type="text" name="name" value="<?php echo $updatelesson->name; ?>">
						</div>
						<div class="form-group">
							<label for="description">Description</label>
							<input class="form-control" type="text" name="description" value="<?php echo $updatelesson->description; ?>">
						</div>
						<div class="form-group">
							<label for="type_id">Subject</label>
							<input class="form-control" type="text" name="type_id" value="<?php echo $updatelesson->type_id; ?>">
						</div>
						<button class="btn btn-danger" type="submit" name="update">Update</button>
					</form>
				</div>

			</div>
		</div>
	</div>
</div>

	</body>
</html>