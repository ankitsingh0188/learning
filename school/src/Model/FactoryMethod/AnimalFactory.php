<?php
declare(strict_types=1);

namespace Model\FactoryMethod;

use Model\FactoryMethod\AnimalInterface;
use Model\FactoryMethod\Duck;
use Model\FactoryMethod\Dog;

/**
 * Class AnimalFactory
 *
 * @package Model\FactoryMethod
 */
class AnimalFactory {

  /**
   * @return \Model\FactoryMethod\Duck
   */
//  public static function duck($type, $sound) {
//    return new Duck($type, $sound);
//  }

  /**
   * @return \Model\FactoryMethod\Dog
   */
//  public static function dog() {
//    return new Dog;
//  }

  /**
   * @param \Model\FactoryMethod\AnimalInterface $animal
   *
   * @return \Model\FactoryMethod\AnimalInterface
   */
  public static function create(AnimalInterface $animal) {
    return new $animal;
  }

}