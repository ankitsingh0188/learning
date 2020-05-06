<?php

namespace Exercise\Classroom;

use Exercise\School\School;

class Classroom extends School {

	/**
	 * Class id.
	 *
	 * @var int.
	 */
	protected $class_id;
	
	/**
	 * Class name.
	 *
	 * @var string.
	 */
	protected $class_name;

	/**
	 * Class section.
	 *
	 * @var string.
	 */
	protected $class_section;

	/**
	 * Class constructor.
	 */
	public function __construct() {
		parent::__construct();
		$this->class_id = '';
		$this->class_name = '';
		$this->class_section = '';
	}

	/**
	 * Set respective class id.
	 *
	 * @param int $id
	 *   Class id.
	 */
	public function setClassId($id) {
		$this->class_id = $id;

		return $this;
	}

	/**
	 * Get respective class id.
	 *
	 * @return int
	 *   Class id.
	 */
	public function getClassId() {
		return $this->class_id;
	}

  /**
	 * Set respective class name.
	 *
	 * @param string $name
	 *   Class name.
	 */
	public function setClassName($name) {
		$this->class_name = $name;

		return $this;
	}

	/**
	 * Get respective class name.
	 *
	 * @return string
	 *   Class name.
	 */
	public function getClassName() {
		return $this->class_name;
	}

	/**
	 * Set respective class section.
	 *
	 * @param string $section
	 *   Class section.
	 */
	public function setClassSection($section) {
		$this->class_section = $section;

		return $this;
	}

	/**
	 * Get respective class section.
	 *
	 * @return string
	 *   Class section.
	 */
	public function getClassSection() {
		return $this->class_section;
	}

	/**
	 * Returns list of students in a class.
	 *
	 * @return array.
	 *   Student list.
	 */
	public function listClassStudents() {
		$list_class_students = [
			'I' => ['Student1', 'Student2', 'Student10'],
			'II' => ['Student3', 'Student4', 'Student11', 'Student12'],
			'III' => ['Student5', 'Student6'],
			'IV' => ['Student7', 'Student8',]
		];

		return $list_class_students;
	}

	/**
	 * Fetch class teachers of respective classes.
	 *
	 * @return array
	 *   Class teachers.
	 */
	protected function classTeachers() {
		return [
			'I' => 'Teacher3',
			'II' => 'Teacher6',
			'III' => 'Teacher7',
			'IV' => 'Teacher5',
			'V' => 'Teacher2',
			'VI' => 'Teacher1',
			'VII' => 'Teacher4'
		];
	}

	/**
	 * Fetch time table of class.
	 *
	 * @return array
	 *   Class time table.
	 */
	protected function timeTable() {
		$time_table = [
			'Class IX' => [
				'Monday' => [
					'8AM to 9AM' => 'English',
					'9AM to 10AM' => 'Hindi',
					'10AM to 11AM' => 'Maths',
					'11AM to 12PM' => 'Science',
					'12PM to 1PM' => 'Interval',
					'1PM to 2PM' => 'Social Science'
				],
				'Tuesday' => [
					'8AM to 9AM' => 'English',
					'9AM to 10AM' => 'Hindi',
					'10AM to 11AM' => 'Maths',
					'11AM to 12PM' => 'Science',
					'12PM to 1PM' => 'Interval',
					'1PM to 2PM' => 'Social Science'
				],
				'Wednesday' => [
					'8AM to 9AM' => 'English',
					'9AM to 10AM' => 'Hindi',
					'10AM to 11AM' => 'Maths',
					'11AM to 12PM' => 'Science',
					'12PM to 1PM' => 'Interval',
					'1PM to 2PM' => 'Social Science'
				],
				'Thursday' => [
					'8AM to 9AM' => 'English',
					'9AM to 10AM' => 'Hindi',
					'10AM to 11AM' => 'Maths',
					'11AM to 12PM' => 'Science',
					'12PM to 1PM' => 'Interval',
					'1PM to 2PM' => 'Social Science'
				],
				'Friday' => [
					'8AM to 9AM' => 'English',
					'9AM to 10AM' => 'Hindi',
					'10AM to 11AM' => 'Maths',
					'11AM to 12PM' => 'Science',
					'12PM to 1PM' => 'Interval',
					'1PM to 2PM' => 'Social Science'
				],
				'Saturdat' => [
					'8AM to 9AM' => 'English',
					'9AM to 10AM' => 'Hindi',
					'10AM to 11AM' => 'Maths',
					'11AM to 12PM' => 'Science'
				],
			],
		];

		return $time_table;
	}
}