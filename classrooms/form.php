<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-warning">
				<div class="panel-heading">
					<h3>New Classroom</h3>
				</div>

				<div class="panel-body">
					<form method="post" action="create.php">
						<div class="form-group">
							<label for="classroom_number">Classroom Number</label>
							<input class="form-control" type="text" name="classroom_number" placeholder="Classroom Number">
						</div>
						<div class="form-group">
							<label for="lead">Lead Teacher</label>
							<input class="form-control" type="text" name="lead" placeholder="Lead Teacher">
						</div>
						<div class="form-group">
							<label for="assistant">Assistant</label>
							<input class="form-control" type="text" name="assistant" placeholder="Assistant">
						</div>
						<button class="btn btn-warning" type="submit">Create</button>
					</form>
				</div>

			</div>
		</div>
	</div>
</div>

	</body>
</html>