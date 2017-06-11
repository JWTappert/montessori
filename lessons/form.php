<?php
	$title = "New Lesson";
	include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
	include $_SERVER['DOCUMENT_ROOT'] . '/subjects/subject.php';

	$subject = new Subject(NULL);
	$list_subjects = $subject->loadSubjects();
?>

<div class="container">
	<div class="row">
	<div class="col-md-3"></div>
		<div class="col-md-6">
			<div class="panel panel-danger">
				<div class="panel-heading">
					<h3>New Lesson</h3>
				</div>

				<div class="panel-body">
					<form method="post" action="create.php">
						<div class="form-group">
							<label for="name">Lesson Name</label>
							<input class="form-control" type="text" name="name" placeholder="Lesson Name">
						</div>
						<div class="form-group">
							<label for="description">Description</label>
							<input class="form-control" type="text" name="description" placeholder="Description">
						</div>
						<div class="form-group">
							<label for="type_id">Type</label>
							<select class="form-control" type="text" name="type_id">
								<?php for ($i = 1; $i < sizeof($list_subjects); $i++) {
									echo "<option value=" . $list_subjects[$i]->subject_id . ">" . $list_subjects[$i]->type . "</option>";
								}?>
							</select>
						</div>
						<button class="btn btn-danger" type="submit">Create</button>
					</form>
				</div>

			</div>
		</div>
	</div>
</div>

	</body>
</html>