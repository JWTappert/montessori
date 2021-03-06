<?php  
	$title = "Classrooms";
	include("includes/header.php");
	include("classrooms/classroom.php");

	$classroom = new Classroom(NULL, NULL, NULL);
	$list_classrooms = $classroom->loadClassrooms();
	$db->close();
?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-warning">
				<div class="panel-heading">
					<h3>Classrooms</h3>
				</div>

				<div class="panel-body">
					<div class="table-responsive">
						<table class="table">
							<tr>
								<th>Classroom Number</th>
								<th>Lead Teacher</th>
								<th>Assistant</th>
								<th><a href="classrooms/form.php" class="btn btn-warning" role="button">New</a></th>
							</tr>
							<?php for ($i = 1; $i < sizeof($list_classrooms); $i++) {
								echo "<tr>";

								echo "<td>";
								echo $list_classrooms[$i]->classroom_number;
								echo "</td>";

								echo "<td>";
								echo $list_classrooms[$i]->lead;
								echo "</td>";

								echo "<td>";
								echo $list_classrooms[$i]->assistant;
								echo "</td>";

								echo "<td>";
								echo "<a href=\"classrooms/delete.php?id=" . $list_classrooms[$i]->id . "\" class=\"btn btn-danger\" role=\"button\"><i class=\"fa fa-trash\" aria-hidden=\"true\"></i></a>";
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
