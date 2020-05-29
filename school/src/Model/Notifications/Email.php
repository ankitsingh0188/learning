<?php

namespace Model\Notifications;

use Model\Notifications\Strategy;

/**
 * Class Email
 *
 * @package Model\Notifications
 */
class Email implements Strategy {

  /**
   * @param $email
   *
   * @return mixed|void
   */
  public function execute($email) {
    print 'Email Notifications';
  }

}