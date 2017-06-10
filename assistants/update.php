<?php
	$title = "Update assistant Info";
	include("../includes/header.php");
	include("../assistants/assistant.php");

	$updateassistant = new Assistant(NULL, NULL, NULL, NULL, NULL, NULL);
	$updateassistant->displayAssistantInfo($_GET["id"]);

	if(isset($_POST["update"])) {

	 	if($updateassistant->updateAssistantInfo($_GET["id"], $_POST["first_name"], $_POST["last_name"], $_POST["birth_date"], $_POST["phone"], $_POST["email"], $_POST["teacher_id"])){
			echo "<h1> Record Successfully updated </h1>";
		} else {
			echo "ERROR: Could not execute"; //. mysqli_error($db);
		}
	}
?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3><?php echo $updateassistant->first_name . " " . $updateassistant->last_name?></h3>
				</div>

				<div class="panel-body">
					<form method="post">
						<div class="form-group">
							<label for="first_name">First Name</label>
							<input class="form-control" type="text" name="first_name" value="<?php echo $updateassistant->first_name; ?>">
						</div>
						<div class="form-group">
							<label for="last_name">Last Name</label>
							<input class="form-control" type="text" name="last_name" value="<?php echo $updateassistant->last_name; ?>">
						</div>
						<div class="form-group">
							<label for="birth_date">Birthday</label>
							<input class="form-control" type="text" name="birth_date" value="<?php echo $updateassistant->birth_date; ?>">
						</div>
						<div class="form-group">
							<label for="phone">Phone Number</label>
							<input class="form-control" type="text" name="phone" value="<?php echo $updateassistant->phone; ?>">
						</div>
						<div class="form-group">
							<label for="email">Email</label>
							<input class="form-control" type="text" name="email" value="<?php echo $updateassistant->email; ?>">
						</div>
						<div class="form-group">
							<label for="teacher_id">Teacher</label>
							<select class="form-control" type="text" name="teacher_id">
								<option value="0">Select...</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
							</select>
						</div>
						<button class="btn btn-info" type="submit" name="update">Update</button>
					</form>
				</div>

			</div>
		</div>
	</div>
</div>

	</body>
</html>