<?php

namespace Model\School;

/**
 * Class Teacher
 *
 * @package Model\School
 */
class Teacher {

  /**
   * Teacher Id.
   *
   * @var int
   */
  protected $id;

  /**
   * Student constructor.
   */
  function __construct() {
    parent::__construct();
  }

  /**
   * Set Teacher id.
   *
   * @param int $id
   *   Teacher id.
   *
   * @return object
   *   Class reference.
   */
  public function setTeacherId($id) {
    $this->id = $id;

    return $this;
  }

  /**
   * Fetch Teacher id.
   *
   * @return int
   *   Teacher id.
   */
  public function getTeacherId() {
    return $this->id;
  }

  public function listTeachers() {

  }

  public function listClassTeachers() {

  }

  public function listHOD() {

  }

  public function listDepartments() {

  }

  public function listDepartmentHOD() {
    
  }

}