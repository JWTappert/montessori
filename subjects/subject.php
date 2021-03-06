<?php
	//include("../includes/db_connect.php");

	class Subject
	{
		public $subject_id;
		public $type;

		public function __construct($type)
		{
			$this->type = $type;
		}

		public static function loadSubjects() {
			global $db;
			$all_subjects = array();
			$results = $db->query("SELECT * FROM subject;");

			$defaultSubject = new Subject(NULL);
			$defaultSubject->subject_id = 0;
			array_push($all_subjects, $defaultSubject);

			while ($row = $results->fetch_assoc()) {
				$subject = new Subject($row["type"]);
				$subject->subject_id = $row["subject_id"];
				array_push($all_subjects, $subject);
			}
			$results->free();
			return $all_subjects;
		}

		public function createSubject() {
			global $db;

			// escape special characters to help prevents XSS
			$this->type = $db->real_escape_string($this->type);

			$create_query = "INSERT INTO subject (subject_id, type) VALUES ('{$this->subject_id}', '{$this->type}')";

			if(mysqli_query($db, $create_query)) {
				return true;
			} else {
				return false;
			}
		}

		public function deleteSubject() {
	 		global $db;

	 		//get the id to be deleted
	 		$idToDelete = $_GET["id"];

	 		//create a query
	 		$delete_query = $db->query("DELETE FROM subject WHERE subject_id = $idToDelete");

	 		//test to see if it was successful
	 		if($delete_query) {
	 			return true;
	 		} 	else {
	 				return false;
	 			}
	 	}
	}
?>