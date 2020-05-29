<?php

namespace Model\Notifications;

/**
 * Interface Strategy
 *
 * @package Model\Notifications
 */
interface Strategy {

  /**
   * @param $key
   *
   * @return mixed
   */
  public function execute($key);

}