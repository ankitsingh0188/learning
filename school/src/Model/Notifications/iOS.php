<?php

namespace Model\Notifications;

use Model\Notifications\Strategy;

/**
 * Class iOS
 *
 * @package Model\Notifications
 */
class iOS implements Strategy {

  /**
   * @param $number
   *
   * @return mixed|void
   */
  public function execute($number) {
    print 'iOS Notifications';
  }

}