<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<div class="container">
	<div class="row">
	<div class="col-md-3"></div>
		<div class="col-md-6">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3>New Assistant</h3>
				</div>

				<div class="panel-body">
					<form method="post" action="create.php">
						<div class="form-group">
							<label for="first_name">First Name</label>
							<input class="form-control" type="text" name="first_name" placeholder="First Name">
						</div>
						<div class="form-group">
							<label for="last_name">Last Name</label>
							<input class="form-control" type="text" name="last_name" placeholder="Last Name">
						</div>
						<div class="form-group">
							<label for="birth_date">Birthday</label>
							<input class="form-control" type="text" name="birth_date" placeholder="Birthday">
						</div>
						<div class="form-group">
							<label for="phone">Phone Number</label>
							<input class="form-control" type="text" name="phone" placeholder="Phone Number">
						</div>
						<div class="form-group">
							<label for="email">Email</label>
							<input class="form-control" type="text" name="email" placeholder="Email">
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
						<button class="btn btn-info" type="submit">Createbutton>
					</form>
				</div>

			</div>
		</div>
	</div>
</div>

	</body>
</html>