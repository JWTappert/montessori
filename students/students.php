<?php
	include('includes/db_connect.php');

	/**
	* 
	*/
	class Student
	{
		public $id;
		public $first_name;
		public $last_name;
		public $birth_date;
		public $age_group;
		public $classroom_id;

		public function __construct($first, $last, $dob, $ageGroup, $classroom)
		{
			$this->first_name = $first;
			$this->last_name = $last;
			$this->birth_date = $dob;
			$this->age_group = $ageGroup;
			$this->classroom_id = $classroom;
		}

		public static $sql_select = "SELECT * FROM student;";

		public static function loadStudents() {
			global $db;
			$all_students = [];
			$results = $db->query("SELECT * FROM student;");

			while ($row = $results->fetch_assoc()) {
				$student = new Student($row["first_name"], $row["last_name"], $row["birth_date"], $row["age_group"], $row["classroom_id"]);
				array_push($all_students, $student);
			}
			$results->free();
			$db->close();
			return $all_students;
		}
	}





?>