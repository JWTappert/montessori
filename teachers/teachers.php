<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/includes/db_connect.php';

	class Teacher
	{
		public $id;
		public $first_name;
		public $last_name;
		public $birth_date;
		public $phone;
		public $email;
		public $classroom_id;

		public function __construct($first, $last, $dob, $phone, $email, $classroom)
		{
			$this->first_name = $first;
			$this->last_name = $last;
			$this->birth_date = $dob;
			$this->phone = $phone;
			$this->email = $email;
			$this->classroom_id = $classroom;
		}

		public static function loadTeachers() {
			global $db;
			$all_teachers = [];
			$results = $db->query("SELECT * FROM teacher;");

			while ($row = $results->fetch_assoc()) {
				$teacher = new Teacher($row["first_name"], $row["last_name"], $row["birth_date"], $row["phone"], $row["email"], $row["classroom_id"]);
				$teacher->id = $row["teacher_id"];
				array_push($all_teachers, $teacher);
			}
			$results->free();
			$db->close();
			return $all_teachers;
		}

		public function createTeacher() {
			global $db;

			// escape special characters to help prevents XSS
			$this->first_name = $db->real_escape_string($this->first_name);
			$this->last_name = $db->real_escape_string($this->last_name);
			$this->birth_date = $db->real_escape_string($this->birth_date);
			$this->phone = $db->real_escape_string($this->phone);
			$this->email = $db->real_escape_string($this->email);
			$this->classroom_id = $db->real_escape_string($this->classroom_id);

			$create_query = "INSERT INTO teacher (first_name, last_name, birth_date, phone, email, classroom_id) VALUES ('{$this->first_name}', '{$this->last_name}', '{$this->birth_date}', '{$this->phone}', '{$this->email}', '{$this->classroom_id}')";

			if(mysqli_query($db, $create_query)) {
				return true;
			} else {
				return false;
			}
		}

		public function displayTeacherInfo($id) {
			global $db;

	 		//create and execute a query
	 		$results = $db->query("SELECT * FROM teacher WHERE teacher_id = $id");

	 		//get the first row of the return from the query
	 		$row = $results->fetch_assoc();

	 		$this->first_name = $row["first_name"];
			$this->last_name = $row["last_name"];
			$this->birth_date = $row["birth_date"];
			$this->phone = $row["phone"];
			$this->email = $row["email"];
			$this->classroom_id = $row["classroom_id"];
	 	}

		//Update
		public function updateTeacherInfo($id, $first, $last, $bday, $phone, $email, $classroom) {
	 		global $db;

			$this->id = $db->real_escape_string($id);
			$this->first_name = $db->real_escape_string($first);
			$this->last_name = $db->real_escape_string($last);
			$this->birth_date = $db->real_escape_string($bday);
			$this->phone = $db->real_escape_string($phone);
			$this->email = $db->real_escape_string($email);
			$this->classroom_id = $db->real_escape_string($classroom);

			$update_query = "UPDATE teacher SET first_name = '$this->first_name', last_name = '$this->last_name', birth_date = '$this->birth_date', phone = '$this->phone', email = '$this->email', classroom_id = '$this->classroom_id' WHERE teacher_id = $this->id";

			//test to make sure update worked
			if(mysqli_query($db, $update_query)) {
				return true;
			}	 else {
					return false;
				}
	 	}

		//Delete
	 	public function deleteTeacher() {
	 		global $db;

	 		//get the id to be deleted
	 		$idToDelete = $_GET["id"];

	 		//create a query
	 		$delete_query = $db->query("DELETE FROM teacher WHERE teacher_id = $idToDelete");

	 		//test to see if it was successful
	 		if($delete_query) {
	 			return true;
	 		} 	else {
	 				return false;
	 			}
	 	}

	}
?>