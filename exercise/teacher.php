<?php

namespace Exercise\Teacher;

require_once 'school.php';

use Exercise\Classroom\Classroom;

class Teacher extends Classroom {

	/**
	 * Teacher name.
	 *
	 * @var string.
	 */
	protected $teacher_name;

	/**
	 * Department name.
	 *
	 * @var string.
	 */
	protected $department;

	/**
	 * Class constructor.
	 */
	public function __construct() {
		parent::__construct();
		$this->teacher_name = '';
		$this->department = '';
	}

  /**
	 * Set respective teacher name.
	 *
	 * @param string $name
	 *   Teacher name.
	 */
	public function setTeacherName($name) {
		$this->teacher_name = $name;

		return $this;
	}

	/**
	 * Fetch respective teacher name.
	 *
	 * @return string
	 *   Teacher name.
	 */
	public function getTeacherName() {
		return $this->teacher_name;
	}

	/**
	 * Set respective department.
	 *
	 * @param string $name
	 *   Teacher department.
	 */
	public function setDepartment($name) {
		$this->teacher_name = $name;

		return $this;
	}

	/**
	 * Fetch respective department.
	 *
	 * @return string
	 *   Teacher department.
	 */
	public function getDepartment() {
		return $this->department;
	}

	/**
	 * HOD's list.
	 */
	public function listHOD() {
		return ['Teacher2', 'Teacher3', 'Teacher7', 'Teacher9'];
	}

	/**
	 * Checks whether teacher is HOD of particular department.
	 *
	 * @return Bool
	 *   True|False.
	 */
	public function departmentHOD() {
		// Will check $this->department and returns all the HOD's of that department.
		return ['Teacher2', 'Teacher3'];
	}

}