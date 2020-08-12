<?php
declare(strict_types=1);

namespace Model\FactoryMethod;

/**
 * Interface AnimalInterface
 *
 * @package Model\FactoryMethod
 */
interface AnimalInterface {

  /**
   * @return string
   */
  public function getType(): string;

  /**
   * @return string
   */
  public function makeSound(): string;
}
