<?php
declare(strict_types=1);

namespace Model\FactoryMethod;

use Model\FactoryMethod\AnimalInterface;

/**
 * Class Duck
 *
 * @package Model\FactoryMethod
 */
class Duck implements AnimalInterface {

  /**
   * @var string type
   */
  protected $type;

  /**
   * @var string sound
   */
  protected $sound;

  /**
   * Duck constructor.
   *
   * @param $type
   * @param $sound
   */
  public function __construct(string $type, string $sound) {
    $this->type = $type;
    $this->sound = $sound;
  }

  /**
   * @return string
   */
  public function getType(): string {
    return $this->type;
  }

  /**
   * @return string
   */
  public function makeSound(): string {
    return $this->sound;
  }

  /**
   * @return string
   */
  public function test(): string {
    return 'Test Duck class';
  }

}

