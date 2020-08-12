<?php

namespace Model\School;

use Model\School\Person;
use Model\School\Student;

/**
 * Class StudentFactory
 *
 * @package Model\School
 */
class StudentFactory {

  /**
   * StudentFactory constructor.
   */
  public function __construct() {
  }

  /**
   * @return \Model\School\Person
   */
  public static function create(): Person {
    return new Student();
  }

}