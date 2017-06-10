<?php  
	$title = "Assistants";
	include("includes/header.php");
	include("assistants/assistant.php");

	$assistant = new Assistant(NULL, NULL, NULL, NULL, NULL, NULL);
	$list_assistants = $assistant->loadAssistants();
?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3>Assistants</h3>
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
								<th>Teachers</th>
								<th><a href="assistants/form.php" class="btn btn-info" role="button">New</a></th>
							</tr>
							<?php foreach ($list_assistants as $assistant) {
								echo "<tr>";

								echo "<td>";
								echo "<a href=\"assistants/update.php?id=" . $assistant->id . "\">";
								echo $assistant->first_name;
								echo "</a>";
								echo "</td>";

								echo "<td>";
								echo $assistant->last_name;
								echo "</td>";

								echo "<td>";
								echo $assistant->birth_date;
								echo "</td>";

								echo "<td>";
								echo $assistant->phone;
								echo "</td>";

								echo "<td>";
								echo $assistant->email;
								echo "</td>";

								echo "<td>";
								echo $assistant->teacher_id;
								echo "</td>";

								echo "<td>";
								echo "<a href=\"assistants/delete.php?id=" . $assistant->id . "\" class=\"btn btn-danger\" role=\"button\"><i class=\"fa fa-trash\" aria-hidden=\"true\"></i></a>";
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
