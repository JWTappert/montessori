<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/includes/db_connect.php';

	class Assistant
	{
		public $id;
		public $first_name;
		public $last_name;
		public $birth_date;
		public $phone;
		public $email;
		public $teacher_id;

		public function __construct($first, $last, $dob, $phone, $email, $teacher)
		{
			$this->first_name = $first;
			$this->last_name = $last;
			$this->birth_date = $dob;
			$this->phone = $phone;
			$this->email = $email;
			$this->teacher_id = $teacher;
		}

		public static function loadAssistants() {
			global $db;
			$all_assistants = [];
			$results = $db->query("SELECT a.first_name, a.last_name, a.birth_date, a.phone, a.email, CONCAT(t.first_name, ' ', t.last_name) as 'Teachers'
									FROM assistant a, teacher t
									WHERE a.teacher_id = t.teacher_id
									GROUP BY a.assistant_id;");

			while ($row = $results->fetch_assoc()) {
				$assistant = new Assistant($row["first_name"], $row["last_name"], $row["birth_date"], $row["phone"], $row["email"], $row["Teachers"]);
				$assistant->id = $row["assistant_id"];
				array_push($all_assistants, $assistant);
			}
			$results->free();
			$db->close();
			return $all_assistants;
		}

		public function createAssistant() {
			global $db;

			// escape special characters to help prevents XSS
			$this->first_name = $db->real_escape_string($this->first_name);
			$this->last_name = $db->real_escape_string($this->last_name);
			$this->birth_date = $db->real_escape_string($this->birth_date);
			$this->phone = $db->real_escape_string($this->phone);
			$this->email = $db->real_escape_string($this->email);
			$this->teacher_id = $db->real_escape_string($this->teacher_id);

			$create_query = "INSERT INTO assistant (first_name, last_name, birth_date, phone, email, teacher_id) VALUES ('{$this->first_name}', '{$this->last_name}', '{$this->birth_date}', '{$this->phone}', '{$this->email}', '{$this->teacher_id}')";

			if(mysqli_query($db, $create_query)) {
				return true;
			} else {
				return false;
			}
		}

		public function displayAssistantInfo($id) {
			global $db;

	 		//create and execute a query
	 		$results = $db->query("SELECT * FROM assistant WHERE assistant_id = $id");

	 		//get the first row of the return from the query
	 		$row = $results->fetch_assoc();

	 		$this->first_name = $row["first_name"];
			$this->last_name = $row["last_name"];
			$this->birth_date = $row["birth_date"];
			$this->phone = $row["phone"];
			$this->email = $row["email"];
			$this->teacher_id = $row["teacher_id"];
	 	}

		//Update
		public function updateAssistantInfo($id, $first, $last, $bday, $phone, $email, $teacher) {
	 		global $db;

			$this->id = $db->real_escape_string($id);
			$this->first_name = $db->real_escape_string($first);
			$this->last_name = $db->real_escape_string($last);
			$this->birth_date = $db->real_escape_string($bday);
			$this->phone = $db->real_escape_string($phone);
			$this->email = $db->real_escape_string($email);
			$this->teacher_id = $db->real_escape_string($teacher);

			$update_query = "UPDATE assistant SET first_name = '$this->first_name', last_name = '$this->last_name', birth_date = '$this->birth_date', phone = '$this->phone', email = '$this->email', teacher_id = '$this->teacher_id' WHERE assistant_id = $this->id";

			//test to make sure update worked
			if(mysqli_query($db, $update_query)) {
				return true;
			}	 else {
					return false;
				}
	 	}

		//Delete
	 	public function deleteAssistant() {
	 		global $db;

	 		//get the id to be deleted
	 		$idToDelete = $_GET["id"];

	 		//create a query
	 		$delete_query = $db->query("DELETE FROM assistant WHERE assistant_id = $idToDelete");

	 		//test to see if it was successful
	 		if($delete_query) {
	 			return true;
	 		} 	else {
	 				return false;
	 			}
	 	}

	}
?>