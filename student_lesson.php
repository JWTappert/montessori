<?php  
	$title = "Student to Lessons";
	include("includes/header.php");
	include("student_lesson/student_lesson.php");

	$item = new Student_Lesson("", "");
	$all = $item->load();
	$db->close();
?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3>Completed Lessons</h3>
				</div>

				<div class="panel-body">
					<div class="table-responsive">
						<table class="table">
							<tr>
								<th>Student Name</th>
								<th>Lessons Completed</th>
								<th><a href="student_lesson/form.php" class="btn btn-success" role="button">New</a></th>
							</tr>
							<?php foreach ($all as $one) {
								echo "<tr>";

								echo "<td>";
								echo $one->student;
								echo "</td>";

								echo "<td>";
								echo $one->lesson;
								echo "</td>";

								echo "<td>";
								echo "<a href=\"student_lesson/delete.php?id=" . $one->lesson_id . "\" class=\"btn btn-primary\" role=\"button\"><i class=\"fa fa-trash\" aria-hidden=\"true\"></i></a>";
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
