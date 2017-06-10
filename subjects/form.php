<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<div class="container">
	<div class="row">
	<div class="col-md-3"></div>
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3>New Subject</h3>
				</div>

				<div class="panel-body">
					<form method="post" action="create.php">
						<div class="form-group">
							<label for="type">Subject Name</label>
							<input class="form-control" type="text" name="type" placeholder="Subject Name">
						</div>
						<button class="btn btn-default" type="submit">Create</button>
					</form>
				</div>

			</div>
		</div>
	</div>
</div>

	</body>
</html>