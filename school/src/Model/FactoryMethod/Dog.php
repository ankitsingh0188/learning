<?php
declare(strict_types=1);

namespace Model\FactoryMethod;

use Model\FactoryMethod\AnimalInterface;

/**
 * Class Dog
 *
 * @package Model\FactoryMethod
 */
class Dog implements AnimalInterface {

  /**
   * @return string
   */
  public function getType(): string {
    return 'DOG';
  }

  /**
   * @return string
   */
  public function makeSound(): string {
    return 'Bark Bark';
  }

}
