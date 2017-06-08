<?php  
	$title = "Lessons";
	include("includes/header.php");
	include("lessons/lesson.php");

	$lesson = new Lesson(NULL, NULL, NULL);
	$list_lessons = $lesson->loadLessons();
?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-danger">
				<div class="panel-heading">
					<h3>Lessons</h3>
				</div>

				<div class="panel-body">
					<div class="table-responsive">
						<table class="table">
							<tr>
								<th>Lesson Name</th>
								<th>Description</th>
								<th>Subject</th>
								<th><a href="lessons/form.php" class="btn btn-danger" role="button">New</a></th>
							</tr>
							<?php foreach ($list_lessons as $lesson) {
								echo "<tr>";

								echo "<td>";
								echo $lesson->name;
								echo "</td>";

								echo "<td>";
								echo $lesson->description;
								echo "</td>";

								echo "<td>";
								echo $lesson->type_id;
								echo "</td>";

								echo "<td>";
								echo "<a href=\"lessons/delete.php?id=" . $lesson->id . "\" class=\"btn btn-primary\" role=\"button\"><i class=\"fa fa-trash\" aria-hidden=\"true\"></i></a>";
								echo "</td>";

								echo "</tr>";
							}  ?>
						</table>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>

	</body>
</html>
