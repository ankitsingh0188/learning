<?php

namespace Model\School;

use Model\Auth\Auth;

class Student extends Classes {

  /**
   * Student Id.
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
   * Set Student id.
   *
   * @param int $id
   *   Student id.
   *
   * @return object
   *   Class reference.
   */
  public function setStudentId($id) {
    $this->id = $id;

    return $this;
  }

  /**
   * Fetch Student id.
   *
   * @return int
   *   Student id.
   */
  public function getStudentId() {
    return $this->id;
  }

  /**
   * Registration of Student.
   *
   * @param array $student
   *   Student info.
   *
   * @return bool|resource|void
   *   Registration status.
   */
  public function register($student) {
    if ($this->isStudentExist($student['email'])) {
      return FALSE;
    }
    $password = $student['password'];
    unset($student['password']);
    $columns = implode(', ', array_keys($student));
    $values = "'" . implode("', '", $student) . "'";
    $query = "INSERT INTO students ({$columns}) VALUES ({$values})";
    try {
      $result = $this->db->query($query);
      if ($this->db->error_list) {
        return $this->db->error_list[0]['error'];
      }
      if ($this->db->insert_id) {
        $auth = new Auth();
        $auth->insertUser($this->db->insert_id, $student['email'], $password,
          'student');
      }
    }
    catch (\Exception $e) {
      return $e->getMessage();
    }
    mysqli_close($this->db);

    return $result;
  }

  /**
   * Check whether student already exists or not.
   *
   * @param mixed $email
   *   User email address.
   *
   * @return bool
   */
  public function isStudentExist($email) {
    $query = "SELECT * FROM students WHERE email = '{$email}'";
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
   * Fetch Student information.
   *
   * return array
   *   Student array.
   */
  public function fetchStudentInfoById() {
    $query = "SELECT st.id, st.gender, st.age, st.name, st.email, st.mobile, st.address, 
    sc.name AS school_name,
    cl.name as class_name, cl.subjects, cl.section
    from students AS st
    LEFT JOIN schools AS sc ON st.school_id=sc.id
    LEFT JOIN classes AS cl ON st.class_id=cl.id WHERE st.id = {$this->id}";
    try {
      $result = $this->db->query($query);
    }
    catch (\Exception $e) {
      return $e->getMessage();
    }
    if (empty($result->num_rows)) {
      return FALSE;
    }

    return $result->fetch_assoc();
  }

  /**
   * Update Student information.
   *
   * return bool
   *   True|False
   */
  public function update($info) {
    $data = '';
    foreach ($info as $key => $val) {
      $data .= $key . '=' . "'{$val}', ";
    }
    $data = rtrim($data, ', ');
    $query = "UPDATE students SET {$data} WHERE id = {$this->id}";
    try {
      // Perform a query, check for error
      if (!$result = mysqli_query($this->db, $query)) {
        return mysqli_error($this->db);
      }
    }
    catch (\Exception $e) {
      return $e->getMessage();
    }

    return FALSE;
  }

  public function listStudents() {
    $output = [];
    $query = "SELECT st.id, st.name, st.email, st.mobile, st.address, st.age, st.gender,
    sc.name AS school_name, 
    cl.name as class_name, cl.subjects, cl.section
    from students AS st
    LEFT JOIN schools AS sc ON st.school_id=sc.id
    LEFT JOIN classes AS cl ON st.class_id=cl.id
    WHERE sc.id = {$this->getSchoolId()}";
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

  public function studentsSubjectWise($subjects) {
    $output = [];
    try {
      $query = "SELECT st.id, st.name, st.email, st.mobile, st.address, st.age, st.gender,
      sc.name AS school_name, 
      cl.name as class_name, cl.subjects, cl.section
      from students AS st
      LEFT JOIN schools AS sc ON st.school_id=sc.id
      LEFT JOIN classes AS cl ON st.class_id=cl.id
      WHERE cl.subjects LIKE '%maths%' AND sc.id = {$this->getSchoolId()}";
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