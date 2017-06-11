<?php
	$title = "New Student";
	include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
	include $_SERVER['DOCUMENT_ROOT'] . '/classrooms/classroom.php';
	include("students.php");
	$classroom = new Classroom(NULL, NULL, NULL);
	$list_classrooms = $classroom->loadClassrooms();
	$db->close();
?>

<div class="container">
	<div class="row">
	<div class="col-md-3"></div>
		<div class="col-md-6">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3>New Student</h3>
				</div>

				<div class="panel-body">
					<form method="post" action="create.php">
						<div class="form-group">
							<label for="first_name">First Name</label>
							<input class="form-control" type="text" name="first_name" placeholder="First Name">
						</div>
						<div class="form-group">
							<label for="last_name">Last Name</label>
							<input class="form-control" type="text" name="last_name" placeholder="Last Name">
						</div>
						<div class="form-group">
							<label for="birth_date">Birthday</label>
							<input class="form-control" type="text" name="birth_date" placeholder="Birthday">
						</div>
						<div class="form-group">
							<label for="age_group">Age Group</label>
							<select class="form-control" type="text" name="age_group">
								<?php for ($i = 0; $i < sizeof(Student::$groups); $i++) {
									echo "<option value=" . $i . ">" . Student::$groups[$i] . "</option>"; 
								}?>
							</select>
						</div>
						<div class="form-group">
							<label for="classroom_id">Classroom</label>
							<select class="form-control" type="text" name="classroom_id">
								<?php for ($i = 1; $i < sizeof($list_classrooms); $i++) {
									echo "<option value=" . $list_classrooms[$i]->id . ">" . $list_classrooms[$i]->classroom_number . "</option>";
								}?>
							</select>
						</div>
						<button class="btn btn-primary" type="submit">Create</button>
					</form>
				</div>

			</div>
		</div>
	</div>
</div>

	</body>
</html>