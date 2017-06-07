<?php  
	$title = "Teachers";
	include("includes/header.php");
	include("teachers/teachers.php");

	$teacher = new Teacher(NULL, NULL, NULL, NULL, NULL, NULL);
	$list_teachers = $teacher->loadTeachers();
?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-success">
				<div class="panel-heading">
					<h3>Teachers</h3>
				</div>

				<div class="panel-body">
					<div class="table-responsive">
						<table class="table">
							<tr>
								<th>First Name</th>
								<th>Last Name</th>
								<th>Birthday</th>
								<th>Phone</th>
								<th>Email</th>
								<th>Classroom</th>
								<th><a href="teachers/form.php" class="btn btn-success" role="button">New</a></th>
							</tr>
							<?php foreach ($list_teachers as $teacher) {
								echo "<tr>";

								echo "<td>";
								echo "<a href=\"teachers/update.php?id=" . $teacher->id . "\">";
								echo $teacher->first_name;
								echo "</a>";
								echo "</td>";

								echo "<td>";
								echo $teacher->last_name;
								echo "</td>";

								echo "<td>";
								echo $teacher->birth_date;
								echo "</td>";

								echo "<td>";
								echo $teacher->phone;
								echo "</td>";

								echo "<td>";
								echo $teacher->email;
								echo "</td>";

								echo "<td>";
								echo $teacher->classroom_id;
								echo "</td>";

								echo "<td>";
								echo "<a href=\"teachers/delete.php?id=" . $teacher->id . "\" class=\"btn btn-danger\" role=\"button\"><i class=\"fa fa-trash\" aria-hidden=\"true\"></i></a>";
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
