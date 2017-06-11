<?php
	//include("../includes/db_connect.php");

	class Student_Lesson
	{
		public $student_id;
		public $student;
		public $lesson_id;
		public $lesson;

		public function __construct($student, $lesson)
		{
			$this->student = $student;
			$this->lesson = $lesson;
		}

		public static function load() {
			global $db;
			$all = array();
			$results = $db->query("SELECT s.student_id, CONCAT(s.first_name, ' ', s.last_name) as 'Student', l.lesson_id, l.name as 'Lesson'
									FROM student s
									LEFT JOIN student_lesson sl ON sl.s_id = s.student_id
									JOIN lesson l ON l.lesson_id = sl.l_id
									ORDER BY 'Student';");

			while ($row = $results->fetch_assoc()) {
				$item = new Student_Lesson($row["Student"], $row["Lesson"]);
				$item->student_id = $row["student_id"];
				$item->lesson_id = $row["lesson_id"];
				array_push($all, $item);
			}
			$results->free();
			return $all;
		}

		public function create() {
			global $db;

			// escape special characters to help prevents XSS
			$this->student_id = $db->real_escape_string($this->student);
			$this->lesson_id = $db->real_escape_string($this->lesson);

			$create_query = "INSERT INTO student_lesson (s_id, l_id) VALUES ('{$this->student_id}', '{$this->lesson_id}')";

			if(mysqli_query($db, $create_query)) {
				return true;
			} else {
				return false;
			}
		}

		//Delete
	 	public function delete() {
	 		global $db;

	 		//get the id to be deleted
	 		$lessonToDelete = $_GET["lesson_id"];
	 		$student = $_GET["student_id"];

	 		//create a query
	 		$delete_query = $db->query("DELETE FROM student_lesson WHERE l_id = $lessonToDelete AND s_id = $student");

	 		//test to see if it was successful
	 		if($delete_query) {
	 			return true;
	 		} 	else {
	 				return false;
	 			}
	 	}

	}
?>