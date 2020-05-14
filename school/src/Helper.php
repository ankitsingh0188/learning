<?php

namespace Helper;

class Helper {

  /**
   * Helper constructor.
   */
  public function __construct() {
  }

  /**
   * @param string $key
   *
   * @return array
   */
  public static function successMsg($key) {
    $class = 'success';
    switch ($key) {
      case 'school_register':
        $msg = 'School registration completed successfully.';
        break;
      case 'student_register':
        $msg = 'Student registration completed successfully.';
        break;
      case 'class_register':
        $msg = 'Class registration completed successfully.';
        break;
      default:
        $class = '';
        $msg = '';
        break;
    }

    return [$msg, $class];
  }

  /**
   * @param string $key
   *
   * @return array
   */
  public static function errorMsg($key) {
    $class = 'danger';
    switch ($key) {
      case 'school_register':
        $msg = 'School already registered.';
        break;
      case 'student_register':
        $msg = 'Student already registered.';
        break;
      case 'class_register':
        $msg = 'Class already registered.';
        break;
      default:
        $class = '';
        $msg = '';
        break;
    }

    return [$msg, $class];
  }

  /**
   * Validate current user session.
   *
   * @param string $redirect
   *   Path to redirect.
   */
  public static function validateSession($redirect = 'login') {
    $path = $_SERVER['PATH_INFO'];
    if (!isset($_SESSION['uid']) && empty($_SESSION['uid'])) {
      header('Location:/' . $redirect);
      exit();
    }
    elseif ($path == '/forgot-password' || $path == '/login') {
      header('Location:/');
      exit();
    }
  }
}
