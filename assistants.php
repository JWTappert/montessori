<?php  
	$title = "Assistants";
	include("includes/header.php");
	include("assistants/assistant.php");

	$assistant = new Assistant(NULL, NULL, NULL, NULL, NULL, NULL);
	$list_assistants = $assistant->loadAssistants();
	$db->close();
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
							<?php for ($i = 1; $i < sizeof($list_assistants); $i++) {
								echo "<tr>";

								echo "<td>";
								echo "<a href=\"assistants/update.php?id=" . $list_assistants[$i]->id . "\">";
								echo $list_assistants[$i]->first_name;
								echo "</a>";
								echo "</td>";

								echo "<td>";
								echo $list_assistants[$i]->last_name;
								echo "</td>";

								echo "<td>";
								echo $list_assistants[$i]->birth_date;
								echo "</td>";

								echo "<td>";
								echo $list_assistants[$i]->phone;
								echo "</td>";

								echo "<td>";
								echo $list_assistants[$i]->email;
								echo "</td>";

								echo "<td>";
								echo $list_assistants[$i]->teacher_id;
								echo "</td>";

								echo "<td>";
								echo "<a href=\"assistants/delete.php?id=" . $list_assistants[$i]->id . "\" class=\"btn btn-danger\" role=\"button\"><i class=\"fa fa-trash\" aria-hidden=\"true\"></i></a>";
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
