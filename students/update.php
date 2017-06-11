<?php
	$title = "Update Student Info";
	include("../includes/header.php");
	include("../students/students.php");
	include("../classrooms/classroom.php");

	$updateStudent = new Student(NULL, NULL, NULL, NULL, NULL, NULL);
	$updateStudent->displayStudentInfo($_GET["id"]);

	if(isset($_POST["update"])) {

	 	if($updateStudent->updateStudentInfo($_GET["id"], $_POST["first_name"], $_POST["last_name"], $_POST["birth_date"], $_POST["age_group"], $_POST["classroom_id"])){
			echo "<h1> Record Successfully updated </h1>";
		} else {
			echo "ERROR: Could not execute"; //. mysqli_error($db);
		}
	}
	$classroom = new Classroom(NULL, NULL, NULL);
	$list_classrooms = $classroom->loadClassrooms();
	$db->close();
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
							<select class="form-control" type="text" name="age_group">
								<?php for ($i = 0; $i < sizeof(Student::$groups); $i++) {
									if ($i == $updateStudent->age_group){
										echo "<option value=" . $i . " selected='selected'>" . Student::$groups[$i] . "</option>"; 
									}else{
										echo "<option value=" . $i . ">" . Student::$groups[$i] . "</option>"; 
									}
								}?>
							</select>
						</div>
						<div class="form-group">
							<label for="classroom_id">Classroom</label>
							<select class="form-control" type="text" name="classroom_id">
								<?php for ($i = 1; $i < sizeof($list_classrooms); $i++) {
									if ($i == $updateStudent->classroom_id) {
										echo "<option value=" . $i . " selected='selected'>" . $list_classrooms[$i]->classroom_number . "</option>";
									}else{
										echo "<option value=" . $i . ">" . $list_classrooms[$i]->classroom_number . "</option>";
									}
								}?>
							</select>
						</div>
						<button class="btn btn-primary" type="submit" name="update">Update</button>
					</form>
				</div>

			</div>
		</div>
	</div>
</div>

	</body>
</html>