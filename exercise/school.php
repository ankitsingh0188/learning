<?php

namespace Exercise\School;

class School {

	/**
	 * School id.
	 *
	 * @var int
	 */
	protected $school_id;

	/**
	 * School name.
	 *
	 * @var string
	 */
	protected $school_name;

	/**
	 * School medium.
	 *
	 * @var string
	 */
	protected $school_medium;

	/**
	 * School board.
	 *
	 * @var string
	 */
	protected $school_board;

	/**
	 * Class constructor.
	 */
	public function __construct() {
		$this->school_id = '';
		$this->school_name = '';
		$this->school_medium = '';
		$this->school_board = '';
	}

	/**
	 * Set school id.
	 *
	 * @param int $id
	 *   School id.
	 */
	public function setSchoolId($id) {
		$this->school_id = $id;

		return $this;
	}

	/**
	 * Get school id.
	 *
	 * @return String
	 *   School name. 
	 */
	public function getSchoolId() {
		return $this->school_id;
	}

	/**
	 * Set school name.
	 *
	 * @param string $name
	 *   School name.
	 */
	public function setSchoolName($name) {
		$this->school_name = $name;

		return $this;
	}

	/**
	 * Get school name.
	 *
	 * @return String
	 *   School name. 
	 */
	public function getSchoolName() {
		return $this->school_name;
	}

	/**
	 * Set school medium.
	 *
	 * @param string $name
	 *   School medium.
	 */
	public function setSchoolMedium($medium) {
		$this->school_medium = $medium;

		return $this;
	}

	/**
	 * Get school medium.
	 *
	 * @return String
	 *   School medium. 
	 */
	public function getSchoolMedium() {
		return $this->school_medium;
	}

	/**
	 * Set school board.
	 *
	 * @param string $board
	 *   School board.
	 */
	public function setSchoolBoard($board) {
		$this->school_board = $board;

		return $this;
	}

	/**
	 * Get school board.
	 *
	 * @return String
	 *   School board. 
	 */
	public function getSchoolBoard() {
		return $this->school_board;
	}

	/**
	 * Returns list of all the schools.
	 */
	public function listSchools() {
		return ['St. Johns', 'St. Francis', 'St. Pauls', 'Sophia', 'Modern'];
	}

	/**
	 * Returns list of all classes in a school.
	 */
	public function listClasses() {
		return ['Class1', 'Class2', 'Class3', 'Class4', 'class5'];
	}

	/**
	 * Returns list of all teachers in a school.
	 */
	public function listTeachers() {
		return ['Teacher1', 'Teacher2', 'Teacher3', 'Teacher4', 'Teacher5', 
		 'Teacher6', 'Teacher7', 'Teacher8', 'Teacher9', 'Teacher10'];
	}

	/**
	 * Returns list of all students in a school.
	 */
	public function listStudents() {
		return ['Student1', 'Student2', 'Student3', 'Student4', 'Student5',
		 'Student6', 'Student7', 'Student8', 'Student9', 'Student10'];
	}
}

?>