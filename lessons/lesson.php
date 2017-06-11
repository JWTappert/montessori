<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/includes/db_connect.php';

	class Lesson
	{
		public $id;
		public $name;
		public $description;
		public $type_id;

		public function __construct($name, $desc, $type)
		{
			$this->name = $name;
			$this->description = $desc;
			$this->type_id = $type;
			
		}

		public static function loadLessons() {
			global $db;
			$all_lessons = [];
			$results = $db->query("SELECT l.lesson_id, l.name, l.description, s.type
									FROM lesson l, subject s
									WHERE l.type_id = s.subject_id
									ORDER BY s.type");

			while ($row = $results->fetch_assoc()) {
				$lesson = new Lesson($row["name"], $row["description"], $row["type"]);
				$lesson->id = $row["lesson_id"];
				array_push($all_lessons, $lesson);
			}
			$results->free();
			return $all_lessons;
		}

		public function createLesson() {
			global $db;

			// escape special characters to help prevents XSS
			$this->name = $db->real_escape_string($this->name);
			$this->description = $db->real_escape_string($this->description);
			$this->type_id = $db->real_escape_string($this->type_id);

			$create_query = "INSERT INTO lesson (name, description, type_id) VALUES ('{$this->name}', '{$this->description}', '{$this->type_id}')";

			if(mysqli_query($db, $create_query)) {
				return true;
			} else {
				return false;
			}
		}

		public function displayLessonInfo($id) {
			global $db;

	 		//create and execute a query
	 		$results = $db->query("SELECT * FROM lesson WHERE lesson_id = $id");

	 		//get the first row of the return from the query
	 		$row = $results->fetch_assoc();

	 		$this->name = $row["name"];
			$this->description = $row["description"];
			$this->type_id = $row["type_id"];
	 	}

		//Update
		public function updateLessonInfo($id, $name, $desc, $type) {
	 		global $db;

			$this->id = $db->real_escape_string($id);
			$this->name = $db->real_escape_string($name);
			$this->description = $db->real_escape_string($desc);
			$this->type_id = $db->real_escape_string($type);

			$update_query = "UPDATE lesson SET name = '$this->name', description = '$this->description', type_id = '$this->type_id' WHERE lesson_id = $this->id";

			//test to make sure update worked
			if(mysqli_query($db, $update_query)) {
				return true;
			}	 else {
					return false;
				}
	 	}

		//Delete
	 	public function deleteLesson() {
	 		global $db;

	 		//get the id to be deleted
	 		$idToDelete = $_GET["id"];

	 		//create a query
	 		$delete_query = $db->query("DELETE FROM lesson WHERE lesson_id = $idToDelete");

	 		//test to see if it was successful
	 		if($delete_query) {
	 			return true;
	 		} 	else {
	 				return false;
	 			}
	 	}

	}





?>