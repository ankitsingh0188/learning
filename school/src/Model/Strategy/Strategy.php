<?php

namespace Model\Strategy;

/**
 * Interface Strategy
 *
 * @package Model\Strategy
 */
interface Strategy {

  /**
   * @param $key
   *
   * @return mixed
   */
  public function to($to);

  /**
   * @param $key
   *
   * @return mixed
   */
  public function message($key);

}