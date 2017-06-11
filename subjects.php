<?php  
	$title = "Subjects";
	include("includes/header.php");
	include("subjects/subject.php");

	$subject = new Subject(NULL);
	$list_subjects = $subject->loadSubjects();
	$db->close();
?>

<div class="container">
	<div class="row">
	<div class="col-md-2"></div>
		<div class="col-md-8">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3>Subjects</h3>
				</div>

				<div class="panel-body">
					<div class="table-responsive">
						<table class="table">
							<tr>
								<th>Subject Id</th>
								<th>Subject Name</th>
								<th><a href="subjects/form.php" class="btn btn-default" role="button">New</a></th>
							</tr>
							<?php for ($i = 1; $i < sizeof($list_subjects); $i++) {
								echo "<tr>";

								echo "<td>";
								echo $list_subjects[$i]->subject_id;
								echo "</td>";

								echo "<td>";
								echo $list_subjects[$i]->type;
								echo "</td>";

								echo "<td>";
								echo "<a href=\"subjects/delete.php?id=" . $list_subjects[$i]->subject_id . "\" class=\"btn btn-danger\" role=\"button\"><i class=\"fa fa-trash\" aria-hidden=\"true\"></i></a>";
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
