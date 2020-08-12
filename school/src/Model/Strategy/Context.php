<?php

namespace Model\Strategy;

use Model\Strategy\InterfaceStrategy;

/**
 * Class Context
 *
 * @package Model\InterfaceStrategy
 */
class Context {

  /**
   * @var \Model\Strategy\InterfaceStrategy
   */
  private $strategy;

  /**
   * Context constructor.
   *
   * @param \Model\Strategy\InterfaceStrategy $strategy
   */
  public function __construct(InterfaceStrategy $strategy) {
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

  public function send() {

  }

}