<?
	$title = "New Classroom";
	include("../includes/header.php");
	include("../assistants/assistant.php");
	include("../teachers/teachers.php");

	$assistant = new Assistant(NULL, NULL, NULL, NULL, NULL, NULL);
	$list_assistants = $assistant->loadAssistants();

	$teacher = new Teacher(NULL, NULL, NULL, NULL, NULL, NULL);
	$list_teachers = $teacher->loadTeachers();
	$db->close();
?>

<div class="container">
	<div class="row">
	<div class="col-md-3"></div>
		<div class="col-md-6">
			<div class="panel panel-warning">
				<div class="panel-heading">
					<h3>New Classroom</h3>
				</div>

				<div class="panel-body">
					<form method="post" action="create.php">
						<div class="form-group">
							<label for="classroom_number">Classroom Number</label>
							<input class="form-control" type="number" name="classroom_number" placeholder="Classroom Number">
						</div>
						<div class="form-group">
							<label for="lead">Lead Teacher</label>
							<select class="form-control" type="text" name="lead">
								<?php for ($i = 1; $i < sizeof($list_teachers); $i++) {
									echo "<option value=" . $list_teachers[$i]->id . ">" . $list_teachers[$i]->first_name . " " . $list_teachers[$i]->last_name . "</option>";
								}?>
							</select>
						</div>
						<div class="form-group">
							<label for="assistant">Assistant</label>
							<select class="form-control" type="text" name="assistant">
								<?php for ($i = 1; $i < sizeof($list_assistants); $i++) {
									echo "<option value=" . $list_assistants[$i]->id . ">" . $list_assistants[$i]->first_name . " " . $list_assistants[$i]->last_name . "</option>";
								}?>
							</select>
						</div>
						<button class="btn btn-warning" type="submit">Create</button>
					</form>
				</div>

			</div>
		</div>
	</div>
</div>

	</body>
</html>