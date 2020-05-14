<?php

namespace Database;

class ConnectDb {

  /**
   * ConnectDb constructor.
   */
  public function __construct() {
    include_once './config/config.php';
  }

  public function connectToDatabase() {
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
    if (mysqli_connect_errno()) {
      trigger_error("Problem with connecting to database.");
    }

    return $conn;
  }

}