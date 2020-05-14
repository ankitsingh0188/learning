<?php

namespace Model\School;

use Database\ConnectDb;

class School {

  /**
   * Database object.
   *
   * @var object
   */
  protected $db;

  /**
   * School Id.
   *
   * @var int
   */
  protected $id;

  /**
   * School Name.
   *
   * @var String
   */
  protected $school_name;

  /**
   * Student constructor.
   */
  function __construct() {
    // Connecting to database.
    $connection = new ConnectDb();
    $this->db = $connection->connectToDatabase();
  }

  /**
   * Set School id.
   *
   * @param int $id
   *   School id.
   *
   * @return object
   *   Class reference.
   */
  public function setSchoolId($id) {
    $this->id = $id;

    return $this;
  }

  /**
   * Fetch School id.
   *
   * @return int
   *   School id.
   */
  public function getSchoolId() {
    return $this->id;
  }

  /**
   * Set School name.
   *
   * @param string $name
   *   School name.
   *
   * @return object
   *   Class reference.
   */
  public function setSchoolName($name) {
    $this->school_name = $name;

    return $this;
  }

  /**
   * Fetch School name.
   *
   * @return int
   *   School name.
   */
  public function getSchoolName() {
    return $this->school_name;
  }

  /**
   * Registration of School.
   *
   * @param array $student
   *   Student info.
   *
   * @return bool|resource|void
   *   Registration status.
   */
  public function register($school) {
    if ($school_exist = $this->isSchoolExist($school['name'])) {
      return FALSE;
    }
    $columns = implode(', ', array_keys($school));
    $values = "'" . implode("', '", $school) . "'";
    $query = "INSERT INTO schools ({$columns}) VALUES ({$values})";
    try {
      $result = $this->db->query($query);
      if ($this->db->error_list) {
        return $this->db->error_list[0]['error'];
      }
    }
    catch (\Exception $e) {
      return $e->getMessage();
    }
    mysqli_close($this->db);

    return $result;
  }

  /**
   * Check whether school already exists or not.
   *
   * @param mixed $email
   *   User email address.
   *
   * @return bool
   */
  public function isSchoolExist($name) {
    $query = "SELECT * FROM schools WHERE name = '{$name}'";
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

  public function listSchools() {
    $output = [];
    try {
      $query = "SELECT sc.id, sc.name, sc.medium, sc.board,
      co.country_name AS country, st.name AS state, ci.name AS city
      from schools AS sc
      LEFT JOIN country AS co ON sc.country = co.id
      LEFT JOIN states AS st ON sc.state = st.id
      LEFT JOIN city AS ci ON sc.city = ci.id";
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

  /**
   * @return array|string|void
   */
  public function fetchSchoolInfo() {
    try {
      $query = "SELECT sc.id, sc.name, sc.board, sc.medium
        FROM students AS st
        LEFT JOIN schools AS sc ON st.school_id = sc.id
        WHERE st.id = {$_SESSION['uid']}";
      $result = $this->db->query($query);
    }
    catch (\Exception $e) {
      return $e->getMessage();
    }
    if ($result->num_rows > 0) {
      $result = $result->fetch_assoc();

      return $result;
    }

    return FALSE;
  }

}