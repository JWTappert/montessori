<?php
	$title = "Update Student Info";
	include("../includes/header.php");
	include("../students/students.php");

	$updateStudent = new Student(NULL, NULL, NULL, NULL, NULL, NULL);
	$updateStudent->displayStudentInfo($_GET["id"]);

	if(isset($_POST["update"])) {

	 	if($updateStudent->updateStudentInfo($_GET["id"], $_POST["first_name"], $_POST["last_name"], $_POST["birth_date"], $_POST["age_group"], $_POST["classroom_id"])){
			echo "<h1> Record Successfully updated </h1>";
		} else {
			echo "ERROR: Could not execute"; //. mysqli_error($db);
		}
	}
?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3><?php echo $updateStudent->first_name . " " . $updateStudent->last_name?></h3>
				</div>

				<div class="panel-body">
					<form method="post">
						<div class="form-group">
							<label for="first_name">First Name</label>
							<input class="form-control" type="text" name="first_name" value="<?php echo $updateStudent->first_name; ?>">
						</div>
						<div class="form-group">
							<label for="last_name">Last Name</label>
							<input class="form-control" type="text" name="last_name" value="<?php echo $updateStudent->last_name; ?>">
						</div>
						<div class="form-group">
							<label for="birth_date">Birthday</label>
							<input class="form-control" type="text" name="birth_date" value="<?php echo $updateStudent->birth_date; ?>">
						</div>
						<div class="form-group">
							<label for="age_group">Age Group</label>
							<input class="form-control" type="text" name="age_group" value="<?php echo $updateStudent->age_group; ?>">
						</div>
						<div class="form-group">
							<label for="classroom_id">Classroom</label>
							<input class="form-control" type="text" name="classroom_id" value="<?php echo $updateStudent->classroom_id; ?>">
						</div>
						<button type="submit" name="update">Update</button>
					</form>
				</div>

			</div>
		</div>
	</div>
</div>

	</body>
</html>