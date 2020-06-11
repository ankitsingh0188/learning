<?php

namespace Model\Auth;

use Model\Database\ConnectDb;

class Auth {

  /**
   * Database object.
   *
   * @var object
   */
  protected $db;

  /**
   * Auth constructor.
   */
  public function __construct() {
    // Connecting to database.
    $this->db = ConnectDb::getInstance()->connectToDatabase();
  }

  /**
   * Student login.
   *
   * @param mixed $email
   *   User email address.
   * @param mixed $pwd
   *   User password.
   * @param string $role
   *   User role.
   *
   * @return bool
   */
  public function authenticate($email, $pwd, $role) {
    try {
      $query = "SELECT * FROM users 
      WHERE email = '{$email}' AND password = '{$pwd}' AND role = '{$role}'";
      $result = $this->db->query($query);
    }
    catch (\Exception $e) {
      return $e->getMessage();
    }
    if ($result->num_rows > 0) {
      mysqli_close($this->db);
      $data = $result->fetch_assoc();
      $_SESSION['role'] = $role;
      $_SESSION['uid'] = $data['login_id'];
      $_SESSION['email'] = $data['email'];

      return TRUE;
    }

    return FALSE;
  }

  public function isValidEmail($email) {
    try {
      $query = "SELECT * FROM users WHERE email = '{$email}'";
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

  public function updatePassword($email, $password) {
    try {
      $query = "UPDATE users SET password = '{$password}' WHERE email = '{$email}'";
      $result = $this->db->query($query);
    }
    catch (\Exception $e) {
      return $e->getMessage();
    }
    if ($result) {
      mysqli_close($this->db);

      return TRUE;
    }

    return FALSE;
  }

  /**
   * @param $id
   * @param $email
   * @param $password
   * @param $role
   *
   * @return bool|\mysqli_result|string|void
   */
  public function insertUser($id, $email, $password, $role) {
    $columns = 'login_id,' . 'email,' . 'password,' . 'role';
    $values = $id . ",'{$email}'" . ",'{$password}'" . ",'{$role}'";
    $query = "INSERT INTO users ({$columns}) VALUES ({$values})";
    try {
      $result = $this->db->query($query);
    }
    catch (\Exception $e) {
      return $e->getMessage();
    }
    mysqli_close($this->db);

    return $result;
  }

}