<?php

namespace Model\Strategy;

use Model\Strategy\Strategy;

/**
 * Class Android
 *
 * @package Model\Strategy
 */
class Android implements Strategy {

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
    print 'Android Strategy';
  }

}