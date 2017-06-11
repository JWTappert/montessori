<?php  
	$title = "Students";
	include("includes/header.php");
	include("students/students.php");

	$student = new Student(NULL, NULL, NULL, NULL, NULL);
	if (isset($_GET["search"])){
		$list_students = $student->searchFor($_GET["search"]);
		if (sizeof($list_students) < 1){
			$list_students = $student->loadStudents();
		}
	}else{
		$list_students = $student->loadStudents();
	}

	$db->close();
?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3>Students</h3>
					<form class="form-inline" action="students.php" method="GET">
						<label class="sr-only" for="search">Search</label>
						<input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" name="search" placeholder="search...">
						<button type="submit" class="btn btn-default">Search</button>
					</form>
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
								<th><a href="students/form.php" class="btn btn-primary" role="button">New</a></th>
							</tr>
							<?php for ($i = 0; $i < sizeof($list_students); $i++) {
								echo "<tr>";

								echo "<td>";
								echo "<a href=\"students/update.php?id=" . $list_students[$i]->id . "\">";
								echo $list_students[$i]->first_name;
								echo "</a>";
								echo "</td>";

								echo "<td>";
								echo $list_students[$i]->last_name;
								echo "</td>";

								echo "<td>";
								echo $list_students[$i]->birth_date;
								echo "</td>";

								echo "<td>";
								echo Student::$groups[$list_students[$i]->age_group];
								echo "</td>";

								echo "<td>";
								echo $list_students[$i]->classroom_id;
								echo "</td>";

								echo "<td>";
								echo "<a href=\"students/delete.php?id=" . $list_students[$i]->id . "\" class=\"btn btn-danger\" role=\"button\"><i class=\"fa fa-trash\" aria-hidden=\"true\"></i></a>";
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
