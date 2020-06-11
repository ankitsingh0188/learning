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
   * @return string
   */
  public function name() {
    $query = "SELECT name from students where id = {$this->id} LIMIT 1";
    $this->name = 'name';

    return $this->name();
  }

  /**
   * @return string
   */
  public function age() {
    $query = "SELECT age from students where id = {$this->id} LIMIT 1";
    $this->age = 'age';

    return $this->age();
  }

  /**
   * @return string
   */
  public function gender() {
    $query = "SELECT gender from students where id = {$this->id} LIMIT 1";
    $this->gender = 'gender';

    return $this->gender();
  }

}