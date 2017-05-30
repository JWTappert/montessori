<?php  
	$title = "Students";
	include("includes/header.php");
	include("students/students.php");

	$student = new Student(NULL, NULL, NULL, NULL, NULL, NULL);
	$list_students = $student->loadStudents();
?>
		<h1>Students</h1>

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
					echo $value->first_name;
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
	</body>
</html>
