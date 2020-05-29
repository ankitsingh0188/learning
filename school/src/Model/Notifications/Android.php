<?php

namespace Model\Notifications;

use Model\Notifications\Strategy;

/**
 * Class Android
 *
 * @package Model\Notifications
 */
class Android implements Strategy {

  /**
   * @param $number
   *
   * @return mixed|void
   */
  public function execute($number) {
    print 'Android Notifications';
  }

}