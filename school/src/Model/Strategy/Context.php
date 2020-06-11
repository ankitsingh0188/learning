<?php

namespace Model\Strategy;

use Model\Strategy\Strategy;

/**
 * Class Context
 *
 * @package Model\Strategy
 */
class Context {

  private $strategy;

  /**
   * Context constructor.
   *
   * @param \Model\Strategy\Strategy $strategy
   */
  public function __construct(Strategy $strategy) {
    $this->strategy = $strategy;
  }

  public function to($to) {
    $this->strategy->to($to);
  }

  /**
   * @param mixed $key
   */
  public function message($key) {
    $this->strategy->message($key);
  }

}