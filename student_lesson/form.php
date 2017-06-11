<?php
	$title = "New Relationship";
	include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
	include $_SERVER['DOCUMENT_ROOT'] . '/students/students.php';
	include $_SERVER['DOCUMENT_ROOT'] . '/lessons/lesson.php';

	$student = new Student(NULL, NULL, NULL, NULL, NULL, NULL);
	$list_students = $student->loadStudents();

	$lesson = new Lesson(NULL, NULL, NULL);
	$list_lessons = $lesson->loadLessons();
?>

<div class="container">
	<div class="row">
	<div class="col-md-3"></div>
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3>Mark Lesson as completed</h3>
				</div>

				<div class="panel-body">
					<form method="post" action="create.php">
						<div class="form-group">
							<label for="student_id">Student Name</label>
							<select class="form-control" type="text" name="student_id">
								<?php for ($i = 0; $i < sizeof($list_students); $i++) {
									echo "<option value=" . $list_students[$i]->id . ">" . $list_students[$i]->first_name . ' ' . $list_students[$i]->last_name . "</option>";
								}?>
							</select>
						</div>
						<div class="form-group">
							<label for="lesson_id">Lesson Name</label>
							<select class="form-control" type="text" name="lesson_id">
								<?php for ($i = 0; $i < sizeof($list_lessons); $i++) {
									echo "<option value=" . $list_lessons[$i]->id . ">" . $list_lessons[$i]->name . "</option>";
								}?>
							</select>
						</div>
						<button class="btn btn-success" type="submit">Done</button>
					</form>
				</div>

			</div>
		</div>
	</div>
</div>

	</body>
</html>