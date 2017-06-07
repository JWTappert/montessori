<?php
	$title = "Update Teacher Info";
	include("../includes/header.php");
	include("../teachers/teachers.php");

	$updateTeacher = new Teacher(NULL, NULL, NULL, NULL, NULL, NULL);
	$updateTeacher->displayTeacherInfo($_GET["id"]);

	if(isset($_POST["update"])) {

	 	if($updateTeacher->updateTeacherInfo($_GET["id"], $_POST["first_name"], $_POST["last_name"], $_POST["birth_date"], $_POST["phone"], $_POST["email"], $_POST["classroom_id"])){
			echo "<h1> Record Successfully updated </h1>";
		} else {
			echo "ERROR: Could not execute"; //. mysqli_error($db);
		}
	}
?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-success">
				<div class="panel-heading">
					<h3><?php echo $updateTeacher->first_name . " " . $updateTeacher->last_name?></h3>
				</div>

				<div class="panel-body">
					<form method="post">
						<div class="form-group">
							<label for="first_name">First Name</label>
							<input class="form-control" type="text" name="first_name" value="<?php echo $updateTeacher->first_name; ?>">
						</div>
						<div class="form-group">
							<label for="last_name">Last Name</label>
							<input class="form-control" type="text" name="last_name" value="<?php echo $updateTeacher->last_name; ?>">
						</div>
						<div class="form-group">
							<label for="birth_date">Birthday</label>
							<input class="form-control" type="text" name="birth_date" value="<?php echo $updateTeacher->birth_date; ?>">
						</div>
						<div class="form-group">
							<label for="phone">Phone Number</label>
							<input class="form-control" type="text" name="phone" value="<?php echo $updateTeacher->phone; ?>">
						</div>
						<div class="form-group">
							<label for="email">Email</label>
							<input class="form-control" type="text" name="email" value="<?php echo $updateTeacher->email; ?>">
						</div>
						<div class="form-group">
							<label for="classroom_id">Classroom</label>
							<select class="form-control" type="text" name="classroom_id">
								<option value="0">Select...</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
							</select>
						</div>
						<button class="btn btn-success" type="submit" name="update">Update</button>
					</form>
				</div>

			</div>
		</div>
	</div>
</div>

	</body>
</html>