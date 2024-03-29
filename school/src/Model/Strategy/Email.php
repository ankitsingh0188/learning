<?php

namespace Model\Strategy;

use Model\Strategy\InterfaceStrategy;

/**
 * Class Email
 *
 * @package Model\InterfaceStrategy
 */
class Email implements InterfaceStrategy {

  /**
   * @var string
   */
  private $to;

  /**
   * Email constructor.
   */
  public function __construct() {
    $this->to = '';
  }

  /**
   * @param $email
   *
   * @return mixed|void
   */
  public function to($email) {
    $this->to = 'test@test.com';
  }

  /**
   * @param $email
   *
   * @return mixed|void
   */
  public function message($email) {
    print 'Email InterfaceStrategy';
  }

}