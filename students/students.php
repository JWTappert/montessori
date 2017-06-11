<?php
	//include_once(dirname(__FILE__) . "../includes/db_connect.php");

	class Student
	{
		public $id;
		public $first_name;
		public $last_name;
		public $birth_date;
		public $age_group;
		public $classroom_id;
		public static $groups = array("None", "Infants", "Toddlers", "Primary");

		public function __construct($first, $last, $dob, $ageGroup, $classroom)
		{
			$this->first_name = $first;
			$this->last_name = $last;
			$this->birth_date = $dob;
			$this->age_group = $ageGroup;
			$this->classroom_id = $classroom;
		}

		public function searchFor($student){
			global $db;
			$all_students = array();
			$results = $db->query("SELECT *
									FROM student
									WHERE first_name LIKE '%$student%' 
									OR last_name LIKE '%$student%'
									OR birth_date LIKE '%$student%' 
									OR age_group LIKE '%$student%'
									OR classroom_id LIKE '%$student%';");

			while ($row = $results->fetch_assoc()) {
				$student = new Student($row["first_name"], $row["last_name"], $row["birth_date"], $row["age_group"], $row["classroom_id"]);
				$student->id = $row["student_id"];
				array_push($all_students, $student);
			}
			$results->free();
			return $all_students;
		}
		public static function loadStudents() {
			global $db;
			$all_students = array();
			// $results = $db->query("SELECT * FROM student;");
			$results = $db->query("SELECT s.student_id, s.first_name, s.last_name, s.birth_date, s.age_group, c.classroom_id, c.classroom_number
									FROM student s, classroom c
									WHERE s.classroom_id = c.classroom_id
									ORDER BY s.student_id");

			while ($row = $results->fetch_assoc()) {
				$student = new Student($row["first_name"], $row["last_name"], $row["birth_date"], $row["age_group"], $row["classroom_number"]);
				$student->id = $row["student_id"];
				array_push($all_students, $student);
			}
			$results->free();
			return $all_students;
		}

		public function createStudent() {
			global $db;

			// escape special characters to help prevents XSS
			$this->first_name = $db->real_escape_string($this->first_name);
			$this->last_name = $db->real_escape_string($this->last_name);
			$this->birth_date = $db->real_escape_string($this->birth_date);
			$this->age_group = $db->real_escape_string($this->age_group);
			$this->classroom_id = $db->real_escape_string($this->classroom_id);

			// echo $this->age_group;

			$create_query = "INSERT INTO student (first_name, last_name, birth_date, age_group, classroom_id) VALUES ('{$this->first_name}', '{$this->last_name}', '{$this->birth_date}', '{$this->age_group}', '{$this->classroom_id}')";

			if(mysqli_query($db, $create_query)) {
				return true;
			} else {
				return false;
			}
		}

		public function displayStudentInfo($id) {
			global $db;

	 		//create and execute a query
	 		$results = $db->query("SELECT s.student_id, s.first_name, s.last_name, s.birth_date, s.age_group, c.classroom_id, c.classroom_number
									FROM student s, classroom c
									WHERE s.student_id = $id AND s.classroom_id = c.classroom_id
									ORDER BY s.student_id");

	 		//get the first row of the return from the query
	 		$row = $results->fetch_assoc();

	 		$this->first_name = $row["first_name"];
			$this->last_name = $row["last_name"];
			$this->birth_date = $row["birth_date"];
			$this->age_group = $row["age_group"];
			$this->classroom_id = $row["classroom_id"];
	 	}

		//Update
		public function updateStudentInfo($id, $first, $last, $bday, $ageGroup, $classroom) {
	 		global $db;

			$this->id = $db->real_escape_string($id);
			$this->first_name = $db->real_escape_string($first);
			$this->last_name = $db->real_escape_string($last);
			$this->birth_date = $db->real_escape_string($bday);
			$this->age_group = $db->real_escape_string($ageGroup);
			$this->classroom_id = $db->real_escape_string($classroom);

			// echo $this->age_group;

			$update_query = "UPDATE student SET first_name = '$this->first_name', last_name = '$this->last_name', birth_date = '$this->birth_date', age_group = '$this->age_group', classroom_id = '$this->classroom_id' WHERE student_id = $this->id";

			//test to make sure update worked
			if(mysqli_query($db, $update_query)) {
				return true;
			}	 else {
					return false;
				}
	 	}

		//Delete
	 	public function deleteStudent() {
	 		global $db;

	 		//get the id to be deleted
	 		$idToDelete = $_GET["id"];

	 		//create a query
	 		$delete_query = $db->query("DELETE FROM student WHERE student_id = $idToDelete");

	 		//test to see if it was successful
	 		if($delete_query) {
	 			return true;
	 		} 	else {
	 				return false;
	 			}
	 	}

	}
?>