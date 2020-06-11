<?php
declare(strict_types=1);

namespace Model\Database;

final class ConnectDb {

  /**
   * @var \Model\Database\ConnectDb|null $instance
   */
  private static ?ConnectDb $instance = NULL;

  /**
   * Gets the instance via lazy initialization (created on first usage)
   */
  public static function getInstance(): ConnectDb {
    if (static::$instance === NULL) {
      static::$instance = new static();
    }

    return static::$instance;
  }

  /**
   * Is not allowed to call from outside to prevent from creating multiple
   * instances, to use the singleton, you have to obtain the instance from
   * ConnectDb::getInstance() instead
   */
  private function __construct() {

  }

  /**
   * Prevent the instance from being cloned (which would create a second
   * instance of it)
   */
  private function __clone() {

  }

  /**
   * Prevent from being unserialized (which would create a second instance of
   * it)
   */
  private function __wakeup() {

  }

  /**
   * @return false|\mysqli|void
   */
  public function connectToDatabase() {
    include_once $_SERVER['DOCUMENT_ROOT'] . '/config/config.php';
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
    if (mysqli_connect_errno()) {
      trigger_error("Problem with connecting to database.");
    }

    return $conn;
  }

}