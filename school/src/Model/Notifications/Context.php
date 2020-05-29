<?php

namespace Model\Notifications;

use Model\Notifications\Strategy;

/**
 * Class Context
 *
 * @package Model\Notifications
 */
class Context {

  private $strategy;

  /**
   * Context constructor.
   *
   * @param \Model\Notifications\Strategy $strategy
   */
  public function __construct(Strategy $strategy) {
    $this->strategy = $strategy;
  }

  /**
   * @param mixed $key
   */
  public function execute($key) {
    $this->strategy->execute($key);
  }

}