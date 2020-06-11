<?php

namespace Model\Strategy;

use Model\Strategy\Strategy;

/**
 * Class iOS
 *
 * @package Model\Strategy
 */
class iOS implements Strategy {

  /**
   * @param $number
   *
   * @return mixed|void
   */
  public function execute($number) {
    print 'iOS Strategy';
  }

}