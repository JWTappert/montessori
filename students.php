<?php  
	$title = "Students";
	include("includes/header.php");
	include("students/students.php");

	$student = new Student(NULL, NULL, NULL, NULL, NULL, NULL);
	$list_students = $student->loadStudents();
?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3>Students</h3>
				</div>

				<div class="panel-body">
					<div class="table-responsive">
						<table class="table">
							<tr>
								<th>First Name</th>
								<th>Last Name</th>
								<th>Birthday</th>
								<th>Age Group</th>
								<th>Classroom</th>
							</tr>
							<?php foreach ($list_students as $value) {
								echo "<tr>";
								echo "<td>";
								echo "<a href=\"students/update.php?id=" . $value->id . "\">" . $value->first_name . "</a>";
								echo "</td>";
								echo "<td>";
								echo $value->last_name;
								echo "</td>";
								echo "<td>";
								echo $value->birth_date;
								echo "</td>";
								echo "<td>";
								echo $value->age_group;
								echo "</td>";
								echo "<td>";
								echo $value->classroom_id;
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
