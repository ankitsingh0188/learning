<?php

namespace Exercise\Student;

use Exercise\Classroom\Classroom;

class Student extends Classroom {

	/**
	 * Student id.
	 *
	 * @var Int.
	 */
	protected $student_id;

	/**
	 * Student name.
	 *
	 * @var String.
	 */
	protected $student_name;

	/**
	 * Class constructor.
	 */
	public function __construct() {
		parent::__construct();
		$this->student_id = '';
		$this->student_name = '';
	}

	/**
	 * Set respective student id.
	 *
	 * @param int $id
	 *   Student id.
	 */
	public function setStudentId($id) {
		$this->student_id = $id;

		return $this;
	}

	/**
	 * Get respective student id.
	 *
	 * @param int $id
	 *   Student id.
	 */
	public function getStudentId() {
		return $this->student_id;
	}

	/**
	 * Set respective student name.
	 *
	 * @param string $name
	 *   Student name.
	 */
	public function setStudentName($name) {
		$this->student_name = $name;

		return $this;
	}

	/**
	 * Get respective student name.
	 *
	 * @param string $name
	 *   Student name.
	 */
	public function getStudentName() {
		return $this->student_name;
	}

	/**
	 * Returns list of students in a class.
	 *
	 * return array.
	 *   Student list.
	 */
	public function listMathsStudents() {
		return ['Student1', 'Student2', 'Student5', 'Student8', 'Student10'];
	}

}