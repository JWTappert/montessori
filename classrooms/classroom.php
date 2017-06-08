<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/includes/db_connect.php';

	class Classroom
	{
		public $id;
		public $classroom_number;
		public $lead;
		public $assistant;

		public function __construct($number, $lead, $aid)
		{
			$this->classroom_number = $number;
			$this->lead = $lead;
			$this->assistant = $aid;
		}

		public static function loadClassrooms() {
			global $db;
			$all_classrooms = [];
			$results = $db->query("SELECT c.classroom_id, c.classroom_number, CONCAT(t.first_name, ' ', t.last_name) AS 'Lead Teacher', CONCAT(a.first_name, ' ', a.last_name) AS 'Assistant'
									FROM classroom c, teacher t, assistant a
									WHERE c.lead_id = t.teacher_id
									AND c.aid_id = a.assistant_id
									GROUP BY c.classroom_id;");

			while ($row = $results->fetch_assoc()) {
				$classroom = new Classroom($row["classroom_number"], $row["Lead Teacher"], $row["Assistant"]);
				$classroom->id = $row["classroom_id"];
				array_push($all_classrooms, $classroom);
			}
			$results->free();
			$db->close();
			return $all_classrooms;
		}

		public function createClassroom() {
			global $db;

			// escape special characters to help prevents XSS
			$this->classroom_number = $db->real_escape_string($this->classroom_number);
			$this->lead = $db->real_escape_string($this->lead);
			$this->assistant = $db->real_escape_string($this->assistant);

			$create_query = "INSERT INTO classroom (classroom_number, lead, assistant) VALUES ('{$this->classroom_number}', '{$this->lead}', '{$this->assistant}')";

			if(mysqli_query($db, $create_query)) {
				return true;
			} else {
				return false;
			}
		}

		public function deleteClassroom() {
	 		global $db;

	 		//get the id to be deleted
	 		$idToDelete = $_GET["id"];

	 		//create a query
	 		$delete_query = $db->query("DELETE FROM classroom WHERE classroom_id = $idToDelete");

	 		//test to see if it was successful
	 		if($delete_query) {
	 			return true;
	 		} 	else {
	 				return false;
	 			}
	 	}
	}
?>