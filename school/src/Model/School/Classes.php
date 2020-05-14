<?php

namespace Model\School;

class Classes extends School {

  /**
   * Class id.
   *
   * @var int $id
   */
  protected $id;

  /**
   * Classes constructor.
   */
  public function __construct() {
    parent::__construct();
  }

  /**
   * Set class id.
   *
   * @param int $id
   *   Class id.
   *
   * @return object
   *   Class reference.
   */
  public function setClassId($id) {
    $this->id = $id;

    return $this;
  }

  /**
   * Fetch class id.
   *
   * @return int
   *   Class id.
   */
  public function getClassId() {
    return $this->id;
  }

  /**
   * Registration of Classes.
   *
   * @param array $student
   *   Student info.
   *
   * @return bool|resource|void
   *   Registration status.
   */
  public function register($class) {
    if ($class_exist = $this->isClassExist($class['school_id'], $class['name'],
      $class['section'])) {
      return FALSE;
    }
    $columns = implode(', ', array_keys($class));
    $values = "'" . implode("', '", $class) . "'";
    $query = "INSERT INTO classes ({$columns}) VALUES ({$values})";
    try {
      // Perform a query, check for error
      if (!$result = mysqli_query($this->db, $query)) {
        return mysqli_error($this->db);
      }
    }
    catch (\Exception $e) {
      return $e->getMessage();
    }
    mysqli_close($this->db);

    return $result;
  }

  /**
   * Check whether user already exists or not.
   *
   * @param mixed $email
   *   User email address.
   *
   * @return bool
   */
  public function isClassExist($school_id, $name, $section) {
    $query = "SELECT * FROM classes WHERE name = '{$name}'
    AND school_id = {$school_id} 
    AND section  = '{$section}'";
    try {
      $result = $this->db->query($query);
    }
    catch (\Exception $e) {
      return $e->getMessage();
    }
    if ($result->num_rows > 0) {
      return TRUE;
    }

    return FALSE;
  }

  /**
   * @return array|string|void
   */
  public function listClassesBySchool() {
    $output = [];
    try {
      $query = "SELECT id, name, subjects, section FROM classes WHERE school_id = {$this->getSchoolId()}";
      $result = $this->db->query($query);
    }
    catch (\Exception $e) {
      return $e->getMessage();
    }
    if ($result->num_rows > 0) {
      $i = 0;
      while($row = $result->fetch_assoc()) {
        $output[$i]['id'] = $row['id'];
        $output[$i]['name'] = $row['name'];
        $output[$i]['section'] = $row['section'];
        $output[$i]['subjects'] = $row['subjects'];
        $i++;
      }
    }

    return $output;
  }

  /**
   * @return array|string|void
   */
  public function listClassSubjects() {
    $output = [];
    $query = "SELECT * FROM classes WHERE id = {$this->id}";
    try {
      $result = $this->db->query($query);
    }
    catch (\Exception $e) {
      return $e->getMessage();
    }
    if ($result->num_rows > 0) {
      while ($rows = $result->fetch_assoc()) {
        $output[] = $rows;
      }
    }

    return $output;
  }

}