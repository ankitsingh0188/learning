<?php

namespace Model\Strategy;

use Model\Strategy\InterfaceStrategy;

/**
 * Class Android
 *
 * @package Model\InterfaceStrategy
 */
class Android implements InterfaceStrategy {

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
  public function to($number) {
    $this->to = $number;
  }

  /**
   * @param $number
   *
   * @return mixed|void
   */
  public function message($number) {
    // $this->to
    print 'Android InterfaceStrategy';
  }

  public function send() {

  }

}